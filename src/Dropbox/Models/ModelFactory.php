<?php

namespace Kunnu\Dropbox\Models;

class ModelFactory
{

    /**
     * Make a Model Factory
     *
     * @param  array $data Model Data
     *
     * @return \Kunnu\Dropbox\Models\ModelInterface
     */
    public static function make(array $data = array())
    {
        //Some endpoints return metadata files or folder as sub-nodes of a `metadata` node
        //i.e. /files/move_v2
        if (isset($data['metadata']['.tag'])) {
            $data = $data['metadata'];
        }

        if (static::isFileOrFolder($data)) {
            $tag = $data['.tag'];

            //File
            if (static::isFile($tag)) {
                return new FileMetadata($data);
            }

            //Folder
            if (static::isFolder($tag)) {
                return new FolderMetadata($data);
            }

            //Deleted File/Folder
            if (static::isDeletedFileOrFolder($tag)) {
                return new DeletedMetadata($data);
            }
        }

        //Temporary Link
        if (static::isTemporaryLink($data)) {
            return new TemporaryLink($data);
        }

        //List
        if (static::isList($data)) {
            return new MetadataCollection($data);
        }

        //Search Results
        if (static::isSearchResult($data)) {
            return new SearchResults($data);
        }

        //Base Model
        return new BaseModel($data);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected static function isFileOrFolder(array $data)
    {
        return isset($data['.tag']);
    }

    /**
     * @param string $tag
     *
     * @return bool
     */
    protected static function isFile($tag)
    {
        return $tag === 'file';
    }

    /**
     * @param string $tag
     *
     * @return bool
     */
    protected static function isFolder($tag)
    {
        return $tag === 'folder';
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected static function isTemporaryLink(array $data)
    {
        return isset($data['metadata']) && isset($data['link']);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected static function isList(array $data)
    {
        return isset($data['entries']);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected static function isSearchResult(array $data)
    {
        return isset($data['matches']);
    }

    /**
     * @param string $tag
     *
     * @return bool
     */
    protected static function isDeletedFileOrFolder($tag)
    {
        return 'deleted' === $tag;
    }
}
