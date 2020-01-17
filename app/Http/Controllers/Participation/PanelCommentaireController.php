<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PanelCommentaireRequest;
use App\Repositories\Participation\PanelCommentaireRepository;
use App\Repositories\Participation\PanelRepository;

class PanelCommentaireController extends Controller
{
    protected $panelCommentaireRepository;
    protected $panelRepository;

    public function __construct(PanelCommentaireRepository $panelCommentaireRepository,
                                PanelRepository $panelRepository)
    {
        $this->panelCommentaireRepository = $panelCommentaireRepository;
        $this->panelRepository = $panelRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $panels = $this->panelRepository->getListe();
        // $panels = $this->panelRepository->getListe();
        return view('gestion.participation.panel.panel_commentaires.create',compact('panels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PanelCommentaireRequest $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $this->panelCommentaireRepository->store($inputs);
        return \redirect()->route('panels.index')->withMessage("Le commentaire a été créé avec succé.");
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
        $panels = $this->panelRepository->getListe();
        $commentaires = $this->panelCommentaireRepository->getById($id);
        return view('gestion.participation.panel.panel_commentaires.edit', compact('commentaires','panels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PanelCommentaireRequest $request,$id)
    {
        $inputs = $request->all();
        // dd($inputs);

        $this->panelCommentaireRepository->update($id, $inputs);

        return \redirect()->route('panels.index')->withMessage("Les informations du panel ont été mises à jour avec succés.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->panelCommentaireRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce commentaire ne peut être supprimé...");
    }

}

?>
