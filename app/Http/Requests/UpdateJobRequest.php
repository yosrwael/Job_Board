<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'name' => 'sometimes|string|min:3|max:50',
            'email' => 'sometimes|email|unique:users,email',
            'password' => 'sometimes|string|min:8',
            'company_name' =>'sometimes|string',
            'company_logo' =>'sometimes|image|max:2048',
        ]; 
    }
}
