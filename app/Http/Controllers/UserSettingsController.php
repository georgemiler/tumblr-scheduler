<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSettingsRequest;
use App\Services\TumblrService;
use App\User;
use Illuminate\Auth\Guard;

class UserSettingsController extends Controller
{
    /**
     * @var User
     */
    protected $User;

    /**
     * @var Guard
     */
    protected $Auth;

    /**
     * @var TumblrService
     */
    protected $TumblrService;

    /**
     * @var UserRepositoryInterface
     */
    protected $UserRepository;

    public function __construct(User $user, Guard $auth, TumblrService $tumblrService)
    {
        $this->Auth = $auth;
        $this->User = $user;
        $this->TumblrService = $tumblrService;

        $this->middleware('auth');
    }

    public function index()
    {
        $user = $this->Auth->getUser();
        $userSettings = $this->Auth->getUser()->settings()->all();
        $canConnectToTumblr = $this->TumblrService->canUserConnect($user);

        return \View::make('user-settings.index', compact('user', 'userSettings', 'canConnectToTumblr'));
    }

    public function store(StoreUserSettingsRequest $request)
    {
        $user = $this->Auth->getUser();
        /* @var $user User */

        if ($user->update(\Input::only(['name', 'email', 'password']))) {
            \Flash::success('Successfully updated user settings.');
            return redirect()->route('user.settings');
        }

        \Flash::error('Error saving user settings.');
        return redirect()->route('user.settings');
    }
}
