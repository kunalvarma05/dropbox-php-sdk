<?php
namespace Kunnu\Dropbox\Models;

class FileRequestDeadline extends BaseModel
{

    /**
     * The deadline.
     *
     * @var string
     */
    protected $deadline;

    /**
     * The grace period allowing late uploads after deadline reached.
     *
     * @var string
     */
    protected $allow_late_uploads;

    /**
     * Create a new FileRequestDeadline instance
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->deadline = $this->getDataProperty('deadline');
        $this->allow_late_uploads = $this->getDataProperty('allow_late_uploads');
        if (is_array($this->allow_late_uploads)) {
            $this->allow_late_uploads = $this->allow_late_uploads['.tag'];
        }
    }

    /**
     * Get the 'deadline' property of the file request deadline model.
     *
     * @return string
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Get the 'allow_late_uploads' property of the file request deadline model.
     *
     * @return string
     */
    public function getAllowLateUploads()
    {
        return $this->allow_late_uploads;
    }
}
