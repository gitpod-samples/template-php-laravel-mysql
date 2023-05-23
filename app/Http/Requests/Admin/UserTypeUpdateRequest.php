<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserTypeUpdateRequest extends FormRequest
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
            'newname' => ['required', 'string', 'max:250', Rule::unique('roles', 'name')->ignore($this->id)],
            'newguard_name'=>['string'],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'newname' => Str::slug($this->newname, '_'),
        ]);
        $this->merge([
            'newguard_name' => Str::slug($this->newguard_name, '_'),
        ]);
    }
}
