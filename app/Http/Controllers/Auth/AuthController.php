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
}
