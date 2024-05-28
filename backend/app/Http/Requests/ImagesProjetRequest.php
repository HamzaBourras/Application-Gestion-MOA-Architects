<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesProjetRequest extends FormRequest
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
            "images" => "required|max:4",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:3072",
        ];
    }

    public function messages(): array
    {
        return [
            "images.required" => "Les images sont obligatoires.",
            "images.max" => "Vous pouvez ajouter seulement 4 images à chaque fois",
            "images.*.image" => "le fichier doit être une image.",
            "images.*.mimes" => "l' image doit être de type jpeg, png, jpg, gif ou svg.",
            "images.*.max" => "l' image ne peut pas dépasser 3 Mo",
        ];
    }
}