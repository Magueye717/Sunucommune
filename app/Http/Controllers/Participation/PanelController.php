<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PanelRequest;
use App\Repositories\Participation\PanelRepository;

class PanelController extends Controller
{
    protected $panelRepository;


    public function __construct(PanelRepository $panelRepository)
    {
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
        $panels = $this->panelRepository->getData();
        return view('gestion.panel.index', compact('panels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('gestion.panel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PanelRequest $request)
    {
        $inputs = $request->all();
        $inputs['date_publication']=date("Y-m-d");
        $this->panelRepository->store($inputs);
        return \redirect()->route('panels.index')->withMessage("Le panel a été créé avec succé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        // $panels = $this->panelRepository->getById($id)->withCommentaires();
        $panels = $this->panelRepository->getById($id);
        return view('gestion.panel.show', compact('panels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $panels = $this->panelRepository->getById($id);
        return view('gestion.panel.edit', compact('panels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PanelRequest $request,$id)
    {
        $panels = $this->panelRepository->getById($id);
        $inputs = $request->all();

        $this->panelRepository->update($id, $inputs);

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
        if ($this->panelRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce membre ne peut être supprimé...");
    }

}

?>
