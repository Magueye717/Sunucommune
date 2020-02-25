<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediathequeRequest extends FormRequest
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

                     $rules = [
                        'fichier' => 'required',
                        'rubrique' => 'required',
                        'description' => 'required|max:300',
                    ];

                    //  si le type_fichier est audio
                    if ($this->input('type_media') == 'audio') {
                        $rules['fichier'] = 'mimes:mp3,wav';
                    }

                    //si le type_fichier est audio
                    if ($this->input('type_media') == 'video') {
                         $rules['fichier'] = 'mimes:mp4,3gp,flv,avi';

                    }
                    //si le type_fichier est photo
                    if ($this->input('type_media') == 'photo') {
                        $rules['fichier'] = 'mimes:jpeg,jpg,png';

                   }

                    return $rules;
                }
            case 'PUT':
            case 'PATCH':
                {
                    $rules = [
                        'rubrique' => 'required',
                        'description' => 'required|max:300',
                    ];

                    //  si le type_fichier est audio
                    if ($this->input('type_media') == 'audio') {
                        $rules['fichier'] = 'mimes:mp3,wav';
                    }

                    //si le type_fichier est audio
                    if ($this->input('type_media') == 'video') {
                         $rules['fichier'] = 'mimes:mp4,3gp,flv,avi';

                    }
                    //si le type_fichier est photo
                    if ($this->input('type_media') == 'photo') {
                        $rules['fichier'] = 'mimes:jpeg,jpg,png';

                   }

                    return $rules;
                }
            default:
                break;
        }
    }
}
