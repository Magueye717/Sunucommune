<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommuneInfoRequest;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Utils\UploadUtil;
use Illuminate\Http\Request;

class CommuneInfoController extends Controller
{

    protected $CommuneInfoRepository;
    protected $uploadUtil;

    public function __construct(CommuneInfoRepository $communeInfoRepository, UploadUtil $uploadUtil)
    {
        $this->communeInfoRepository = $communeInfoRepository;
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
        $communeInfo = $this->communeInfoRepository->getInfo();
        $historique=[];
        $ancienMaires=[];
        if($communeInfo != null){
            $historique = $communeInfo->historique;
            $ancienMaires = $communeInfo->ancienMaires;
        }
        return view('gestion.commune.infos.show', compact('communeInfo', 'historique', 'ancienMaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('gestion.commune.infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CommuneInfoRequest $request)
    {
        $inputs = $request->all();
        //Photo du maire
        if ($request->hasFile('photo_maire')) {
            $inputs['photo_maire'] = $this->uploadUtil->traiterFile($request->file('photo_maire'), TypeUpload::PhotoMaire);
        }
        $this->communeInfoRepository->store($inputs);
        return \redirect()->route('infos.index')->withMessage("Les informations de la commune ont été ajoutée avec succés.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $communeInfo = $this->communeInfoRepository->getById($id);
        $historique = $communeInfo->historique;
        $ancienMaires = $communeInfo->ancienMaires;
        return view('gestion.commune.infos.show', compact('communeInfo', 'historique', 'ancienMaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $communeInfo = $this->communeInfoRepository->getById($id);
        return view('gestion.commune.infos.edit', compact('communeInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(CommuneInfoRequest $request, $id)
    {
        $communeInfo = $this->communeInfoRepository->getById($id);
        $inputs = $request->all();
        //Photo du maire
        if ($request->hasFile('photo_maire')) {
            $inputs['photo_maire'] = $this->uploadUtil->traiterFile($request->file('photo_maire'), TypeUpload::PhotoMaire);
            $oldFilename = $communeInfo->photo_maire;
        }
        $this->communeInfoRepository->update($id, $inputs);
        //Suppression ancienne photo
        if (!empty($oldFilename))
            $this->uploadUtil->deleteFile($oldFilename, TypeUpload::PhotoMaire);

        return \redirect()->route('infos.index')->withMessage("Les informations de la commune ont été mises à jour avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function updateHistorique(Request $request, $id){
        $communeInfo = $this->communeInfoRepository->getById($id);
        $request->validate($this->historiqueRules());
        $this->communeInfoRepository->setHistorique($communeInfo, $request->get('historique'));

        $request->session()->flash('historique', true);
        return \redirect()->route('infos.index')->withMessage("L'historique de la commune a été ajouté avec succés.");
    }

    private function historiqueRules(){
        return [
            'historique' => 'required|max:16777215'
        ];
    }

}
