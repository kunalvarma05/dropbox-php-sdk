<?php
namespace Kunnu\Dropbox;

use Kunnu\Dropbox\Exceptions\DropboxClientException;

/**
 * DropboxFile
 */
class DropboxFile
{
    /**
     * Path of the file to upload
     *
     * @var string
     */
    protected $path;

    /**
     * The maximum bytes to read. Defaults to -1 (read all the remaining buffer).
     *
     * @var int
     */
    protected $maxLength;

    /**
     * Seek to the specified offset before reading.
     * If this number is negative, no seeking will
     * occur and reading will start from the current.
     *
     * @var int
     */
    protected $offset;

    /**
     * File Stream
     *
     * @var \GuzzleHttp\Psr7\Stream
     */
    protected $stream;

    /**
     * Create a new DropboxFile instance
     *
     * @param string $filePath Path of the file to upload
     * @param int $maxLength   Max Bytes to read from the file
     * @param int $offset      Seek to specified offset before reading
     *
     * @throws \Kunnu\Dropbox\Exceptions\DropboxClientException
     */
    public function __construct($filePath, $maxLength = -1, $offset = -1)
    {
        $this->path = $filePath;
        $this->maxLength = $maxLength;
        $this->offset = $offset;

        $this->open();
    }

    /**
     * Closes the stream when destructed.
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * Set the offset to start reading
     * the data from the stream
     *
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * Set the Max Length till where to read
     * the data from the stream.
     *
     * @param int $maxLength
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;
    }

    /**
     * Opens the File Stream
     *
     * @throws DropboxClientException
     *
     * @return void
     */
    public function open()
    {
        if (!$this->isRemoteFile($this->path) && !is_readable($this->path)) {
            throw new DropboxClientException('Failed to create DropboxFile instance. Unable to read resource: ' . $this->path . '.');
        }

        $this->stream = \GuzzleHttp\Psr7\stream_for(fopen($this->path, 'r'));

        if (!$this->stream) {
            throw new DropboxClientException('Failed to create DropboxFile instance. Unable to open resource: ' . $this->path . '.');
        }
    }

    /**
     * Get the Open File Stream
     *
     * @return GuzzleHttp\Psr7\Stream
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * Close the file stream
     */
    public function close()
    {
        $this->stream->close();
    }

    /**
     * Return the contents of the file
     *
     * @return string
     */
    public function getContents()
    {
        // If an offset is provided
        if ($this->offset !== -1) {
            // Seek to the offset
            $this->stream->seek($this->offset);
        }

        // If a max length is provided
        if ($this->maxLength !== -1) {
            // Read from the offset till the maxLength
            return $this->stream->read($this->maxLength);
        }

        return $this->stream->getContents();
    }

    /**
     * Get the name of the file
     *
     * @return string
     */
    public function getFileName()
    {
        return basename($this->path);
    }

    /**
     * Get the path of the file
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->path;
    }

    /**
     * Get the size of the file
     *
     * @return int
     */
    public function getSize()
    {
        return $this->stream->getSize();
    }

    /**
     * Get mimetype of the file
     *
     * @return string
     */
    public function getMimetype()
    {
        return \GuzzleHttp\Psr7\mimetype_from_filename($this->path) ?: 'text/plain';
    }

    /**
     * Returns true if the path to the file is remote
     *
     * @param string $pathToFile
     *
     * @return boolean
     */
    protected function isRemoteFile($pathToFile)
    {
        return preg_match('/^(https?|ftp):\/\/.*/', $pathToFile) === 1;
    }
}
