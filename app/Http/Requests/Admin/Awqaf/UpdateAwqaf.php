<?php namespace App\Http\Requests\Admin\Awqaf;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAwqaf extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.awqaf.edit', $this->awqaf);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'test_name' => ['sometimes', 'string'],
            'date' => ['sometimes', 'string'],
            'place' => ['sometimes', 'string'],
            /*'tester_name' => ['sometimes', 'string'],*/
            
        ];
    }
}
