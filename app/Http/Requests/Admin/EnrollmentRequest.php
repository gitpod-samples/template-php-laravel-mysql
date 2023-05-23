<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EnrollmentRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:enrollments'],
            'slug' => ['required','unique:enrollments']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => Str::headline($this->name),
        ]);
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
