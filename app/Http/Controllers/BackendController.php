<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class BackendController
 * @package App\Http\Controllers
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

    }
}
