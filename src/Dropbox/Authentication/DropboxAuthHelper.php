<?php
namespace Kunnu\Dropbox\Authentication;

use Kunnu\Dropbox\Models\AccessToken;
use Kunnu\Dropbox\Exceptions\DropboxClientException;
use Kunnu\Dropbox\Store\PersistentDataStoreInterface;
use Kunnu\Dropbox\Security\RandomStringGeneratorInterface;

class DropboxAuthHelper
{
    /**
     * Access token type online param will returns a short lived access token that
     * require the user to reauthenticate once expired.
     *
     * @var string
     */
    CONST TOKEN_ACCESS_TYPE_ONLINE = 'online';

    /**
     * Access token type offline returns short lived access token and a refresh token that can be used
     * to generate a new access token once the original is expired
     *
     */
    CONST TOKEN_ACCESS_TYPE_OFFLINE = 'offline';

    /**
     * Grant type used for fetching new access token
     */
    CONST GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    /**
     * Grant type for fetching a new token based on an existing refresh token
     */
    CONST GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';

    /**
     * The length of CSRF string
     *
     * @const int
     */
    const CSRF_LENGTH = 32;

    /**
     * OAuth2 Client
     *
     * @var \Kunnu\Dropbox\Authentication\OAuth2Client
     */
    protected $oAuth2Client;

    /**
     * Random String Generator
     *
     * @var \Kunnu\Dropbox\Security\RandomStringGeneratorInterface
     */
    protected $randomStringGenerator;

    /**
     * Persistent Data Store
     *
     * @var \Kunnu\Dropbox\Store\PersistentDataStoreInterface
     */
    protected $persistentDataStore;

    /**
     * Additional User Provided State
     *
     * @var string
     */
    protected $urlState = null;

    /**
     * The selected access token type to be used when authenticating.
     *
     * If omitted (null), Dropbox  response will default to returning a long-lived access_token
     * if they are allowed in the app console.
     * If long-lived access tokens are disabled in the app console, this parameter defaults to online.
     *
     * @var string $accessTokeenType
     */
    protected $accessTokenType = null;

    /**
     * Create a new DropboxAuthHelper instance
     *
     * @param \Kunnu\Dropbox\Authentication\OAuth2Client             $oAuth2Client
     * @param \Kunnu\Dropbox\Security\RandomStringGeneratorInterface $randomStringGenerator
     * @param \Kunnu\Dropbox\Store\PersistentDataStoreInterface      $persistentDataStore
     */
    public function __construct(
        OAuth2Client $oAuth2Client,
        RandomStringGeneratorInterface $randomStringGenerator = null,
        PersistentDataStoreInterface $persistentDataStore = null
        ) {
        $this->oAuth2Client = $oAuth2Client;
        $this->randomStringGenerator = $randomStringGenerator;
        $this->persistentDataStore = $persistentDataStore;
    }

    /**
     * Get OAuth2Client
     *
     * @return \Kunnu\Dropbox\Authentication\OAuth2Client
     */
    public function getOAuth2Client()
    {
        return $this->oAuth2Client;
    }

    /**
     * Get the Random String Generator
     *
     * @return \Kunnu\Dropbox\Security\RandomStringGeneratorInterface
     */
    public function getRandomStringGenerator()
    {
        return $this->randomStringGenerator;
    }

    /**
     * Get the Persistent Data Store
     *
     * @return \Kunnu\Dropbox\Store\PersistentDataStoreInterface
     */
    public function getPersistentDataStore()
    {
        return $this->persistentDataStore;
    }

    /**
     * Get CSRF Token
     *
     * @return string
     */
    protected function getCsrfToken()
    {
        $generator = $this->getRandomStringGenerator();

        return $generator->generateString(static::CSRF_LENGTH);
    }

    /**
     * Get Authorization URL
     *
     * @param  string $redirectUri Callback URL to redirect to after authorization
     * @param  array  $params      Additional Params
     * @param  string $urlState  Additional User Provided State Data
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#oauth2-authorize
     *
     * @return string
     */
    public function getAuthUrl($redirectUri = null, array $params = [], $urlState = null)
    {
        // If no redirect URI
        // is provided, the
        // CSRF validation
        // is being handled
        // explicitly.
        $state = null;

        // Redirect URI is provided
        // thus, CSRF validation
        // needs to be handled.
        if (!is_null($redirectUri)) {
            //Get CSRF State Token
            $state = $this->getCsrfToken();

            //Set the CSRF State Token in the Persistent Data Store
            $this->getPersistentDataStore()->set('state', $state);

            //Additional User Provided State Data
            if (!is_null($urlState)) {
                $state .= "|";
                $state .= $urlState;
            }
        }

        // Adding the token access type
        if ($this->accessTokenType != null && !array_key_exists('token_access_type', $params))
            $params['token_access_type'] = $this->accessTokenType;

        //Get OAuth2 Authorization URL
        return $this->getOAuth2Client()->getAuthorizationUrl($redirectUri, $state, $params);
    }

    /**
     * Decode State to get the CSRF Token and the URL State
     *
     * @param  string $state State
     *
     * @return array
     */
    protected function decodeState($state)
    {
        $csrfToken = $state;
        $urlState = null;

        $splitPos = strpos($state, "|");

        if ($splitPos !== false) {
            $csrfToken = substr($state, 0, $splitPos);
            $urlState = substr($state, $splitPos + 1);
        }

        return ['csrfToken' => $csrfToken, 'urlState' => $urlState];
    }

    /**
     * Validate CSRF Token
     * @param  string $csrfToken CSRF Token
     *
     * @throws DropboxClientException
     *
     * @return void
     */
    protected function validateCSRFToken($csrfToken)
    {
        $tokenInStore = $this->getPersistentDataStore()->get('state');

        //Unable to fetch CSRF Token
        if (!$tokenInStore || !$csrfToken) {
            throw new DropboxClientException("Invalid CSRF Token. Unable to validate CSRF Token.");
        }

        //CSRF Token Mismatch
        if ($tokenInStore !== $csrfToken) {
            throw new DropboxClientException("Invalid CSRF Token. CSRF Token Mismatch.");
        }

        //Clear the state store
        $this->getPersistentDataStore()->clear('state');
    }

    /**
     * Get Access Token
     *
     * @param  string $code        Authorization Code or refresh token (when grantType is DropboxAuthHelper::GRANT_TYPE_REFRESH_TOKEN
     * @param  string $state       CSRF & URL State
     * @param  string $redirectUri Redirect URI used while getAuthUrl
     * @param  string $grantType   Use either DropboxAuthHelper::GRANT_TYPE_AUTHORIZATION_CODE for new token
     *                             or DropboxAuthHelper::GRANT_TYPE_REFRESH_TOKEN for refreshing offline token.
     *
     * @return \Kunnu\Dropbox\Models\AccessToken
     */
    public function getAccessToken($code, $state = null, $redirectUri = null, $grantType = DropboxAuthHelper::GRANT_TYPE_AUTHORIZATION_CODE)
    {
        // No state provided
        // Should probably be
        // handled explicitly
        if (!is_null($state)) {
            //Decode the State
            $state = $this->decodeState($state);

            //CSRF Token
            $csrfToken = $state['csrfToken'];

            //Set the URL State
            $this->urlState = $state['urlState'];

            //Validate CSRF Token
            $this->validateCSRFToken($csrfToken);
        }

        //Fetch Access Token
        $accessToken = $this->getOAuth2Client()->getAccessToken($code, $redirectUri, $grantType);

        //Make and return the model
        return new AccessToken($accessToken);
    }

    /**
     * Revoke Access Token
     *
     * @return void
     */
    public function revokeAccessToken()
    {
        $this->getOAuth2Client()->revokeAccessToken();
    }

    /**
     * Get URL State
     *
     * @return string
     */
    public function getUrlState()
    {
        return $this->urlState;
    }

    /**
     * Set the access token type to be either
     * DropboxAuthHelper::TOKEN_ACCESS_TYPE_ONLINE (default) or DropboxAuthHelper::TOKEN_ACCESS_TYPE_OFFLINE
     *
     * @param $tokenType string
     */
    public function setAccessTokenType($tokenType = self::TOKEN_ACCESS_TYPE_ONLINE) {
        if ($tokenType != self::TOKEN_ACCESS_TYPE_ONLINE && $tokenType != self::TOKEN_ACCESS_TYPE_OFFLINE)
            throw new \InvalidArgumentException("TokenType parameter must be either DropboxAuthHelper::TOKEN_ACCESS_TYPE_ONLINE or DropboxAuthHelper::TOKEN_ACCESS_TYPE_OFFLINE");

        $this->accessTokenType = $tokenType;
    }
}
