<?php namespace App\Http\Requests\Admin\Awqaf;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAwqaf extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.awqaf.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'test_name' => ['required', 'string'],
            'date' => ['required', 'string'],
            'place' => ['required', 'string'],
            /*'tester_name' => ['required', 'string'],
            */
        ];
    }
}
