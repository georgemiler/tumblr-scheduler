<?php
namespace App\Http\Controllers;


use App\Repositories\User\UserRepositoryInterface;
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

        $canConnectToTumblr = false;
        if ($this->TumblrService->canUserConnect($user)) {
            $canConnectToTumblr = true;
        }

        return \View::make('user-settings.index', compact('user', 'userSettings', 'canConnectToTumblr'));
    }

    public function store()
    {
        $user = $this->Auth->getUser();

        $data = \Input::all();
        var_dump($data);


    }
}
