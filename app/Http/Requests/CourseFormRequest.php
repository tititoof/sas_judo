<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
        $course    = (null !== $this->route('course')) ? $this->segment('course') : null;
        $rules = [
            'name'          => 'required|max:255|unique:courses,name',
            'season_id'     => 'required',
            'day'           => 'required',
            'start_at'      => 'required',
            'end_at'        => 'required',
            'teacher_id'    => 'required',
        ];
        if (null !== $course) {
            $rules = array_merge($rules, ['name' => 'required|max:255|unique:courses,name,'.$course['attributes']['id'],]);
        }
        return $rules;
    }
}
