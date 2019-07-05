<?php namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.student.edit', $this->student);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'student_fname' => ['sometimes', 'string'],
            'student_lname' => ['sometimes'],
            'student_father_name' => ['sometimes', 'string'],
            'student_address' => ['sometimes', 'string'],
            'student_father_job' => ['sometimes'],
            'student_nationality' => ['sometimes'],
            'father_phone' => ['sometimes'],
            'student_phone' => ['sometimes'],
            'home_phone' => ['sometimes'],
            'transportation' => ['sometimes'],
            'student_photo' => ['sometimes'],
            'note' => ['sometimes'],
            'status' => ['sometimes', 'boolean'],
            'has_id' => ['sometimes', 'boolean'],
            'student_birthdate' => ['nullable', 'date'],
            
        ];
    }
}
