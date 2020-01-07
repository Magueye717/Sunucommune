<?php

namespace App\Http\Controllers\Participation;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadreConcertationRequest;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Participation\CadreConcertationRepository;
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
    protected $uploadUtil;

    public function __construct(CadreConcertationRepository $cadreConcerationRepository,
                                UploadUtil $uploadUtil,
                                CollectiviteRepository $collectiviteRepository)
    {
        $this->cadreConcerationRepository = $cadreConcerationRepository;
        $this->collectiviteRepository = $collectiviteRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
    }

    public function index()
    {
        $cadres=$this->cadreConcerationRepository->getData();
        return view('gestion.participation.cadre_concertation.index', compact('cadres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $collectivites=$this->collectiviteRepository->getListeCollectivite()->prepend('choisir une région...', '');
        return view('gestion.participation.cadre_concertation.create', compact('collectivites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CadreConcertationRequest $request)
    {
        $inputs = $request->all();
        $inputs['collectivite_id'] = $this->collectiviteRepository->getById($inputs['commune'])->id;
        $inputs['add_by'] = Auth::user()->id;
        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'));
        }
        $cardre = $this->cadreConcerationRepository->store($inputs);

        return redirect('/participation/cadres')->withMessage("La le menmbre cadre " . $cardre->nom . " a été créé avec succés.");
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
        $collectivites=$this->collectiviteRepository->getListeCollectivite()->prepend('choisir une région...', '');
        $infoLocalisation=$this->getLocalisationData($cadre);

        return view('gestion.participation.cadre_concertation.edit', compact('collectivites', 'cadre', 'infoLocalisation'));
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
        $inputs['collectivite_id'] = $this->collectiviteRepository->getById($inputs['commune'])->id;
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
