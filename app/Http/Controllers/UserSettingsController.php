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

    /**
     * Guard instance
     *
     * @var Guard
     */
    protected $Auth;

    public function __construct(User $user, Guard $auth)
    {
        $this->Auth = $auth;
        $this->User = $user;

        $this->middleware('auth');
    }

    public function index()
    {
        $user = $this->Auth->getUser();
        $userSettings = $this->Auth->getUser()->settings()->all();

        return \View::make('user-settings.index', compact('user', 'userSettings'));
    }

    public function store()
    {
        var_dump(\Input::all());
    }
}
