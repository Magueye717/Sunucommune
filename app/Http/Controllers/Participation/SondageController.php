<?php

namespace App\Http\Controllers\Participation;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\SondageRequest;
use App\Models\Participation\SondageOption;
use App\Repositories\Participation\SondageOptionRepository;
use App\Repositories\Participation\SondageRepository;
use App\Repositories\Participation\ThematiqueRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utils\UploadUtil;


class SondageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    protected $sondageRepository;
    protected $optionRepository;
    protected $thematiqueRepository;
    protected $uploadUtil;



    public function __construct(SondageRepository $sondageRepository, SondageOptionRepository $optionRepository, ThematiqueRepository $thematiqueRepository,UploadUtil $uploadUtil)
    {
        $this->sondageRepository = $sondageRepository;
        $this->optionRepository = $optionRepository;
        $this->thematiqueRepository = $thematiqueRepository;
        $this->uploadUtil = $uploadUtil;

        $this->middleware('auth');
    }

    public function index()
    {
        $sondages = $this->sondageRepository->getData();
        $libelle = $this->sondageRepository->getData();
//        dd($sondages);
//        $sondages=$this->sondageRepository->getListe();
        return view('gestion.participation.sondages.index', compact('sondages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//$thematiques=$this->thematiqueRepository->getData();
        $thematiques = $this->thematiqueRepository->getListeThematiques()->prepend('Choisir la thématique...', '');
//dd($thematiques);
//dd($thematique);
        return view('gestion.participation.sondages.create', compact('thematiques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {


        $inputs = $request->all();

        $inputs['add_by'] = Auth::user()->id;

        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::PhotoSondage);
        }
//dd($inputs);



        $sondage = $this->sondageRepository->store($inputs);



        if ($request->libelle)
            $option = $this->optionRepository->saveMany($request->libelle, $sondage->id);
        $optionSondage['libelle'] = $request->libelle;
        $optionSondage['sondage_id'] = $sondage->id;



        return \redirect()->route('sondages.index')->withMessage("Le Sondage " . $sondage->titre . " a été créé.");
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
        $sondage = $this->sondageRepository->getById($id);
        $thematiques = $this->thematiqueRepository->getListeThematiques()->prepend('Choisir la thématique...', '');

        return view('gestion.participation.sondages.edit', compact('sondage', 'thematiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(SondageRequest $request, $id)
    {

        $inputs = $request->all();


        $this->sondageRepository->update($id, $inputs);
        $this->optionRepository->updateMany($inputs['libelle'], $inputs['options_id'], $id);
        return \redirect()->route('sondages.index')->withMessage("Le Sondage " . $request->input('titre') . " a été modifié.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        if ($this->sondageRepository->destroy($id))

            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce Sondage ne peut être supprimé...");

    }

    public function publication($id)
    {
        $sondage = $this->sondageRepository->getById($id);
        $this->sondageRepository->publication($sondage, !$sondage->estPublie());


        if ($sondage->statut)
            return redirect()->back()->withAlert("Votre sondage est dépublié ");
        else
            return redirect()->back()->withMessage("Votre sondage est publié");
    }

}

?>
