<?php

namespace App\Http\Controllers;

use App\ErrorCategory;
use App\Errors;
use App\Http\Requests\ErrorValidator;
use Github\Client;
use GrahamCampbell\GitHub\Facades\GitHub;
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
        $dbRelations        = ['category', 'label'];
        $data['errors']     = Errors::with($dbRelations)->paginate(15);
        $data['categories'] = ErrorCategory::all();

        //dd($data['errors']);

        return view('feedback.index', $data);
    }

    /**
     * Show a specific feedback/Error ticket.
     *
     * @url:platform  GET|HEAD: /feedback/{id}
     * @see:phpunit   TODO Write test
     *
     * @param  int $fid the feedback/error id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($fid)
    {
        $dbRelations  = ['category', 'label'];
        $data['item'] = Errors::with($dbRelations)->find($fid);

        //dd($data['item']);

        return view('feedback.show', $data);
    }

    /**
     * Push the error/feedback to github. So developers can handle it.
     * ------
     * - No phpunit test needed because the github API works all the time.
     *
     * @url:platform  GET|HEAD: /feedback/push/{id}
     *
     * @param  int $fid the feedback/error id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pushGithub($fid)
    {
        // Github credentails.
        $username = env('GH_USERNAME');
        $password = env('GH_PASSWORD');

        // Get the report data:
        $report = Errors::find($fid);

        // Set the push data:
        $push['title'] = "Platform issue nr. $report->id";
        $push['body']  = $report->melding;

        // Github push hook.
        $github = new Client();
        $github->authenticate($username, $password, Client::AUTH_HTTP_PASSWORD );
        $github->api('issue')->create('Tjoosten', 'Handicap-manifesto', $push);

        if ($github) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'Het rapport is doorgestoken naar GitHub');
        }

        return redirect()->route('feedback.show', ['id' => $report->id]);
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
        // TODO: Register the creation handling to the database.
        // TODO: Register a notification to all the crew members with a login.

        // Ticket Statuses:
        // ------
        // 1 = Open
        // 0 = closed

        // Notification.
        // ------
        // ! auth()->check()  = User is not logged in.
        // auth()->check()    = User is logged in.
        if (auth()->check()) {
            //
        }

        $error  = Errors::create($input->except('_token'));
        $status = Errors::find($error->id)->update(['status' => 1]);

        $relation = Errors::find($error->id);
        $relation->label()->associate(1);
        $relation->category()->associate($input->categorie);

        if ($error && $status) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'Jouw feedback is opgeslagen en word snel behandelt.');
        }

        return redirect()->back();
    }

    /**
     * Change the status for the issue report.
     *
     * @url:platform  GET|HEAD: /feedback/{status}/{fid}
     * @see:phpunit   TODO: Write phpunit test
     *
     * @param  int    $fid    The feedback ticket id in the database.
     * @param  string $status Status for the ticket. Closed or open.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($status, $fid)
    {
        // TODO: Notification that a crew member changed the fedback status.

        // Ticket Statuses:
        // ------
        // 1 = Open
        // 0 = closed

        if($status == 'open') {
            $class   = 'alert alert-success';
            $message = 'het ticket heeft nu de status "Open"';

            Errors::find($fid)->update(['status' => 1]);
        } elseif ($status = 'close') {
            $class   = 'alert alert-success';
            $message = 'het ticket heeft nu de status "Gesloten"';

            Errors::find($fid)->update(['status' => 0]);
        } else {
            $class   = 'alert alert-danger';
            $message = 'Invalide parameter. ';
        }

        session()->flash('class', $class);
        session()->flash('message', $message);

        return redirect()->back();
    }
}
