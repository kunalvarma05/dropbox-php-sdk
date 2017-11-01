<?php
namespace Grapelime\Dropbox\Http;

use Grapelime\Dropbox\DropboxFile;

/**
 * RequestBodyStream
 */
class RequestBodyStream implements RequestBodyInterface
{

    /**
     * File to be sent with the Request
     *
     * @var \Grapelime\Dropbox\DropboxFile
     */
    protected $file;

    /**
     * Create a new RequestBodyStream instance
     *
     * @param \Grapelime\Dropbox\DropboxFile $file
     */
    public function __construct(DropboxFile $file)
    {
        $this->file = $file;
    }

    /**
     * Get the Body of the Request
     *
     * @return string
     */
    public function getBody()
    {
        return $this->file->getContents();
    }
}
