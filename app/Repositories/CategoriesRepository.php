<?php
namespace App\Repositories;

/**
 * Created by PhpStorm.
 * User: tititoof
 * Date: 30/12/16
 * Time: 18:35
 */
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesRepository
{
    public function save(Request $request)
    {
        $category = new Category;
        return $this->update($request, $category);
    }

    public function update(Request $request, Category $category)
    {
        try {
            $category->name = $request->input('name');
            $category->save();
            return ['success' => true, 'errors' => '',];
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage(),];
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return ['success' => true, 'errors' => '',];
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage(),];
        }
    }
}