<?php

namespace App\Http\Controllers\Portail;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;

use App\Models\Commune\Article;

use App\Repositories\Commune\PartenaireRepository;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Models\Commune\CommuneInfo;
use App\Models\Commune\EquipeMunicipale;
use App\Models\Commune\MembreCabinet;
use App\Models\Commune\TypeArticle;
use App\Repositories\Commune\ArticleRepository;
use App\Repositories\Commune\EquipeMunicipaleRepository;
use App\Repositories\Commune\MembreCabinetRepository;
use Illuminate\Http\Request;

class PortailController extends Controller
{
    protected $permRepository;

    protected $communeInfoRepository;
    protected $articlefoRepository;
    protected $partenaireRepository;
    protected $equipeMunicipaleRepository;
    protected $membreCabinetRepository;



    public function __construct(ArticleRepository $articlefoRepository,
                                PartenaireRepository $partenaireRepository,
                                CommuneInfoRepository $communeInfoRepository,
                                MembreCabinetRepository $membreCabinetRepository,
                                EquipeMunicipaleRepository $equipeMunicipaleRepository)

    {
        $this->partenaireRepository = $partenaireRepository;
        $this->equipeMunicipaleRepository = $equipeMunicipaleRepository;
        $this->communeInfoRepository = $communeInfoRepository;
        $this->membreCabinetRepository = $membreCabinetRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $projets = Article::all();
        $communeInfo = $this->communeInfoRepository->getInfo();
        $partenaires = $this->partenaireRepository->getData();
        $membreCabinets = $this->membreCabinetRepository->getAllMembreCabinet();
        $equipeMunicipales = $this->equipeMunicipaleRepository->getEquipeMunicipale();

        //dd($memebreCabinet);
  return view('portail.index', compact('communeInfo', 'projets','partenaires', 'membreCabinets', 'equipeMunicipales'));
    }

    public function info()
    {
        return view('portail.info-commune');
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
        $projets = Article::all();
        return view('portail.actualites-page',compact('projets'));
    }

    public function details_actualite()
    {
        return view('portail.actualites-details');
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
        return Redirect::route('permissions.index')->withMessage("La permission " . $request->input('description') . " a été modifiée.");
    }

    public function search(Request $request){
        $inputs = $request->all();
        $q = $inputs['text'];
        $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('slug','LIKE','%'.$q.'%')->get();
        if(count($articles) > 0)
            return view('portail.index')->withDetails($articles)->withQuery ( $q );
        else return view ('portail.index')->withMessage('Aucun article trouvé !');
    }

}

?>
