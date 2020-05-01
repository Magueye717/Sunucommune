<?php


namespace App\Http\Controllers\Rh;

use App\Enums\TypeContrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rh\Contrat;
use App\Repositories\Rh\ContratRepository;

class ContratController extends Controller
{


  protected $contratRepository;

    public function __construct(ContratRepository $contratRepository)
    {
        $this->contratRepository = $contratRepository;
        $this->middleware('auth');
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $contrats=$this->contratRepository->getData();
    return view('rh.contrat.index',  compact('contrats'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $typeContrat= TypeContrat::toSelectArray();
    return view('rh.contrat.create', compact('typeContrat'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $inputs = $request->all();
      $contrat = $this->contratRepository->store($inputs);

      return redirect('/ressources_humaines/contrats')->withMessage("Le contrat " . $contrat->nom . " a été créé avec succés.");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Contrat $contrat)
  {
    $typeContrat= TypeContrat::toSelectArray();

    return view('rh.contrat.edit', compact('contrat', 'typeContrat'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $contrat=$this->contratRepository->getById($id);
      $inputs = $request->all();


          $this->contratRepository->update($id, $inputs);

          return \redirect()->route('contrats.index')->withMessage("Le contrat  " . $request->input('nom') . " a été modifié.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    if ($this->contratRepository->destroy($id))
      return redirect()->back()->withMessage("La suppression est effective");
    else
    return redirect()->back()->withErrors("Ce cadre ne peut être supprimée...");
  }
  

}

?>
