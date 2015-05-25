<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tumblr\API\Client as TumblrClient;

class TumblrServiceProvider extends ServiceProvider {

    /**
     * Register
     */
    public function register() {
        \Dotenv::required(['TUMBLR_CONSUMER_KEY', 'TUMBLR_CONSUMER_SECRET', 'TUMBLR_TOKEN', 'TUMBLR_TOKEN_SECRET']);

        $this->app->singleton('Tumblr\API\Client', function ($app) {
            return new TumblrClient(env('TUMBLR_CONSUMER_KEY'), env('TUMBLR_CONSUMER_SECRET'), env('TUMBLR_TOKEN'), env('TUMBLR_TOKEN_SECRET'));
        });
    }
}
