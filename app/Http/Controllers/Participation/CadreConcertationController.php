<?php

namespace App\Http\Controllers\Participation;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadreConcertationRequest;
use App\Http\Requests\MembreCadreRequest;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Commune\CommuneInfoRepository;
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
    protected $cadreConcerationRepository;
    protected $collectiviteRepository;
    protected $communeInfoRepository;
    protected $uploadUtil;
    protected $membreCadreRepository;

    public function __construct(CadreConcertationRepository $cadreConcerationRepository,
                                UploadUtil $uploadUtil,
                                CollectiviteRepository $collectiviteRepository,
                                CommuneInfoRepository $communeInfoRepository,
                                MembreCadreRepository $membreCadreRepository)
    {
        $this->cadreConcerationRepository = $cadreConcerationRepository;
        $this->collectiviteRepository = $collectiviteRepository;
        $this->communeInfoRepository = $communeInfoRepository;
        $this->membreCadreRepository = $membreCadreRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
    }


    public function index()
    {
        try{
            $cadreConcertations=$this->cadreConcerationRepository->getListeCadreConcertation()->prepend('choisir un cadre de concertation...', '');
            $cadres=$this->cadreConcerationRepository->getData();
            return view('gestion.participation.cadre_concertation.index', compact('cadres','cadreConcertations'));

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
        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'));
        }
        $cardre = $this->cadreConcerationRepository->store($inputs);

        return redirect('/participation/cadres')->withMessage("La le menmbre cadre " . $cardre->nom . " a été créé avec succés.");
    }


    public function storeMembre(MembreCadreRequest $request)
    {
        $inputs = $request->all();
        $membre = $this->membreCadreRepository->store($inputs);

        return redirect('/participation/cadres')->withMessage("La le menmbre cadre " . $membre->nom . " a été créé avec succés.");
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
        $cadre = $this->cadreConcerationRepository->getById($id);
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
        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'));
        }
        $this->cadreConcerationRepository->update($id, $inputs);

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
        if ($this->cadreConcerationRepository->destroy($id))
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

    private function getLocalisationData($cadreConcertation)
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
    }

}

?>
