<?php

namespace App\Http\Controllers\Commune;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeArticleRequest;
use App\Repositories\Commune\TypeArticleRepository;

class TypeArticleController extends Controller
{
    protected $typeArticleRepository;

    public function __construct(TypeArticleRepository $typeArticleRepository)
    {
        $this->typeArticleRepository = $typeArticleRepository;
        $this->middleware('auth');
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
        return view('gestion.type_article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TypeArticleRequest $request)
    {
        $inputs = $request->all();
        $typeArticle = $this->typeArticleRepository->store($inputs);
        return redirect('/articles')->withMessage("L'article " . $typeArticle->libelle . " a été créé avec succés.");
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}
