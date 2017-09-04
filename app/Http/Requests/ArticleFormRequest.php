<?php

namespace App\Http\Requests;

use App\Providers\AuthServiceProvider;
use Illuminate\Auth\Access\Gate;
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
        return \Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $article    = (null !== $this->route('article')) ? $this->route('article') : null;
        $rules = [
            'name'          => 'required|max:255|unique:articles,name',
            'content'       => 'required',
            'categories'    => 'required|array',
            'albums'        => 'array'
        ];
        if (null !== $article) {
            $rules = array_merge($rules, ['name' => 'required|max:255|unique:articles,name,'.$article['attributes']['id'],]);
        }
        return $rules;
    }
}
