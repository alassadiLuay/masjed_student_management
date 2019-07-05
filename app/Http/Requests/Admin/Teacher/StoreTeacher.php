<?php namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTeacher extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.teacher.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'teacher_name' => ['required', 'string'],
            'teacher_address' => ['required', 'string'],
            'teacher_study' => ['required', 'string'],
            'teacher_speciality' => ['required', 'string'],
            'teacher_work' => ['required', 'string'],
            'teacher_extras' => ['required', 'string'],
            'teacher_note' => ['required', 'string'],
            'teacher_mobile' => ['required', 'string'],
            'teacher_phone' => ['required', 'string'],
            'birthdate' => ['nullable', 'date'],
            'username' => ['sometimes', 'string'],
            'password' => ['sometimes', 'string']
        ];
    }
}
