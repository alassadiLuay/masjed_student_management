<?php namespace App\Http\Requests\Admin\TeacherRole;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTeacherRole extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.teacher-role.edit', $this->teacherRole);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'role_name' => ['sometimes', 'string'],
            'notes' => ['sometimes', 'string'],
            
        ];
    }
}
