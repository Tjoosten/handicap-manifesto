<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileSettingsUpdate;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

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
     * Change profile settings view.
     *
     * @urk:platform  GET|HEAD:
     * @see:phpunit   TODO: Write test
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $data['user'] = auth()->user();
        return view('users.update', $data);
    }

    /**
     * Change the profile settings in the database.
     *
     * @url:platform  POST:
     * @see:phpunit   TODO: Write test.
     *
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $infoValidator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255',
        ]);

        if ($infoValidator->fails()) {
            return redirect()->back()->withErrors($infoValidator)->withInput();
        }

        $user   = auth()->user();
        $filter = ['_token', 'password_confirmation'];

        User::find($user->id)->update($request->except($filter));

        session()->flash('class', 'alert alert-success');
        session()->flash('message', 'Uw profile is bijgewerkt.');

        return redirect()->back();
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
