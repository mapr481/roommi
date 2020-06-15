<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required', 'string', 'max:255',
            'apellido' => 'required', 'string', 'max:255',
            'cedula' => 'required', 'string', 'max:255', 'unique:users,cedula'.$this->user()->id,
            'nacimiento' => 'required', 'string','date', 'max:255',
            'telefono' => 'required', 'string', 'max:255',
            'email' => 'required', 'email','unique:users,email'.$this->user()->id,           
            'esAdmin'=> '',
        ];
    }
}
