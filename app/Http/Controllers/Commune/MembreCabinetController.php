<?php

namespace App\Http\Controllers\Commune;

use App\Enums\ReseauxSociaux;
use App\Enums\TypeHierarchie;
use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembreCabinetRequest;
use App\Models\Commune\EquipeMunicipale;
use App\Repositories\Commune\EquipeMunicipaleRepository;
use App\Repositories\Commune\MembreCabinetRepository;
use App\Repositories\Commune\SocialLinkRepository;
use App\Utils\UploadUtil;
use Illuminate\Http\Request;

class MembreCabinetController extends Controller
{
    protected $membreCabinetRepository;
    protected $equipeMunicipaleRepository;
    protected $uploadUtil;
    protected $socialLinkRepository;

    public function __construct(MembreCabinetRepository $membreCabinetRepository,
                                UploadUtil $uploadUtil,
                                EquipeMunicipaleRepository $equipeMunicipaleRepository,
                                SocialLinkRepository $socialLinkRepository)
    {
        $this->membreCabinetRepository = $membreCabinetRepository;
        $this->equipeMunicipaleRepository = $equipeMunicipaleRepository;
        $this->socialLinkRepository = $socialLinkRepository;
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
        $reseaux= ReseauxSociaux::toSelectArray();
        return view('gestion.commune.membre_cabinets.index', compact('membres','reseaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $type = TypeHierarchie::toSelectArray();
        $equipe= $this->equipeMunicipaleRepository->getListeEquipeMunicipale();
        return view('gestion.commune.membre_cabinets.create', compact('type', 'equipe'));
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
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoMembre);
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
        return view('gestion.commune.membre_cabinets.show', compact('membre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $type = TypeHierarchie::toSelectArray();
        $membre = $this->membreCabinetRepository->getById($id);
        $equipe= $this->equipeMunicipaleRepository->getListeEquipeMunicipale()->prepend("Choisissez l'équipe de l'agent");
        return view('gestion.commune.membre_cabinets.edit', compact('membre','type', 'equipe'));
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
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoMembre);
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

    public function storeReseau(Request $request)
    {
        try{
            $inputs = $request->all();
            $inputs['cle']= $inputs['libelle']."_" .$inputs['membre_cabinet_id'];
            $reseau = $this->socialLinkRepository->store($inputs);

            return redirect('/membre-cabinets')->withMessage("Réseau social " . $reseau->libelle . " a été créé avec succés.");
          
          } catch (\Illuminate\Database\QueryException $e) {
          
            return redirect('/membre-cabinets')->withAlert("Ce membre a déja ce réseau social .");
          }
        
    }

}
