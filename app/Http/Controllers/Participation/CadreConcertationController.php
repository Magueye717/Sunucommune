<?php

namespace App\Http\Controllers\Participation;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadreConcertationRequest;
use App\Http\Requests\MembreCadreRequest;
use App\Models\Commune\SocialLink;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Repositories\Participation\CadreConcertationCollectiviteRepository;
use App\Repositories\Participation\CadreConcertationRepository;
use App\Repositories\Participation\MembreCadreRepository;
use App\Utils\UploadUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadreConcertationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $cadreConcertationRepository;
    protected $collectiviteRepository;
    protected $communeInfoRepository;
    protected $uploadUtil;
    protected $membreCadreRepository;
    protected $cadreConcertationCollectiviteRepository;

    public function __construct(CadreConcertationRepository $cadreConcertationRepository,
                                UploadUtil $uploadUtil,
                                CadreConcertationCollectiviteRepository $cadreConcertationCollectiviteRepository,
                                CollectiviteRepository $collectiviteRepository,
                                CommuneInfoRepository $communeInfoRepository,
                                MembreCadreRepository $membreCadreRepository)
    {
        $this->cadreConcertationRepository = $cadreConcertationRepository;
        $this->collectiviteRepository = $collectiviteRepository;
        $this->communeInfoRepository = $communeInfoRepository;
        $this->membreCadreRepository = $membreCadreRepository;
        $this->cadreConcertationCollectiviteRepository = $cadreConcertationCollectiviteRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
    }


    public function index()
    {
        try{
            $cadreConcertations=$this->cadreConcertationRepository->getListeCadreConcertation()->prepend('choisir un cadre de concertation...', '');
            $cadres=$this->cadreConcertationRepository->getData();
            $reseauxSociaux= SocialLink::all()->pluck("id", "libelle");
            return view('gestion.participation.cadre_concertation.index', compact('cadres','cadreConcertations', 'reseauxSociaux'));

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect('/infos/create')->withWarning("Veuillez renseigner d'abord les informations concernant la commune");
        }
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
            $collectivites = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($communeInfo), 'QUARTIERVILLAGE')->prepend('Choisir un quartier ou village...');
            return view('gestion.participation.cadre_concertation.create', compact('collectivites'));
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect('/infos/create')->withWarning("Veuillez renseigner d'abord les informations concernant la commune");
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CadreConcertationRequest $request)
    {

        $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoComite);
        }

        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'), TypeUpload::cadreFile);
        }

        $cardre = $this->cadreConcertationRepository->store($inputs);
       //  dd($inputs['collectivite_id']);

        $cardrecollectivites = $this->cadreConcertationCollectiviteRepository->saveMany($inputs['collectivite_id'],$cardre['id']);


       // $cardre->collectivites()->attach($inputs['collectivite_id']);

        return redirect('/participation/cadres')->withMessage("le cadre " . $inputs['nom'] . " a été créé avec succés.");
    }


    public function storeMembre(MembreCadreRequest $request)
    {
        $inputs = $request->all();
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoComite);
        }
        // dd($inputs);
        $membre = $this->membreCadreRepository->store($inputs);
        // dd($membre);
        return redirect('/participation/cadres')->withMessage("le cadre " . $membre->nom . " a été créé avec succés.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $cadre = $this->cadreConcertationRepository->getById($id);
        $communeInfo=$this->communeInfoRepository->getCollectiviteId();
        $collectivites = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($communeInfo), 'QUARTIERVILLAGE')->prepend('Choisir un quartier ou village...');
        ($communeDuCadre=$cadre->collectivite);

        return view('gestion.participation.cadre_concertation.edit', compact('collectivites', 'cadre', 'communeDuCadre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(CadreConcertationRequest $request, $id)
    {
        $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoComite);
        }

        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'), TypeUpload::cadreFile);
        }
        $this->cadreConcertationRepository->update($id, $inputs);

        return redirect('/participation/cadres')->withMessage("Cadre " . $inputs['nom'] . " modifié avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->cadreConcertationRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
         else
            return redirect()->back()->withErrors("Ce cadre ne peut être supprimée...");
    }

    public function fetch(Request $request)
    {
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($value), $dependent);
        $output = '<option value="">Choisir...</option>';
        foreach ($data as $key => $value) {
            $output .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $output;
    }

    public function valider($id)
    {
        $cadre = $this->cadreConcertationRepository->getById($id);
        $this->cadreConcertationRepository->valider($cadre, !$cadre->estActive());
        return redirect()->back()->withMessage($cadre->statut?"Le cadre a été activé.":"Le cadre a été désactivé.");
    }

   /*  private function getLocalisationData($cadreConcertation)
    {
        $collectivite = $cadreConcertation->collectivite;
        $selectedCommune = $collectivite->parent;
        $selectedDepartement = $selectedCommune->parent;
        $selectedRegion = $selectedDepartement->parent;
        return array(
            'departements' => $this->collectiviteRepository->getListeByParentCode($selectedRegion->code, 'departement'),
            'communes' => $this->collectiviteRepository->getListeByParentCode($selectedDepartement->code, 'commune'),
            'quartiervillages' => $this->collectiviteRepository->getListeByParentCode($selectedCommune->code, 'quartiervillage'),
            'collectivite_id' => $collectivite->id,
            'commune' => $collectivite->id,
           // 'commune' => $selectedCommune->id,
            'departement' => $selectedDepartement->id,
            'region' => $selectedRegion->id,
        );
    } */

}

?>
