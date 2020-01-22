<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AncienMaireRequest extends FormRequest
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
            'nom' => 'required|max:225',
            'prenom' => 'required|max:225',
            'date_debut_mandat' => 'required|max:225',
            'date_fin_mandat' => 'required|max:225',
            'biographie' => 'nullable',
            'photo' => 'nullable|mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600'
        ];
    }
}
