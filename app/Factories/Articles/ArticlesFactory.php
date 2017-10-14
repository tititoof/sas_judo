<?php

namespace App\Factories\Articles;

use App\Models\Category;
use App\Helpers\Answer;

/**
 *
 */
class ArticlesFactory extends AbstractFactory
{

    /**
     * @param Category $menu
     * @param Array $options
     */
    public function build(Category $menu, Array $options)
    {
        $nbPerPage       = 10;
        $collect         = $menu->articles;
        $collect         = $collect->reverse();
        $page            = $options['page'] ?? 1;
        $articlesPerPage = $collect->forPage($page, 10);
        $nbArticles      = $collect->count();
        return Answer::success(200, [ 
            'articles'      => $articlesPerPage->all(), 
            'nbArticles'    => $nbArticles, 
            'nbPerPage'     => $nbPerPage, 
            'name'          => $menu->name 
        ]);
    }

}
