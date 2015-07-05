<?php

namespace App;

use Exception;

class UserSettings
{

    const TUMBLR_CONSUMER_KEY = 'tumblr.consumer_key';
    const TUMBLR_CONSUMER_SECRET = 'tumblr.consumer_secret';
    const TUMBLR_TOKEN = 'tumblr.token';
    const TUMBLR_TOKEN_SECRET = 'tumblr.token_secret';

    /**
     * @var User
     */
    protected $User;

    /**
     * @var array|mixed|string
     */
    protected $settings = [];

    /**
     * Allowed setting keys.
     *
     * @var array
     */
    protected $allowedSettings = [
        self::TUMBLR_CONSUMER_KEY,
        self::TUMBLR_CONSUMER_SECRET,
        self::TUMBLR_TOKEN,
        self::TUMBLR_TOKEN_SECRET
    ];

    /**
     * Constructor
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->User = $user;
        $this->settings = $this->User->settings;
    }

    /**
     * Get a given setting.
     *
     * @param string $key
     * @return string
     */
    public function get($key)
    {
        return array_get($this->settings, $key);
    }

    /**
     * Create and persist a setting.
     *
     * @param string $key
     * @param string $value
     * @return mixed
     * @throws Exception
     */
    public function set($key, $value)
    {
        if (in_array($key, $this->allowedSettings)) {
            $this->settings[$key] = $value;
            return $this->persist();
        }

        throw new Exception("Invalid setting key: {$key}");
    }

    /**
     * Determine if the given setting exists.
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->settings);
    }

    /**
     * Retrive an array of all settings.
     *
     * @return array
     */
    public function all()
    {
        return $this->settings;
    }

    /**
     * Merge the given attributes with the current settings.
     * But do not assign any new settings.
     *
     * @param array $attributes
     * @return mixed
     */
    public function merge(array $attributes)
    {
        $this->settings = array_merge(
            $this->settings,
            array_only($attributes, $this->allowedSettings)
        );

        return $this->persist();
    }

    /**
     * Persist the settings.
     *
     * @return mixed
     */
    public function persist()
    {
        return $this->User->update(['settings' => $this->settings]);
    }

    /**
     * Magic property access for settings.
     *
     * @param string $key
     * @return string
     * @throws Exception
     */
    public function __get($key)
    {
        if ($this->has($key)) {
            return $this->get($key);
        }

        throw new Exception("The {$key} setting does not exist.");
    }
}
