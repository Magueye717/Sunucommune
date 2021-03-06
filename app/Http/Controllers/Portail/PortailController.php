<?php

namespace App\Http\Controllers\Portail;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Commune\Agenda;
use App\Models\Commune\Article;

use App\Repositories\Commune\PartenaireRepository;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Models\Commune\CommuneInfo;
use App\Models\Commune\EquipeMunicipale;
use App\Models\Commune\MembreCabinet;
use App\Models\Commune\TypeArticle;
use App\Repositories\Commune\AgendaRepository;
use App\Repositories\Commune\ArticleRepository;
use App\Repositories\Commune\EquipeMunicipaleRepository;
use App\Repositories\Commune\MediathequeRepository;
use App\Repositories\Commune\MembreCabinetRepository;
use App\Repositories\Commune\TypeArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PortailController extends Controller
{
    protected $permRepository;

    protected $communeInfoRepository;
    protected $collectiviteRepository;
    protected $articleRepository;
    protected $partenaireRepository;
    protected $equipeMunicipaleRepository;
    protected $membreCabinetRepository;
    protected $typeArticleRepository;
    protected $mediathequeRepository;
    protected   $agendaRepository;



    public function __construct(ArticleRepository $articleRepository,
                                PartenaireRepository $partenaireRepository,
                                CommuneInfoRepository $communeInfoRepository,
                                MembreCabinetRepository $membreCabinetRepository,
                                EquipeMunicipaleRepository $equipeMunicipaleRepository,
                                CollectiviteRepository $collectiviteRepository,
                                TypeArticleRepository $typeArticleRepository,
                                MediathequeRepository $mediathequeRepository,
                                AgendaRepository $agendaRepository)

    {
        $this->partenaireRepository = $partenaireRepository;
        $this->equipeMunicipaleRepository = $equipeMunicipaleRepository;
        $this->communeInfoRepository = $communeInfoRepository;
        $this->collectiviteRepository = $collectiviteRepository;
        $this->membreCabinetRepository = $membreCabinetRepository;
        $this->articleRepository = $articleRepository;
        $this->typeArticleRepository = $typeArticleRepository;
        $this->mediathequeRepository = $mediathequeRepository;
        $this->agendaRepository = $agendaRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $communeInfo = $this->communeInfoRepository->getInfo();

        $collectivites = $this->collectiviteRepository->getListeCollectivite()->prepend('choisir une r??gion...', '');
        $partenaires = $this->partenaireRepository->getData();

        $mediateques=$this->mediathequeRepository->getData();

        $deliberations = Article::whereHas('typeArticle', function ($query) {
            $query->where('libelle', 'like', 'D??lib??ration');
        })->get();

        $projets = Article::whereHas('typeArticle', function ($query) {
            $query->where('libelle', 'like', 'Projet');
        })->get();

        $actualites = Article::whereHas('typeArticle', function ($query) {
            $query->where('libelle', 'like', 'Actualit??');
        })->get();


        $equipes = MembreCabinet::select('equipe_municipales.id as equipe_id','equipe_municipales.libelle','equipe_municipales.description','membre_cabinets.*')
        ->join('equipe_municipales', 'equipe_municipales.id', '=', 'membre_cabinets.equipe_municipale_id')
        ->get();

        $equipeMunicipales = $this->equipeMunicipaleRepository->getEquipeMunicipale();
        $agendas= Agenda::all();
  return view('portail.index', compact('communeInfo','collectivites','deliberations', 'projets','partenaires',
                                        'equipeMunicipales','actualites','equipes', 'mediateques', 'agendas'));

}


    public function cabinetDetail($id)
    {
        $equipe = $this->equipeMunicipaleRepository->getById($id);
   $libelle="";
    if($equipe->libelle==='Cabinet du maire')
    {
        $teamDetails = MembreCabinet::whereHas('equipeMunicipale', function ($query) {
            $query->where('libelle', 'like', 'Cabinet du maire%');
        })->get();
        $libelle="Cabinet du maire";
        //dd($teamDetails);

    }


elseif($equipe->libelle==='Secretariat municipal')
{
    $teamDetails = MembreCabinet::whereHas('equipeMunicipale', function ($query) {
        $query->where('libelle', 'like', 'Secretariat municipal%');
    })->get();
    $libelle="Secretariat municipal";
}

else
{
    $teamDetails = MembreCabinet::whereHas('equipeMunicipale', function ($query) {
        $query->where('libelle', 'like', 'Conseil municipal%');
    })->get();
    $libelle="Conseil municipal";
}

return view('portail.team', compact('teamDetails','libelle'));
}

public function info()
{
    $communeInfo = $this->communeInfoRepository->getInfo();
    $ancienMaires = $communeInfo->ancienMaires;
    return view('portail.info-commune',compact('communeInfo','ancienMaires'));
}

public function team()
{
    $CabinetMaires = $this->membreCabinetRepository->getAllMembreCabinet();
    //$CabinetMaires = MembreCabinet::where('equipe_municipale_id',$equipe->id);
    ($CabinetMaires);
    return view('portail.team', compact('CabinetMaires'));

}

    public function actualite()
    {
        $actualites = Article::whereHas('typeArticle', function ($query) {
            $query->where('libelle', 'like', 'Actualit??');
        })->get();
        return view('portail.actualites-page',compact('actualites'));
    }

    public function details_actualite($id)
    {
        $detailActus=$this->articleRepository->getById($id);
        $detailActus->increment('views');

        $silimarActus=Article::whereHas('typeArticle', function ($query) {
            $query->where('libelle', 'like', 'Actualit??');
        })->get();

        //dd($allArticles);
        $allArticles = Article::groupby('type_articles.libelle')
        ->selectRaw('COUNT(*) as nombre ,type_articles.libelle')
        ->join('type_articles', 'type_articles.id', '=', 'articles.type_article_id')
        ->groupBy('type_articles.id')
        ->get();


        /* $allArticles=$this->$articleRepository->getData(); */
        $typeArticles=$this->typeArticleRepository->getData();
        return view('portail.actualites-details', compact('detailActus','silimarActus', 'allArticles', 'typeArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permRepository->getById($id);
        return view('admin.securite.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->permRepository->update($id, $request->all());
        return Redirect::route('permissions.index')->withMessage("La permission " . $request->input('description') . " a ??t?? modifi??e.");
    }

    public function search(Request $request){
        $inputs = $request->all();
        $q = $inputs['text'];
        $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('slug','LIKE','%'.$q.'%')->get();
        if(count($articles) > 0)
            return view('portail.index')->withDetails($articles)->withQuery ( $q );
        else return view ('portail.index')->withMessage('Aucun article trouv?? !');
    }


    public function document($id)
    {
        $delib = Article::find($id);
        /* $filename = $delib->piece_jointe;
        $path = storage_path('storage/commune/articles/files/' . $filename);
        $headers = array('Content-Type' => File::mimeType($path)); */
        //dd($delib);
        return Storage::download($delib->path, $delib->photo);
    }

}

?>
