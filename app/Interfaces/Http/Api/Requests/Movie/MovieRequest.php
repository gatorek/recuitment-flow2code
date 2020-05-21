<?php


namespace App\Interfaces\Http\Api\Requests\Movie;


use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'genres.*' => 'integer|exists:genres,id'
        ];
    }

}
