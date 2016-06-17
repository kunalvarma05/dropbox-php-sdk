<?php
namespace Kunnu\Dropbox\Http;

/**
 * RequestBodyJsonEncoded
 */
class RequestBodyJsonEncoded implements RequestBodyInterface
{

    /**
     * Request Params
     *
     * @var array
     */
    protected $params;

    /**
     * Create a new RequestBodyJsonEncoded instance
     *
     * @param array $params Request Params
     */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * Get the Body of the Request
     *
     * @return string
     */
    public function getBody()
    {
        return json_encode($this->params);
    }

}