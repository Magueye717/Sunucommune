<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanelCommentaireRequest extends FormRequest
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
            'commentaire' => 'required|max:255',
            'nom' => 'required|max:225',
            'email' => 'email|required|max:255,email'

		];
    }
}
