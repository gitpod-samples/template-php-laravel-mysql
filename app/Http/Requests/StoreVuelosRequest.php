<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Vuelo;


class StoreVuelosRequest extends FormRequest
{
   
    public function authorize()
    {
        return false;
    }

    
    public function rules()
    {
        return [
            //
        ];
    }
}
