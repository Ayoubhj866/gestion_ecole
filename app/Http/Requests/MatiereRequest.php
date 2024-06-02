<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatiereRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:4', 'max:50'],
            'filieres' => ['array', 'required', 'exists:filieres,id'],
        ];
    }

    /**
     * prepareForValidation : Prepare attributes for validation, transform some data
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->has('filieres')) {
            $this->merge([
                'filieres' => explode(',', $this->input('filieres')),
            ]);
        }
    }
}
