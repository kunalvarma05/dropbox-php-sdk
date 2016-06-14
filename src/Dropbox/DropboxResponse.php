<?php
namespace Kunnu\Dropbox;

class DropboxResponse
{
    /**
     *  The HTTP status code response
     *
     * @var int
     */
    protected $httpStatusCode;

    /**
     *  The headers returned
     *
     * @var array
     */
    protected $headers;

    /**
     *  The raw body of the response
     *
     * @var string
     */
    protected $body;

    /**
     *  The decoded body of the response
     *
     * @var array
     */
    protected $decodedBody = [];

    /**
     * The original request that returned this response
     *
     * @var DropboxRequest
     */
    protected $request;

    /**
     * Create a new DropboxResponse
     * @param DropboxRequest $request
     * @param string|null $body
     * @param int|null    $httpStatusCode
     * @param array       $headers
     */
    public function __construct(DropboxRequest $request, $body = null, $httpStatusCode = null, array $headers = [])
    {
        $this->request = $request;
        $this->body = $body;
        $this->httpStatusCode = $httpStatusCode;
        $this->headers = $headers;
    }

    /**
     * Get the Request Request
     *
     * @return \Kunnu\Dropbox\DropboxRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

     /**
     * Get the Response Body
     *
     * @return string
     */
     public function getBody()
     {
        return $this->body;
    }

    /**
     * Get Access Token for the Request
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->getRequest()->getAccessToken();
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
     * Get the HTTP Status Code
     *
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

}