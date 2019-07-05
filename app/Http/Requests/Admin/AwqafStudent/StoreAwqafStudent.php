<?php namespace App\Http\Requests\Admin\AwqafStudent;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAwqafStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.awqaf-student.create');
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
            'awqaf_id' => ['required'],
            'student_mark' => ['required', 'integer'],
            'is_passed' => ['required', 'boolean'],
            'full_mark' => ['required', 'integer'],
            'subject_type' => ['required', 'string'],
            'subject_id' => ['required'],
            'created_at' => ['required', 'date']
        ];
    }
}
