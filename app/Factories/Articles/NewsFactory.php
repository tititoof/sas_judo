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
        return Answer::success(200, $this->getArticles($menu, $options));
    }
    
    /**
     * @param Category $menu
     * @param Array $options
     */
    private function getArticles(Category $menu, $options)
    {
        $nbPerPage       = 5;
        $collect         = $menu->articles;
        $collect         = $collect->reverse();
        $page            = $options['page'] ?? 1;
        $articlesPerPage = $collect->forPage($page, 10);
        $nbArticles      = $collect->count();
        $articlesPerPage = $articlesPerPage->map(function($item, $key) {
            return [
                'name'      => $item->name,
                'content'   => $item->content,
                'albums'    => $item->albums,
                'images'    => $this->getPictures($item->albums),
            ];
        });
        return [ 
            'articles'      => $articlesPerPage->all(), 
            'nbArticles'    => $nbArticles, 
            'nbPerPage'     => $nbPerPage, 
            'name'          => $menu->name 
        ];
    }
    
    private function getPictures($albums)
    {
        $pictures = [];
        foreach ($albums as $album) {
            if ( is_array($album->pictures) && (count($album->pictures) > 0) ) {
                $pictures = array_merge($pictures, $album->pictures);
            }
        }
        return $pictures;
    }
}
