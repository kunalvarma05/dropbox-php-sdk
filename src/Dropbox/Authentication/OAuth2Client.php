<?php
namespace Kunnu\Dropbox\Authentication;

use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\Security\RandomStringGeneratorInterface;

class OAuth2Client
{

    /**
     * The Base URL
     *
     * @const string
     */
    const BASE_URL = "https://dropbox.com";

    /**
     * The Dropbox App
     *
     * @var \Kunnu\Dropbox\DropboxApp
     */
    protected $app;

    /**
     * Create a new DropboxApp instance
     *
     * @param \Kunnu\Dropbox\DropboxApp $app
     * @param \Kunnu\Dropbox\Security\RandomStringGeneratorInterface $randStrGenerator
     */
    public function __construct(DropboxApp $app, RandomStringGeneratorInterface $randStrGenerator = null)
    {
        $this->app = $app;
        $this->randStrGenerator = $randStrGenerator;
    }

    /**
     * Build URL
     *
     * @param  string $endpoint
     * @param  array  $params   Query Params
     *
     * @return string
     */
    protected function buildUrl($endpoint = '', array $params = [])
    {
        $queryParams = http_build_query($params);
        return static::BASE_URL . $endpoint . '?' . $queryParams;
    }

    /**
     * Get the Dropbox App
     *
     * @return \Kunnu\Dropbox\DropboxApp
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Get the OAuth2 Authorization URL
     *
     * @param string $redirectUri Callback URL to redirect user after authorization
     * @param string $state       CSRF Token
     * @param array  $params      Additional Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#oauth2-authorize
     *
     * @return string
     */
    public function getAuthorizationUrl($redirectUri, $state = null, array $params = [])
    {
        //Request Parameters
        $params = array_merge([
            'client_id' => $this->getApp()->getClientId(),
            'response_type' => 'code',
            'redirect_uri' => $redirectUri,
            'state' => $state,
            ], $params);

        return $this->buildUrl('/oauth2/authorize', $params);
    }

}