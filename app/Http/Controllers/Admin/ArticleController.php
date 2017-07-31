<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Album;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ListTrait;

class ArticleController extends Controller
{
    use ListTrait;
    
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json(['articles' => $articles]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $categories = Category::all();
        $albums     = Album::all();
        return response()->json([
            'categories' => $categories->map([$this, 'mapList']), 
            'albums'     => $albums->map([$this, 'mapList'])
        ]);
    }

    /**
     * @param ArticleFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleFormRequest $request)
    {
        $articleRepo = new ArticlesRepository;
        return response()->json($articleRepo->save($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $albums     = Album::all();
        return response()->json([
            'success'    => true, 
            'object'     => $article, 
            'menus'      => $categories->map([$this, 'mapList']),
            'categories' => $article->categories, 
            'allAlbums'  => $albums->map([$this, 'mapList']), 
            'albums'     => $article->albums
        ]);
    }

    /**
     * @param ArticleFormRequest $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        $articleRepo = new ArticlesRepository;
        return response()->json($articleRepo->update($request, $article));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Article $article)
    {
        $articleRepo = new ArticlesRepository;
        return response()->json($articleRepo->delete($article));
    }
}
