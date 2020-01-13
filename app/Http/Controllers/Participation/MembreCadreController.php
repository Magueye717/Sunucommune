<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use App\Http\Requests\MembreCadreRequest;
use App\Repositories\Participation\CadreConcertationRepository;
use App\Repositories\Participation\MembreCadreRepository;
use Illuminate\Http\Request;

class MembreCadreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $cadreConcerationRepository;
    protected $membreCadreRepository;

    public function __construct(CadreConcertationRepository $cadreConcerationRepository,
                                MembreCadreRepository $membreCadreRepository)
    {
        $this->cadreConcerationRepository = $cadreConcerationRepository;
        $this->membreCadreRepository = $membreCadreRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $membreCadres=$this->membreCadreRepository->getData();
        return view('gestion.participation.membre_cadre.index', compact('membreCadres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cadreConcertations=$this->cadreConcerationRepository->getListeCadreConcertation()->prepend('choisir un cadre de concertation...', '');
        return view('gestion.participation.membre_cadre.create', compact('cadreConcertations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MembreCadreRequest $request)
    {
        $inputs = $request->all();
        $membre = $this->membreCadreRepository->store($inputs);

        return redirect('/participation/membre_cadres')->withMessage("La le menmbre cadre " . $membre->nom . " a été créé avec succés.");
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
        $membreCadre = $this->membreCadreRepository->getById($id);
        $cadreConcertations=$this->cadreConcerationRepository->getListeCadreConcertation()->prepend('choisir une région...', '');
        return view('gestion.participation.membre_cadre.edit', compact('cadreConcertations', 'membreCadre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(MembreCadreRequest $request, $id)
    {
        $inputs = $request->all();
        $this->membreCadreRepository->update($id, $inputs);

        return redirect('/participation/membre_cadres')->withMessage("Membre Cadre " . $inputs['nom'] . " modifié avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->membreCadreRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
         else
            return redirect()->back()->withErrors("Ce cadre ne peut être supprimée...");
    }

}

?>
