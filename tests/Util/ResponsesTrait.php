<?php

namespace Kunnu\Dropbox\Tests\Util;

use GuzzleHttp\Psr7\Response;
use org\bovigo\vfs\vfsStreamFile;

/**
 * Methods to generate specific responses for test cases.
 *
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
trait ResponsesTrait
{
    /**
     * Return a response containing one file metadata.
     *
     * @return Response200
     */
    public function getResponseFile()
    {
        $body = <<<JSON
{
    ".tag": "file",
    "name": "fake_file.txt",
    "path_lower": "/fake_dir/fake_file.txt",
    "path_display": "/FakeDir/FakeFile.txt",
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

    /**
     * Return a response containing one folder metadata.
     *
     * @return Response200
     */
    public function getResponseFolder()
    {
        $body = <<<JSON
{
    ".tag": "folder",
    "name": "fake_dir",
    "path_lower": "/fake_dir",
    "path_display": "/FakeDir",
    "id": "id:g4p535ni2HABCDEFGHCQ"
}           
JSON;
        return new Response200($body);
    }

    /**
     * Return a response containing one deleted metadata.
     *
     * @return Response200
     */
    public function getResponseDeleted()
    {
        $body = <<<JSON
{
    ".tag": "deleted",
    "name": "deleted_file.txt",
    "path_lower": "/fake_dir/deleted_file.txt",
    "path_display": "/FakeDir/DeletedFile.txt"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testGetMetadataErrorThrowsException.
     *
     * @return Response409
     */
    public function getResponseForMetadataError()
    {
        $body = <<<JSON
{
    "error_summary": "path/not_found/...",
    "error": {
        ".tag": "path",
        "path": {
            ".tag": "not_found"
        }
    }
}
JSON;
        return new Response409($body);
    }

    /**
     * Response for DropboxTest::testListFolderRoot.
     *
     * @return Response200
     */
    public function getResponseForListRoot()
    {
        $body = <<<JSON
{
  "entries": [
    {
      ".tag": "folder",
      "name": "Photos",
      "path_lower": "/photos",
      "path_display": "/Photos",
      "id": "id:gVpjYu1VfOEABCDEFGHIXA"
    },
    {
      ".tag": "folder",
      "name": "Music",
      "path_lower": "/music",
      "path_display": "/Music",
      "id": "id:gVmkYu1VfOOEABCDEFGHIXA"
    },
    {
      ".tag": "file",
      "name": "Getting Started.pdf",
      "path_lower": "/getting started.pdf",
      "path_display": "/Getting Started.pdf",
      "id": "id:gVmkYu1VfOEOEABCDEFGHIXA",
      "client_modified": "2011-02-10T10:13:48Z",
      "server_modified": "2011-02-10T10:13:47Z",
      "rev": "901f346f3",
      "size": 268860,
      "content_hash": "d7d3682cf1ca9a8e4d272cd72edcc709df75f2ee9cad71183fd50f210eb0cffa"
    },
    {
      ".tag": "file",
      "name": "Android intro.pdf",
      "path_lower": "/android intro.pdf",
      "path_display": "/Android intro.pdf",
      "id": "id:gVmkYu1VfOOEABCDEFGHIXAVg",
      "client_modified": "2011-02-13T17:36:33Z",
      "server_modified": "2011-02-13T17:36:33Z",
      "rev": "cc01f346f3",
      "size": 176607,
      "content_hash": "c0f11f5a1eecefe92f412e0177395d399226f989e416b5085e0f15ba0c6fc69a"
    }
  ],
  "cursor": "fake_cursor",
  "has_more": false
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testListFolder.
     *
     * @return Response200
     */
    public function getResponseForList()
    {
        $body = <<<JSON
{
  "entries": [
    {
      ".tag": "folder",
      "name": "Music",
      "path_lower": "/my_dir/music",
      "path_display": "/MyDir/Music",
      "id": "id:gVmkYu1VfOOEABCDEFGHIXA"
    },
    {
      ".tag": "file",
      "name": "Android intro.pdf",
      "path_lower": "/my_dir/android intro.pdf",
      "path_display": "/MyDir/Android intro.pdf",
      "id": "id:gVmkYu1VfOOEABCDEFGHIXAVg",
      "client_modified": "2011-02-13T17:36:33Z",
      "server_modified": "2011-02-13T17:36:33Z",
      "rev": "cc01f346f3",
      "size": 176607,
      "content_hash": "c0f11f5a1eecefe92f412e0177395d399226f989e416b5085e0f15ba0c6fc69a"
    }
  ],
  "cursor": "fake_cursor",
  "has_more": false
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testListFolderContinue,
     * DropboxTest::testListFolderLatestCursor and DropboxTest::testListFolderLatestCursorRoot.
     *
     * @return Response200
     */
    public function getResponseCursor()
    {
        $body = <<<JSON
{
    "cursor": "ZtkX9_EHj3x7PMkVuFIhwKYXEpwpLwyxp9vMKomUhllil9q7eWiAu"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testListRevisions.
     *
     * @return Response200
     */
    public function getResponseForListRevisions()
    {
        $body = <<<JSON
{
  "is_deleted": false,
  "entries": [
    {
      "name": "myfile.txt",
      "path_lower": "/myfile.txt",
      "path_display": "/myfile.txt",
      "id": "id:gVmkYu1VfOEAAAAAAAAADw",
      "client_modified": "2016-04-18T07:39:12Z",
      "server_modified": "2016-04-18T07:39:12Z",
      "rev": "35ef801f346f3",
      "size": 663,
      "content_hash": "882c15862e0d6d1bc978a68ede295af6bfa9e3feeb981e88867ffbc79e8eeff01"
    },
    {
      "name": "myfile.txt",
      "path_lower": "/myfile.txt",
      "path_display": "/myfile.txt",
      "id": "id:gVmkYu1VfOEAAFTGHAADw",
      "client_modified": "2013-06-24T20:50:56Z",
      "server_modified": "2013-06-24T20:51:05Z",
      "rev": "35dbe01f346f3",
      "size": 1099,
      "content_hash": "e9b6d1b9f38569017dde1a1dcb5585afa708029e1f22177a266f86fa8db78b15"
    }
  ]
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testSearch.
     *
     * @return Response200
     */
    public function getResponseForSearch()
    {
        $body = <<<JSON
{
    "matches": [
        {
            "match_type": {
                ".tag": "content"
            },
            "metadata": {
                ".tag": "file",
                "name": "Prime_Numbers.txt",
                "id": "id:a4ayc_80_OEAAAAAAAAAXw",
                "client_modified": "2015-05-12T15:50:38Z",
                "server_modified": "2015-05-12T15:50:38Z",
                "rev": "a1c10ce0dd78",
                "size": 7212,
                "path_lower": "/homework/math/prime_numbers.txt",
                "path_display": "/Homework/math/Prime_Numbers.txt",
                "sharing_info": {
                    "read_only": true,
                    "parent_shared_folder_id": "84528192421",
                    "modified_by": "dbid:AAH4f99T0taONIb-OurWxbNQ6ywGRopQngc"
                },
                "property_groups": [
                    {
                        "template_id": "ptid:1a5n2i6d3OYEAAAAAAAAAYa",
                        "fields": [
                            {
                                "name": "Security Policy",
                                "value": "Confidential"
                            }
                        ]
                    }
                ],
                "has_explicit_shared_members": false,
                "content_hash": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
            }
        }
    ],
    "more": false,
    "start": 1
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testCreateFolder.
     *
     * @return Response200
     */
    public function getResponseForCreateFolder()
    {
        $body = <<<JSON
{
    "metadata": {
        "name": "my_path",
        "id": "id:a4ayc_80_OEAAAAAAAAAXz",
        "path_lower": "/my_path",
        "path_display": "/MyPath",
        "sharing_info": {
            "read_only": false,
            "parent_shared_folder_id": "84528192421",
            "traverse_only": false,
            "no_access": false
        }
    }
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testMoveFile.
     *
     * @return Response200
     */
    public function getResponseForMoveFile()
    {
        $body = <<<JSON
{
    "metadata": {
        ".tag": "file",
        "name": "fake_file.txt",
        "path_lower": "/new_dir/fake_file.txt",
        "path_display": "/NewDir/FakeFile.txt",
        "id": "id:a4ayc_80_OEAAAAAAAAAXw",
        "client_modified": "2015-05-12T15:50:38Z",
        "server_modified": "2015-05-12T15:50:38Z",
        "rev": "a1c10ce0dd78",
        "size": 7212,
        "content_hash": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
    }
}           
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testMoveFolder.
     *
     * @return Response200
     */
    public function getResponseForMoveFolder()
    {
        $body = <<<JSON
{
    "metadata": {
        ".tag": "folder",
        "name": "fake_dir",
        "id": "id:a4ayc_80_OEAAAAAAAAAXz",
        "path_lower": "/new_dir/fake_dir",
        "path_display": "/NewDir/FakeDir",
        "id": "id:gVmkYu1VfOEAAAAAAAABEg"
    }
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DrpboxTest::testGetCopyReference.
     *
     * @return Response200
     */
    public function getResponseForGetCopyReferenceFile()
    {
        $body = <<<JSON
{
  "metadata": {
    ".tag": "file",
    "name": "my_file.txt",
    "path_lower": "/my_dir/my_file.txt",
    "path_display": "/my_dir/my_file.txt",
    "id": "id:gVmkYu1VfOEAAAAAAAABEA",
    "client_modified": "2017-11-27T18:11:06Z",
    "server_modified": "2017-11-28T06:34:45Z",
    "rev": "35fbe01f346f3",
    "size": 26,
    "content_hash": "64f5a3899a67f00bc66356bf07a925fceed75e7eb4adaf38fb57fbb82eb4f87b"
  },
  "copy_reference": "AAAAAAHzRvNjM3RzazJvNnlxcjI",
  "expires": "2047-11-21T07:14:31Z"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DrpboxTest::testGetCopyReferenceFolder.
     *
     * @return Response200
     */
    public function getResponseForGetCopyReferenceFolder()
    {
        $body = <<<JSON
{
  "metadata": {
    ".tag": "folder",
    "name": "my_dir",
    "path_lower": "/my_dir",
    "path_display": "/my_dir",
    "id": "id:gVmkYu1VfOEAAAAAAAABEw"
  },
  "copy_reference": "AAAAAAHzRvNrYXFtd3h4ZzE5ZjM",
  "expires": "2047-11-21T17:51:20Z"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testGetTemporaryLink.
     *
     * @return Response200
     */
    public function getResponseForGetTemporaryLink()
    {
        $body = <<<JSON
{
  "metadata": {
    "name": "fake_file.txt",
    "path_lower": "/fake_dir/fake_file.txt",
    "path_display": "/FakeDir/FakeFile.txt",
    "id": "id:gVmkYu1VfOEAAAAAAAABGA",
    "client_modified": "2017-11-27T19:13:57Z",
    "server_modified": "2017-11-27T19:15:18Z",
    "rev": "35fb901f346f3",
    "size": 10,
    "content_hash": "2161d6e127053dfbbe5922a0517b55874af93ec45a62a367dcfd978a538570f0"
  },
  "link": "https://fake.dropboxusercontent.com/fake_link"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testCheckJobStatusComplete.
     *
     * @return Response200
     */
    public function getResponseForCheckJobStatus()
    {
        $body= <<<JSON
{
    ".tag": "complete",
    "name": "fake_file.txt",
    "id": "id:a4ayc_80_OEAAAAAAAAAXw",
    "client_modified": "2015-05-12T15:50:38Z",
    "server_modified": "2015-05-12T15:50:38Z",
    "rev": "a1c10ce0dd78",
    "size": 7212,
    "path_lower": "/fake_file.txt",
    "path_display": "/FakeFile.txt",
    "has_explicit_shared_members": false,
    "content_hash": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response with an upload session id.
     *
     * @return Response200
     */
    public function getResponseUploadSession()
    {
        $body = <<<JSON
{
    "session_id": "1234wxyz5678abcd"
}
JSON;
        return new Response200($body);
    }

    /**
     * Response to test file download.
     *
     * @param vfsStreamFile $file
     *
     * @return Response
     */
    public function getResponseContentFile(vfsStreamFile $file)
    {
        $headers = [
            'Content-Type'    => '',
            'Authorization'   => 'Bearer fake_token',
            'dropbox-api-result' => json_encode([
                'name'=> 'fake_image.jpg',
                'id'=> 'id:a4ayc_80_OEAAAAAAAAAXw',
                'client_modified'=> '2015-05-12T15:50:38Z',
                'server_modified'=> '2015-05-12T15:50:38Z',
                'rev'=> 'a1c10ce0dd78',
                'size'=> 1024,
                'path_lower'=> '/fake_dir/fake_image.jpg',
                'path_display'=> '/fake_dir/fake_image.jpg'
            ])
        ];

        return new Response(200, $headers, $file->getContent());
    }

    /**
     * Response containing user information.
     *
     * @return Response200
     */
    public function getResponseUser()
    {
        $body = <<<JSON
{
  "account_id": "fake_account_id",
  "name": {
    "given_name": "Firstname",
    "surname": "Lastname",
    "familiar_name": "Firstname",
    "display_name": "Firstname Lastname",
    "abbreviated_name": "FL"
  },
  "email": "fake_mail@mail.org",
  "email_verified": true,
  "disabled": false,
  "country": "US",
  "locale": "en",
  "referral_link": "https://fake.link",
  "is_paired": false,
  "account_type": {
    ".tag": "basic"
  },
  "root_info": {
    ".tag": "user",
    "root_namespace_id": "12345678",
    "home_namespace_id": "98765432"
  }
}
JSON;
        return new Response200($body);
    }

    /**
     * Response containing a list of user information.
     *
     * @return Response200
     */
    public function getResponseUserList()
    {
        $body = <<<JSON
[
  {
    "account_id": "fake_account_id",
    "name": {
      "given_name": "Fake User",
      "surname": "Fake User Surname",
      "familiar_name": "Fake",
      "display_name": "Fake User",
      "abbreviated_name": "FU"
    },
    "email": "fake_use@email.com",
    "email_verified": true,
    "disabled": false,
    "is_teammate": false
  },
  {
    "account_id": "fake_account_id_1",
    "name": {
      "given_name": "Second User",
      "surname": "Second User Surname",
      "familiar_name": "Second User",
      "display_name": "Second Fake User",
      "abbreviated_name": "SF"
    },
    "email": "second_fake_user@email.com",
    "email_verified": true,
    "disabled": false,
    "is_teammate": true
  }
]
JSON;
        return new Response200($body);
    }

    /**
     * Response for DropboxTest::testGetSpaceUsage.
     *
     * @return Response200
     */
    public function getResponseForSpaceUsage()
    {
        $body = <<<JSON
{
  "used": 2004434847,
  "allocation": {
    ".tag": "individual",
    "allocated": 7113539584
  }
}
JSON;
        return new Response200($body);
    }
}
