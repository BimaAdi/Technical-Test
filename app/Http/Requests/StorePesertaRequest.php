<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePesertaRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required|email',
            'nilai_X' => 'required|integer|gte:1|lte:33',
            'nilai_Y' => 'required|integer|gte:1|lte:23',
            'nilai_Z' => 'required|integer|gte:1|lte:18',
            'nilai_W' => 'required|integer|gte:1|lte:13'
        ];
    }
}
