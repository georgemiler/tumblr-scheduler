<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\TumblrService;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/';

    /**
     * @var Client
     */
    protected $tumblrService;

    /**
     * Constructor
     */
    public function __construct(TumblrService $tumblrService)
    {
        $this->middleware('guest', [
            'except' => [
                'getLogout',
                'tumblrLogin',
                'tumblrLoginCallback'
            ]
        ]);

        $this->tumblrService = $tumblrService;
    }

    public function tumblrLogin()
    {
        return \Socialize::with('tumblr')->redirect();
    }

    public function tumblrLoginCallback()
    {
        $user = \Socialize::with('tumblr')->user();
        $this->tumblrService->getTumblrClient()->setToken($user->token, $user->tokenSecret);
        var_dump($this->tumblrService->getTumblrClient()->getUserInfo());

        exit();
    }
}
