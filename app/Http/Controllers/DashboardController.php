<?php
namespace App\Http\Controllers;

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

        try {
            $recentLikes = $this->tumblr->getMostRecentLikes();
            $numLikes = $this->tumblr->getNumLikes();
        } catch (\Exception $e) {
        }

        return view('dashboard.index')->with([
            'recentLikes' => $recentLikes,
            'numLikes' => $numLikes
        ]);
    }

}
