<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;

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

        return view('settings.index', $data);
    }
}
