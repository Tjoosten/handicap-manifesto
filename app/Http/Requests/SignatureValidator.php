<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SignatureValidator
 * @package App\Http\Requests
 *
 * @property mixed naam
 * @property mixed dag
 * @property mixed maand
 * @property mixed jaar
 * @property mixed email
 * @property mixed stad
 */
class SignatureValidator extends FormRequest
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
            'dag' => 'required',
            'jaar' => 'required',
            'maand' => 'required',
            'email' => 'required|email|unique:signatures,email',
            'stad' => 'required',
        ];
    }
}
