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

## Available Operations
#### Files
- [x] copy
- [ ] copy_reference/get
- [ ] copy_reference/save
- [x] create_folder
- [x] delete
- [x] download
- [x] get_metadata
- [ ] get_preview
- [ ] get_temporary_link
- [ ] get_thumbnail
- [x] list_folder
- [x] list_folder/continue
- [x] list_folder/get_latest_cursor
- [ ] list_folder/longpoll
- [x] list_revisions
- [x] move
- [ ] permanently_delete
- [ ] properties/add
- [ ] properties/overwrite
- [ ] properties/remove
- [ ] properties/template/get
- [ ] properties/template/list
- [ ] properties/update
- [x] restore
- [ ] save_url
- [ ] save_url/check_job_status
- [x] search
- [x] upload
- [ ] upload_session/append_v2
- [ ] upload_session/finish
- [ ] upload_session/start sharing

#### Sharing
- [ ] add_file_member
- [ ] add_folder_member
- [ ] check_job_status
- [ ] check_remove_member_job_status
- [ ] check_share_job_status
- [x] create_shared_link_with_settings
- [ ] get_file_metadata
- [ ] get_file_metadata/batch
- [ ] get_folder_metadata
- [ ] get_shared_link_file
- [ ] get_shared_links
- [ ] list_file_members
- [ ] list_file_members/batch
- [ ] list_file_members/continue
- [ ] list_folder_members
- [ ] list_folder_members/continue
- [ ] list_folders
- [ ] list_folders/continue
- [ ] list_mountable_folders
- [ ] list_mountable_folders/continue
- [ ] list_received_files
- [ ] list_received_files/continue
- [x] list_shared_links
- [ ] modify_shared_link_settings
- [ ] mount_folder
- [ ] relinquish_file_membership
- [ ] relinquish_folder_membership
- [ ] remove_file_member_2
- [ ] remove_folder_member
- [ ] revoke_shared_link
- [ ] share_folder
- [ ] transfer_folder
- [ ] unmount_folder
- [ ] unshare_file
- [ ] unshare_folder
- [ ] update_folder_member
- [ ] update_folder_policy

#### Users
- [x] get_account
- [ ] get_account_batch
- [x] get_current_account
- [ ] get_space_usage

## License
Dropbox PHP Client is licensed under The MIT License (MIT).