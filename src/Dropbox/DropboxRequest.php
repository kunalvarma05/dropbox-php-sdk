<?php
namespace Kunnu\Dropbox;

use Kunnu\Dropbox\Http\RequestBodyJsonEncoded;

class DropboxRequest
{

    /**
     * Access Token to use for this request
     *
     * @var string
     */
    protected $access_token = null;

    /**
     * The HTTP method for this request
     *
     * @var string
     */
    protected $method = "GET";

    /**
     * The params for this request
     *
     * @var array
     */
    protected $params = null;

    /**
     * The Endpoint for this request
     *
     * @var string
     */
    protected $endpoint = null;

    /**
     * The Endpoint Type for this request
     *
     * @var string
     */
    protected $endpointType = null;

    /**
     * The headers to send with this request
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Content Type for the Request
     *
     * @var string
     */
    protected $contentType = 'application/json';


    /**
     * Create a new DropboxRequest instance
     *
     * @param string $method       HTTP Method of the Request
     * @param string $endpoint     API endpoint of the Request
     * @param string $access_token Access Token for the Request
     * @param string $endpointType Endpoint type ['api'|'content']
     * @param mixed  $params       Request Params
     * @param array  $headers      Headers to send along with the Request
     */
    public function __construct($method, $endpoint, $access_token, $endpointType = "api", array $params = [], array $headers = [], $contentType = null)
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->access_token = $access_token;
        $this->endpointType = $endpointType;
        $this->params = $params;
        $this->headers = $headers;

        if($contentType)
            $this->contentType = $contentType;
    }

    /**
     * Get the Request Method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

     /**
     * Get the Request Params
     *
     * @return array
     */
     public function getParams()
     {
        return $this->params;
    }

    /**
     * Get Access Token for the Request
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Get the Endpoint of the Request
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Get the Endpoint Type of the Request
     *
     * @return string
     */
    public function getEndpointType()
    {
        return $this->endpointType;
    }

    /**
     * Get the Content Type of the Request
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Get Request Headers
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the Request Method
     *
     * @param string
     *
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

     /**
     * Set the Request Params
     *
     * @param array
     * @return \Kunnu\Dropbox\DropboxRequest
     */
     public function setParams(array $params = [])
     {
        $this->params = $params;

        return $this;
    }

    /**
     * Set Access Token for the Request
     *
     * @param string
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Set the Endpoint of the Request
     *
     * @param string
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Set the Endpoint Type of the Request
     *
     * @param string
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function setEndpointType($endpointType)
    {
        $this->endpointType = $endpointType;

        return $this;
    }


    /**
     * Set Request Headers
     *
     * @param array
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Set the Content Type of the Request
     *
     * @param string
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Get JSON Encoded Request Body
     *
     * @return \Kunnu\Dropbox\Http\RequestBodyJsonEncoded
     */
    public function getJsonBody()
    {
        return new RequestBodyJsonEncoded($this->getParams());
    }

}