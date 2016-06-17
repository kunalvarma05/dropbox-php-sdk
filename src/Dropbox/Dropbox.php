<?php
namespace Kunnu\Dropbox;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Request;
use Kunnu\Dropbox\Models\ModelFactory;
use Kunnu\Dropbox\Models\FileMetadata;
use Psr\Http\Message\ResponseInterface;
use Kunnu\Dropbox\Models\FolderMetadata;
use Kunnu\Dropbox\Models\ModelCollection;
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
     * @param null|\GuzzleHttp\Client|\Kunnu\Dropbox\Http\Clients\DropboxHttpClientInterface  $httpClientHandler HTTP Client Handler
     */
    public function __construct($access_token, $httpClientHandler = null)
    {
        //Set the access token
        $this->setAccessToken($access_token);

        //Make the HTTP Client
        $httpClient = DropboxHttpClientFactory::make($httpClientHandler);

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

    /**
     * Make a HTTP POST Request to the API endpoint type
     *
     * @param  string $endpoint     API Endpoint to send Request to
     * @param  array  $params       Request Query Params
     * @param  string $access_token Access Token to send with the Request
     *
     * @return \Kunnu\Dropbox\DropboxResponse
     */
    public function postToAPI($endpoint, array $params = [], $access_token = null)
    {
        return $this->sendRequest("POST", $endpoint, 'api', $params, $access_token);
    }

    /**
     * Make Model from DropboxResponse
     *
     * @param  DropboxResponse $response
     *
     * @return \Kunnu\Dropbox\Models\ModelInterface
     */
    public function makeModelFromResponse(DropboxResponse $response)
    {
        //Get the Decoded Body
        $body = $response->getDecodedBody();

        //Make and Return the Model
        return ModelFactory::make($body);
    }

    /**
     * Get the Metadata for a file or folder
     *
     * @param  string $path   Path of the file or folder
     * @param  array  $params Additional Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-get_metadata
     *
     * @return \Kunnu\Dropbox\Models\FileMetadata or \Kunnu\Dropbox\Models\FolderMetadata
     */
    public function getMetadata($path, array $params = [])
    {
        //Root folder is unsupported
        if($path === '/') {
            throw new DropboxClientException("Metadata for the root folder is unsupported.");
        }

        //Set the path
        $params['path'] = $path;

        //Get File Metadata
        $response = $this->postToAPI('/files/get_metadata', $params);

        //Make and Return the Model
        return $this->makeModelFromResponse($response);
    }

    /**
     * Get the contents of a Folder
     *
     * @param  string $path   Path to the folder. Defaults to root.
     * @param  array  $params Additional Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder
     *
     * @return \Kunnu\Dropbox\Models\ModelCollection
     */
    public function listFolder($path = null, array $params = [])
    {
        //Specify the root folder as an
        //empty string rather than as "/"
        if($path === '/') {
            $path = "";
        }

        //Set the path
        $params['path'] = $path;

        //Get File Metadata
        $response = $this->postToAPI('/files/list_folder', $params);

        //Make and Return the Model
        return $this->makeModelFromResponse($response);
    }

    /**
     * Paginate through all files and retrieve updates to the folder,
     * using the cursor retrieved from listFolder or listFolderContinue
     *
     * @param  string $cursor The cursor returned by your
     * last call to listFolder or listFolderContinue
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-continue
     *
     * @return \Kunnu\Dropbox\Models\ModelCollection
     */
    public function listFolderContinue($cursor)
    {
        $response = $this->postToAPI('/files/list_folder/continue', ['cursor' => $cursor]);

        //Make and Return the Model
        return $this->makeModelFromResponse($response);
    }

    /**
     * Get a cursor for the folder's state.
     *
     * @param  string $path   Path to the folder. Defaults to root.
     * @param  array  $params Additional Params
     *
     * @link https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-get_latest_cursor
     *
     * @return string The Cursor for the folder's state
     */
    public function listFolderLatestCursor($path, array $params = [])
    {
        //Specify the root folder as an
        //empty string rather than as "/"
        if($path === '/') {
            $path = "";
        }

        //Set the path
        $params['path'] = $path;

        //Fetch the cursor
        $response = $this->postToAPI('/files/list_folder/get_latest_cursor', $params);

        //Retrieve the cursor
        $body = $response->getDecodedBody();
        $cursor = isset($body['cursor']) ? $body['cursor'] : false;

        //No cursor returned
        if(!$cursor) {
            throw new DropboxClientException("Could not retrieve cursor. Something went wrong.");
        }

        //Return the cursor
        return $cursor;
    }

    /**
     * Get Revisions of a File
     *
     * @param  string $path   Path to the file
     * @param  array  $params Additional Params
     *
     * @return Kunnu\Dropbox\Models\ModelCollection
     */
    public function listRevisions($path, array $params = [])
    {
        //Set the Path
        $params['path'] = $path;

        //Fetch the Revisions
        $response = $this->postToAPI('/files/list_revisions', $params);

        //The file metadata of the entries, returned by this
        //endpoint doesn't include a '.tag' attribute, which
        //is used by the ModelFactory to resolve the correct
        //model. But since we know that revisions returned
        //are file metadata objects, we can explicitly cast
        //them as \Kunnu\Dropbox\Models\FileMetadata manually.
        $body = $response->getDecodedBody();
        $entries = isset($body['entries']) ? $body['entries'] : [];
        $processedEntries = [];

        foreach ($entries as $entry) {
            $processedEntries[] = new FileMetadata($entry);
        }

        return new ModelCollection($processedEntries);
    }

    /**
     * Search a folder for files/folders
     *
     * @param  string $path   Path to search
     * @param  string $query  Search Query
     * @param  array  $params Additional Params
     *
     * @return \Kunnu\Dropbox\Models\SearchResults
     */
    public function search($path, $query, array $params = [])
    {
        //Specify the root folder as an
        //empty string rather than as "/"
        if($path === '/') {
            $path = "";
        }

        //Set the path and query
        $params['path'] = $path;
        $params['query'] = $query;

        //Fetch Search Results
        $response = $this->postToAPI('/files/search', $params);

        //Make and Return the Model
        return $this->makeModelFromResponse($response);
    }

    /**
     * Create a folder at the given path
     *
     * @param  string $path Path to create
     *
     * @return \Kunnu\Dropbox\Models\FolderMetadata
     */
    public function createFolder($path)
    {
        //Root folder cannot be null
        if(is_null($path)) {
            throw new DropboxClientException("Path cannot be null.");
        }

        //Create Folder
        $response = $this->postToAPI('/files/create_folder', ['path' => $path]);

        //Fetch the Metadata
        $body = $response->getDecodedBody();

        //Make and Return the Model
        return new FolderMetadata($body);
    }

    /**
     * Delete a file or folder at the given path
     *
     * @param  string $path Path to file/folder to delete
     *
     * @return \Kunnu\Dropbox\Models\FileMetadata|FileMetadata|DeletedMetadata
     */
    public function delete($path)
    {
        //Root folder cannot be null
        if(is_null($path)) {
            throw new DropboxClientException("Path cannot be null.");
        }

        //Delete
        $response = $this->postToAPI('/files/delete', ['path' => $path]);

        return $this->makeModelFromResponse($response);
    }

}