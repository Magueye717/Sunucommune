<?php

namespace App\Http\Controllers\Participation;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PanelRequest;
use App\Repositories\Participation\PanelRepository;
use App\Repositories\Participation\ThematiqueRepository;
use App\Utils\UploadUtil;

class PanelController extends Controller
{
    protected $panelRepository;
    protected $thematiqueRepository;
    protected $uploadUtil;


    public function __construct(PanelRepository $panelRepository,
                                UploadUtil $uploadUtil,
                                ThematiqueRepository $thematiqueRepository)
    {
        $this->panelRepository = $panelRepository;
        $this->thematiqueRepository = $thematiqueRepository;
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
        $panels = $this->panelRepository->getData();
        return view('gestion.participation.panel.index', compact('panels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $thematiques = $this->thematiqueRepository->getListe();
        return view('gestion.participation.panel.create', compact('thematiques'));
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
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoPanel);
        }
        //PJ
        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'), TypeUpload::PanelFile);
        }
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
        return view('gestion.participation.panel.show', compact('panels'));
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
        $thematiques = $this->thematiqueRepository->getListe();
        return view('gestion.participation.panel.edit', compact('panels','thematiques'));
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
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoPanel);
            $oldPhotoFilename = $panels->photo;
        }
        //PJ
        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'), TypeUpload::PanelFile);
            $oldPJFilename = $panels->fichier;
        }

        $this->panelRepository->update($id, $inputs);

        //Suppression ancienne photo
        if (!empty($oldPhotoFilename))
            $this->uploadUtil->deleteFile($oldPhotoFilename, TypeUpload::PhotoPanel);
        //Suppression ancienne PJ
        if (!empty($oldPJFilename))
            $this->uploadUtil->deleteFile($oldPJFilename, TypeUpload::PanelFile);

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
    public function valider($id)
    {
        $panel = $this->panelRepository->getById($id);
        $this->panelRepository->valider($panel, !$panel->estActive());
        return redirect()->back()->withMessage($panel->statut?"Le panel a été activé.":"Le panel a été désactivé.");
    }
}
?>
