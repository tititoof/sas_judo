<?php

namespace App\Factories\Articles;

use App\Models\Category;
use App\Helpers\Answer;

/**
 *
 */
class NewsFactory extends AbstractFactory
{
    /**
     * @param Category $menu
     * @param Array $options
     */
    public function build(Category $menu, Array $options)
    {
        $nbPerPage       = 5;
        $collect         = $menu->articles;
        $page            = $options['page'] ?? 1;
        $collect         = $collect->reverse();
        $articlesPerPage = $collect->forPage($page, $nbPerPage);
        $nbArticles      = $collect->count();
        return Answer::success(200, [ 
            'articles'      => $articlesPerPage->all(), 
            'nbArticles'    => $nbArticles, 
            'nbPerPage'     => $nbPerPage, 
            'name'          => $menu->name 
        ]);
    }
}
