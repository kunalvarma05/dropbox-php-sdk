<?php
namespace Kunnu\Dropbox\Models;

class FileRequestCollection extends ModelCollection
{

    /**
     * Collection Items Key
     *
     * @const string
     */
    const COLLECTION_ITEMS_KEY = 'file_requests';

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
     * Create a new FileRequest Collection
     *
     * @param array $data Collection Data
     */
    public function __construct(array $data)
    {
        $this->data = $data;

        $items = isset($data[$this->getCollectionItemsKey()]) ? $data[$this->getCollectionItemsKey()] : [];
        $this->processItems($items);
    }

    /**
     * Process items and cast them
     * to their respective Models
     *
     * @param array $items Unprocessed Items
     *
     * @return void
     */
    protected function processItems(array $items)
    {
        $processedItems = [];

        foreach ($items as $entry) {
            $processedItems[] = ModelFactory::make($entry);
        }

        $this->items = new ModelCollection($processedItems);
    }
}
