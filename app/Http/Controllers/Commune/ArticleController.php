<?php

namespace App\Http\Controllers;

use App\Models\Commune\Article;
use App\Models\Commune\TypeArticle;
use App\Repositories\Commune\ArticleRepository;
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

  public function __construct(ArticleRepository $articleRepository)
  {
      $this->articleRepository = $articleRepository;
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
    $TypeArticles= TypeArticle::all()->pluck('libelle', 'id')->prepend('Choisir un type article');
    return view('gestion.articles.create', compact('TypeArticles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $inputs = $request->all();
    $photo =$request->file('photo')->getClientOriginalName();
    $fichier =$request->file('piece_jointe')->getClientOriginalName();
          $path = Storage::putFileAs(
              'documentUpload',
              $request->file('photo'),
              $photo,
              $request->file('piece_jointe'),
              $fichier
          );
          $inputs['photo'] = $photo;
          $inputs['piece_jointe'] = $fichier;
          $inputs['add_by'] = Auth::user()->id ;
          $article=$this->articleRepository->store($inputs);
          return redirect('/articles/create')->withMessage("L'article " . $article->titre . " a été créé avec succés.");
        }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Article $article)
  {
    return view('gestion.articles.show', compact('article'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Article $article)
  {
    $TypeArticles= TypeArticle::all()->pluck('libelle', 'id')->prepend('Choisir un type article');
    return view('gestion.articles.edit', compact('TypeArticles', 'article'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $inputs = $request->all();
    $photo =$request->file('photo')->getClientOriginalName();
    $fichier =$request->file('piece_jointe')->getClientOriginalName();
          $path = Storage::putFileAs(
              'documentUpload',
              $request->file('photo'),
              $photo,
              $request->file('piece_jointe'),
              $fichier
          );
          $inputs['photo'] = $photo;
          $inputs['piece_jointe'] = $fichier;
          $inputs['add_by'] = Auth::user()->id ;
          $article=$this->articleRepository->update($id, $inputs);
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

  }

}

?>
