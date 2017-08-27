<?php

namespace App\Factories\Articles;

use App\Models\Category;

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
        $collect = $menu->articles;
        $page    = $options['page'] ?? 1;
        $articlesPerPage = $collect->forPage($page, 10);
        return $articlesPerPage->all();
    }

}
