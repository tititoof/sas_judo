<?php

namespace App\Factories\Articles;

use App\Models\Category;
use App\Models\Result;
use App\Repositories\ResultsRepository;
use App\Repositories\AgeCategoryRepository;

/**
 *
 */
class ResultatsFactory extends AbstractFactory
{

    /**
     * @param Category $menu
     * @param Array $options
     */
    public function build(Category $menu, Array $options)
    {
        $resultRepo = new ResultsRepository;
        $ageCategories = new AgeCategoryRepository;
        return [ 'ageCategories' => $ageCategories->getAll(), 'results' => $resultRepo->getAll($options['page'] ?? 1) ];
    }

}