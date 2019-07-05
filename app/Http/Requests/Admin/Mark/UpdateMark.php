<?php namespace App\Http\Requests\Admin\Mark;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMark extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.mark.edit', $this->mark);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'exam_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
            'mark' => ['required', 'integer'],
            'notes' => ['string'],
        ];
    }
}
