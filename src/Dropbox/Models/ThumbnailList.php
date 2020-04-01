<?php
namespace Kunnu\Dropbox\Models;

class ThumbnailList extends ModelCollection
{
    /**
     * Create a new Metadata Collection
     *
     * @param array $data Collection Data
     */
    public function __construct(array $data)
    {
        $processedItems = $this->processItems($data['entries']);
        parent::__construct($processedItems);
    }

    /**
     * Process items and cast them
     * to Thumbnail Model
     *
     * @param array $items Unprocessed Items
     *
     * @return array Array of Thumbnail models
     */
    protected function processItems(array $items)
    {
        $processedItems = [];

        foreach ($items as $entry) {
            $processedItems[] = new Thumbnail($entry['metadata'], $entry['thumbnail']);
        }

        return $processedItems;
    }
}
