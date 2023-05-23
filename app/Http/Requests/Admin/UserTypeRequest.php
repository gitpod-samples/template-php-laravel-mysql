<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:250', 'unique:roles,name,except,id'],
            'guard_name'=>['string'],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => Str::slug($this->name, '_'),
        ]);
        $this->merge([
            'guard_name' => Str::slug($this->guard_name, '_'),
        ]);
    }
}
