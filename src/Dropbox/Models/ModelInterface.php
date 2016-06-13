<?php
namespace Kunnu\Dropbox\Models;

interface ModelInterface
{

    /**
     * Get the Model data
     * @return array
     */
    public function getData();

    /**
     * Get Data Property
     * @param  string $property
     * @return mixed
     */
    protected function getDataProperty($property);

}