<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypePartenariat;
use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartenaireRequest;
use App\Repositories\Commune\PartenaireRepository;
use App\Utils\UploadUtil;

class PartenaireController extends Controller
{
    protected $partenaireRepository;
    protected $uploadUtil;

    public function __construct(PartenaireRepository $partenaireRepository, UploadUtil $uploadUtil)
    {
        $this->partenaireRepository = $partenaireRepository;
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

        if ($request->hasFile('logo')) {
            $inputs['logo'] = $this->uploadUtil->traiterFile($request->file('logo'), TypeUpload::LogoPartenaire);
        }

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
        $partenaire = $this->partenaireRepository->getById($id);
        $inputs = $request->all();

        if ($request->hasFile('logo')) {

            $inputs['logo'] = $this->uploadUtil->traiterFile($request->file('logo'), TypeUpload::LogoPartenaire);
            $oldFilename = $partenaire->logo;
        }

        $this->partenaireRepository->update($id, $inputs);
        //Suppression ancienne photo
        if (!empty($oldFilename))
            $this->uploadUtil->deleteFile($oldFilename, TypeUpload::LogoPartenaire);

        return \redirect()->route('partenaires.index')->withMxessage("Le rôle " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $partenaire = $this->partenaireRepository->getById($id);

        if ($this->partenaireRepository->destroy($id)) {

            $this->uploadUtil->deleteFile($partenaire->logo, TypeUpload::LogoPartenaire);
            return redirect()->back()->withMessage("La suppression est effective");
        } else
            return redirect()->back()->withErrors("Ce partenaire ne peut être supprimé...");
    }

}
