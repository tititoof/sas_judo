<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JudoEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id    = (null !== $this->segment(2)) ? $this->segment(2) : null;
        $rules = [
            'name'          => 'required|max:255|unique:judo_events,name',
            'type'          => 'required',
            'start_at'      => 'required',
            'end_at'        => 'required',
            'end_time_at'   => 'required',
            'start_time_at' => 'required',
        ];
        if (null !== $id) {
            $rules = array_merge($rules, ['name' => 'required|max:255|unique:judo_events,name,'.$id,]);
        }
        return $rules;
    }
}