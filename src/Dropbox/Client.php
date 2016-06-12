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
     * @return \Kunnu\Dropbox\Client Dropbox Client
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
     * @return \Kunnu\Dropbox\Client Dropbox Client
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Set the Content Type.
     *
     * @param string $type 'application/json'|'application/xml'
     *
     * @return \Kunnu\Dropbox\Client Dropbox Client
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
        //Override the Default Content Type, if provided
        if (array_key_exists('Content-Type', $headers)) {
            $this->setContentType($headers['Content-Type']);
        }

        return array_merge($headers, $this->getDefaultHeaders());
    }

    /**
     * Build URL for the Request.
     *
     * @param string $path Relative API path or endpoint
     * @param string $type Endpoint Type
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#formats Request and response formats
     *
     * @return string The Full URL
     */
    protected function buildUrl($path = '', $type = 'api')
    {
        //Get the base path
        $base = $this->getBasePath();

        //If the endpoint type is 'content'
        if ($type === 'content') {
            //Get the Content Path
            $base = $this->getContentPath();
        }

        //Join and return the base and api path/endpoint
        return $base . $path;
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
        //Response must be string
        $body = $response;

        //Response is an instance of ResponseInterface
        if ($response instanceof ResponseInterface) {
            //Fetch the body
            $body = $response->getBody();
        }

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        return json_decode((string) $body);
    }

    /**
     * Returns the metadata for a file or folder.
     *
     * @param string $path       The path of a file or folder on Dropbox.
     * @param array  $bodyParams Additional Body Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-get_metadata
     *
     * @return object
     */
    public function getMetadata($path, array $bodyParams = array())
    {
        //If the path is not specified
        if ($path == '') {
            throw new DropboxClientException('A Valid Path is Required!');
        }

        //Metadata Endpoint
        $endpoint = '/files/get_metadata';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Returns the contents of a folder.
     *
     * @param string $path       The path to the folder you want to see the contents of.
     * @param array  $bodyParams Additional Body Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder
     *
     * @return object
     */
    public function listFolder($path, array $bodyParams = array())
    {
        //List Folder Endpoint
        $endpoint = '/files/list_folder';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Paginate through all the folder contents using a cursor.
     *
     * @param string $cursor The cursor retrieved from listFolder
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-continue
     *
     * @return object
     */
    public function listFolderContinue($cursor)
    {
        //If a cursor isn't provided
        if ($cursor == '') {
            throw new DropboxClientException('A Valid Cursor is Required!');
        }

        //List Folder Continue Endpoint
        $endpoint = '/files/list_folder/continue';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the cursor
        $bodyParams['cursor'] = $cursor;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request the fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * A way to quickly get a cursor for the folder's state.
     *
     * @param string $path       The path to the folder you want to see the contents of.
     * @param array  $bodyParams Additional Body Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-get_latest_cursor
     *
     * @return object
     */
    public function listFolderLatestCursor($path, array $bodyParams = array())
    {
        //List Folder Latest Cursor Endpoint
        $endpoint = '/files/list_folder/get_latest_cursor';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Returns revisions of a file.
     *
     * @param string $path       The path to the file you want to see the revisions of.
     * @param array  $bodyParams Additional Body Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_revisions
     *
     * @return object
     */
    public function listRevisions($path, array $bodyParams = array())
    {
        //List Revisions endpoint
        $endpoint = '/files/list_revisions';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Create folder at the given path.
     *
     * @param string $path Path to create the folder at
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-create_folder
     *
     * @return object
     */
    public function createFolder($path)
    {
        //Create folder endpoint
        $endpoint = '/files/create_folder';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Move a file or folder to a different location in the user's Dropbox.
     *
     * @param string $fromPath Source Path
     * @param string $toPath   Destination Path
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-move
     *
     * @return object
     */
    public function move($fromPath, $toPath)
    {
        //Move File Endpoint
        $endpoint = '/files/move';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the from and to paths
        $bodyParams['from_path'] = $fromPath;
        $bodyParams['to_path'] = $toPath;

        //JSON encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Copy a file or folder to a different location in the user's Dropbox.
     *
     * @param string $fromPath Source Path
     * @param string $toPath   Destination Path
     *
     * https://www.dropbox.com/developers/documentation/http/documentation#files-copy
     *
     * @return object
     */
    public function copy($fromPath, $toPath)
    {
        //Copy file endpoint
        $endpoint = '/files/copy';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the from and to path
        $bodyParams['from_path'] = $fromPath;
        $bodyParams['to_path'] = $toPath;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Delete a file or folder.
     *
     * @param string $path File or Folder Path
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-delete
     *
     * @return object
     */
    public function delete($path)
    {
        //Delte file endpoint
        $endpoint = '/files/delete';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Restore a file or folder to a specific revision.
     *
     * @param string $path File or Folder Path
     * @param string $rev  Revision
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-restore
     *
     * @return object
     */
    public function restore($path, $rev)
    {
        //Restore File Path
        $endpoint = '/files/restore';

        //Build the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path and rev(revision) param
        $bodyParams['path'] = $path;
        $bodyParams['rev'] = $rev;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Search a folder.
     *
     * @param string $path  Folder Path to search
     * @param string $query Search Query
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-search
     *
     * @return object
     */
    public function search($path, $query, array $bodyParams = array())
    {
        //File Search Endpoint
        $endpoint = '/files/search';

        //Built the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path and query param
        $bodyParams['path'] = $path;
        $bodyParams['query'] = $query;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Create a new file with the contents provided in the request.
     *
     * @param string $path         Path in the user's Dropbox to save the file.
     * @param string $file         Path to the local file to upload.
     * @param array  $headerParams Additional Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-upload
     *
     * @return object
     */
    public function upload($path, $file, array $headerParams = array())
    {
        //File Upload Endpoint
        $endpoint = '/files/upload';

        //Build the URI
        $uri = $this->buildUrl($endpoint, 'content');

        //Set the required headers
        $headerParams['path'] = $path;
        $headerArg = json_encode($headerParams);
        $headers = ['Dropbox-API-Arg' => $headerArg];

        //Switch content type
        $defaultContentType = $this->getContentType();
        $this->setContentType('application/octet-stream');

        //Upload file as stream
        $body = fopen($file, 'r');

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body, $headers);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Reset content type
        $this->setContentType($defaultContentType);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * Download a file.
     *
     * @param string $path Path in the user's Dropbox to save the file.
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-download
     *
     * @return resource
     */
    public function download($path)
    {
        //Download File Endpoint
        $endpoint = '/files/download';

        //Build the URI
        $uri = $this->buildUrl($endpoint, 'content');

        //Set the required headers
        $headerParams['path'] = $path;
        $headerArg = json_encode($headerParams);
        $headers = ['Dropbox-API-Arg' => $headerArg];

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], '', $headers);

        //Fetch the downloaded file's contents stream
        $stream = $response->getBody();

        //Open the temp file handle in write mode
        $downloadedFile = fopen('php://temp', 'w+');

        //Unable to open temp file handle
        if ($downloadedFile === false) {
            throw new \Exception('Error when saving the downloaded file');
        }

        //Read the stream and write it to the temp file
        while (!$stream->eof()) {
            $writeResult = fwrite($downloadedFile, $stream->read(8000));
            if ($writeResult === false) {
                throw new \Exception('Error when saving the downloaded file');
            }
        }

        //Close the stream
        $stream->close();

        //Rewind the downloadedFile stream
        rewind($downloadedFile);

        //Return the stream resource
        return $downloadedFile;
    }

    /**
     * Create a sharing link.
     *
     * @param string $path     File Path
     * @param array  $settings Settings
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#sharing-create_shared_link_with_settings
     *
     * @return object
     */
    public function createSharingLink($path, array $settings = array())
    {
        //Create sharing link endpoint
        $endpoint = '/sharing/create_shared_link_with_settings';

        //Built the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path and settings param
        $bodyParams['path'] = $path;
        $bodyParams['settings'] = (object) $settings;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }

    /**
     * List Sharing Links of a File.
     *
     * @param string $path       File Path
     * @param array  $bodyParams Additional Body Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#sharing-list_shared_links
     *
     * @return object
     */
    public function listSharingLinks($path, array $bodyParams = array())
    {
        //List Shared Links endpoint
        $endpoint = '/sharing/list_shared_links';

        //Built the URI
        $uri = $this->buildUrl($endpoint);

        //Set the path
        $bodyParams['path'] = $path;

        //JSON Encode the body params
        $body = json_encode($bodyParams);

        //Make the request and fetch the response
        $response = $this->makeRequest('POST', $uri, [], $body);

        //The response received is a JSON encoded
        //string, it must be decoded & returned.
        $responseContent = $this->decodeResponse($response);

        //Return the decoded response content
        return $responseContent;
    }
}
