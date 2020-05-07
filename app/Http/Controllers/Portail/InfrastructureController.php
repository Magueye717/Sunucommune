<?php

namespace App\Http\Controllers\Portail;

use App\Http\Controllers\Controller;
use App\Models\GestionInfrastructure\Secteur;
use Illuminate\Http\Request;
use App\Repositories\Infrastructures\RessourceRepository;

class InfrastructureController extends Controller
{
    protected $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
        $this->ressourceRepository = $ressourceRepository;
     //   $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ressources= $this->ressourceRepository->getdata();
        // dd($ressources);
        $secteurs = Secteur::with(['resssources' => function ($query) {
            $query->where('nom','LIKE', 'Batiment')
                  ->orWhere('nom','LIKE', 'Sante')
                  ->orWhere('nom','LIKE', 'Education')
                  ->orWhere('nom','LIKE', 'Culture')
                  ->orWhere('nom','LIKE', 'Commerce')
                  ->orWhere('nom','LIKE', 'Sport')
                  ->orWhere('nom','LIKE', 'Autre');
                  }])->get();
                //   dd($secteurs);
        return view('infrastructure.index', compact('secteurs','ressources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
