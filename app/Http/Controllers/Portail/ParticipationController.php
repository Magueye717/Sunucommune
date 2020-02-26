<?php
namespace App\Http\Controllers\Portail;


use App\Models\Participation\Panel;
use App\Models\Participation\Thematique;
use App\Repositories\Participation\ThematiqueRepository;
use App\Repositories\Participation\PanelRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ParticipationController extends Controller
{
    protected $thematiqueRepository;
    protected $panelRepository;

    public function __construct(ThematiqueRepository $thematiqueRepository,
                                PanelRepository $panelRepository)
    {
        $this->thematiqueRepository = $thematiqueRepository;
        $this->panelRepository = $panelRepository;

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

    public function thematiques($id)
    {
        $thematique=$this->thematiqueRepository->getById($id);
      //  dd($thematique);
        $panels = Panel::select('thematiques.libelle','panel.*')
        ->join('thematiques', 'thematiques.id', '=', 'panel.thematique_id')
        ->get();
        //   dd($allPanels);
        return view('participation.panels-thematique',compact('panels','thematique'));
    }

    public function details($id)
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
