<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function tumblrLogin()
    {
        return \Socialize::with('tumblr')->redirect();
    }

    public function tumblrLoginCallback()
    {
        $user = \Socialize::with('tumblr')->user();
        var_dump($user);

        $client = new \Tumblr\API\Client(env('TUMBLR_TOKEN'), env('TUMBLR_TOKEN_SECRET'));
        $client->setToken($user->token, $user->tokenSecret);


        var_dump($client->getUserInfo()->user);



        exit();
    }
}
