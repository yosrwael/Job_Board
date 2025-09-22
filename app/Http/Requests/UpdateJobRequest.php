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
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'responsibilities' => 'nullable|string',
            'skills' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'salary' => 'nullable|string',
            'benefits' => 'nullable|string',
            'location' => 'sometimes|string',
            'work_type' => 'sometimes|in:on-site,remote,hybrid',
            'deadline' => 'nullable|date',
            'company_logo' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'sometimes|in:pending,accepted,rejected',
        ];
    }
}
