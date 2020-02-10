<?php

namespace App\Http\Controllers\Commune;

use App\Enums\TypeUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Repositories\Commune\ArticleRepository;
use App\Repositories\Commune\TypeArticleRepository;
use App\Utils\UploadUtil;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $typeArticleRepository;
    protected $uploadUtil;

    public function __construct(ArticleRepository $articleRepository,
                                TypeArticleRepository $typeArticleRepository,
                                UploadUtil $uploadUtil)
    {
        $this->articleRepository = $articleRepository;
        $this->typeArticleRepository = $typeArticleRepository;
        $this->uploadUtil = $uploadUtil;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = $this->articleRepository->getData();
        return view('gestion.commune.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $types = $this->typeArticleRepository->getListe();
        return view('gestion.commune.articles.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $inputs = $request->all();
        $inputs['add_by'] = Auth::user()->id;
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::ArticlePhoto);
        }
        //PJ
        if ($request->hasFile('piece_jointe')) {
            $inputs['piece_jointe'] = $this->uploadUtil->traiterFile($request->file('piece_jointe'), TypeUpload::ArticleFile);
        }
        $article = $this->articleRepository->store($inputs);

        if (!$article)
            return \redirect()->back()->withErrors("L'ajout de l'article a échoué. Veuillez réessayer ou contacter l'administrateur.");

        return \redirect()->route('articles.index')->withMessage("L'article a été ajouté avec succés.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->getById($id);
        return view('gestion.commune.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->getById($id);
        $types = $this->typeArticleRepository->getListe();
        return view('gestion.commune.articles.edit', compact('article', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = $this->articleRepository->getById($id);
        $inputs = $request->all();
        //Illustration
        if ($request->hasFile('photo')) {
            $inputs['photo'] = $this->uploadUtil->traiterFile($request->file('photo'), TypeUpload::ArticlePhoto);
            $oldPhotoFilename = $article->photo;
        }
        //PJ
        if ($request->hasFile('piece_jointe')) {
            $inputs['piece_jointe'] = $this->uploadUtil->traiterFile($request->file('piece_jointe'), TypeUpload::ArticleFile);
            $oldPJFilename = $article->piece_jointe;
        }
        $this->articleRepository->update($id, $inputs);

        //Suppression ancienne photo
        if (!empty($oldPhotoFilename))
            $this->uploadUtil->deleteFile($oldPhotoFilename, TypeUpload::ArticlePhoto);
        //Suppression ancienne PJ
        if (!empty($oldPJFilename))
            $this->uploadUtil->deleteFile($oldPJFilename, TypeUpload::ArticleFile);

        return \redirect()->route('articles.index')->withMessage("L'article a été ajouté avec succés.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->articleRepository->destroy($id))
            return redirect()->back()->withMessage("La suppression est effective");
        else
            return redirect()->back()->withErrors("Cet artcile ne peut être supprimé...");
    }

    public function publication($id){
        $article = $this->articleRepository->getById($id);
        $this->articleRepository->publication($article, !$article->estPublie());
        return redirect()->back()->withMessage("La suppression est effective");
    }

}
