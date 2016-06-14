<?php
namespace Kunnu\Dropbox\Http\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RingException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Kunnu\Dropbox\Http\DropboxRawResponse;
use Kunnu\Dropbox\Exceptions\DropboxClientException;

class DropboxGuzzleHttpClient implements DropboxHttpClientInterface
{
    /**
     * GuzzleHttp client
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new DropboxGuzzleHttpClient instance
     *
     * @param Client $client GuzzleHttp Client
     */
    public function __construct(Client $client = null)
    {
        //Set the client
        $this->client = $client ?: new Client();
    }

    /**
     * Send request to the server and fetch the raw response
     * @param  string $url     URL/Endpoint to send the request to
     * @param  string $method  Request Method
     * @param  string|resource|StreamInterface $body Request Body
     * @param  array  $headers Request Headers
     * @param  array  $options Additional Options
     *
     * @return \Kunnu\Dropbox\Http\DropboxRawResponse Raw response from the server
     *
     * @throws \Kunnu\Dropbox\Exceptions\DropboxClientException
     */
    public function send($url, $method, $body, $headers = [], $options = [])
    {
        //Create a new Request Object
        $request = new Request($method, $url, $headers, $body);

        try {
            //Send the Request
            $rawResponse = $this->client->send($request, $options);
        } catch (RequestException $e) {
            $rawResponse = $e->getResponse();

            if ($e->getPrevious() instanceof RingException || !$rawResponse instanceof ResponseInterface) {
                throw new DropboxClientException($e->getMessage(), $e->getCode());
            }
        }

        //Decode the Response Body
        $body = $this->decodeResponse($rawResponse);

        $rawHeaders = $rawResponse->getHeaders();
        $httpStatusCode = $rawResponse->getStatusCode();

        //Create and return a DropboxRawResponse object
        return new DropboxRawResponse($rawHeaders, $body, $httpStatusCode);
    }

    /**
     * Decode the Response.
     *
     * @param string|\Psr\Http\Message\ResponseInterface $response Response object or string to decode
     *
     * @return array
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

        //The response received is a JSON encoded string,
        //it must be decoded & returned as an array
        return json_decode((string) $body, true);
    }

}