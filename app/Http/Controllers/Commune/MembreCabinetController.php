<?php 

namespace App\Http\Controllers\Commune;

use App\Http\Requests\MembreCabinet;
use App\Http\Controllers\Controller;
use App\Repositories\Commune\MembreCabinetRepository;
use Illuminate\Http\Request;

class MembreCabinetController extends Controller 
{
  protected $membreCabinetRepository;
  public function __construct(MembreCabinetRepository $membreCabinetRepository)
    {
        $this->membreCabinetRepository = $membreCabinetRepository;
        //$this->middleware('auth');
        //$this->middleware('admin');
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $membre = $this->membreCabinetRepository->getData();
        return view('gestion.membre_cabinets.index', compact('membre'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
        $membre = $this->membreCabinetRepository->getListe();
        return view('gestion.membre_cabinets.create', compact('membre'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(MembreCabinet $request)
  {
        $inputs = $request->all();
        $this->membreCabinetRepository->store($inputs);
        return \redirect()->route('membre-cabinets.index')->withMessage("L'utilisateur a été créé.");
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
        $membre = $this->membreCabinetRepository->getById($id);
        return view('gestion.membre_cabinets.edit', compact('membre'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(MembreCabinet $request, $id)
  {
    
        $this->membreCabinetRepository->update($id, $request->all());

        return \redirect()->route('membre-cabinets.index')->withMessage("L'utilisateur " . $request->input('prenom') . " " . $request->input('nom') . " a été modifié.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    if ($this->membreCabinetRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Cet utilisateur ne peut être supprimé...");
  }
  
}

?>