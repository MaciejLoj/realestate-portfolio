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
            'title' => 'required|min:5',
            'body' => 'required|min:10',
            'location' => 'required',
            'price' => 'required',
            'number_of_rooms' => 'required',
            'area_sqm' => 'required',
            'price' => 'required',
            'market_type' => 'required',
            'house_or_flat' => 'required',
            'cover_image' => 'required',
        ];
    }

    // funkcja do personalizowania wiadomosci
    public function messages(){
        return [
            'title.required' => 'Tytuł jest wymagany',
            'body.required' => 'Pole z treścią ogloszenia jest wymagana',
            'location.required' => 'Pole z lokalizacją jest wymagane',
            'price.required' => 'Pole z ceną jest wymagane',
            'area_sqm.required' => 'Pole z powierzchnią jest wymagane',
            'price.required' => 'Pole z ceną jest wymagane',
            'cover_image.required' => 'Dodaj zdjęcie obiektu',
        ];

    }



}
