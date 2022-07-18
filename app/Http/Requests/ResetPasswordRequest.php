<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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

            'password' => 'required|min:8',
            'passwordnew' => 'required|min:8',
            'passwordnew_confirmation' => 'required|same:passwordnew'
        ];
    }

    public function messages()
    {
        return [
          'password.required' => 'introducerea parolei este obligatorie',
          'password.min' => 'parola trebuie sa contina min 8 caractere',
          'passwordnew.min' => 'parola trebuie sa contina min 8 caractere',
          'passwordnew_confirmation' => 'parola nu este corecta'
        ];
    }
}
