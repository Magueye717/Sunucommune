<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use App\Http\Requests\SondageRequest;
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


    public function __construct(SondageRepository $sondageRepository)
    {
        $this->sondageRepository = $sondageRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $sondages = $this->sondageRepository->getData();
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
//       dd( $inputs = $request->sondage_options);

collect(array_filter($inputs = $request->sondage_options))->each(function ($option){
var_dump($option);
});

die;
        $inputs = $request->all();

     //   $user = Auth::user();
        $inputs['add_by']= Auth::user()->id;

        $sondage = $this->sondageRepository->store($inputs);
        return \redirect()->route('sondages.index')->withMessage("Le Partenaire " . $sondage->titre . " a été créé.");
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
        $sondage = $this->sondageRepository->getById($id);
        $inputs = $request->all();
        $this->sondageRepository->update($id, $inputs);
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
