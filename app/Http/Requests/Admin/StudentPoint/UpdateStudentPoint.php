<?php namespace App\Http\Requests\Admin\StudentPoint;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateStudentPoint extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.student-point.edit', $this->studentPoint);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'student_id' => ['required', 'array'],
            'point_id' => ['required', 'array'],
        ];
    }
}
