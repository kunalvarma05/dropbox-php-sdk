<?php
namespace Kunnu\Dropbox\Authentication;

use Kunnu\Dropbox\Store\PersistentDataStoreInterface;
use Kunnu\Dropbox\Security\RandomStringGeneratorInterface;

class DropboxAuthHelper
{
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
     * @param  string $extraState  Additional User Provided State Data
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#oauth2-authorize
     *
     * @return string
     */
    public function getAuthUrl($redirectUri, array $params = [], $extraState = null)
    {
        //Get CSRF State Token
        $state = $this->getCsrfToken();

        //Set the CSRF State Token in the Persistent Data Store
        $this->getPersistentDataStore()->set('state', $state);

        //Additional User Provided State Data
        if (!is_null($extraState)) {
            $state .= "|";
            $state .= $extraState;
        }

        //Get OAuth2 Authorization URL
        return $this->getOAuth2Client()->getAuthorizationUrl($redirectUri, $state, $params);
    }

}