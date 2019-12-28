<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypePartenariat;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartenaireRequest;
use App\Repositories\Commune\PartenaireRepository;
use Illuminate\Support\Facades\Redirect;

class PartenaireController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $partenaireRepository;

    public function __construct(PartenaireRepository $partenaireRepository)
    {
        $this->partenaireRepository = $partenaireRepository;
    }

    public function index()
    {
        $partenaires = $this->partenaireRepository->getData();

        return view('gestion.commune.partenaires.index', compact('partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $type = TypePartenariat::toSelectArray();

        return view('gestion.commune.partenaires.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PartenaireRequest $request)
    {
        $inputs = $request->all();
        $partenaire = $this->partenaireRepository->store($inputs);
        return \redirect()->route('partenaires.index')->withMessage("Le Partenaire " . $partenaire->nom . " a été créé.");
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $type = TypePartenariat::toSelectArray();
        $partenaire = $this->partenaireRepository->getById($id);
        return view('gestion.commune.partenaires.edit', compact('partenaire', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(PartenaireRequest $request, $id)
    {
        $this->partenaireRepository->update($id, $request->all());
        return \redirect()->route('partenaires.index')->withMessage("Le rôle " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>
