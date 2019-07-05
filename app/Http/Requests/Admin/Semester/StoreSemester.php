<?php namespace App\Http\Requests\Admin\Semester;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSemester extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.semester.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'semester_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'started_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date'],
            'enabled' => ['required', 'boolean'],
            
        ];
    }
}
