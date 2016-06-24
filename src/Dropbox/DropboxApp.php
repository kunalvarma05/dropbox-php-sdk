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
     * The Access Token
     *
     * @var string
     */
    protected $accessToken;

    /**
     * Create a new Dropbox instance
     *
     * @param string $clientId    Application Client ID
     * @param string $accessToken Access Token
     */
    public function __construct($clientId, $accessToken = null)
    {
        $this->clientId = $clientId;
        $this->accessToken = $accessToken;
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
     * Get the Access Token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

}