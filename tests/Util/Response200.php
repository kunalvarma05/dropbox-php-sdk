<?php

namespace Kunnu\Dropbox\Tests\Util;

use GuzzleHttp\Psr7\Response;

/**
 * Utility class to generate responses 200.
 */
class Response200 extends Response
{
    public function __construct($body = null)
    {
        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer fake_token'
        ];
        parent::__construct(200, $headers, $body);
    }
}
