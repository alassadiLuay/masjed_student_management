<?php namespace App\Http\Requests\Admin\ListenedSubject;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateListenedSubject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.listened-subject.edit', $this->listenedSubject);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'student_id' => ['sometimes', 'integer'],
            'student_course_id' => ['sometimes', 'integer'],
            'subject_id' => ['sometimes', 'integer'],
            'subject_type' => ['sometimes', 'string'],
            
        ];
    }
}
