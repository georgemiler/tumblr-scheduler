<?php
namespace App\Providers;

use App\Services\TumblrService;
use Illuminate\Support\ServiceProvider;
use Tumblr\API\Client as TumblrClient;

class TumblrServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\TumblrService', function ($app) {
            \Dotenv::required(['TUMBLR_TOKEN', 'TUMBLR_TOKEN_SECRET']);

            return new TumblrService(new TumblrClient(env('TUMBLR_TOKEN'), env('TUMBLR_TOKEN_SECRET')));
        });
    }

}