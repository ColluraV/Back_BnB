<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentsStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'rooms_number' => 'required|integer',
            'beds_number' => 'required|integer',
            'bath_number' => 'required|integer',
            'dimensions' => 'required|integer',
            'address' => 'required',
            'images' => 'nullable|image',
            'visibility' => 'required',
            "services" => "required"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'rooms_number.required' => 'Il campo numero di stanze è obbligatorio.',
            'beds_number.required' => 'Il campo numero di letti è obbligatorio.',
            'bath_number.required' => 'Il campo numero di bagni è obbligatorio.',
            'dimensions.required' => 'Il campo della grandezza della casa è obbligatorio.',
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            'images.required' => 'Il campo immagine è obbligatorio.',
            'services.required' => 'È obbligatorio selezionare almeno un servizio.',
            'visibility.required' => 'Il campo visibilità è obbligatorio.',
        ];
    
    }
}
