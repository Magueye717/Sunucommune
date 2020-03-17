<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RessourceRequest extends FormRequest
{

    public function messages()
{
    return [
        'collectivite_id.required' => 'Veuillez choisir le quartier ou le village de la structure',
        'secteur_id.required' => 'Veuillez choisir le secteur d\'acivité de la structure',
    ];
}
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
                        'nom' => 'required|max:75',
                        'secteur_id' => 'required',
                        'collectivite_id' => 'required',
                        'heure_ouverture' => 'required|max:75',
                        'heure_fermeture' => 'required|max:20',
                        'longitude' => 'required|max:20',
                        'latittude' => 'required|max:20',
                        'altitude' => 'required|max:20',
                        'adresse' => 'required|max:20',
                        'personne_contact' => 'required',
                        'email' => 'required|email',
                        'telephone' => 'required',
                        'description' => 'required|max:700',
                        //'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,'

                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'nom' => 'required|max:75',
                        'secteur_id' => 'required',
                        'collectivite_id' => 'required',
                        'heure_ouverture' => 'required|max:75',
                        'heure_fermeture' => 'required|max:20',
                        'longitude' => 'required|max:20',
                        'latittude' => 'required|max:20',
                        'altitude' => 'required|max:20',
                        'adresse' => 'required|max:20',
                        'personne_contact' => 'required',
                        'email' => 'required|email',
                        'telephone' => 'required',
                        'description' => 'required|max:700',
                        'photo' => 'nullable|mimes:jpeg,png'
                    ];
                }
            default:
                break;
        }
    }
}
