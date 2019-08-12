<?php
namespace Kunnu\Dropbox\Http\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Exception\RingException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Kunnu\Dropbox\Http\DropboxRawResponse;
use Kunnu\Dropbox\Exceptions\DropboxClientException;

/**
 * DropboxGuzzleHttpClient
 */
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
     *
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
        $requestHasSink = array_key_exists('sink', $options);
        try {
            //Send the Request
            $rawResponse = $this->client->send($request, $options);
        } catch (RequestException $e) {
            $rawResponse = $e->getResponse();
            if ($e->getPrevious() instanceof RingException || !$rawResponse instanceof ResponseInterface) {
                if ($requestHasSink && $rawResponse instanceof ResponseInterface) {
                    $this->closeSinkStream($rawResponse);
                }
                throw new DropboxClientException($e->getMessage(), $e->getCode());
            }
        }

        //Something went wrong
        if ($rawResponse->getStatusCode() >= 400) {
            $body = (string) $rawResponse->getBody();
            if ($requestHasSink) {
                $this->closeSinkStream($rawResponse);
            }
            throw new DropboxClientException($body);
        }

        if ($requestHasSink) {
            $this->closeSinkStream($rawResponse);
            $body = '';
        } else {
            //Get the Response Body
            $body = $this->getResponseBody($rawResponse);
        }

        $rawHeaders = $rawResponse->getHeaders();
        $httpStatusCode = $rawResponse->getStatusCode();

        //Create and return a DropboxRawResponse object
        return new DropboxRawResponse($rawHeaders, $body, $httpStatusCode);
    }

    private function closeSinkStream($rawResponse)
    {
        $body = $rawResponse->getBody();
        if (property_exists($body, 'stream')) {
            $body->stream->close();
        }
    }

    /**
     * Get the Response Body
     *
     * @param string|\Psr\Http\Message\ResponseInterface $response Response object
     *
     * @return string
     */
    protected function getResponseBody($response)
    {
        //Response must be string
        $body = $response;

        if ($response instanceof ResponseInterface) {
            //Fetch the body
            $body = $response->getBody();
        }

        if ($body instanceof StreamInterface) {
            $body = $body->getContents();
        }

        return $body;
    }
}
