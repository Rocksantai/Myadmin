<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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

            'title' => 'required|max:50',
            'slug' => 'required|max:255',
            'subtitle' => 'max:255',
            'excerpt' => 'max:6000',
            'views' => 'required| numeric|min:0',

            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',

            'photo' => 'max:1024',

        ];
    }

    public function messages(){

        return[
            'title.required' => 'introducerea titlului este obligatoriu',
            'title.max' => 'numele categoriei nu poate avea mai mult de 50 de caractere',
            'slug.required' => 'Adresa slug a categoriei este obligatorie',
            'slug.max' => 'trebuie sa introduceti o adresa de email valida',
            'slug.unique' => 'Acest slug este deja inregistrat',
            'slug.max' => 'slug-ul nu poate avea mai mult de 255 de caractere',
            'excerpt.max' => 'Descrierea categoriei nu poate avea mai mult de 6000 de caractere',
            'photo.max' => 'Fotografia nu poate avea mai mult de 1Mb',

            'meta_title.max' => 'Tagul meta title nu poate avea mai mult de 255 de caractere',
            'meta_description.max' => 'Tagul meta description nu poate avea mai mult de 255 de caractere',
            'meta_keywords.max' => 'Tagul meta keywords nu poate avea mai mult de 255 de caractere',
        ];
    }
}
