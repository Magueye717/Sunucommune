<?php

namespace App\Http\Requests;

use App\Models\Commune\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'slug' => 'required|max:255|unique:articles',
                        'titre' => 'required|max:225',
                        'photo' => 'required|nullable|mimes:jpeg,png',
                        'type_article_id' => 'required|numeric',
                        'piece_jointe' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    $article = Article::find($this->get('article_id'));
                    return [
                        'slug' =>'required',Rule::unique('articles')->ignore($article->id),
                        'titre' => 'required|max:225',
                        'photo' => 'nullable|mimes:jpeg,png',
                        'type_article_id' => 'required|numeric',
                        'piece_jointe' => 'nullable|mimes:pdf,docx,xlsx',
                    ];
                }
            default:
                break;
        }

    }
}
