<?php

namespace App\Repositories;

use App\Models\Result;
use App\Helpers\Answer;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            return Answer::error($exception);
        }
        return Answer::success(200, $result);
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
            return Answer::error($exception);
        }
        return Answer::success(200);
    }

    public function getAll($page, $options)
    {
        $collect = Result::orderByDesc('id')->get();
        $page    = $options['page'] ?? 1;
        $resultatsPerPage = $collect->forPage($page, 10)->map(function($result) {
            return $this->formatResultsBySeason($result);
        });

        return $resultatsPerPage->all();
    }

    public function formatResultsBySeason($result)
    {
        return [
            'name'          => $result->name,
            'season'        => $result->season->name,
            'locality'      => $result->locality,
            'contest_at'    => $result->contest_at,
            'informations'  => $result->informations,
        ];
    }
}
