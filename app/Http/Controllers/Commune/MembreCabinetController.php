<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypeUpload;
use App\Utils\UploadUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembreCabinetRequest;
use App\Repositories\Commune\MembreCabinetRepository;

class MembreCabinetController extends Controller
{
    protected $membreCabinetRepository;
    protected $uploadUtil;

    public function __construct(MembreCabinetRepository $membreCabinetRepository, UploadUtil $uploadUtil)
    {
        $this->membreCabinetRepository = $membreCabinetRepository;
        $this->uploadUtil = $uploadUtil;
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
        //Photo du membreCabinet
        if ($request->hasFile('photo_membre')) {
            $inputs['photo_membre'] = $this->uploadUtil->traiterFile($request->file('photo_membre'), TypeUpload::PhotoMembre);
        }
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
        $membre = $this->membreCabinetRepository->getById($id);
        $inputs = $request->all();
        //Photo du membre
        if ($request->hasFile('photo_membre')) {
            $inputs['photo_membre'] = $this->uploadUtil->traiterFile($request->file('photo_membre'), TypeUpload::PhotoMembre);
            $oldFilename = $membre->photo_membre;
        }
        $this->membreCabinetRepository->update($id, $inputs);
        //Suppression ancienne photo
        if (!empty($oldFilename))
            $this->uploadUtil->deleteFile($oldFilename, TypeUpload::PhotoMembre);

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
