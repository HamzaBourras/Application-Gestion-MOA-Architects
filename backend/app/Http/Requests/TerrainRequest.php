<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerrainRequest extends FormRequest
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

        if (strpos($url, "api/client/mesDemandes/storeTerrain") !== false) {
            return [
                "adresse" => "required",
                "longeur" => "required|number",
                "largeur" => "required|number",
                "images" => "required|min:3",
                "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ];
        }
    }


    public function messages(): array
    {
        return [
            "adresse.required" => "L'adresse est obligatoire.",
            "longeur.required" => "La longueur est obligatoire.",
            "longeur.number" => "La longeur doit etre un nombre.",
            "largeur.required" => "La largeur est obligatoire.",
            "largeur.number" => "La largeur doit etre un nombre.",
            "images.required" => "Les images sont obligatoires.",
            "images.min" => "Le nombre des images doit être au minimum de 3.",
            "images.*.image" => "le fichier doit être une image.",
            "images.*.mimes" => "l' image doit être de type jpeg, png, jpg, gif ou svg.",
            "images.*.max" => "l' image ne peut pas dépasser 2048 kilooctets.",
        ];
    }

    
}