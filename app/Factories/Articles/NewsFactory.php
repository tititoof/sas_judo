<?php

namespace App\Factories\Articles;

use App\Models\Category;

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
        $collect         = $menu->articles;
        $page            = $options['page'] ?? 1;
        $collect         = $collect->reverse();
        $articlesPerPage = $collect->forPage($page, 5);
        $nbArticles      = $collect->count();
        return Answer::success(200, [ 'articles' => $articlesPerPage->all(), 'nbArticles' => $nbArticles ];
    }
}
