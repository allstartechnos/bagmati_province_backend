<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'image' => 'nullable',
            'username' => 'nullable|string|max:250',
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:50',
            'facebook' => 'nullable|string|max:50',
            'twitter' => 'nullable|string|max:50',
            'youtube' => 'nullable|string|max:50',
            'linkedin' => 'nullable|string|max:50',
            'instagram' => 'nullable|string|max:50',
            'viber' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'created_by' => 'nullable',
            'updated_by' => 'nullable'
        ];
    }
}
