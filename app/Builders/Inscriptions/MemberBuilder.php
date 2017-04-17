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
        $member     = $repository->find($request->input('firstname'), $request->input('lastname'));
        return $member;
    }

    /**
     * @param Request $request
     */
    public function checkForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastname'      => 'required|max:255',
            'firstname'     => 'required|max:255',
            'sexe'          => 'required',
            'birthday'      => 'required',
            'address'       => 'required|max:255',
            'postal_code'   => 'required',
            'city'          => 'required|max:255',
            'phone'         => 'required|max:255',
            'red_list'      => 'required',
            'mobile'        => 'required',
            'email'         => 'required',
        ]);
        return $validator->fails();
    }
}
