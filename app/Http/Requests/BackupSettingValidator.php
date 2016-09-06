<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackupSettingValidator extends FormRequest
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
            'database'                   => 'required',
            'keepAllBackupsForDaysAll'   => 'required|integer',
            'keepAllBackupsForDays'      => 'required|integer',
            'keepWeeklyBackupsForWeeks'  => 'required|integer',
            'keepMonthlyBackupsForWeeks' => 'required|integer',
            'keepAllBackupsYearly'       => 'required|integer',
        ];
    }
}
