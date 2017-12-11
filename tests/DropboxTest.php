<?php

namespace Kunnu\Dropbox\Tests;

use Kunnu\Dropbox\Dropbox;
use GuzzleHttp\Psr7\Request;
use org\bovigo\vfs\vfsStream;
use Kunnu\Dropbox\DropboxClient;
use Kunnu\Dropbox\DropboxFile;
use Kunnu\Dropbox\DropboxResponse;
use Kunnu\Dropbox\Models\File;
use Kunnu\Dropbox\Models\Account;
use Kunnu\Dropbox\Models\BaseModel;
use Kunnu\Dropbox\Models\Thumbnail;
use Kunnu\Dropbox\Models\AccountList;
use Kunnu\Dropbox\Models\FileMetadata;
use Kunnu\Dropbox\Models\SearchResult;
use Kunnu\Dropbox\Models\CopyReference;
use Kunnu\Dropbox\Models\SearchResults;
use Kunnu\Dropbox\Models\TemporaryLink;
use Kunnu\Dropbox\Models\FolderMetadata;
use Kunnu\Dropbox\Models\DeletedMetadata;
use Kunnu\Dropbox\Models\MetadataCollection;
use Kunnu\Dropbox\Models\ModelCollection;
use Kunnu\Dropbox\Tests\Util\Response200;
use Kunnu\Dropbox\Tests\Util\Response409;
use Kunnu\Dropbox\Tests\Util\ResponsesTrait;
use Kunnu\Dropbox\Tests\Util\DataProviderTrait;
use Kunnu\Dropbox\Tests\Util\FilesystemMockTrait;

/**
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
class DropboxTest extends TestCase
{
    use ResponsesTrait, DataProviderTrait, FilesystemMockTrait;

    public function testGetMetadataOnFile()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $metadata = $dropbox->getMetadata('/fake_dir/fake_file.txt');

        $this->assertRequest('/files/get_metadata', ['path' => '/fake_dir/fake_file.txt']);
        $this->assertInstanceOf(FileMetadata::class, $metadata);
        $this->assertEquals('fake_file.txt', $metadata->getName());
        $this->assertEquals('/fake_dir/fake_file.txt', $metadata->getPathLower());
        $this->assertEquals('id:a4ayc_80_OEAAAAAAAAAXw', $metadata->getId());
    }

    public function testGetMetadataOnFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseFolder());
        $metadata = $dropbox->getMetadata('/fake_dir');

        $this->assertRequest('/files/get_metadata', ['path' => '/fake_dir']);
        $this->assertInstanceOf(FolderMetadata::class, $metadata);
        $this->assertEquals('fake_dir', $metadata->getName());
        $this->assertEquals('/fake_dir', $metadata->getPathLower());
        $this->assertEquals('id:g4p535ni2HABCDEFGHCQ', $metadata->getId());
    }

    public function testGetMetadataOnDeletedFile()
    {
        $dropbox = $this->getDropbox($this->getResponseDeleted());
        $metadata = $dropbox->getMetadata('/fake_dir/deleted_file.txt', ['include_deleted' => true]);

        $this->assertRequest('/files/get_metadata', ['include_deleted' => true, 'path' => '/fake_dir/deleted_file.txt']);
        $this->assertInstanceOf(DeletedMetadata::class, $metadata);
        $this->assertEquals('/fake_dir/deleted_file.txt', $metadata->getPathLower());
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     * @expectedExceptionMessage Metadata for the root folder is unsupported.
     *
     * @dataProvider providerRoots
     * @param mixed $root
     */
    public function testMetadataRootPathThrowsException($root)
    {
        $dropbox = $this->getDropbox(new Response409());
        $dropbox->getMetadata($root);
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     */
    public function testGetMetadataErrorThrowsException()
    {
        $dropbox = $this->getDropbox($this->getResponseForMetadataError());
        $dropbox->getMetadata('/non_existent_path');
    }

    /**
     * @dataProvider providerRoots
     * @param mixed $root
     */
    public function testListFolderRoot($root)
    {
        $dropbox = $this->getDropbox($this->getResponseForListRoot());
        $list = $dropbox->listFolder($root);

        $this->assertRequest('/files/list_folder', ['path' => '']);
        $this->assertInstanceOf(MetadataCollection::class, $list);
        $this->assertCount(4, $list->getItems());
        /** @var FolderMetadata $item */
        $item = $list->getItems()->first();
        $this->assertInstanceOf(FolderMetadata::class, $item);
        $this->assertEquals("/photos", $item->getPathLower());
        $item = $list->getItems()[1];
        $this->assertInstanceOf(FolderMetadata::class, $item);
        $this->assertEquals("/music", $item->getPathLower());
        $item = $list->getItems()[2];
        $this->assertInstanceOf(FileMetadata::class, $item);
        $this->assertEquals("/getting started.pdf", $item->getPathLower());
        $item = $list->getItems()[3];
        $this->assertInstanceOf(FileMetadata::class, $item);
        $this->assertEquals("/android intro.pdf", $item->getPathLower());
    }

    public function testListFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseForList());
        $list = $dropbox->listFolder('/my_dir');

        $this->assertRequest('/files/list_folder', ['path' => '/my_dir']);

        //Test response
        $this->assertInstanceOf(MetadataCollection::class, $list);
        $this->assertCount(2, $list->getItems());
        /** @var FolderMetadata $item */
        $item = $list->getItems()->first();
        $this->assertInstanceOf(FolderMetadata::class, $item);
        $this->assertEquals("/my_dir/music", $item->getPathLower());
        $item = $list->getItems()[1];
        $this->assertInstanceOf(FileMetadata::class, $item);
        $this->assertEquals("/my_dir/android intro.pdf", $item->getPathLower());
    }

    public function testMakeModelFromResponseNullBody()
    {
        $response = $this->createMock(DropboxResponse::class);
        $response->method('getDecodedBody')->willReturn(null);

        $dropbox = new Dropbox($this->getApp());
        $model = $dropbox->makeModelFromResponse($response);

        $this->assertInstanceOf(BaseModel::class, $model);
        $this->assertEquals([], $model->getData());
    }

    public function testListFolderContinue()
    {
        $dropbox = $this->getDropbox($this->getResponseForList());
        $list = $dropbox->listFolderContinue('fake_cursor');

        $this->assertRequest('/files/list_folder/continue', ['cursor' => 'fake_cursor']);
        $this->assertInstanceOf(MetadataCollection::class, $list);
        $this->assertCount(2, $list->getItems());
        $this->assertEquals('fake_cursor', $list->getCursor());
    }

    public function testListFolderLatestCursor()
    {
        $dropbox = $this->getDropbox($this->getResponseCursor());
        $cursor = $dropbox->listFolderLatestCursor('/my/path');

        $this->assertRequest('/files/list_folder/get_latest_cursor', ['path' => '/my/path']);
        $this->assertEquals("ZtkX9_EHj3x7PMkVuFIhwKYXEpwpLwyxp9vMKomUhllil9q7eWiAu", $cursor);
    }

    /**
     * @dataProvider providerRoots
     * @param mixed $root
     */
    public function testListFolderLatestCursorRoot($root)
    {
        $dropbox = $this->getDropbox($this->getResponseCursor());
        $cursor = $dropbox->listFolderLatestCursor($root);

        $this->assertRequest('/files/list_folder/get_latest_cursor', ['path' => '']);
        $this->assertEquals("ZtkX9_EHj3x7PMkVuFIhwKYXEpwpLwyxp9vMKomUhllil9q7eWiAu", $cursor);
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     */
    public function testListFolderLatestCursorNoneThrowsException()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $dropbox->listFolderLatestCursor('/my/path');
    }

    public function testListRevisions()
    {
        $dropbox = $this->getDropbox($this->getResponseForListRevisions());
        $list = $dropbox->listRevisions('/myfile.txt');

        $this->assertRequest('/files/list_revisions', ['path' => '/myfile.txt']);
        $this->assertInstanceOf(ModelCollection::class, $list);
        /** @var FileMetadata $rev */
        $rev = $list->first();
        $this->assertInstanceOf(FileMetadata::class, $rev);
        $this->assertEquals('myfile.txt', $rev->getName());
        $this->assertEquals('35ef801f346f3', $rev->getRev());
        $rev1 = $list->get(1);
        $this->assertInstanceOf(FileMetadata::class, $rev1);
        $this->assertEquals('myfile.txt', $rev1->getName());
        $this->assertEquals('35dbe01f346f3', $rev1->getRev());
    }

    public function testSearch()
    {
        $dropbox = $this->getDropbox($this->getResponseForSearch());
        $results = $dropbox->search('/homework', 'prime numbers', ['mode' => 'filename']);

        $this->assertRequest('/files/search', ['mode' => 'filename', 'path' => '/homework', 'query' => 'prime numbers']);
        $this->assertInstanceOf(SearchResults::class, $results);
        $result = $results->getItems()->first();
        $this->assertInstanceOf(SearchResult::class, $result);
        $this->assertEquals('/homework/math/prime_numbers.txt', $result->getMetadata()->getPathLower());
    }

    /**
     * @dataProvider providerRoots
     * @param mixed $root
     */
    public function testSearchOnRoot($root)
    {
        $dropbox = $this->getDropbox($this->getResponseForSearch());
        $results = $dropbox->search($root, 'prime numbers');

        $this->assertRequest('/files/search', ['path' => '', 'query' => 'prime numbers']);
        $this->assertInstanceOf(SearchResults::class, $results);
        $result = $results->getItems()->first();
        $this->assertInstanceOf(SearchResult::class, $result);
        $this->assertEquals('/homework/math/prime_numbers.txt', $result->getMetadata()->getPathLower());
    }

    public function testCreateFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseForCreateFolder());
        $folder = $dropbox->createFolder('/my_path');

        $this->assertRequest('/files/create_folder', ['path' => '/my_path', 'autorename' => false]);
        $this->assertInstanceOf(FolderMetadata::class, $folder);
        $this->assertEquals('/my_path', $folder->getPathLower());
    }

    public function testDeleteFile()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $deleted = $dropbox->delete('/fake_dir/fake_file.txt');

        $this->assertRequest('/files/delete_v2', ['path' => '/fake_dir/fake_file.txt']);
        $this->assertInstanceOf(FileMetadata::class, $deleted);
        $this->assertEquals("/FakeDir/FakeFile.txt", $deleted->getPathDisplay(), 'Name of deleted file.');
    }

    public function testDeleteFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseFolder());
        $deleted = $dropbox->delete('/my_path');

        $this->assertRequest('/files/delete_v2', ['path' => '/my_path']);
        $this->assertInstanceOf(FolderMetadata::class, $deleted);
        $this->assertEquals("/FakeDir", $deleted->getPathDisplay(), 'Name of deleted folder.');
    }

    public function testMoveFile()
    {
        $dropbox = $this->getDropbox($this->getResponseForMoveFile());
        $moved = $dropbox->move("/fake_dir/fake_file.txt", "/new_dir/fake_file.txt");

        $this->assertRequest('/files/move', ['from_path' => '/fake_dir/fake_file.txt', 'to_path' => '/new_dir/fake_file.txt']);
        $this->assertInstanceOf(FileMetadata::class, $moved);
        $this->assertEquals("/new_dir/fake_file.txt", $moved->getPathLower());
    }

    public function testMoveFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseForMoveFolder());
        $moved = $dropbox->move("/fake_dir", "/new_dir/fake_dir");

        $this->assertRequest('/files/move', ['from_path' => '/fake_dir', 'to_path' => '/new_dir/fake_dir']);
        $this->assertInstanceOf(FolderMetadata::class, $moved);
        $this->assertEquals("/new_dir/fake_dir", $moved->getPathLower());
    }

    public function testCopyFile()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $file = $dropbox->copy('/fake_file.txt', '/fake_dir/fake_file.txt');

        $this->assertRequest('/files/copy', ['from_path' => '/fake_file.txt', 'to_path' => '/fake_dir/fake_file.txt']);
        $this->assertInstanceOf(FileMetadata::class, $file);
        $this->assertEquals('/fake_dir/fake_file.txt', $file->getPathLower(), 'Correct file name');
    }

    public function testCopyFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseFolder());
        $folder = $dropbox->copy('/new_dir/fake_dir', '/fake_dir');

        $this->assertRequest('/files/copy', ['from_path' => '/new_dir/fake_dir', 'to_path' => '/fake_dir']);
        $this->assertInstanceOf(FolderMetadata::class, $folder);
        $this->assertEquals('/fake_dir', $folder->getPathLower(), 'Correct folder name');
    }

    public function testRestore()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $file = $dropbox->restore('/fake_dir/fake_file.txt', 'a1c10ce0dd78');
        $this->assertRequest('/files/restore', ['path' => '/fake_dir/fake_file.txt', 'rev' => 'a1c10ce0dd78']);
        $this->assertInstanceOf(FileMetadata::class, $file);
        $this->assertEquals('a1c10ce0dd78', $file->getRev());
    }

    public function testGetCopyReference()
    {
        $dropbox = $this->getDropbox($this->getResponseForGetCopyReferenceFile());
        $reference = $dropbox->getCopyReference('/my_dir/my_file.txt');

        $this->assertRequest('/files/copy_reference/get', ['path' => '/my_dir/my_file.txt']);
        $this->assertInstanceOf(CopyReference::class, $reference);
        $this->assertEquals('AAAAAAHzRvNjM3RzazJvNnlxcjI', $reference->getReference(), 'Correct reference');
        $this->assertInstanceOf(FileMetadata::class, $reference->getMetadata());
        $this->assertEquals('id:gVmkYu1VfOEAAAAAAAABEA', $reference->getMetadata()->getId());
    }

    public function testGetCopyReferenceFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseForGetCopyReferenceFolder());
        $reference = $dropbox->getCopyReference('/my_dir');

        $this->assertRequest('/files/copy_reference/get', ['path' => '/my_dir']);
        $this->assertInstanceOf(CopyReference::class, $reference);
        $this->assertEquals('AAAAAAHzRvNrYXFtd3h4ZzE5ZjM', $reference->getReference(), 'Correct reference');
        $this->assertInstanceOf(FolderMetadata::class, $reference->getMetadata());
        $this->assertEquals('id:gVmkYu1VfOEAAAAAAAABEw', $reference->getMetadata()->getId());
    }

    public function testSaveCopyReference()
    {
        $dropbox = $this->getDropbox($this->getResponseForMoveFile());
        $reference = $dropbox->saveCopyReference('/new_dir/fake_file.txt', 'AAAAAAHzRvNjM3RzazJvNnlxcjI');

        $this->assertRequest('/files/copy_reference/save', ['path' => '/new_dir/fake_file.txt', 'copy_reference' => 'AAAAAAHzRvNjM3RzazJvNnlxcjI']);
        $this->assertInstanceOf(FileMetadata::class, $reference);
        $this->assertEquals('id:a4ayc_80_OEAAAAAAAAAXw', $reference->getId());
    }

    public function testSaveCopyReferenceFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseForMoveFolder());
        $reference = $dropbox->saveCopyReference('/new_dir/fake_dir', 'AAAAAAHzRvNrYXFtd3h4ZzE5ZjM');

        $this->assertRequest('/files/copy_reference/save', ['path' => '/new_dir/fake_dir', 'copy_reference' => 'AAAAAAHzRvNrYXFtd3h4ZzE5ZjM']);
        $this->assertInstanceOf(FolderMetadata::class, $reference);
        $this->assertEquals('id:gVmkYu1VfOEAAAAAAAABEg', $reference->getId());
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     * @expectedExceptionMessage Invalid Response
     *
     * @dataProvider providerWrongResponse
     * @param mixed $response
     */
    public function testSaveCopyReferenceWrongResponseThrowsException($response)
    {
        $dropbox = $this->getDropbox($response);
        $dropbox->saveCopyReference('/new_dir/fake_file.txt', 'AAAAAAHzRvNjM3RzazJvNnlxcjI');
    }

    public function testGetTemporaryLink()
    {
        $dropbox = $this->getDropbox($this->getResponseForGetTemporaryLink());
        $link = $dropbox->getTemporaryLink('/fake_dir/fake_file.txt');

        $this->assertRequest('/files/get_temporary_link', ['path' => '/fake_dir/fake_file.txt']);
        $this->assertInstanceOf(TemporaryLink::class, $link);
        $this->assertEquals('https://fake.dropboxusercontent.com/fake_link', $link->getLink());

        $file = $link->getMetadata();
        $this->assertInstanceOf(FileMetadata::class, $file);
        $this->assertEquals('/fake_dir/fake_file.txt', $file->getPathLower());
    }

    public function testSaveUrl()
    {
        $dropbox = $this->getDropbox(new Response200("{\".tag\": \"async_job_id\", \"async_job_id\": \"fake_id\"}"));
        $id = $dropbox->saveUrl('/fake_file.txt', 'http://www.example.com');

        $this->assertRequest('/files/save_url', ['path' => '/fake_file.txt', 'url' => 'http://www.example.com']);
        $this->assertEquals('fake_id', $id);
    }

    public function testCheckJobStatusComplete()
    {
        $dropbox = $this->getDropbox($this->getResponseForCheckJobStatus());
        $complete = $dropbox->checkJobStatus('fake_id');

        $this->assertRequest('/files/save_url/check_job_status', ['async_job_id' => 'fake_id']);
        $this->assertInstanceOf(FileMetadata::class, $complete);
        $this->assertEquals('/FakeFile.txt', $complete->getPathDisplay());
    }

    public function testCheckJobStatusFailed()
    {
        $dropbox = $this->getDropbox(new Response200('{".tag": "failed"}'));
        $status = $dropbox->checkJobStatus('fake_id');

        $this->assertRequest('/files/save_url/check_job_status', ['async_job_id' => 'fake_id']);
        $this->assertEquals('failed', $status);
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     * @expectedExceptionMessage Could not retrieve Async Job ID
     */
    public function testSaveUrlWrongResponseThrowsException()
    {
        $dropbox = $this->getDropbox(new Response200('{"wrong_key": "wrong_value"}'));
        $dropbox->saveUrl('/fake_file.txt', 'http://www.example.com');
    }

    public function testMakeDropboxFile()
    {
        $dropbox = new Dropbox($this->getApp());
        $file = $this->getFile();
        $dropboxFile = $dropbox->makeDropboxFile($file->url());
        $this->assertInstanceOf(DropboxFile::class, $dropboxFile);
        $this->assertEquals($file->getContent(), $dropboxFile->getContents());
        $this->assertEquals($file->size(), $dropboxFile->getSize());
        $maxLength = new \ReflectionProperty(DropboxFile::class, 'maxLength');
        $maxLength->setAccessible(true);
        $this->assertEquals(-1, $maxLength->getValue($dropboxFile));
        $offset = new \ReflectionProperty(DropboxFile::class, 'offset');
        $offset->setAccessible(true);
        $this->assertEquals(-1, $offset->getValue($dropboxFile));
    }

    public function testMakeDropboxFileWithOptions()
    {
        $dropbox = new Dropbox($this->getApp());
        $file = $this->getFile();
        $dropboxFile = $dropbox->makeDropboxFile($file->url(), 10, 2);
        $this->assertInstanceOf(DropboxFile::class, $dropboxFile);
        $this->assertEquals(substr($file->getContent(), 2, 10), $dropboxFile->getContents(), 'Offset 2 byte and length 10 byte');
        $this->assertEquals($file->size(), $dropboxFile->getSize());
        $maxLength = new \ReflectionProperty(DropboxFile::class, 'maxLength');
        $maxLength->setAccessible(true);
        $this->assertEquals(10, $maxLength->getValue($dropboxFile));
        $offset = new \ReflectionProperty(DropboxFile::class, 'offset');
        $offset->setAccessible(true);
        $this->assertEquals(2, $offset->getValue($dropboxFile));
    }

    public function testMakeDropboxFileViaDropboxFile()
    {
        $dropbox = new Dropbox($this->getApp());
        $file = new DropboxFile($this->getFile());
        $dropboxFile = $dropbox->makeDropboxFile($file);
        $this->assertSame($file, $dropboxFile, 'Return the same object');
    }

    public function testMakeDropboxFileDifferentMode()
    {
        $dropbox = new Dropbox($this->getApp());
        $file = new DropboxFile($this->getFile(), DropboxFile::MODE_WRITE);
        $dropboxFile = $dropbox->makeDropboxFile($file);
        $this->assertEquals(DropboxFile::MODE_READ, $dropboxFile->getMode(), 'Correct mode');
        $this->assertNotSame($file, $dropboxFile, 'Return a different object while mode is different');
    }

    public function testMakeDropboxFileLargeFiles()
    {
        $dropbox = new Dropbox($this->getApp());
        $file = $this->getLargeFile();
        $dropboxFile = $dropbox->makeDropboxFile($file->url());
        $this->assertInstanceOf(DropboxFile::class, $dropboxFile);
        $this->assertEquals($file->size(), $dropboxFile->getSize());
        $this->assertEquals($file->read(100), $dropboxFile->getStream()->read(100));
    }

    public function testUpload()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $uploaded = $dropbox->upload($this->getFile()->url(), '/fake_dir/fake_file.txt', ['autorename' => 'true']);

        $this->assertRequest('/files/upload', ['autorename' => 'true', 'path' => '/fake_dir/fake_file.txt'], false);

        $this->assertInstanceOf(FileMetadata::class, $uploaded);
        $this->assertEquals('/fake_dir/fake_file.txt', $uploaded->getPathLower());
    }

    public function testUploadDropboxFile()
    {
        $dropbox = $this->getDropbox($this->getResponseFile());
        $dropboxFile = new DropboxFile($this->getFile()->url());
        $uploaded = $dropbox->upload($dropboxFile, '/fake_dir/fake_file.txt', ['autorename' => 'true']);

        $this->assertRequest('/files/upload', ['autorename' => 'true', 'path' => '/fake_dir/fake_file.txt'], false);
        $this->assertInstanceOf(FileMetadata::class, $uploaded);
        $this->assertEquals('/fake_dir/fake_file.txt', $uploaded->getPathLower());
    }

    public function testStartUploadSession()
    {
        $file = $this->getLargeFile(1);

        $dropbox = $this->getDropbox($this->getResponseUploadSession());
        $sessionId = $dropbox->startUploadSession($file->url());

        $this->assertRequest('/files/upload_session/start', ['close' => false], false);
        $this->assertEquals('1234wxyz5678abcd', $sessionId);
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     * @expectedExceptionMessage Could not retrieve Session ID
     */
    public function testStartUploadSessionNoSessionIdThrowsException()
    {
        $file = $this->getFile();

        $dropbox = $this->getDropbox($this->getResponseFile());
        $sessionId = $dropbox->startUploadSession($file->url());
    }

    public function testAppendUploadSession()
    {
        $file = $this->getFile();

        $dropbox = $this->getDropbox(new Response200(''));
        $sessionId = $dropbox->appendUploadSession($file->url(), 'fake_session_id', 0, 5);
        $this->assertRequest('/files/upload_session/append_v2', [
            'cursor' => ['session_id' => 'fake_session_id', 'offset' => 0],
            'close'  => false
        ], false);
        $this->assertEquals('fake_session_id', $sessionId);
    }

    public function testFinishUploadSession()
    {
        $file = $this->getFile();
        $dropbox = $this->getDropbox($this->getResponseFile());
        $metadata = $dropbox->finishUploadSession($file->url(), 'fake_session_id', 10, 20, '/fake_dir/fake_file.txt');

        $this->assertRequest('/files/upload_session/finish', [
            'cursor' => ['session_id' => 'fake_session_id', 'offset' => 10],
            'commit' => ['path' => '/fake_dir/fake_file.txt']
        ], false);
        $this->assertInstanceOf(FileMetadata::class, $metadata);
        $this->assertEquals('/fake_dir/fake_file.txt', $metadata->getPathLower());
        $this->assertEquals('id:a4ayc_80_OEAAAAAAAAAXw', $metadata->getId());
    }

    public function testUploadLargeFile()
    {
        $responses[] = $this->getResponseUploadSession();
        $responses[] = $this->getResponseFile();
        $responses[] = $this->getResponseFile();
        $options['http_client_handler'] = $this->getMockHandler($responses);
        $dropbox = new Dropbox($this->getApp(), $options);

        $file = $this->getLargeFile(10);
        $metadata = $dropbox->upload($file->url(), '/fake_dir/fake_file.txt');

        //Test requests
        $this->assertCount(3, $this->getHistory(), 'Two calls to Dropbox api');

        /** @var Request $request */
        $request = $this->getHistory()[0]['request'];
        $uri = $request->getUri();
        $this->assertEquals(
            DropboxClient::CONTENT_PATH . '/files/upload_session/start',
            "https://{$uri->getHost()}{$uri->getPath()}",
            'First call to upload_session/start endpoint'
        );
        $this->assertEquals(['application/octet-stream'], $request->getHeader('Content-Type'), 'Stream content type');
        $this->assertEquals([json_encode(['close' => false])], $request->getHeader('Dropbox-API-Arg'), 'Correct Dropbox-API-Arg header');

        /** @var Request $request */
        $request = $this->getHistory()[1]['request'];
        $uri = $request->getUri();
        $this->assertEquals(
            DropboxClient::CONTENT_PATH . '/files/upload_session/append_v2',
            "https://{$uri->getHost()}{$uri->getPath()}",
            'Second call to upload_session/append endpoint'
        );
        $this->assertEquals(['application/octet-stream'], $request->getHeader('Content-Type'), 'Stream content type');
        $responseBody = [
            'cursor' => ['session_id' => '1234wxyz5678abcd', 'offset' => 4000000],
            'close'  => false
        ];
        $this->assertEquals([json_encode($responseBody)], $request->getHeader('Dropbox-API-Arg'), 'Correct Dropbox-API-Arg header');

        /** @var Request $request */
        $request = $this->getHistory()[2]['request'];
        $uri = $request->getUri();
        $this->assertEquals(
            DropboxClient::CONTENT_PATH . '/files/upload_session/finish',
            "https://{$uri->getHost()}{$uri->getPath()}",
            'Third call to upload_session/finish endpoint'
        );
        $this->assertEquals(['application/octet-stream'], $request->getHeader('Content-Type'), 'Stream content type');
        $responseBody = [
            'cursor' => ['session_id' => '1234wxyz5678abcd', 'offset' => 8000000],
            'commit' => ['path' => '/fake_dir/fake_file.txt']
        ];
        $this->assertEquals([json_encode($responseBody)], $request->getHeader('Dropbox-API-Arg'), 'Correct Dropbox-API-Arg header');

        $this->assertInstanceOf(FileMetadata::class, $metadata);
        $this->assertEquals('/fake_dir/fake_file.txt', $metadata->getPathLower());
    }

    public function testGetThumbnail()
    {
        $image = $this->getImage();
        $dropbox = $this->getDropbox($this->getResponseContentFile($image));
        $respFile = $dropbox->getThumbnail('/fake_dir/fake_image.jpg');
        $this->assertRequest('/files/get_thumbnail', [
            'path' => '/fake_dir/fake_image.jpg',
            'format' => 'jpeg',
            'size' => 'w64h64'
        ], false);

        $this->assertInstanceOf(Thumbnail::class, $respFile);
        $this->assertEquals('/fake_dir/fake_image.jpg', $respFile->getMetadata()->getPathLower());
        $this->assertEquals($image->getContent(), $respFile->getContents());
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     * @expectedExceptionMessage Invalid format
     */
    public function testGetThumbnailWrongFormatThrowsException()
    {
        $image = $this->getImage();
        $dropbox = $this->getDropbox($this->getResponseContentFile($image));
        $respFile = $dropbox->getThumbnail('/fake_dir/fake_image.jpg', 'small', 'tiff');
    }

    public function testDownload()
    {
        $file = $this->getImage();
        $dropbox = $this->getDropbox($this->getResponseContentFile($file));
        $downloaded = $dropbox->download('/fake_dir/fake_image.jpg');

        $this->assertRequest('/files/download', ['path' => '/fake_dir/fake_image.jpg'], false);
        $this->assertInstanceOf(File::class, $downloaded);
        $this->assertEquals($file->getContent(), $downloaded->getContents());
        $this->assertEquals('/fake_dir/fake_image.jpg', $downloaded->getMetadata()->getPathLower());
    }

    public function testDownloadWithDefinedPath()
    {
        $file = $this->getImage();
        $dropbox = $this->getDropbox($this->getResponseContentFile($file));
        $outputFile = vfsStream::newFile('target_file.jpg')->at($this->getRoot());
        $downloaded = $dropbox->download('/fake_dir/fake_image.jpg', $outputFile->url());

        $this->assertRequest('/files/download', ['path' => '/fake_dir/fake_image.jpg'], false);
        $this->assertInstanceOf(File::class, $downloaded);
        $this->assertEquals($file->getContent(), $downloaded->getContents());
        $this->assertEquals('/fake_dir/fake_image.jpg', $downloaded->getMetadata()->getPathLower());
        $this->assertEquals($file->getContent(), $outputFile->getContent());
    }

    public function testGetCurrentAccount()
    {
        $dropbox = $this->getDropbox($this->getResponseUser());
        $user = $dropbox->getCurrentAccount();

        $this->assertRequest('/users/get_current_account', []);
        $this->assertInstanceOf(Account::class, $user);
        $this->assertEquals('fake_account_id', $user->getAccountId());
    }

    public function testGetAccount()
    {
        $dropbox = $this->getDropbox($this->getResponseUser());
        $user = $dropbox->getAccount('fake_account_id');

        $this->assertRequest('/users/get_account', ['account_id' => 'fake_account_id']);
        $this->assertInstanceOf(Account::class, $user);
        $this->assertEquals('fake_account_id', $user->getAccountId());
        $this->assertEquals('Firstname Lastname', $user->getDisplayName());
    }

    public function testGetAccounts()
    {
        $dropbox = $this->getDropbox($this->getResponseUserList());
        $userList = $dropbox->getAccounts(['fake_account_id', 'fake_account_id_1']);

        $this->assertRequest('/users/get_account_batch', ['account_ids' => ['fake_account_id', 'fake_account_id_1']]);
        $this->assertInstanceOf(AccountList::class, $userList);

        $this->assertEquals('fake_account_id', $userList[0]->getAccountId());
        $this->assertEquals('fake_account_id_1', $userList[1]->getAccountId());
        $this->assertEquals('Fake User', $userList[0]->getDisplayName());
        $this->assertEquals('Second Fake User', $userList[1]->getDisplayName());
    }

    public function testGetSpaceUsage()
    {
        $dropbox = $this->getDropbox($this->getResponseForSpaceUsage());
        $space = $dropbox->getSpaceUsage();

        $this->assertRequest('/users/get_space_usage', []);
        $expected = [
            'used'       => 2004434847,
            'allocation' =>  [
                '.tag'     => 'individual',
                'allocated' => 7113539584
            ]
        ];
        $this->assertEquals($expected, $space);
    }
}
