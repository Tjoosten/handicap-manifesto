<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteValidator;
use App\Quotes;
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
     * @url:platform  GET|HEAD: /quotes
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
     * @url:platform   POST: /quotes/insert
     * @see:phpunit    QuotesTest::testInsertWithValidationErrors()
     * @see:phpunit    QuotesTest::testInsertWithoutValidationErrors()
     *
     * @param  QuoteValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuoteValidator $input)
    {
        $insert = Quotes::create($input->except('_token'));

        if ($insert) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'Uw getuigenis is succesvol opgeslagen.');
        }

        return redirect()->back(302);
    }
}
