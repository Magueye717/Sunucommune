<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\AncienMaireRequest;
use App\Repositories\Commune\AncienMaireRepository;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Utils\UploadUtil;
use Illuminate\Http\Request;

class AncienMaireController extends Controller
{
    protected $communeInfoRepository;

    protected $ancienMairesRepository;
    protected $uploadUtil;

    public function __construct(AncienMaireRepository $ancienMairesRepository, UploadUtil $uploadUtil,CommuneInfoRepository $communeInfoRepository)
    {
        $this->ancienMairesRepository = $ancienMairesRepository;
        $this->communeInfoRepository = $communeInfoRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  { $ancien_maires = $this->ancienMairesRepository->getData();
//   dd($ancien_maires);
      return view('gestion.commune.anciens_maires.index', compact('ancien_maires'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */


    public function create()
    {


        //   $collectivites = $this->collectiviteRepository->getListeCollectivite()->prepend('choisir une région...', '');
        return view('gestion.commune.anciens_maires.create');
    }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(AncienMaireRequest $request)
  {
      $communeInfo = $this->communeInfoRepository->getInfo();
      $inputs = $request->all();
      $inputs['commune_info_id'] = $communeInfo->id;
      //Photo du maire
      if ($request->hasFile('photo')) {


          $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoMaire);


//          dd($inputs);
      }
      $this->ancienMairesRepository->store($inputs);
      return \redirect()->route('infos.index')->withMessage("Les informations du maire ont été enregistrée avec succés.");

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

      $ancien_maire="";
      return view('gestion.commune.anciens_maires.update',compact('ancien_maire'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
