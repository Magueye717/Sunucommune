<?php

namespace App\Http\Controllers\Rh;

use App\Models\Rh\Agent;
use App\Repositories\Rh\AgentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


    protected $agentRepository;

    public function __construct(AgentRepository $agentRepository)
    {
        $this->agentRepository = $agentRepository;
        $this->middleware('auth');
    }

    public function index()
  {
      $agents=$this->agentRepository->getData();
//      dd($agents    );
      return view('rh.agent.index', compact('agents'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('rh.agent.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $inputs = $request->all();
      $agent = $this->agentRepository->store($inputs);

      return redirect('/ressources_humaines/agents')->withMessage("L'agent' " . $agent->prenom . " ". $agent->nom . " a été créé avec succés.");
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

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
