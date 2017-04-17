<?php

namespace App\Repositories;

use App\Models\AgeCategory;
use Illuminate\Http\Request;

/**
 * Age Category Data Manage
 */
class AgeCategoryRepository
{

  /**
   * Save new entity
   * @param Request $request
   * @return array
   */
  public function save(Request $request)
  {
    return $this->update($request, new AgeCategory);
  }

  /**
   * Update entity
   * @param Request $request
   * @param AgeCategory $ageCategory
   */
  public function update(Request $request, AgeCategory $ageCategory)
  {
    try {
      $ageCategory->name  = $request->input('name');
      $ageCategory->years = $request->input('years');
      $ageCategory->save();
    } catch (\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage(), 'entity' => $ageCategory];
    }
    return ['success' => true, 'errors' => '', 'entity' => $ageCategory];
  }

  /**
   * Delete entity
   * @return array
   */
  public function delete(AgeCategory $ageCategory)
  {
    try {
      $ageCategory->delete();
    } catch (\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage()];
    }
    return ['success' => true, 'errors' => ''];
  }
}
