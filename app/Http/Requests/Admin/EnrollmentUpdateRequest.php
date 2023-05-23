<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EnrollmentUpdateRequest extends FormRequest
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
            'newname' => ['required', 'string', 'max:250', Rule::unique('enrollments', 'name')->ignore($this->id), 'exclude'],
            'slug'=> ['required', 'string', 'max:250', Rule::unique('enrollments', 'slug')->ignore($this->id)],
            'name' =>['string'],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'newname' => Str::headline($this->newname),
        ]);
        $this->merge([
            'name' => Str::headline($this->newname),
        ]);
        $this->merge([
            'slug' => Str::slug($this->newname),
        ]);
    }
}
