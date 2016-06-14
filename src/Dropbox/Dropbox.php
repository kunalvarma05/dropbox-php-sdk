<?php
namespace Kunnu\Dropbox;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Kunnu\Dropbox\Exceptions\DropboxClientException;
use Kunnu\Dropbox\Http\Clients\DropboxHttpClientFactory;
use Kunnu\Dropbox\Http\Clients\DropboxHttpClientInterface;

class Dropbox
{
    /**
     * OAuth2 Access Token.
     *
     * @var string
     */
    protected $access_token;

    /**
     * Dropbox Client
     *
     * @var \Kunnu\Dropbox\DropboxClient
     */
    protected $client;

    /**
     * Create a new Dropbox instance
     *
     * @param string $access_token Access Token
     * @param \Kunnu\Dropbox\Http\Clients\DropboxHttpClientInterface  $client Client
     */
    public function __construct($access_token, DropboxHttpClientInterface $client = null)
    {
        //Set the access token
        $this->setAccessToken($access_token);

        //Make the HTTP Client
        $httpClient = DropboxHttpClientFactory::make($client);

        //Make and Set the DropboxClient
        $this->client = new DropboxClient($httpClient);
    }

    /**
     * Get the Client
     *
     * @return \Kunnu\Dropbox\DropboxClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get the Access Token.
     *
     * @return string Access Token
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Set the Access Token.
     *
     * @param string $access_token Access Token
     *
     * @return \Kunnu\Dropbox\Dropbox Dropbox Client
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Make Request to the API
     *
     * @param  string $method       HTTP Request Method
     * @param  string $endpoint     API Endpoint to send Request to
     * @param  string $endpointType Endpoint type ['api'|'content']
     * @param  array  $params       Request Query Params
     * @param  string $access_token Access Token to send with the Request
     *
     * @return \Kunnu\Dropbox\DropboxResponse
     *
     * @throws \Kunnu\Dropbox\Exceptions\DropboxClientException
     */
    public function sendRequest($method, $endpoint, $endpointType = 'api', array $params = [], $access_token = null)
    {
        //Access Token
        $access_token = $this->getAccessToken() ? $this->getAccessToken() : $access_token;

        //Make a DropboxRequest object
        $request = new DropboxRequest($method, $endpoint, $access_token, $endpointType, $params);

        //Send Request through the DropboxClient
        //Fetch and return the Response
        return $this->getClient()->sendRequest($request);
    }

}