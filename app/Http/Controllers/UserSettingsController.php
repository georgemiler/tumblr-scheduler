<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Guard;

class UserSettingsController extends Controller
{
    /**
     * User model
     *
     * @var \App\User
     */
    protected $User;

    protected $Auth;

    public function __construct(User $user, Guard $auth)
    {
        $this->Auth = $auth;
        $this->User = $user;

        $this->middleware('auth');
    }

    public function index()
    {
        $userSettings = $this->Auth->getUser()->settings()->all();

        return view('user-settings.index')->with('userSettings', $userSettings);
    }

    public function store()
    {

    }
}
