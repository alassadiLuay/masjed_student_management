<?php namespace App\Http\Requests\Admin\Mark;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMark extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.mark.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'exam_id' => ['required'],
            'student_id' => ['required'],
            'mark' => ['required', 'integer'],
            'notes' => ['string'],
        ];
    }
}
