<?php

namespace App\Http\Controllers\Rh;

use App\Enums\TypeUpload;
use App\Http\Requests\AgentRequest;
use App\Models\Rh\Agent;
use App\Repositories\Rh\AgentRepository;
use App\Utils\UploadUtil;
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
    protected $uploadUtil;

    public function __construct(AgentRepository $agentRepository, UploadUtil $uploadUtil)
    {
        $this->agentRepository = $agentRepository;
        $this->uploadUtil=$uploadUtil;
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
  public function store(AgentRequest $request)
  {
      $inputs = $request->all();

//      dd($inputs);
      if ($request->hasFile('avatar')) {
          $inputs['avatar'] = $this->uploadUtil->traiterFile($request->file('avatar'), TypeUpload::PhotoAgent);
      }

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
      $agent=$this->agentRepository->getById($id);
      return view('rh.agent.edit',compact('agent'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(AgentRequest $request,$id)
  {
      $agent=$this->agentRepository->getById($id);
      $inputs = $request->all();



      if ($request->hasFile('avatar')) {
          $inputs['avatar'] = $this->uploadUtil->traiterFile($request->file('avatar'), TypeUpload::PhotoAgent);
          $oldFilename = $agent->logo;
      }

          $this->agentRepository->update($id, $inputs);

          if (!empty($oldFilename))
              $this->uploadUtil->deleteFile($oldFilename, TypeUpload::PhotoAgent);

          return \redirect()->route('agents.index')->withMessage("L'Agent  " . $request->input('prenom') ." ".$request->input('nom') . " a été modifié.");


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
       $agent = $this->agentRepository->getById($id);

        if ($this->agentRepository->destroy($id)) {

            $this->uploadUtil->deleteFile($agent->avatar, TypeUpload::PhotoAgent);
            return redirect()->back()->withMessage("La suppression est effective");
        } else
            return redirect()->back()->withErrors("Ce partenaire ne peut être supprimé...");
    }


}

?>
