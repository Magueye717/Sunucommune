<?php
namespace App\Http\Controllers\Portail;


use App\Models\Participation\Panel;
use App\Models\Participation\Sondage;
use App\Models\Participation\Thematique;
use App\Repositories\Participation\ThematiqueRepository;
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

    public function __construct(ThematiqueRepository $thematiqueRepository,
                                PanelRepository $panelRepository,
                                SondageRepository $sondageRepository)
    {
        $this->thematiqueRepository = $thematiqueRepository;
        $this->panelRepository = $panelRepository;
        $this->sondageRepository = $sondageRepository;

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
        return view('participation.index',compact('allPanels'));
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
        //   dd($detailpanel);
            // $nom="";
            //     if($detailpanel->categorie_id === 1)
            //     {
            //         $similarpanel = panel::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Etat civil');
            //         })->get();
            //         $nom="Etat civil";
            //         // dd($similarpanel);
            //     }

            //     elseif($detailpanel->categorie_id === 2)
            //     {
            //         $similarpanel = panel::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Foncier%');
            //         })->get();
            //         $nom="Foncier";
            //     }

            //     elseif($detailpanel->categorie_id === 3)
            //     {
            //         $similarpanel = panel::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Fiscalite');
            //         })->get();
            //         $nom="Fiscalite";
            //     }

            //     else
            //     {
            //         $similarpanel = panel::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Social');
            //         })->get();
            //         $nom="Social";
            //     }
            // $allpanels = panel::groupby('categories.nom')
            // ->selectRaw('COUNT(*) as nombre ,categories.nom')
            // ->join('categories', 'categories.id', '=', 'panels.categorie_id')
            // ->groupBy('categories.id')
            // ->get();

            // dd($panels->id);

        return view('participation.panels-details', compact('detailpanel','panels'));
    }

    public function sondage()
    {
        $allsondages = Sondage::select('thematiques.libelle','sondages.*')
        ->join('thematiques', 'thematiques.id', '=', 'sondages.thematique_id')
        ->get();
        //  dd($allsondages);
        return view('participation.sondage',compact('allsondages'));
    }

    public function sondageThematiques($id)
    {
        $thematique=$this->thematiqueRepository->getById($id);
      //  dd($thematique);
        $sondages = Sondage::select('thematiques.libelle','sondages.*')
        ->join('thematiques', 'thematiques.id', '=', 'sondages.thematique_id')
        ->get();
        //   dd($allsondages);
        return view('participation.sondages-thematique',compact('sondages','thematique'));
    }

    public function sondageDetails($id)
    {
        $sondages = $this->sondageRepository->getData();
        // dd($sondages);
        $detailsondage=$this->sondageRepository->getById($id);
        //   dd($detailsondage);
            // $nom="";
            //     if($detailsondage->categorie_id === 1)
            //     {
            //         $similarsondage = sondage::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Etat civil');
            //         })->get();
            //         $nom="Etat civil";
            //         // dd($similarsondage);
            //     }

            //     elseif($detailsondage->categorie_id === 2)
            //     {
            //         $similarsondage = sondage::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Foncier%');
            //         })->get();
            //         $nom="Foncier";
            //     }

            //     elseif($detailsondage->categorie_id === 3)
            //     {
            //         $similarsondage = sondage::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Fiscalite');
            //         })->get();
            //         $nom="Fiscalite";
            //     }

            //     else
            //     {
            //         $similarsondage = sondage::whereHas('categorie', function ($query) {
            //             $query->where('nom', 'like', 'Social');
            //         })->get();
            //         $nom="Social";
            //     }
            // $allsondages = sondage::groupby('categories.nom')
            // ->selectRaw('COUNT(*) as nombre ,categories.nom')
            // ->join('categories', 'categories.id', '=', 'sondages.categorie_id')
            // ->groupBy('categories.id')
            // ->get();

            // dd($sondages->id);

        return view('participation.sondages-details', compact('detailsondage','sondages'));
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
