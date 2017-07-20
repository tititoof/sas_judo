<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgeCategoryFormRequest extends FormRequest
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
      $id    = (null !== $this->segment(3)) ? $this->segment(3) : null;
      $rules = [
          'name'  => 'required|max:255|unique:age_categories,name',
          'years' => 'required|integer',
      ];
      if (null !== $id) {
          $rules = array_merge($rules, ['name' => 'required|max:255|unique:age_categories,name,'.$id,]);
      }
      return $rules;
    }
}
