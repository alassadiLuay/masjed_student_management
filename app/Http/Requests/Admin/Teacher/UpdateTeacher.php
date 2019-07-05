<?php namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTeacher extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.teacher.edit', $this->teacher);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'teacher_name' => ['sometimes', 'string'],
            'teacher_address' => ['sometimes', 'string'],
            'teacher_study' => ['sometimes', 'string'],
            'teacher_speciality' => ['sometimes', 'string'],
            'teacher_work' => ['sometimes', 'string'],
            'teacher_extras' => ['sometimes', 'string'],
            'teacher_note' => ['sometimes', 'string'],
            'teacher_mobile' => ['sometimes', 'string'],
            'teacher_phone' => ['sometimes', 'string'],
            'birthdate' => ['nullable', 'date'],
            'username' => ['sometimes', 'string'],
            'password' => ['sometimes', 'string']
        ];
    }
}
