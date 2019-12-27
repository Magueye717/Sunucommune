<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                        'email' => 'email|required|max:255|unique:users,email',
                        'nom' => 'required|max:225',
                        'prenom' => 'required|max:225',
                        'entite_id' => 'nullable|numeric',
                        'adresse' => 'nullable|max:225',
                        'avatar' => 'nullable|mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600',
                        'roles' => 'required|array',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    $user = User::find($this->get('user_id'));
                    return [
                        'email' => 'email|required|max:255|unique:users,email,' . $user->id,
                        'nom' => 'required|max:225',
                        'prenom' => 'required|max:225',
                        'entite_id' => 'nullable|numeric',
                        'adresse' => 'nullable|max:225',
                        'avatar' => 'nullable|mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600',
                        'roles' => 'required|array',
                    ];
                }
            default:
                break;
        }
    }
}
