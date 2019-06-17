<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username'              => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8|max:12|confirmed',
            'password_confirmation' => 'required',
            'type'                  => 'required',
        ];
    }

   public function messages()
    {
        return [
            'username.required'                 => 'El usuario es requerido',
            'email.required'                    => 'El mail es requerido',
            'email.unique'                      => 'Este mail ya esta creado',
            'password.required'                 => 'El password es requerido',
            'password.min'                      => 'El password de 8 a 12 caracteres',
            'password.max'                      => 'El password de 8 a 12 caracteres',
            'password_confirmation.required'    => 'Debe confirmar el password',
            'type.required'                     => 'Seleccione tipo de usuario',
            'password.confirmed'                => 'Los password no coinciden',
        ];
    }

}
