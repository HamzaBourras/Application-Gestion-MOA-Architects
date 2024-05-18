<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeRequest extends FormRequest
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
        $url = $this->url();

        if (strpos($url, 'api/client/store') !== false) {
            return [
                "nom_projet" => "required",
                "type" => "required",
                "description" => "required|min:100",
            ];
    }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom_projet.required' => 'Le nom du projet est obligatoire.',
            'type.required' => 'Le type est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'description.min' => 'La description doit comporter au moins 100 caractères.',
        ];
    }
    
}