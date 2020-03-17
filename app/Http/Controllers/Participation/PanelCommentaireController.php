<?php

namespace App\Http\Controllers\Participation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PanelCommentaireRequest;
use App\Models\Participation\PanelCommentaire;
use App\Repositories\Participation\PanelCommentaireRepository;
use App\Repositories\Participation\PanelRepository;

class PanelCommentaireController extends Controller
{
    protected $panelCommentaireRepository;
    protected $panelRepository;

    public function __construct(PanelCommentaireRepository $panelCommentaireRepository,
                                PanelRepository $panelRepository)
    {
        $this->panelCommentaireRepository = $panelCommentaireRepository;
        $this->panelRepository = $panelRepository;
        /* $this->middleware('auth'); */
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $panels = $this->panelRepository->getListe();
        // $panels = $this->panelRepository->getListe();
        return view('gestion.participation.panel.panel_commentaires.create',compact('panels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
            
       
        $inputs = $request->all();
        //var_dump($inputs);die;
        $retour= array();
        if (empty($inputs["nom"] )) {
            
            return $this->fetchComment($inputs["panel_id"]);
        }
        else
        {
          $this->panelCommentaireRepository->store($inputs);
    
            return $this->fetchComment($inputs["panel_id"]);
        }
        
        
    }

    
    public function fetchComment($panel)
    {
       $comments=PanelCommentaire::where('panel_id', $panel)->get();
       $childComments=PanelCommentaire::where('parent_id', $panel)->get();
       
      // var_dump($detailpanel);die;
       $retour="";
        foreach ($comments as $comment) {
            if ($comment->parent_id===null) {
                $retour.='
                    <div class="blog-comments-item mt-40">
                    <h6 class="title">'.$comment->nom.' <span>'.\Carbon\Carbon::parse(''.$comment->created_at.'')->diffForhumans().'</span></h6>
                    <p>'.$comment->commentaire.'</p>
                    <div class="d-flex justify-content-between">
                    <span>Les réponses</span>
                    <img src="../themev1/images/default.png" alt="Photo utilisateur" width=" 100px">
                    <div class="btn btn-outline-primary btn-small repondreCommentaire" onclick="$(\'#parent_id\').val('.$comment->id.'); scrollToForm();">Répondre</div>
                    </div> </div>
                    ';
                 }
           
            $childComments=PanelCommentaire::where('parent_id', $comment->id)->get();
            foreach ($childComments as $childComment) {
                $retour.='
                <div class="blog-comments-item mt-40 ml-60 item-2">
                <h6 class="title">'.$childComment->nom.' <span>'.\Carbon\Carbon::parse(''.$childComment->created_at.'')->diffForhumans().'</span></h6>
                <p>'.$childComment->commentaire.'</p>
                    <span>Réponses</span>
                    <img src="../themev1/images/default.png" alt="Photo utilisateur" alt="" width=" 70px">
                </div>';

            }

       };
       
       if ($retour==="") {
        $retour.='
            <div class="bg-light p-5 text-center mt-3">Aucun commentaire disponible </div>
        ';
     }
     
         echo $retour ;
       

    }




    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $panels = $this->panelRepository->getListe();
        $commentaires = $this->panelCommentaireRepository->getById($id);
        return view('gestion.participation.panel.panel_commentaires.edit', compact('commentaires','panels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PanelCommentaireRequest $request,$id)
    {
        $inputs = $request->all();
        // dd($inputs);

        $this->panelCommentaireRepository->update($id, $inputs);

        return \redirect()->route('panels.index')->withMessage("Les informations du panel ont été mises à jour avec succés.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->panelCommentaireRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Ce commentaire ne peut être supprimé...");
    }
    public function valider($id)
    {
        $commentaire = $this->panelCommentaireRepository->getById($id);
        $this->panelRepository->valider($commentaire, !$commentaire->estActive());
        return redirect()->back()->withMessage("Le changement de status a été bien prise en compte");
    }

}

?>
