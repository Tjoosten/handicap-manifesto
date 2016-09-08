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
     * Register view for a quote about people their situation.
     *
     * @url:platform  GET|HEAD:
     * @see:phpunit   TODO: Write test
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('quotes');
    }

    /**
     * Store the quote
     *
     * @url:platform  /POST:
     * @see:phpunit   TODO: Write test for validation errors.
     * @see:phpunit   TODO: Write test without validation errors.
     *
     * @param  QuoteValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuoteValidator $input)
    {
        Quotes::create($input->except('_token'));

        session()->flash('class', 'alert alert-success');
        session()->flash('message', 'Uw getuigenis is successvol opgeslagen.');

        return redirect()->back();
    }
}
