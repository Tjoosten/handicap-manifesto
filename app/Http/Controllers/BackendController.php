<?php

namespace App\Http\Controllers;

/**
 * Class BackendController.
 */
class BackendController extends Controller
{
    /**
     * BackendController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }
}
