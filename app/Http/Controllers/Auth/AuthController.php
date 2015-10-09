<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\TumblrService;
use App\UserSettings;
use App\User;
use Illuminate\Auth\Guard;
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
     * @var Guard
     */
    protected $auth;

    /**
     * @param TumblrService $tumblrService
     * @param Guard $auth
     */
    public function __construct(TumblrService $tumblrService, Guard $auth)
    {
        $this->middleware('auth', [
            'except' => [
                'getLogin',
                'postLogin',
                'getRegister',
                'postRegister'
            ]
        ]);

        $this->tumblrService = $tumblrService;
        $this->auth = $auth;
    }

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }


    public function tumblrLogin()
    {
        return \Socialize::with('tumblr')->redirect();
    }

    public function tumblrLoginCallback()
    {
        try {
            $tumblrUser = \Socialize::with('tumblr')->user();
            $this->tumblrService->getTumblrClient()->setToken($tumblrUser->token, $tumblrUser->tokenSecret);
            \Auth::user()->settings()->set(UserSettings::TUMBLR_TOKEN, $tumblrUser->token);
            \Auth::user()->settings()->set(UserSettings::TUMBLR_TOKEN_SECRET, $tumblrUser->tokenSecret);
            \Flash::success("Successfully connected your Tumblr account.");
            return redirect()->route('user.settings');
        } catch (\Exception $e) {
            return redirect()->route('user.settings')->withErrors('Unexpected error logging in with Tumblr.');
        }
    }
}
