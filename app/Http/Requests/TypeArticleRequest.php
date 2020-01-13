<?php

namespace App\Http\Requests;

use App\Models\Commune\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'libelle' => 'required|max:255|unique:type_articles',
            'description' => 'required|max:225',
        ];

    }
}
