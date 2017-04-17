<?php

namespace App\Repositories;

use App\Models\Result;
use Illuminate\Http\Request;

/**
 * Result Data Manage
 */
class ResultsRepository
{
  /**
   * @param Request $request
   * @return array
   */
  public function save(Request $request)
  {
    return $this->update($request, new Result);
  }

 /**
  * @param Request $request
  * @param Result $result
  * @return array
  */
  public function update(Request $request, Result $result)
  {
    try {
      $result->season_id    = $request->input('season_id');
      $result->locality     = $request->input('locality');
      $result->name         = $request->input('name');
      $result->informations = json_encode($request->input('informations'));
      $result->contest_at   = new \DateTime($request->input('contest_at'));
      $result->save();
    } catch(\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage(), 'entity' => var_export($result)];
    }
    return ['success' => true, 'errors' => '', 'entity' => $result];
  }

  /**
   * @param Result $result
   * @return array
   */
  public function delete(Result $result)
  {
    try {
      $result->delete();
    } catch(\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage(), 'entity' => var_export($result)];
    }
    return ['success' => true, 'errors' => ''];
  }

}
