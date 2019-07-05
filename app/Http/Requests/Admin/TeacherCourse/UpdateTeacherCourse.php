<?php namespace App\Http\Requests\Admin\TeacherCourse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTeacherCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.teacher-course.edit', $this->teacherCourse);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'teacher_id' => ['sometimes', 'integer'],
            'course_id' => ['sometimes', 'integer'],
            
        ];
    }
}
