<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "category_id" => "required",
            "name" => "required|min:3",
            'file.*' => "mimes:jpeg,png,gif|max:5000",
            "file" => "max:3"
        ];
    }

    public function messages()
    {
        return [
            'file.max' => "Máximo 3 archivos adjuntos",
            'file.*.mimes' => "Solo JPG"
        ];
    }
}
