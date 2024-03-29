<?php namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.course.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'semester_id' => ['required', 'integer'],
            'course_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'started_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date'],
            'session_number' => ['required', 'integer'],
            'enabled' => ['required', 'boolean'],
            
        ];
    }
}
