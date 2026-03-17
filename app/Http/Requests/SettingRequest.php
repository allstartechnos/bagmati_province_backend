<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'nullable|mimes:png,jpg,jpeg,webp|max:1024',
            'fav_icon'  => 'nullable|mimes:png,jpg,jpeg, webp|max:1024',
            'slogan' => 'nullable|string|max:550',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'facebook' => 'nullable|string|',
            'twitter' => 'nullable|string|',
            'youtube' => 'nullable|string|',
            'linkedin' => 'nullable|string|',
            'instagram' => 'nullable|string|',
            'viber' => 'nullable|string|',
            'whatsapp' => 'nullable|string|',
        ];
    }
}
