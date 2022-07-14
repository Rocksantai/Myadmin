<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'max:30',
            'address' => 'max:50',
            'role' => 'required',
            'photo' => 'max:1024'

        ];
    }

    public function messages(){

        return[
            'name.required' => 'introducerea numelui de utilizator este obligatorie',
            'name.max' => 'numele utilizatorului nu poate avea mai mult de 50 de caractere',
            'email.required' => 'adresa de email este obligatorie',
            'email.email' => 'trebuie sa introduceti o adresa de email valida',

            'phone.max' => 'numarul de telefon nu poate avea mai mult de 20 de caractere',
            'role.required' => 'trebuie sa atribuiti un rol',
            ];
    }
}
