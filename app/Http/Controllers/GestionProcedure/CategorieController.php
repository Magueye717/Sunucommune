<?php 

namespace App\Http\Controllers\GestionProcedure;

use App\Http\Requests\CategorieRequest;
use App\Repositories\Procedure\CategorieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller 
{
  protected $categorieRepository;


    public function __construct(CategorieRepository $categorieRepository)
    {
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
        $categories = $this->categorieRepository->getData();
        return view('gestion.procedure.categorie.index',compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('gestion.procedure.categorie.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $inputs = $request->all();
    
    // $inputs['slug']= 'wfs';
    $this->categorieRepository->store($inputs);
    // dd($inputs);
    return \redirect()->route('categories.index')->withMessage("La categorie a été créé avec succé.");
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
    $categories = $this->categorieRepository->getById($id);
    return view('gestion.procedure.categorie.edit', compact('categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(CategorieRequest $request, $id)
  {
    $categories = $this->categorieRepository->getById($id);
    $inputs = $request->all();

    $this->categorieRepository->update($id, $inputs);

    return \redirect()->route('categories.index')->withMessage("Les informations du categorie ont été mises à jour avec succés.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    if ($this->categorieRepository->destroy($id))
    return redirect()->back()->withMessage("La suppression est effective");
else
    return redirect()->back()->withErrors("Cette categorie ne peut être supprimé...");
  }
  
}

?>