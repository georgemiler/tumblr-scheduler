<?php namespace App\Http\Controllers;

use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Support\Facades\App;

class WelcomeController extends Controller
{
    /**
     * Tumblr Client
     *
     * @var \Tumblr\API\Client
     */
    protected $tumblrClient;

    public function __construct(\Tumblr\API\Client $tumblrClient)
    {
        $this->tumblrClient = $tumblrClient;
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
}
