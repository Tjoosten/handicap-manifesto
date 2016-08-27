<?php

namespace App\Http\Controllers;

use App\Signatures;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['signatures'] = number_format(count(Signatures::all()));

        return view('welcome', $data);
    }
}
