<?php namespace App\Http\Requests\Admin\StudentNote;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateStudentNote extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.student-note.edit', $this->studentNote);
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
            'notes' => ['required', 'string'],
        ];
    }
}
