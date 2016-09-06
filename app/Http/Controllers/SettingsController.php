<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Larapack\ConfigWriter\Repository;

/**
 * Class SettingsController
 * @package App\Http\Controllers
 */
class SettingsController extends Controller
{
    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Settings configuration view.
     *
     * @url:platform  GET|HEAD: /settings
     * @see:phpunit   TODO: Write test.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Database backups.
        $data['StoreAllBackups']   = Config::get('laravel-backup.cleanup.defaultStrategy.keepAllBackupsForDays');
        $data['KeepDailyBackups']  = Config::get('laravel-backup.cleanup.defaultStrategy.keepDailyBackupsForDays');
        $data['WeeklyBackups']     = Config::get('laravel-backup.cleanup.defaultStrategy.keepWeeklyBackupsForWeeks');
        $data['MonthlyBackups']    = Config::get('laravel-backup.cleanup.defaultStrategy.keepMonthlyBackupsForMonths');
        $data['KeepYearlyBackups'] = Config::get('laravel-backup.cleanup.defaultStrategy.keepYearlyBackupsForYears');

        // Applicatie settings.
        $data['signatures'] = Config::get('manifesto.counter');

        return view('settings.index', $data);
    }

    /**
     * Store the backup settings.
     *
     * @url    POST: Settings/backup
     * @param  Requests\BackupSettingValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBackup(Requests\BackupSettingValidator $input)
    {
        $config = new Repository('laravel-backup');
        $config->set('cleanup.defaultStrategy.keepAllBackupsForDays',       $input->keepAllBackupsForDaysAll);
        $config->set('cleanup.defaultStrategy.keepDailyBackupsForDays',     $input->keepAllBackupsForDays);
        $config->set('cleanup.defaultStrategy.keepWeeklyBackupsForWeeks',   $input->keepWeeklyBackupsForWeeks);
        $config->set('cleanup.defaultStrategy.keepMonthlyBackupsForMonths', $input->keepMonthlyBackupsForWeeks);
        $config->set('cleanup.defaultStrategy.keepYearlyBackupsForYears',   $input->keepAllBackupsYearly);
        $config->save();

        if ($config) {
            sleep(3);
            session()->flash('message', 'The backup settings has been updated.');
            session()->flash('class', 'alert-success');
        } else {
            session()->flash('message', 'The backup settings could not be updated.');
            session()->flash('class', 'alert-danger');
        }

        return redirect()->back();
    }

    /**
     * Update the application settings.
     *
     * @url:platform  POST: /settings/application
     * @see:phpunit   TODO: create test when validation passes -> phpunit
     * @see:phpunit   TODO: create test when validation fails  -> phpunit.
     *
     * @param  Requests\ApplicationSettingValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeApplication(Requests\ApplicationSettingValidator $input)
    {
        $config = new Repository('manifesto');
        $config->set('counter', $input->counter);

        if ($config->save()) {
            $class   = 'alert alert-sucess';
            $message = 'Applicatie configuratie is aangepast.';
        } else {
            $class   = 'alert alert-danger';
            $message = 'Wij konden de applicatie configuratie niet aanpassen.';
        }

        session()->flash('class', $class);
        session()->flash('message', $message);

        return redirect()->back();
    }
}
