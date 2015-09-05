<?php

namespace App\Services;

use App\Like;
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
        if (empty($user->settings['tumblr.token']) || empty($user->settings['tumblr.token_secret'])) {
            return false;
        }
        return true;
    }

    public function setupUserTumblrConfig(User $user)
    {
        if ($this->userHasTumblrConfigured($user)) {
            $this->getTumblrClient()->setToken($user->settings['tumblr.token'], $user->settings['tumblr.token_secret']);
            return $this;
        }
    }

    /**
     * @return int
     */
    public function getNumLikes()
    {
        return $this->getTumblrClient()->getLikedPosts(['limit' => 1])->liked_count;
    }

    public function getMostRecentLikes($limit = 10)
    {
        return $this->getTumblrClient()->getLikedPosts([
            'limit' => $limit
        ])->liked_posts;
    }

    public function getAllLikedPosts()
    {
        $currentOffset = 0;
        $likes = [];
        $moreLikes = true;

        while ($moreLikes == true) {
            $currentLikes = $this->getTumblrClient()->getLikedPosts([
                'offset' => $currentOffset
            ]);

            $totalNumLikes = $currentLikes->liked_count;

            $currentOffset += count($currentLikes->liked_posts);

            foreach ($currentLikes->liked_posts as $like) {
                $likes[$like->id] = $like;
            }


            if ($currentOffset >= $totalNumLikes) {
                $moreLikes = false;
            }

        }

        return $likes;
    }

    public function syncLikes(Like $likeModel)
    {

    }
}
