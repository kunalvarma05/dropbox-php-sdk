<?php
namespace Kunnu\Dropbox\Models;

class ModelFactory
{

    /**
     * Make a Model Factory
     * @param  array  $data Model Data
     * @return \Kunnu\Dropbox\Models\ModelInterface
     */
    public static function make(array $data = array())
    {
        if(isset($data['.tag']))
        {
            $tag = $data['.tag'];

            //File
            if($tag === 'file')
                return new FileMetadata($data);

            //Folder
            if($tag === 'folder')
                return new FolderMetadata($data);
        }

        //Base Model
        return new BaseModel($data);
    }
}