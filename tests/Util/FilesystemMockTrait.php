<?php

namespace Kunnu\Dropbox\Tests\Util;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamFile;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\content\LargeFileContent;

/**
 * Trait FilesystemMockTrait.
 *
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
trait FilesystemMockTrait
{
    /**
     * @var vfsStreamDirectory
     */
    protected $root;

    /**
     * @var vfsStreamFile
     */
    protected $file;

    /**
     * @var vfsStreamFile
     */
    protected $largeFile;

    /**
     * @var vfsStreamFile
     */
    protected $image;

    /**
     * Return the root directory of a mocked filesystem.
     *
     * @return vfsStreamDirectory
     */
    public function getRoot()
    {
        if (null === $this->root) {
            $this->root = vfsStream::setup('fake_dir');
        }

        return $this->root;
    }

    /**
     * Return a mock file.
     *
     * @param string $filename
     *
     * @return vfsStreamFile
     */
    public function getFile($filename = 'fake_file.txt')
    {
        if (null === $this->file) {
            $this->file = vfsStream::newFile($filename)
                ->withContent('Content of the fake file.')
                ->at($this->getRoot());
        }

        return $this->file;
    }

    /**
     * Return a mock file, with given Mb size.
     *
     * @param string $filename
     * @param int    $size     File size in Mb
     *
     * @return vfsStreamFile
     */
    public function getLargeFile(int $size = 5, string $filename = 'fake_large_file.txt')
    {
        if (null === $this->largeFile) {
            $this->largeFile = vfsStream::newFile($filename)
                ->withContent(LargeFileContent::withMegabytes($size))
                ->at($this->getRoot());
        }

        return $this->largeFile;
    }

    /**
     * Return a mock jpeg file.
     *
     * @param string $name
     *
     * @throws \Exception
     * @return vfsStreamFile
     */
    public function getImage($name = 'fake_image.jpg')
    {
        if (null === $this->image) {
            $this->image = vfsStream::newFile($name)
                ->withContent(random_bytes(1024))
                ->at($this->getRoot());
        }

        return $this->image;
    }
}
