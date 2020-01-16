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
                        'nom' => 'required|max:255',
                        'date_creation' => 'required',

                        /* 'fichier' => 'nullable|mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600' */
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'nom' => 'required|max:255',
                        'date_creation' => 'required',
                        'fichier' => 'nullable|mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600'
                    ];
                }
            default:
                break;
        }
    }
}
