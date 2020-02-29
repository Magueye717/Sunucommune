<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaRequest;
use App\Models\Commune\Agenda;
use App\Repositories\Commune\AgendaRepository;
use App\Repositories\Commune\CollectiviteRepository;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Utils\UploadUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{

    protected $agendaRepository;
    protected $communeInfoRepository;
    protected $collectiviteRepository;
    protected $uploadUtil;

    public function __construct(AgendaRepository $agendaRepository,
                                CommuneInfoRepository $communeInfoRepository,
                                CollectiviteRepository $collectiviteRepository,
                                UploadUtil $uploadUtil)
    {
        $this->agendaRepository = $agendaRepository;
        $this->communeInfoRepository = $communeInfoRepository;
        $this->collectiviteRepository = $collectiviteRepository;
        $this->uploadUtil = $uploadUtil;
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas=$this->agendaRepository->getData();
        return view('gestion.commune.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $communeInfo=$this->communeInfoRepository->getCollectiviteId();
            $collectivites = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($communeInfo), 'QUARTIERVILLAGE')->prepend('Choisir un quartier ou village...');
            return view('gestion.commune.agenda.create', compact('collectivites'));
        } 
        catch ( \Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return redirect('/infos/create')->withWarning("Veuillez renseigner d'abord les informations concernant la commune");
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaRequest $request)
    {
        $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoAgenda);
        }
        $agenda = $this->agendaRepository->store($inputs);

        return redirect('/agendas')->withMessage("Activité " . $agenda->libelle . " a été créé avec succés.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commune\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('gestion.commune.agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commune\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $communeInfo=$this->communeInfoRepository->getCollectiviteId();
        $collectivites = $this->collectiviteRepository->getListeByParentCode($this->collectiviteRepository->getCodeById($communeInfo), 'QUARTIERVILLAGE')->prepend('Choisir un quartier ou village...');
        ($collectiviteAgenda=$agenda->collectivite);

        return view('gestion.commune.agenda.edit', compact('collectivites', 'agenda', 'collectiviteAgenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commune\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaRequest $request, Agenda $agenda)
    {
        $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoAgenda);
        }
        $this->agendaRepository->update($agenda->id, $inputs);

        return redirect('/agendas')->withMessage("L'activité " . $inputs['libelle'] . " modifié avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commune\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        if ($this->agendaRepository->destroy($agenda->id))
            return redirect()->back()->withMessage("La suppression est effective");
         else
            return redirect()->back()->withErrors("Supression impossible...");
    }
}
