<?php

namespace App\Http\Middleware;

use App\Services\TumblrService;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\UrlGenerator;
use Szykra\Notifications\FlashNotifier;

class CheckTumblrSettings
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var TumblrService
     */
    protected $tumblr;

    /**
     * @var FlashNotifier
     */
    protected $flash;

    /**
     * @var UrlGenerator
     */
    protected $url;

    public function __construct(Guard $auth, TumblrService $tumblr, FlashNotifier $flash, UrlGenerator $url)
    {
        $this->auth = $auth;
        $this->tumblr = $tumblr;
        $this->flash = $flash;
        $this->url = $url;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            $user = $this->auth->user();
            if ($this->tumblr->canUserConnect($user)) {
                $this->tumblr->setupUserTumblrConfig($user);
            } else {
                $authTumblrUrl = $this->url->route('auth.tumblr');
                $this->flash->warning("You have not configured your Tumblr account yet. <a href='{$authTumblrUrl}'>Click here to authenticate with Tumblr.</a>");
            }
        }


        return $next($request);
    }
}
