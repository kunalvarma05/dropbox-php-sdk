<?php
namespace Kunnu\Dropbox\Models;

class FileRequest extends BaseModel
{

    /**
     * A unique identifier of the file request
     *
     * @var string
     */
    protected $id;

    /**
     * The url.
     *
     * @var string
     */
    protected $url;

    /**
     * The title.
     *
     * @var string
     */
    protected $title;

    /**
     * The destination.
     *
     * @var string
     */
    protected $destination;

    /**
     * The created.
     *
     * @var DateTime
     */
    protected $created;

    /**
     * The is_open.
     *
     * @var bool
     */
    protected $is_open;

    /**
     * The file_count.
     *
     * @var int
     */
    protected $file_count;

    /**
     * Set if this file is contained in a shared folder.
     *
     * @var \Kunnu\Dropbox\Models\FileRequestDeadline
     */
    protected $deadline;

    /**
     * Create a new FileRequest instance
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $this->getDataProperty('id');
        $this->url = $this->getDataProperty('url');
        $this->title = $this->getDataProperty('title');
        $this->destination = $this->getDataProperty('destination');
        $this->created = $this->getDataProperty('created');
        $this->is_open = $this->getDataProperty('is_open');
        $this->file_count = $this->getDataProperty('file_count');
        $this->deadline = $this->getDataProperty('deadline');
        if (is_array($this->deadline)) {
            $this->deadline = new FileRequestDeadline($this->deadline);
        }
    }

    /**
     * Get the 'id' property of the file request model.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the 'url' property of the file request model.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the 'title' property of the file request model.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the 'destination' property of the file request model.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Get the 'created' property of the file request model.
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get the 'is_open' property of the file request model.
     *
     * @return bool
     */
    public function isOpen()
    {
        return $this->is_open;
    }

    /**
     * Get the 'file_count' property of the file request model.
     *
     * @return int
     */
    public function getFileCount()
    {
        return $this->file_count;
    }

    /**
     * Get the 'deadline' property of the file request model.
     *
     * @return \Kunnu\Dropbox\Models\FileRequestDeadline
     */
    public function getDeadline()
    {
        return $this->deadline;
    }
}
