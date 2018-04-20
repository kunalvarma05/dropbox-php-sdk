<?php
namespace Kunnu\Dropbox\Models;

class DeletedList extends ModelCollection
{
    /**
     * Create a new Metadata Collection
     *
     * @param array $data Collection Data
     */
    public function __construct(array $data)
    {
        $processedItems = $this->processItems($data);
        parent::__construct($processedItems);
    }

    /**
     * Process items and cast them
     * to DeletedMetadata Model
     *
     * @param array $items Unprocessed Items
     *
     * @return array Array of DeletedMetadata models
     */
    protected function processItems(array $items)
    {
        $processedEntries = [];

        foreach ($items as $item) {
            $item['metadata']['status'] = $item['.tag'];
            $processedEntries[] = new DeletedMetadata($item['metadata']);
        }

        return $processedEntries;
    }
}
