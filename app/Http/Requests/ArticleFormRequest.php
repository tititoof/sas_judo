<?php

namespace App\Http\Requests;

use App\Providers\AuthServiceProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArticleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (AuthServiceProvider::allow('is-admin')) {
            true;
        }
        return false;
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
            'name'          => 'required|max:255|unique:articles,name',
            'content'       => 'required',
            'categories'    => 'required|array',
            'albums'        => 'array'
        ];
        if (null !== $id) {
            $rules = array_merge($rules, ['name' => 'required|max:255|unique:articles,name,'.$id,]);
        }
        return $rules;
    }
}
