<?php namespace App\Http\Requests\Admin\PointType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePointType extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.point-type.edit', $this->pointType);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'type_name' => ['sometimes', 'string'],
            'notes' => ['sometimes', 'string'],
            
        ];
    }
}
