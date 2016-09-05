<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteValidator;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class QuoteController
 * @package App\Http\Controllers
 */
class QuoteController extends Controller
{
    /**
     * QuoteController constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the register view for a quote.
     *
     * @url:platform  GET|HEAD:
     * @see:phpunit   TODO: Write test for it.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('quote');
    }

    /**
     * Insert a new quote method.
     *
     * @param QuoteValidator $input
     */
    public function store(QuoteValidator $input)
    {
        //
    }
}
