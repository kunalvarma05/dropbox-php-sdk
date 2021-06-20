<?php
namespace Kunnu\Dropbox;

class DropboxApp
{

    /**
     * The Client ID of the App
     *
     * @link https://www.dropbox.com/developers/apps
     *
     * @var string
     */
    protected $clientId;

    /**
     * The Client Secret of the App
     *
     * @link https://www.dropbox.com/developers/apps
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * The Access Token
     *
     * @var string
     */
    protected $accessToken;

    /**
     * The Refresh Token is a long-lived token that can be used to request new short-lived access tokens without
     * direct interaction from a user in your app.
     *
     * @var string
     */
    protected $refreshToken;

    /**
     * Create a new Dropbox instance
     *
     * @param string $clientId     Application Client ID
     * @param string $clientSecret Application Client Secret
     * @param string $accessToken  Access Token
     */
    public function __construct($clientId, $clientSecret, $accessToken = null, $refreshToken = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    /**
     * Get the App Client ID
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Get the App Client Secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Get the Access Token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Get the long lived Refresh Token
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}
