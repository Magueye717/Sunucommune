<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadreConcertationRequest extends FormRequest
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
                        'nom' => 'email|required|max:255',
                        'date_creation' => 'required|max:225',
                        'fichier' => 'required|max:225',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'nom' => 'email|required|max:255',
                        'date_creation' => 'required|max:225',
                        'fichier' => 'required|max:225',
                    ];
                }
            default:
                break;
        }
    }
}
