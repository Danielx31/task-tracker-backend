<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
            'priority' => 'nullable|in:low,medium,high',
            'due_date' => 'nullable|date|after_or_equal:today',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Task title is required.',
            'title.max' => 'Task title must not exceed 255 characters.',
            'status.required' => 'Task status is required.',
            'status.in' => 'Invalid status. Must be: pending, in-progress, or completed.',
            'priority.in' => 'Invalid priority. Must be: low, medium, or high.',
            'due_date.after_or_equal' => 'Due date must be today or a future date.',
        ];
    }
}
