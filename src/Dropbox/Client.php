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
    protected function buildUrl($path = '', $type = "api")
    {
        $base = $this->getBasePath();
        if($type === "content"){
            $base = $this->getContentPath();
        }
        return $base.$path;
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

    /**
     * Returns revisions of a file
     * @param  string  $path        The path to the file you want to see the revisions of.
     * @param  array   $bodyParams Additional Body Params
     * @return Object
     */
    public function listRevisions($path, array $bodyParams = array()){
        $endpoint = "/files/list_revisions";

        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Create folder at the given path
     * @param  string $path Path to create the folder at
     * @return Object
     */
    public function createFolder($path){
        $endpoint = "/files/create_folder";

        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Move a file or folder to a different location in the user's Dropbox.
     * @param  string $fromPath Source Path
     * @param  string $toPath   Destination Path
     * @return Object
     */
    public function move($fromPath, $toPath){
        $endpoint = "/files/move";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['from_path'] = $fromPath;
        $bodyParams['to_path'] = $toPath;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Copy a file or folder to a different location in the user's Dropbox.
     * @param  string $fromPath Source Path
     * @param  string $toPath   Destination Path
     * @return Object
     */
    public function copy($fromPath, $toPath){
        $endpoint = "/files/copy";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['from_path'] = $fromPath;
        $bodyParams['to_path'] = $toPath;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Delete a file or folder
     * @param  string $path File or Folder Path
     * @return Object
     */
    public function delete($path){
        $endpoint = "/files/delete";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Restore a file or folder to a specific revision
     * @param  string $path File or Folder Path
     * @param  string $rev  Revision
     * @return Object
     */
    public function restore($path, $rev){
        $endpoint = "/files/restore";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $bodyParams['rev'] = $rev;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Search a folder
     * @param  string $path  Folder Path to search
     * @param  string $query Search Query
     * @return Object
     */
    public function search($path, $query, array $bodyParams = array()){
        $endpoint = "/files/search";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $bodyParams['query'] = $query;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

    /**
     * Create a new file with the contents provided in the request.
     * @param  string $path         Path in the user's Dropbox to save the file.
     * @param  string $file         Path to the local file to upload.
     * @param  array  $headerParams Additional Params
     * @return Object
     */
    public function upload($path, $file, array $headerParams = array()){
        $endpoint = "/files/upload";
        $uri = $this->buildUrl($endpoint, "content");

        $headerParams['path'] = $path;
        $headerArg = json_encode($headerParams);
        $headers = ["Dropbox-API-Arg" => $headerArg];

        //Switch content type
        $defaultContentType = $this->getContentType();
        $this->setContentType("application/octet-stream");

        //Upload file as stream
        $body = fopen($file, "r");

        $response = $this->makeRequest('POST', $uri, [], $body, $headers);
        $responseContent = $this->decodeResponse($response);

        //Reset content type
        $this->setContentType($defaultContentType);
        return $responseContent;
    }

    /**
     * Download a file
     * @param  string $path Path in the user's Dropbox to save the file.
     * @return Resource
     */
    public function download($path){
        $endpoint = "/files/download";
        $uri = $this->buildUrl($endpoint, "content");

        $headerParams['path'] = $path;
        $headerArg = json_encode($headerParams);
        $headers = ["Dropbox-API-Arg" => $headerArg];
        $this->setContentType('');

        $response = $this->makeRequest('POST', $uri, [], "", $headers);

        $stream = $response->getBody();

        $downloadedFile = fopen('php://temp', 'w+');

        if ($downloadedFile === false) {
            throw new \Exception('Error when saving the downloaded file');
        }

        while (!$stream->eof()) {
            $writeResult = fwrite($downloadedFile, $stream->read(8000));
            if ($writeResult === false) {
                throw new \Exception('Error when saving the downloaded file');
            }
        }

        $stream->close();
        rewind($downloadedFile);

        return $downloadedFile;
    }

    /**
     * Create a sharing link
     * @param  string $path     File Path
     * @param  array  $settings Settings
     * @return Object
     */
    public function createSharingLink($path, array $settings = array()){
        $endpoint = "/sharing/create_shared_link_with_settings";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $bodyParams['settings'] = (object) $settings;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }


    /**
     * List Sharing Links of a File
     * @param  string $path       File Path
     * @param  array  $bodyParams Additional Body Params
     * @return Object
     */
    public function listSharingLinks($path, array $bodyParams = array()){
        $endpoint = "/sharing/list_shared_links";
        $uri = $this->buildUrl($endpoint);

        $bodyParams['path'] = $path;
        $body = json_encode($bodyParams);

        $response = $this->makeRequest('POST', $uri, [], $body);
        $responseContent = $this->decodeResponse($response);

        return $responseContent;
    }

}