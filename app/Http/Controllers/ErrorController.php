<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ErrorController
 * @package App\Http\Controllers
 */
class ErrorController extends Controller
{
    /**
     * Backend overview off the possible errors.
     *
     * @url:platform
     * @see:phpunit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('');
    }

    /**
     * Store the problem report in the database.
     *
     * @url:platform
     * @see:phpunit
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        return redirect()->back();
    }

    /**
     * Change the status for the issue report.
     *
     * @url:platform
     * @see:phpunit
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status()
    {
        return redirect()->back();
    }

    /**
     * Get the insert form for a possible error.
     *
     * @url:platform
     * @see:phpunit
     */
    public function register()
    {
        return view('issue.new');
    }

    /**
     * Let the client report a possible error.
     *
     * @url:platform
     * @see:phpunit
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function report()
    {
        return redirect()->back();
    }
}
