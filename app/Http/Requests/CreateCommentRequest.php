<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//true je neka provjera, da li nesto smijemo da uradimo, tipa da li smo admin, znaci ako je prosao requ vracamo true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author'=>'required|min:5',
            'text'=>'required'
        ];
    }
}
