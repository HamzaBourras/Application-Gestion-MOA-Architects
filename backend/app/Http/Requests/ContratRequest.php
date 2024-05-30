<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratRequest extends FormRequest
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

        if (strpos($url, 'api/admin/contrats/edit') !== false) {
            return [
                "statut" => "required"
            ];
        }

        if(strpos($url, 'api/admin/contrats/store') !== false){
            return [
                "date" => "required|after:today"
            ];
        }
        
        if (strpos($url, 'api/client/contrats/edit') !== false) {
            return [
                "vu" => "required"
            ];
        }
        
    }

    public function messages()
    {
        return [
            "date.required" => "la date est obligatoire",
            "date.after" => "La date doit passer la date actuelle",
        ];
    }
}