<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommuneInfoRequest extends FormRequest
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
            'maire' => 'required|max:225',
            'date_creation' => 'required|max:225',
            'superficie' => 'nullable|max:225',
            'population' => 'nullable|max:225',
            'delimitation' => 'nullable|max:225',
            'mot_du_maire' => 'nullable',
            'photo_maire' => 'nullable|mimes:jpeg,png|dimensions:min_width=80,min_height=80,max_width=600,max_height=600'
        ];
    }
}
