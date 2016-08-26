<?php

namespace App\Http\Controllers;

/**
 * Class DisclaimerController.
 */
class DisclaimerController extends Controller
{
    /**
     * Show the disclaimer of the petition.
     *
     * @url:platform  GET|HEAD
     * @see:phpunit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('disclaimer');
    }
}
