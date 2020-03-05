<?php 

namespace App\Http\Controllers\GestionInfrastructure;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\RessourceRequest;
use App\Models\GestionInfrastructure\Secteur;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Repositories\Infrastructures\RessourceRepository;
use App\Utils\UploadUtil;
use Illuminate\Support\Facades\Auth;

class RessourceController extends Controller 
{

  protected $communeInfoRepository;
  protected $collectiviteRepository;
  protected $uploadUtil;
  protected $ressourceRepository;

  public function __construct(CommuneInfoRepository $communeInfoRepository,
                              CollectiviteRepository $collectiviteRepository,
                              RessourceRepository $ressourceRepository,
                              UploadUtil $uploadUtil)
  {
      $this->communeInfoRepository = $communeInfoRepository;
      $this->collectiviteRepository = $collectiviteRepository;
      $this->ressourceRepository = $ressourceRepository;
      $this->uploadUtil = $uploadUtil;
      $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $ressources= $this->ressourceRepository->getData();
    return view('gestion.participation.ressources.index', compact('ressources'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    try{
    $communeInfo=$this->communeInfoRepository->getCollectiviteId();
    $collectivites = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($communeInfo), 'QUARTIERVILLAGE');
    $secteurs=Secteur::all()->pluck('nom', 'id');
    return view('gestion.participation.ressources.create', compact('collectivites', 'secteurs'));
  }catch ( \Illuminate\Database\Eloquent\ModelNotFoundException $e) {

    return redirect('/infos/create')->withWarning("Veuillez renseigner d'abord les informations concernant la commune");
}
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(RessourceRequest $request)
  {
   
    $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoRessource);
        }
        $ressource = $this->ressourceRepository->store($inputs);

        if (!$ressource)
            return \redirect()->back()->withErrors("L'ajout de le de la structure a échoué. Veuillez réessayer ou contacter l'administrateur.");

        return redirect('/infrastructures/ressources')->withMessage("La structure " . $ressource->nom . " a été créé avec succés.");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $ressource = $this->ressourceRepository->getById($id);
    return view('gestion.participation.ressources.show', compact('ressource'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  { 
      $ressource = $this->ressourceRepository->getById($id);
      $communeInfo=$this->communeInfoRepository->getCollectiviteId();
      $collectivites = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($communeInfo), 'QUARTIERVILLAGE');
      $secteurs=Secteur::all()->pluck('nom', 'id');
      ($collectiviteRessource=$ressource->collectivite);
      return view('gestion.participation.ressources.edit', compact('collectivites', 'secteurs', 'collectiviteRessource', 'ressource'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(RessourceRequest $request, $id)
  {
    try{
      $ressource = $this->ressourceRepository->getById($id);
      $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoRessource);
            $photoRessource = $ressource->photo;
        }
       $this->ressourceRepository->update( $id, $inputs);

       if (!empty($photoRessource))
            $this->uploadUtil->deleteFile($photoRessource, TypeUpload::PhotoRessource);

        return redirect('/infrastructures/ressources')->withMessage("La structure a été créé avec succés.");
      }catch ( \Illuminate\Database\Eloquent\ModelNotFoundException $e) {

        return redirect('/infos/create')->withWarning("Veuillez renseigner d'abord les informations concernant la commune");
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      if ($this->ressourceRepository->destroy($id))
        return redirect()->back()->withMessage("La suppression est effective");
      else
        return redirect()->back()->withErrors("Supression impossible...");

    }
  
}

?>