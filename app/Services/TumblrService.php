<?php

namespace App\Services;

use App\User;
use Tumblr\API\Client;

class TumblrService {

    /**
     * Tumblr API Client
     *
     * @var Client
     */
    protected $tumblrClient;

    public function __construct(Client $tumblrClient)
    {
        $this->tumblrClient = $tumblrClient;
    }

    public function getTumblrClient()
    {
        return $this->tumblrClient;
    }

    public function userHasTumblrConfigured(User $user)
    {

    }
}
