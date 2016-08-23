<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class DisclaimerController
 * @package App\Http\Controllers
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
