<?php

namespace Kunnu\Dropbox\Tests;

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\Models\FileMetadata;
use Kunnu\Dropbox\Models\FolderMetadata;
use Kunnu\Dropbox\Tests\Util\ResponsesTrait;

/**
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
class DropboxTest extends TestCase
{
    use ResponsesTrait;

    public function testGetMetadataOnFile()
    {
        $dropbox = $this->getDropbox($this->getResponseForGetMetadataOnFile());
        $metadata = $dropbox->getMetadata('/fake_dir/fake_file.txt');

        $this->assertRequest('/files/get_metadata', ['path' => '/fake_dir/fake_file.txt']);
        $this->assertInstanceOf(FileMetadata::class, $metadata);
        $this->assertEquals('fake_file.txt', $metadata->getName());
        $this->assertEquals('/fake_dir/fake_file.txt', $metadata->getPathLower());
        $this->assertEquals('id:a4ayc_80_OEAAAAAAAAAXw', $metadata->getId());
    }

    public function testGetMetadataOnFolder()
    {
        $dropbox = $this->getDropbox($this->getResponseForGetMetadataOnFolder());
        $metadata = $dropbox->getMetadata('/fake_dir');

        $this->assertRequest('/files/get_metadata', ['path' => '/fake_dir']);
        $this->assertInstanceOf(FolderMetadata::class, $metadata);
        $this->assertEquals('fake_dir', $metadata->getName());
        $this->assertEquals('/fake_dir', $metadata->getPathLower());
        $this->assertEquals('id:g4p535ni2HABCDEFGHCQ', $metadata->getId());
    }

    /**
     * @expectedException \Kunnu\Dropbox\Exceptions\DropboxClientException
     * @expectedExceptionMessage Metadata for the root folder is unsupported.
     */
    public function testMetadataRootPathThrowsException()
    {
        $options['http_client_handler'] = $this->getMockHandler();
        $dropbox = new Dropbox($this->getApp(), $options);
        $dropbox->getMetadata('/');
    }
}
