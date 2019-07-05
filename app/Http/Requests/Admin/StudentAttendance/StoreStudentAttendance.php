<?php namespace App\Http\Requests\Admin\StudentAttendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreStudentAttendance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.student-attendance.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'student_id' => ['required'],
            'created_at' => ['required', 'date'],
            'is_late' => ['required', 'boolean'],
        ];
    }
}
