<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class LoginController
 * @package App\Http\Controllers
 *
 * TODO: Write phpunit tests
 */
class LoginController extends Controller
{
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all the logins.
     *
     * @url:platform
     * @see:phpunit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['users'] = User::paginate(15);
        return view('users.index', $data);
    }

    /**
     * Destroy User out off the database.
     *
     * @param  int $id the user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        User::destroy($id);

        session()->flash('class', 'alert alert-success');
        session()->flash('message', 'De login is verwijderd.');

        return redirect()->back();
    }
}
