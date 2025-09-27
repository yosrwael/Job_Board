<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'responsibilities' => 'required|string',
            'skills' => 'required|string',
            'qualifications' => 'required|string',
            'salary' => 'required|string',
            'benefits' => 'required|string',
            'location' => 'required|string',
            'work_type' => 'required|in:on-site,remote,hybrid',
            'deadline' => 'required|date',
            'company_logo' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            
        ];
    }
}
