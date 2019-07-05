<?php namespace App\Http\Requests\Admin\PointConfig;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePointConfig extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.point-config.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'point_type_id' => ['required', 'integer'],
            'point_name' => ['required', 'string'],
            'point_value' => ['required', 'integer'],
            'notes' => ['required', 'string'],
            
        ];
    }
}
