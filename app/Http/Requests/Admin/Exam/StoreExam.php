<?php namespace App\Http\Requests\Admin\Exam;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreExam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.exam.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'course_id' => ['required', 'integer'],
            'exam_name' => ['required', 'string'],
            'exam_max_num' => ['required', 'integer'],
            'exam_min_num' => ['required', 'integer'],
            
        ];
    }
}
