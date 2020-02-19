<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'titre' => 'required|max:225',
            'photo' => 'nullable|mimes:jpeg,png|dimensions:min_width=150,min_height=150,max_width=1600,max_height=1600',
            'type_article_id' => 'nullable|numeric',
            'piece_jointe' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:10000'
        ];
    }
}
