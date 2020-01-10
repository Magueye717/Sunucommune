<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use App\Http\Requests\SondageRequest;
use App\Models\Participation\SondageOption;
use App\Repositories\Participation\SondageOptionRepository;
use App\Repositories\Participation\SondageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SondageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    protected $sondageRepository;
    protected $optionRepository;


    public function __construct(SondageRepository $sondageRepository,SondageOptionRepository $optionRepository)
    {
        $this->sondageRepository = $sondageRepository;
        $this->optionRepository = $optionRepository;

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

        return view('gestion.participation.sondages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {




        $inputs = $request->all();



        $inputs['add_by']= Auth::user()->id;

        $sondage = $this->sondageRepository->store($inputs);
       $option = $this->optionRepository->saveMany($request->libelle,$sondage->id);


           $optionSondage['libelle']=$request->libelle;
           $optionSondage['sondage_id']=$sondage->id;

//        $this->optionRepository->store($optionSondage);
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
        return view('gestion.participation.sondages.edit', compact('sondage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(SondageRequest $request,$id)
    {

        $inputs = $request->all();


        $this->sondageRepository->update($id, $inputs);
        $this->optionRepository->updateMany($inputs['libelle'],$inputs['options_id'],$id);
        return \redirect()->route('sondages.index')->withMessage("Le rôle " . $request->input('titre') . " a été modifié.");

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

}

?>
