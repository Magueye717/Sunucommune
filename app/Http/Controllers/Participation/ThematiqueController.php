<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThematiqueRequest;
use Illuminate\Http\Request;
use App\Repositories\Participation\ThematiqueRepository;

class ThematiqueController extends Controller
{
    protected $thematiqueRepository;


    public function __construct(ThematiqueRepository $thematiqueRepository)
    {
        $this->thematiqueRepository = $thematiqueRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thematiques = $this->thematiqueRepository->getData();
        return view('gestion.participation.thematique.index',compact('thematiques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion.participation.thematique.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThematiqueRequest $request)
    {
        $inputs = $request->all();
        $this->thematiqueRepository->store($inputs);
        return \redirect()->route('thematiques.index')->withMessage("Le theme a été créé avec succé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thematiques = $this->thematiqueRepository->getById($id);
        return view('gestion.participation.thematique.edit', compact('thematiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThematiqueRequest $request, $id)
    {
        $thematiques = $this->thematiqueRepository->getById($id);
        $inputs = $request->all();

        $this->thematiqueRepository->update($id, $inputs);

        return \redirect()->route('thematiques.index')->withMessage("Les informations du thematique ont été mises à jour avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->thematiqueRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce theme ne peut être supprimé...");
    }
}
