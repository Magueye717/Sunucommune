<?php

namespace App\Http\Controllers\GestionProcedure;

use App\Http\Requests\ProcedureRequest;
use App\Repositories\Procedure\ProcedureRepository;
use App\Repositories\Procedure\CategorieRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    protected $procedureRepository;
    protected $categorieRepository;


    public function __construct(ProcedureRepository $procedureRepository,
                                CategorieRepository $categorieRepository)
    {
        $this->procedureRepository = $procedureRepository;
        $this->categorieRepository = $categorieRepository;
        $this->middleware('auth');
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $procedures = $this->procedureRepository->getData();
        return view('gestion.procedure.procedure.index', compact('procedures'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
        $categories = $this->categorieRepository->getListe();
        return view('gestion.procedure.procedure.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ProcedureRequest $request)
  {
    $inputs = $request->all();
    $this->procedureRepository->store($inputs);
    return \redirect()->route('procedures.index')->withMessage("La procedure a été créé avec succé.");
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
  public function edit($id)
    {
        $procedures = $this->procedureRepository->getById($id);
        $categories = $this->categorieRepository->getListe();
        return view('gestion.procedure.procedure.edit', compact('procedures','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ProcedureRequest $request,$id)
    {
        $procedures = $this->procedureRepository->getById($id);
        $inputs = $request->all();
        $this->procedureRepository->update($id, $inputs);
          return \redirect()->route('procedures.index')->withMessage("Les informations de la procedure ont été mises à jour avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->procedureRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Cette procedure ne peut être supprimé...");
    }

  public function valider($id)
    {
        $procedure = $this->procedureRepository->getById($id);
        $this->procedureRepository->valider($procedure, !$procedure->estActive());
        return redirect()->back()->withMessage($procedure->statut?"La procedure a été activé.":"La procedure a été désactivé.");
    }

}

?>
