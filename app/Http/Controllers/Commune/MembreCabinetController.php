<?php

namespace App\Http\Controllers\Commune;

use App\Http\Controllers\Controller;
use App\Http\Requests\MembreCabinetRequest;
use App\Repositories\Commune\MembreCabinetRepository;

class MembreCabinetController extends Controller
{
    protected $membreCabinetRepository;

    public function __construct(MembreCabinetRepository $membreCabinetRepository)
    {
        $this->membreCabinetRepository = $membreCabinetRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $membres = $this->membreCabinetRepository->getData();
        return view('gestion.membre_cabinets.index', compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('gestion.membre_cabinets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MembreCabinetRequest $request)
    {
        $inputs = $request->all();
        $this->membreCabinetRepository->store($inputs);
        return \redirect()->route('membre-cabinets.index')->withMessage("L'utilisateur a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $membre = $this->membreCabinetRepository->getById($id);
        return view('gestion.membre_cabinets.show', compact('membre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $membre = $this->membreCabinetRepository->getById($id);
        return view('gestion.membre_cabinets.edit', compact('membre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(MembreCabinetRequest $request, $id)
    {
        $this->membreCabinetRepository->update($id, $request->all());
        return \redirect()->route('membre-cabinets.index')->withMessage("Le membre du cabinet " . $request->input('prenom') . " " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->membreCabinetRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce membre ne peut être supprimé...");
    }

}

?>