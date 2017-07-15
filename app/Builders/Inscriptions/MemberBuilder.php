<?php

namespace App\Builders\Inscriptions;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\MembersRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Member;

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
        if (!$this->checkForm($request)) {
            $member = $this->check($request);
            return $this->createOrUpdate($request, $member);
        }
        return false;
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
            'lastname'      => REQUIREDMAX,
            'firstname'     => REQUIREDMAX,
            'sexe'          => REQUIRED,
            'birthday'      => REQUIRED,
            'address'       => REQUIREDMAX,
            'postal_code'   => REQUIRED,
            'city'          => REQUIREDMAX,
            'phone'         => REQUIREDMAX,
            'red_list'      => REQUIRED,
            'mobile'        => REQUIRED,
            'email'         => REQUIRED,
        ]);
        return $validator->fails();
    }
}
