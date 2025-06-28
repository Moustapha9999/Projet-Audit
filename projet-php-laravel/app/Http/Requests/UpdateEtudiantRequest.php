<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom'               => 'required|string|min:5',
            'date_naissance'    => 'required|date',
            'email'             => 'required|email:filter|min:6',
            'faculte'           => 'required',
            'promotion'           => 'required'
        ];
    }
}
