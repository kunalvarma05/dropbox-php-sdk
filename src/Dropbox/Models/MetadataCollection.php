<?php
namespace Kunnu\Dropbox\Models;

class MetadataCollection
{

    /**
     * Collection Items Key
     *
     * @const string
     */
    const COLLECTION_ITEMS_KEY = 'entries';

    /**
     * Collection Data
     *
     * @var array
     */
    protected $data;

    /**
     * List of Files/Folder Metadata
     *
     * @var \Kunnu\Dropbox\Models\FileMetadata | \Kunnu\Dropbox\Models\FolderMetadata
     */
    protected $entries = [];

    /**
     * Cursor for pagination and updates
     *
     * @var string
     */
    protected $cursor;

    /**
     * If more entries are available
     *
     * @var boolean
     */
    protected $hasMore;

    /**
     * Create a new Metadata Collection
     * @param array $data Collection Data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->entries = isset($data[$this->getCollectionItemsKey()]) ? $data[$this->getCollectionItemsKey()] : [];
        $this->cursor = isset($data['cursor']) ? $data['cursor'] : '';
        $this->hasMore = isset($data['has_more']) && $data['has_more'] ? true : false;

        $this->processEntries();
    }

    /**
     * Get the Collection Items Key
     *
     * @return string
     */
    public function getCollectionItemsKey()
    {
        return static::COLLECTION_ITEMS_KEY;
    }

    /**
     * Get the Collection data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the Entries
     *
     * @return array
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Get the cursor
     *
     * @return string
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * More entries are available
     *
     * @return boolean
     */
    public function hasMore()
    {
        return $this->hasMore;
    }

    /**
     * Process entries and cast them
     * to their respective Models
     *
     * @return void
     */
    protected function processEntries()
    {
        $entries = $this->getEntries();

        $processedEntries = [];

        foreach ($entries as $entry) {
            $processedEntries[] = ModelFactory::make($entry);
        }

        $this->entries = $processedEntries;
    }

}