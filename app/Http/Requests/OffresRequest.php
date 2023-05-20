<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            'montant.required' => "Veuillez entrer un montant supérieur à 0"
        ];
    }
}
