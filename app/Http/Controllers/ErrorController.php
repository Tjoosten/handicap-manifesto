<?php

namespace App\Http\Controllers;

use App\ErrorCategory;
use App\Errors;
use App\Http\Requests\ErrorValidator;
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
        $data['errors'] = Errors::paginate(15);
        return view('feedback.index', $data);
    }

    /**
     * Get the insert form for a possible error.
     *
     * @url:platform
     * @see:phpunit
     */
    public function register()
    {
        $data['statusses'] = ErrorCategory::all();
        return view('issue.new', $data);
    }

    /**
     * Store the problem report in the database.
     *
     * @url:platform
     * @see:phpunit   TODO: Need to write.
     *
     * @param  ErrorValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ErrorValidator $input)
    {
        $error = Errors::create($input->except(['_token']));

        $relation = Errors::find($error->id);
        $relation->label()->associate(1);
        $relation->category()->associate($input->categorie);

        session()->flash('class', 'alert alert-success');
        session()->flash('message', 'Jouw feedback is opgeslagen en word snel behandelt.');

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
}
