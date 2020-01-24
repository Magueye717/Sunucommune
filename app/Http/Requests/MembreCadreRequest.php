<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class MembreCadreRequest extends FormRequest
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
                        'email' => 'email|required|max:255',
                        'nom' => 'required|max:225',
                        'prenom' => 'required|max:225',
                        'fonction' => 'required|max:225',
                        'statut_cadre' => 'nullable|max:225',
                        'telephone' => 'required|max:225',
                        'adresse' => 'required|max:225',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'email' => 'email|required|max:255',
                        'nom' => 'required|max:225',
                        'prenom' => 'required|max:225',
                        'fonction' => 'required|max:225',
                        'statut_cadre' => 'nullable|max:225',
                        'telephone' => 'required|max:225',
                        'adresse' => 'required|max:225',
                    ];
                }
            default:
                break;
        }
    }
}
