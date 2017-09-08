<?php

namespace App\Builders\Inscriptions;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\InscriptionsRepository;
use App\Models\Inscription;

class InscriptionBuilder implements BuilderInterface
{
    /**
     * @param Request $request
     */
    public function build(Request $request)
    {
        $validator = $this->checkForm($request);
        if (!$validator->fails()) {
            $inscription = $this->check($request);
            return $this->createOrUpdate($request, $inscription);
        }
        return Answer::error(
            new \InvalidArgumentException('Erreur de validation', 400),
            $validator->messages()->toArray()
        );
    }

    /**
     * @param Request $request
     * @param $inscription
     */
    public function createOrUpdate(Request $request, $inscription)
    {
        $repository = new InscriptionsRepository;
        if ( !($inscription instanceof \Exception) && (!$inscription->isEmpty()) ) {
            $inscription = $inscription->first();
            $answer      = $repository->update($request, $inscription);
        } else {
            $answer = $repository->save($request);
        }
        return $answer;
    }

    /**
     * @param Request $request
     */
    public function check(Request $request)
    {
        $repository = new InscriptionsRepository;
        return $repository->find($request->input('member_id'), $request->input('season_id'));
    }

    /**
     * @param Request $request
     */
    public function checkForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'complementary_insurance'   => 'required|max:255',
            'minor_go_alone'            => 'required|max:255',
            'major_take_off'            => 'max:255',
        ]);
        return $validator->errors()->all();
    }
}
