<?php namespace App\Http\Requests\Admin\PointConfig;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePointConfig extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.point-config.edit', $this->pointConfig);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'point_type_id' => ['sometimes', 'integer'],
            'point_name' => ['sometimes', 'string'],
            'point_value' => ['sometimes', 'integer'],
            'notes' => ['sometimes', 'string'],
            
        ];
    }
}
