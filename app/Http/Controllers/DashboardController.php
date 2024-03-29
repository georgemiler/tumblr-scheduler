<?php
namespace App\Http\Controllers;

use App\Like;
use App\Services\TumblrService;

class DashboardController extends Controller
{

    /**
     * @var TumblrService
     */
    protected $tumblr;

    /**
     * Constructor
     */
    public function __construct(TumblrService $tumblr)
    {
        $this->tumblr = $tumblr;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $recentLikes = [];
        $numLikes = 0;



        return view('dashboard.index')->with([
            'recentLikes' => $recentLikes,
            'numLikes' => $numLikes
        ]);
    }

}
