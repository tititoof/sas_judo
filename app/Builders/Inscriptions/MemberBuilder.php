<?php

namespace App\Builders\Inscriptions;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\MembersRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Member;
use App\Helpers\Answer;

class MemberBuilder implements BuilderInterface
{
    /**
     * Constante string length max
     **/
    const REQUIREDMAX   = 'required|max:255';

    /**
     * Constante required
     **/
    const REQUIRED      = 'required';


    /**
     * @param Request $request
     */
    public function build(Request $request)
    {
        $validator = $this->checkForm($request);
        if (!$validator->fails()) {
            $member = $this->check($request);
            return $this->createOrUpdate($request, $member);
        }
        return Answer::error(
            new \InvalidArgumentException('Erreur de validation', 400),
            $validator->messages()->toArray()
        );
    }

    public function createOrUpdate(Request $request, $member)
    {
        $repository = new MembersRepository;
        if ( !($member instanceof \Exception) && (!$member->isEmpty()) ) {
            $member = $member->first();
            $answer = $repository->update($request, $member);
        } else {
            $answer = $repository->save($request);
        }
        return $answer;
    }

    /**
     * @param string $firstname
     * @param string $lastname
     * @return Member
     */
    public function check(Request $request)
    {
        $repository = new MembersRepository;
        return $repository->find($request->input('firstname'), $request->input('lastname'));
    }

    /**
     * @param Request $request
     */
    public function checkForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastname'      => self::REQUIREDMAX,
            'firstname'     => self::REQUIREDMAX,
            'sexe'          => self::REQUIRED,
            'birthday'      => self::REQUIRED,
            'address'       => self::REQUIREDMAX,
            'postal_code'   => self::REQUIRED,
            'city'          => self::REQUIREDMAX,
            'phone'         => self::REQUIREDMAX,
            'red_list'      => self::REQUIRED,
            'mobile'        => self::REQUIRED,
            'email'         => self::REQUIRED,
        ]);
        return $validator;
    }
}
