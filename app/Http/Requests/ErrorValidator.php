<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ErrorValidator
 * @package App\Http\Requests
 *
 * @property mixed categorie
 * @property mixed melding
 */
class ErrorValidator extends FormRequest
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
            'naam' => 'required',
            'email' => 'required|email',
            'categorie' => 'required',
            'melding' => 'required'
        ];
    }
}
