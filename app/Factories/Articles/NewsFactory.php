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
        $collect = $menu->articles;
        $page    = $options['page'] ?? 1;
        $articlesPerPage = $collect->forPage($page, 3);
        return $articlesPerPage->all();
    }
}
