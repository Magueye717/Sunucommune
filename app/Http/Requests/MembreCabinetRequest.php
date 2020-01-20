<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembreCabinetRequest extends FormRequest
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
            'fonction' => 'required|max:225',
            'adresse' => 'nullable|max:225',
            'telephone' => 'nullable|max:50'
        ];
    }
}
