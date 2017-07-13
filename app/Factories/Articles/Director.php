<?php

namespace App\Factories\Articles;

use App\Models\Category;
use App\Factories\Articles\ArticlesFactory;
use App\Factories\Articles\NewsFactory;

/**
 *
 */
class Director
{

    /**
     * @var Array $listFactories
     */
    private static $listFactories = [
        [ 'label' => 'News',     'name' => 'NewsFactory'],
        [ 'label' => 'Articles', 'name'  => 'ArticlesFactory'],
    ];

    /**
     * @param Menu $menu
     */
    public static function build(Category $menu)
    {
        $strType = 'App\\Factories\\Articles\\'.$menu->type;
        $style = new \ReflectionClass($strType);
        if ($style->hasMethod('build')) {
            $object = $style->newInstance();
            $method = $style->getMethod('build');
            return $method->invoke($object, $menu, []);
        }
        throw new \ErrorException("Ne peut pas charger le style de présentation");
    }

    /**
     * @return Array
     */
    public static function getListFactories()
    {
        return self::$listFactories;
    }

}
