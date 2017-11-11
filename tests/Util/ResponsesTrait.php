<?php

namespace Kunnu\Dropbox\Tests\Util;

/**
 * Methods to generate specific responses for test cases.
 *
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
trait ResponsesTrait
{
    public function getResponseForGetMetadataOnFile()
    {
        $body = <<<'JSON'
{
    ".tag": "file",
    "name": "fake_file.txt",
    "path_lower": "/fake_dir/fake_file.txt",
    "path_display": "/fake_dir/fake_file.txt",
    "id": "id:a4ayc_80_OEAAAAAAAAAXw",
    "client_modified": "2015-05-12T15:50:38Z",
    "server_modified": "2015-05-12T15:50:38Z",
    "rev": "a1c10ce0dd78",
    "size": 7212,
    "content_hash": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
}           
JSON;
        return new Response200($body);
    }

    public function getResponseForGetMetadataOnFolder()
    {
        $body = <<<'JSON'
{
    ".tag": "folder",
    "name": "fake_dir",
    "path_lower": "/fake_dir",
    "path_display": "/fake_dir",
    "id": "id:g4p535ni2HABCDEFGHCQ"
}           
JSON;
        return new Response200($body);
    }
}
