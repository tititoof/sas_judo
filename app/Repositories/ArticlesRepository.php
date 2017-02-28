<?php
/**
 * Created by PhpStorm.
 * User: tititoof
 * Date: 02/01/17
 * Time: 12:06
 */

namespace App\Repositories;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;

class ArticlesRepository
{
    /**
     * @param ArticleFormRequest $request
     * @return array
     */
    public function save(ArticleFormRequest $request)
    {
        $article = new Article;
        return $this->update($request, $article);
    }

    /**
     * @param ArticleFormRequest $request
     * @param Article $article
     * @return array
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        try {
            $article->name          = $request->input('name');
            $article->content       = $request->input('content');
            $article->user_id       = $request->input('user_id');
            $article->save();
            $article->categories()->sync($request->input('categories'));
            $article->albums()->sync($request->input('albums'));
            return ['success' => true, 'errors' => '', 'article_id' => $article->id];
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage(),];
        }
    }

    /**
     * @param Article $article
     * @return array
     */
    public function delete(Article $article)
    {
        try {
            $article->categories()->detach();
            $article->albums()->detach();
            $article->delete();
            return ['success' => true, 'errors' => '',];
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage(),];
        }

    }
}