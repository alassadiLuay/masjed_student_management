<?php namespace App\Http\Requests\Admin\Exam;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateExam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.exam.edit', $this->exam);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'course_id' => ['sometimes', 'integer'],
            'exam_name' => ['sometimes', 'string'],
            'exam_max_num' => ['sometimes', 'integer'],
            'exam_min_num' => ['sometimes', 'integer'],
            
        ];
    }
}
