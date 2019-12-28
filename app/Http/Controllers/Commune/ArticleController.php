<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Commune\Article;
use App\Models\Commune\TypeArticle;
use App\Repositories\Commune\ArticleRepository;
use App\Repositories\Commune\TypeArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  protected $articleRepository;
  protected $typeArticleRepository;

  public function __construct(
        ArticleRepository $articleRepository,
        TypeArticleRepository $typeArticleRepository)
  {
      $this->articleRepository = $articleRepository;
      $this->typeArticleRepository = $typeArticleRepository;
      $this->middleware('auth');
  }


  public function index()
  {
    $articles = $this->articleRepository->getListeArticle()->get();
        return view('gestion.articles.index', compact('articles'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $TypeArticles = $this->typeArticleRepository->getListeTypArticle();
    return view('gestion.articles.create', compact('TypeArticles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ArticleRequest $request)
  {
    $inputs = $request->all();
    $photoName =$request->file('photo')->getClientOriginalName();
    $fichierName =$request->file('piece_jointe')->getClientOriginalName();
          $path = Storage::putFileAs(
              'documentUpload',
              $request->file('photo'),
              $photoName,
              $request->file('piece_jointe'),
              $fichierName
          );
          $inputs['add_by'] = Auth::user()->id ;
          $article=$this->articleRepository->store($inputs);
          return redirect('/articles')->withMessage("L'article " . $article->titre . " a été créé avec succés.");
        }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $article = $this->articleRepository->getById($id);
    return view('gestion.articles.show', compact('article'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $article = $this->articleRepository->getById($id);
    $TypeArticles = $this->typeArticleRepository->getListeTypArticle();
    return view('gestion.articles.edit', compact('TypeArticles', 'article'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ArticleRequest $request, $id)
  {
    $inputs = $request->all();
    $photo =$request->file('photo')->getClientOriginalName();
    $document =$request->file('piece_jointe')->getClientOriginalName();
          $path = Storage::putFileAs(
              'documentUpload',
              $request->file('photo'),
              $request->file('piece_jointe'),
              $photo,
              $document
          );
          $inputs['add_by'] = Auth::user()->id ;
          $this->articleRepository->update($id, $inputs);
          return redirect('/articles')->withMessage("L'article " . $inputs['titre']. " a été modifié avec succés.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $this->articleRepository->destroy($id);

		return redirect()->back();
  }

}

?>
