<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PictureFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return Auth::check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id    = (null !== $this->segment(2)) ? $this->segment(2) : null;
        if (null !== $id) {
            $rules = [
                'name'         => 'required|max:255|unique:pictures,name,'.$id,
                'image.*'      => 'required|image',
                'local_image'  => 'integer',
            ];
        } else {
            $rules = [
                'name'         => 'required|max:255|unique:pictures,name',
                'image.*'      => 'required|image',
                'local_image'  => 'integer',
            ];
        }
        return $rules;
    }
}
