<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorInstructeur extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'min:4', 'max:55', 'string'],
            'prenom' => ['required', 'string', 'min:4', 'max:55'],
            'cin' => ['required', 'string', 'min:6', 'max:8'],
            'adresse' => ['required', 'string', 'min:6', 'max:255'],
            'tel' => ['string', 'required', 'min:10', 'max:13'],
            'email' => ['email', 'required', 'unique:instructeurs,email'],
            'sexe' => ['required', 'string', 'min:1', 'max:1'],
            'matieres' => ['required', 'exists:matieres,id'],
        ];
    }
}
