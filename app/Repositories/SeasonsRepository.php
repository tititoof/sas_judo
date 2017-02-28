<?php
/**
 * Created by PhpStorm.
 * User: tititoof
 * Date: 20/02/17
 * Time: 09:01
 */

namespace App\Repositories;


use App\Models\Season;
use Illuminate\Http\Request;

class SeasonsRepository
{
    /**
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        return $this->update($request, new Season());
    }

    /**
     * @param Request $request
     * @param Season $season
     * @return array
     */
    public function update(Request $request, Season $season)
    {
        try {
            $season->name       = $request->input('name');
            $season->start_at   = new \DateTime($request->input('start_at'));
            $season->end_at     = new \DateTime($request->input('end_at'));
            $season->save();
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage()];
        }
        return ['success' => true, 'error' => '', 'season_id' => $season->id, 'season_name' => $season->name ];
    }

    public function delete(Season $season)
    {
        try {
            $season->delete();
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage()];
        }
        return ['success' => true, 'errors' => '',];
    }
}