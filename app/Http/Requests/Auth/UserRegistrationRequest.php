<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;
use Spatie\Permission\Models\Role;

class UserRegistrationRequest extends FormRequest
{
    protected $formatters = [];

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required'],
            'gender_id' => ['required'],
            'user_type' => ['required'],
            'nationality' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'max:12', 'unique:users'],
            'id_number' => ['required', ],
            'department_id' => ['required'],
            'phone_number' => [],
            'specialization' => ['required'],
            'password' => ['required', Password::defaults()],
            // 'terms' => ['accepted', 'required', 'exclude'],
            // 'about_user' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'username' => Str::remove('-', Str::slug($this->username)),
        ]);
        $this->merge(([
            'first_name' => Str::headline($this->first_name)
        ]));
        $this->merge(([
            'last_name' => Str::headline($this->last_name)
        ]));
        $this->merge([
            'phone_number' => $this->phoneNumber(),
        ]);
    }

    public function phoneNum(): String
    {
        $original = request('phone_number');
        $trimed = trim($original);
        $formatted = Str::replace('-', '', $trimed);
        return $formatted;
    }

    public function code(): string
    {
        return Str::startsWith($this->phoneNum(), '0') ? mb_substr($this->phoneNum(), 2, 2) : mb_substr($this->phoneNum(), 1, 2);
    }

    public function numberFormat()
    {
        return Str::startsWith($this->phoneNum(), '0') ? mb_substr($this->phoneNum(), 4, 6) : mb_substr($this->phoneNum(), 3, 6);
    }

    public function withValidator(Validator $validator)
    {
        if (Role::findById(request('user_type'))->name  == 'student') {
            $validator->addRules([
                'enrollment_id' => ['required'],
                'academic_program_id' => ['required'],
                'academic_year_id' => ['required'],
            ]);
        }
        if (Role::findById(request('user_type'))->name  == 'academic_staff') {
            $validator->addRules([
                'academic_rank_id' => ['required'],
            ]);
        }
    }

    public function phoneNumber()
    {
        return $this->parse('+251 9{{code}} {{numberFormat}}');
    }

    public function parse($string)
    {
        $callback = function ($matches) {
            return $this->formatPhone($matches[1]);
        };

        return preg_replace_callback('/{{\s?(\w+|[\w\\\]+->\w+?)\s?}}/u', $callback, $string);
    }

    public function formatPhone($format, $arguments = [])
    {
        return call_user_func_array($this->getFormatter($format), $arguments);
    }

    public function getFormatter($format)
    {
        if (isset($this->formatters[$format])) {
            return $this->formatters[$format];
        }

        if (method_exists($this, $format)) {
            $this->formatters[$format] = [$this, $format];

            return $this->formatters[$format];
        }
    }
}
