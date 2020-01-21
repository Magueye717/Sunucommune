<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypeMediatheque;
use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediathequeRequest;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Repositories\Commune\MediathequeRepository;
use App\Utils\MediaUtile;
use App\Utils\UploadUtil;

class MediathequeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $mediathequeRepository;
    protected $uploadUtil;
    protected $mediaUtil;
    protected $communeInfoRepository;
    public function __construct(MediathequeRepository $mediathequeRepository,
                                UploadUtil $uploadUtil,
                                MediaUtile $mediaUtil,
                                CommuneInfoRepository $communeInfoRepository)
    {
            $this->mediathequeRepository = $mediathequeRepository;
            $this->communeInfoRepository = $communeInfoRepository;
            $this->uploadUtil = $uploadUtil;
            $this->mediaUtil = $mediaUtil;
            $this->middleware('auth');
    }


    public function index()
    {
        $medias=$this->mediathequeRepository->getData();
        return view('gestion.commune.mediatheques.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $typeMedia =TypeMediatheque::toSelectArray();
        return view('gestion.commune.mediatheques.create', compact('typeMedia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MediathequeRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'), TypeUpload::MediaFile);
            $inputs['type_media'] = $this->mediaUtil->mediaExtentionControl($inputs['fichier']);

            $listExtention = array('jpg', 'jpeg', 'jpg', 'mp3','mp4','avi');
            $fileExtension = pathinfo($inputs['fichier'], PATHINFO_EXTENSION);

            if (!in_array($fileExtension,$listExtention))
                     {
                        return \redirect()->back()->withErrors("Formats autorisés: Audio (mp3,wav) | Photo (mp4,3gp,flv,avi) | Photo(jpeg,jpg,png)");
                     }

     /*  dd( $inputs['type_fichier']); */
        }
        $media = $this->mediathequeRepository->store($inputs);

        if (!$media)
            return \redirect()->back()->withErrors("L'ajout de média échoué. Veuillez réessayer ou contacter l'administrateur.");
        return redirect('/mediatheques')->withMessage(" Média créé avec succés.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $media = $this->mediathequeRepository->getById($id);
        return view('gestion.commune.mediatheques.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $media = $this->mediathequeRepository->getById($id);
        $typeMedia =TypeMediatheque::toSelectArray();
        return view('gestion.commune.mediatheques.edit', compact('media', 'typeMedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, MediathequeRequest $request)
    {
        $media = $this->mediathequeRepository->getById($id);
        $inputs = $request->all();
        //Illustration
        if ($request->hasFile('fichier')) {
            $inputs['fichier'] = $this->uploadUtil->traiterFile($request->file('fichier'), TypeUpload::MediaFile);
            $oldPhotoFilename = $media->photo;
            $inputs['type_media'] = $this->mediaUtil->mediaExtentionControl($inputs['fichier']);
        }
        $this->mediathequeRepository->update($id, $inputs);

        //Suppression ancienne photo
        if (!empty($oldPhotoFilename))
            $this->uploadUtil->deleteFile($oldPhotoFilename, TypeUpload::MediaFile);

        return \redirect()->route('mediatheques.index')->withMessage("Média modifié avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->mediathequeRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce média ne peut être supprimé...");
    }

}
