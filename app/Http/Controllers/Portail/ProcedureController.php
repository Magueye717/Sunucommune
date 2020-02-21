<?php
namespace App\Http\Controllers\Portail;

use App\Repositories\Procedure\ProcedureRepository;
use App\Repositories\Procedure\CategorieRepository;
use App\Models\GestionProcedure\Categorie;
use App\Models\GestionProcedure\Procedure;
use App\Repositories\Commune\CommuneInfoRepository;
use App\Models\Commune\CommuneInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProcedureController extends Controller
{

    protected $procedureRepository;
    protected $categorieRepository;
    protected $communeInfoRepository;

    public function __construct(ProcedureRepository $procedureRepository,
                                CommuneInfoRepository $communeInfoRepository,
                                CategorieRepository $categorieRepository)
    {
        $this->procedureRepository = $procedureRepository;
        $this->categorieRepository = $categorieRepository;
        $this->communeInfoRepository = $communeInfoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $communeInfo = $this->communeInfoRepository->getInfo();
        $etats = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Etat civil');
        })->get();

        $fonciers = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Foncier');
        })->get();

        $fiscalites = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Fiscalite');
        })->get();

        $socials = Procedure::whereHas('categorie', function ($query) {
            $query->where('nom', 'like', 'Social');
        })->get();

        
        return view('procedure.index',compact('etats','fonciers','fiscalites','socials','communeInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function events($id)
    {
        $categorie = $this->categorieRepository->getById($id);
            $nom="";
                if($categorie->nom === 'Etat Civil')
                {
                    $procedureDetails = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Etat civil');
                    })->get();
                    $nom="Etat civil";
                }

                elseif($categorie->nom ==='Foncier')
                {
                    $procedureDetails = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Foncier%');
                    })->get();
                    $nom="Foncier";
                }

                elseif($categorie->nom ==='Fiscalite')
                {
                    $procedureDetails = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Fiscalite');
                    })->get();
                    $nom="Fiscalite";
                }

                else
                {
                    $procedureDetails = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Social');
                    })->get();
                    $nom="Social";
                }
        return view('procedure.procedures-page',compact('procedureDetails','nom','categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function details($id)
    {
        $procedures = $this->procedureRepository->getData();
        // dd($procedures);
        $detailProcedure=$this->procedureRepository->getById($id);
        //  dd($detailProcedure);
            $nom="";
                if($detailProcedure->categorie_id === 1)
                {
                    $similarProcedure = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Etat civil');
                    })->get();
                    $nom="Etat civil";
                    // dd($similarProcedure);
                }

                elseif($detailProcedure->categorie_id === 2)
                {
                    $similarProcedure = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Foncier%');
                    })->get();
                    $nom="Foncier";
                }

                elseif($detailProcedure->categorie_id === 3)
                {
                    $similarProcedure = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Fiscalite');
                    })->get();
                    $nom="Fiscalite";
                }

                else
                {
                    $similarProcedure = Procedure::whereHas('categorie', function ($query) {
                        $query->where('nom', 'like', 'Social');
                    })->get();
                    $nom="Social";
                }

            $allProcedures = Procedure::groupby('categories.nom')
            ->selectRaw('COUNT(*) as nombre ,categories.nom')
            ->join('categories', 'categories.id', '=', 'procedures.categorie_id')
            ->groupBy('categories.id')
            ->get();
            
            // dd($procedures->id);

        return view('procedure.procedures-details', compact('detailProcedure','similarProcedure','nom','allProcedures','procedures'));

    }
}
