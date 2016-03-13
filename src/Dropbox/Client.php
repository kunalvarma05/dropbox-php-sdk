<?php
namespace Kunnu\Dropbox;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client as Guzzle;
use Psr\Http\Message\ResponseInterface;
use Kunnu\Dropbox\Exceptions\DropboxClientException;

class Client
{
    /**
     * Dropbox API Root URL.
     */
    const BASE_PATH = 'https://api.dropboxapi.com/2';

    /**
     * Dropbox API Content Root URL.
     */
    const CONTENT_PATH = 'https://content.dropboxapi.com/2';

    /**
     * The Guzzle Client.
     *
     * @var GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * OAuth2 Access Token.
     *
     * @var string
     */
    private $access_token;

    /**
     * Response Type for API Response.
     *
     * @var string
     */
    private $contentType = 'application/json';

    /**
     * Default options to send along a Request.
     *
     * @var array
     */
    private $defaultOptions = [];

    /**
     * The Constructor.
     *
     * @param string $access_token The Access Token
     * @param Guzzle $guzzle       The Guzzle Client Object
     */
    public function __construct($access_token, Guzzle $guzzle)
    {
        //Set the access token
        $this->setAccessToken($access_token);
        //Set the Guzzle Client
        $this->guzzle = $guzzle;
    }

    /**
     * Get the API Base Path.
     *
     * @return string API Base Path
     */
    public function getBasePath()
    {
        return self::BASE_PATH;
    }

    /**
     * Get the API Content Path.
     *
     * @return string API Content Path
     */
    public function getContentPath()
    {
        return self::CONTENT_PATH;
    }

    /**
     * Set the Default Options.
     *
     * @param array \Kunnu\Dropbox\Client
     *
     * @return array \Kunnu\Dropbox\Client
     */
    public function setDefaultOptions(array $options = array())
    {
        $this->defaultOptions = $options;

        return $this;
    }

    /**
     * Get the Default Options.
     *
     * @return string The Default Options
     */
    public function getDefaultOptions()
    {
        return $this->defaultOptions;
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
     * @return array \Kunnu\Dropbox\Client
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Set the Content Type.
     *
     * @param string $type 'application/json', 'application/xml'
     *
     * @return array \Kunnu\Dropbox\Client
     */
    public function setContentType($type)
    {
        $this->contentType = $type;

        return $this;
    }

    /**
     * Get the Content Type.
     *
     * @return string Content Type
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Get the Authorization Header with the Access Token.
     *
     * @return array Authorization Header
     */
    protected function getAuthHeader()
    {
        return ['Authorization' => 'Bearer '.$this->getAccessToken()];
    }

    /**
     * Get the Content Type Header.
     *
     * @return array Content Type Header
     */
    public function getContentTypeHeader()
    {
        return ['Content-Type' => $this->getContentType()];
    }

    /**
     * Get Default Headers.
     *
     * @return array Default Headers
     */
    protected function getDefaultHeaders()
    {
        return array_merge($this->getAuthHeader(), $this->getContentTypeHeader());
    }

    /**
     * Set the Default Conflict Behavior.
     *
     * @param string $behavior
     */
    public function setDefaultBehavior($behavior)
    {
        $this->defaultBehavior = $behavior;

        return $this;
    }

    /**
     * Get the Default Behavior.
     *
     * @return string Default Behavior
     */
    public function getDefaultBehavior()
    {
        return $this->defaultBehavior;
    }

    /**
     * Build Headers for the API Request.
     *
     * @param array $headers Additional Headers
     *
     * @return array Merged additonal and default headers
     */
    protected function buildHeaders($headers = [])
    {
        //Override the Default Response Type, if provided
        if (array_key_exists('Content-Type', $headers)) {
            $this->setContentType($headers['Content-Type']);
        }

        return array_merge($headers, $this->getDefaultHeaders());
    }

    /**
     * Build URL for the Request.
     *
     * @param string $path Relative API path or endpoint
     *
     * @return string The Full URL
     */
    protected function buildUrl($path = '')
    {
        return $this->getBasePath().$path;
    }

    /**
     * Build Options.
     *
     * @param array $options Additional Options
     *
     * @return array Merged Additional Options
     */
    protected function buildOptions($options)
    {
        return array_merge($options, $this->getDefaultOptions());
    }

    /**
     * Make Request to the API using Guzzle.
     *
     * @param string                          $method  Method Type [GET|POST|PUT|DELETE]
     * @param null|string|UriInterface        $uri     URI for the Request
     * @param array                           $params  Options to send along the request
     * @param string|resource|StreamInterface $body    Message Body
     * @param array                           $headers Headers for the message
     *
     * @throws Exception
     *
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function makeRequest($method, $uri, $options = [], $body = null, $headers = [])
    {
        //Build headers
        $headers = $this->buildHeaders($headers);

        //Create a new Request Object
        $request = new Request($method, $uri, $headers, $body);

        //Build Options
        $options = $this->buildOptions($options);

        try {
            //Send the Request
            return $this->guzzle->send($request, $options);
        } catch (\Exception $e) {
            var_dump($e);
            exit();
        }
    }

    /**
     * Decode the Response.
     *
     * @param string|\Psr\Http\Message\ResponseInterface $response Response object or string to decode
     *
     * @return string
     */
    protected function decodeResponse($response)
    {
        $body = $response;
        if ($response instanceof ResponseInterface) {
            $body = $response->getBody();
        }

        return json_decode((string) $body);
    }

    /**
     * Returns the metadata for a file or folder.
     * @param  string  $path       The path of a file or folder on Dropbox.
     * @param  array   $bodyParams Additional Body Params
     * @return Object
     */
    public function getMetadata($path, array $bodyParams = array()){
        if ($path == '') {
            throw new DropboxClientException('A Valid Path is Required!');
        }

        $endpoint = "/files/get_metadata";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Returns the contents of a folder.
     * @param  string  $path        The path to the folder you want to see the contents of.
     * @param  array   $bodyParams Additional Body Params
     * @return Object
     */
    public function listFolder($path, array $bodyParams = array()){
        $endpoint = "/files/list_folder";

        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Paginate through all the folder contents using a cursor
     * @param  string  $cursor  The cursor retrieved from listFolder
     * @return Object
     */
    public function listFolderContinue($cursor){
        if ($cursor == '') {
            throw new DropboxClientException('A Valid Cursor is Required!');
        }

        $endpoint = "/files/list_folder/continue";

        $uri = $this->buildUrl($endpoint);

        $bodyParams['cursor'] = $cursor;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * A way to quickly get a cursor for the folder's state.
     * @param  string  $path        The path to the folder you want to see the contents of.
     * @param  array   $bodyParams Additional Body Params
     * @return Object
     */
    public function listFolderLatestCursor($path, array $bodyParams = array()){
        $endpoint = "/files/list_folder/get_latest_cursor";

        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

}