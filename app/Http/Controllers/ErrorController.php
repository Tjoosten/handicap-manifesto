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
     * ErrorController constructor.
     *
     * Auth: Used for the authencation registered routes.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['register', 'store']]);
    }

    /**
     * Backend overview off the possible errors.
     *
     * @url:platform  GET|HEAD: /feedback
     * @see:phpunit   TODO: write test
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dbRelations = ['category', 'label'];
        $data['errors'] = Errors::with($dbRelations)->paginate(15);

        //dd($data['errors']);

        return view('feedback.index', $data);
    }

    /**
     * Show a specific feedback/Error ticket.
     *
     * @url:platform  GET|HEAD:
     * @see:phpunit   TODO Write test
     *
     * @param  int $fid the feedback/error id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($fid)
    {
        return view('feedback.show');
    }

    /**
     * Get the insert form for a possible error.
     *
     * @url:platform  GET|HEAD: /report
     * @see:phpunit   TODO: write test
     */
    public function register()
    {
        $data['statusses'] = ErrorCategory::all();
        return view('issue.new', $data);
    }

    /**
     * Store the problem report in the database.
     *
     * @url:platform  POST: /report
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
