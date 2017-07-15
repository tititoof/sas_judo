<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Album;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
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
        // $list       = [];
        // $listAlbums = [];
        $list       = array_map([$this, 'mapList'], $categories);
        $listAlbums = array_map([$this, 'mapList'], $albums);
        // foreach ($categories as $category) {
        //     $list[] = [ 'label' => $category->name, 'value' => $category->id ];
        // }
        // foreach ($albums as $album) {
        //     $listAlbums[] = [ 'label' => $album->name, 'value' => $album->id ];
        // }
        return response()->json(['categories' => $list, 'albums' => $listAlbums]);
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
        // $list       = [];
        // $listAlbums = [];
        $list       = array_map([$this, 'mapList'], $categories);
        $listAlbums = array_map([$this, 'mapList'], $albums);
        // foreach ($categories as $category) {
        //     $list[] = [ 'label' => $category->name, 'value' => $category->id ];
        // }
        // foreach ($albums as $album) {
        //     $listAlbums[] = [ 'label' => $album->name, 'value' => $album->id ];
        // }
        return response()->json(['success' => true, 'object' => $article, 'menus' => $list,
            'categories' => $article->categories, 'allAlbums' => $listAlbums, 'albums' => $article->albums]);
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
    
    /**
     * 
     * 
     */
     private function mapList($information)
     {
         return [ 'label' => $information->name, 'value' => $information->id ];
     }
}
