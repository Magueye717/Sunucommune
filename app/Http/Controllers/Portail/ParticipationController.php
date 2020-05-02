<?php
namespace App\Http\Controllers\Portail;


use App\Models\Participation\Panel;
use App\Models\Participation\Sondage;
use App\Models\Participation\MembreCadre;
use App\Models\Participation\CadreConcertation;
use App\Models\Participation\Thematique;
use App\Repositories\Participation\ThematiqueRepository;
use App\Repositories\Participation\CadreConcertationRepository;
use App\Repositories\Participation\MembreCadreRepository;
use App\Repositories\Participation\PanelRepository;
use App\Repositories\Participation\SondageRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ParticipationController extends Controller
{
    protected $thematiqueRepository;
    protected $panelRepository;
    protected $sondageRepository;
    protected $cadreConcertationRepository;
    protected $membreCadreRepository;

    public function __construct(ThematiqueRepository $thematiqueRepository,
                                PanelRepository $panelRepository,
                                SondageRepository $sondageRepository,
                                CadreConcertationRepository $cadreConcertationRepository,
                                MembreCadreRepository $membreCadreRepository)
    {
        $this->thematiqueRepository = $thematiqueRepository;
        $this->panelRepository = $panelRepository;
        $this->sondageRepository = $sondageRepository;
        $this->cadreConcertationRepository = $cadreConcertationRepository;
        $this->membreCadreRepository = $membreCadreRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $allPanels = Panel::select('thematiques.libelle','panel.*')
        ->join('thematiques', 'thematiques.id', '=', 'panel.thematique_id')
        ->get();

        $allsondages = Sondage::select('thematiques.libelle','sondages.*')
        ->join('thematiques', 'thematiques.id', '=', 'sondages.thematique_id')
        ->get();
        return view('participation.index',compact('allPanels','allsondages'));
    }

    public function panel()
    {
        $allPanels = Panel::select('thematiques.libelle','panel.*')
        ->join('thematiques', 'thematiques.id', '=', 'panel.thematique_id')
        ->get();
        //  dd($allPanels);
        return view('participation.panel',compact('allPanels'));
    }

    public function panelThematiques($id)
    {
        $thematique=$this->thematiqueRepository->getById($id);
      //  dd($thematique);
        $panels = Panel::select('thematiques.libelle','panel.*')
        ->join('thematiques', 'thematiques.id', '=', 'panel.thematique_id')
        ->get();
        //   dd($allPanels);
        return view('participation.panels-thematique',compact('panels','thematique'));
    }

    public function panelDetails($id)
    {
        $panels = $this->panelRepository->getData();
        // dd($panels);
        $detailpanel=$this->panelRepository->getById($id);


        return view('participation.panels-details', compact('detailpanel','panels'));
    }

    public function sondage()
    {
        $allsondages = Sondage::select('thematiques.libelle','sondages.*')
        ->join('thematiques', 'thematiques.id', '=', 'sondages.thematique_id')
        ->get();

        return view('participation.sondage',compact('allsondages'));
    }

    public function sondageThematiques($id)
    {
        $thematique=$this->thematiqueRepository->getById($id);

        $sondages = Sondage::select('thematiques.libelle','sondages.*')
        ->join('thematiques', 'thematiques.id', '=', 'sondages.thematique_id')
        ->get();

        return view('participation.sondages-thematique',compact('sondages','thematique'));
    }

    public function sondageDetails($id)
    {
        $sondages = $this->sondageRepository->getData();

        $detailsondage=$this->sondageRepository->getById($id);

        return view('participation.sondages-details', compact('detailsondage','sondages'));
    }


    public function comite()
    {
        $comites = $this->cadreConcertationRepository->getData();
        //  dd($comites);
        return view('participation.comite',compact('comites'));
    }

    public function membrecomite($id)
    {

        $comites = $this->cadreConcertationRepository->getById($id);
        //  dd($comites);
        $nb_membres = MembreCadre::all()->count();
        // dd($nb_membres);
        $membres = MembreCadre::select('cadre_concertations.nom','membre_cadres.*')
        ->join('cadre_concertations', 'cadre_concertations.id', '=', 'membre_cadres.cadre_de_concertation_id')
        ->get();
        //  dd($membres);
        return view('participation.membreComite',compact('comites','membres','nb_membres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }
}
