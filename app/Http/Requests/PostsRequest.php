<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
    public function rules(){
        return [
            'title' => 'required|min:5', // 'required|email'
            'body' => 'required|min:10', // 'required|numeric'
            'cover_image' => 'image|nullable|max:1999',
        ];
    }

    // funkcja do personalizowania wiadomosci
    public function messages(){
        return [
            'title.required' => 'Pole tytul jest wymagane',
            'body.required' => 'Pole z trescia ogloszenia jest wymagane',

        ];

    }



}
