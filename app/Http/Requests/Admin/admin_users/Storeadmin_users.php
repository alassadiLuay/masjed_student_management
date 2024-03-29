<?php namespace App\Http\Requests\Admin\admin_users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class Storeadmin_users extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.admin-user.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        $rules = [
                
            'roles' => ['array'],
                
        ];

        if(Config::get('admin-auth.activation_enabled')) {
            $rules['activated'] = ['required', 'boolean'];
        }

        return $rules;
    }

    /**
     * Modify input data
     *
     * @return  array
     */
    public function getModifiedData()
    {
        $data = $this->only(collect($this->rules())->keys()->all());
        //TODO: is this ok?
        if(!Config::get('admin-auth.activation_enabled')) {
            $data['activated'] = true;
        }
        if(!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $data;
    }
}
