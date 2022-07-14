<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'max:30',
            'address' => 'max:50',
            'role' => 'required',
            'password' => 'required|min:8|confirmed',
            'photo' => 'max:1024'

        ];
    }

    public function messages(){

        return[
            'name.required' => 'introducerea numelui de utilizator este obligatorie',
            'name.max' => 'numele utilizatorului nu poate avea mai mult de 50 de caractere',
            'email.required' => 'adresa de email este obligatorie',
            'email.email' => 'trebuie sa introduceti o adresa de email valida',
            'email.unique' => 'adresa de email trebuie sa fie inregistrara',
            'phone.max' => 'numarul de telefon nu poate avea mai mult de 20 de caractere',
            'role.required' => 'trebuie sa atribuiti un rol',
            'password.required' => 'trebuie sa introduceti o parola',
            'password.min' => 'parola trebuie sa contina min 8 caractere',
            'password.confirmed' => 'parola trebuie sa fie identica'
        ];
    }
}
