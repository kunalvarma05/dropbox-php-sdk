Dropbox PHP Client (API V2)
===========================
An easy to use PHP Client for the [Dropbox API](https://www.dropbox.com/developers/documentation/http/documentation).

<img src="https://cloud.githubusercontent.com/assets/893057/13731118/b7cf0e4e-e987-11e5-942f-13c53d65da35.png">


## Install
```sh
composer require kunalvarma05/dropbox-client
```

## Usage
```php
<?php
use Kunnu\Dropbox\Client;
use GuzzleHttp\Client as Guzzle;

$guzzle = new Guzzle();

$accessToken = "abcd1234";
$client = new Client($accessToken, $guzzle);

//Get Metadat
$client->getMetadata("/Public/hello.txt");

//List Folder Contents
$folderContents = $client->listFolder("/Public", ['include_media_info' => false, 'recursive' => false, 'include_deleted' => true]);

//List Folder Continue Pagination
$moreFolderContents = $client->listFolderContinue($folderContents->cursor);

//List Folder Latest Cursor
$cursor = $client->listFolderLatestCursor("/Pulse", ['include_media_info' => false, 'recursive' => false]);

//List Revisions of a file
$file = $client->listRevisions("/Public/hello.txt");

//Restore a file
$client->restore($file->entries[0]->path_lower, $file->entries[0]->rev);

//Search
$client->search("/Public", "search query", ['start' => 0, 'max_results' => 20, 'mode' => "filename_and_content"]);

//Download and save a file
$download = $client->download("/Public/demo.jpg");
file_put_contents("download.png", $download);

//Delete a file or folder
$client->delete("/Testing");

//List Sharing Links of a file
$client->listSharingLinks("/logo.png");

//Create Sharing Link of a file
$client->createSharingLink("/logo.png");

//Fetch Current User Account Details
$client->getAccountInfo();

//Fetch Specific User Account Details
$client->getAccountInfo("dbid:AADRW_juaRY5na2jDSLf2tjzikRvZwBlpt2");


?>
```

## License
Dropbox PHP Client is licensed under The MIT License (MIT).