<?php

namespace Kunnu\Dropbox\Tests\Util;

use GuzzleHttp\Psr7\Response;

/**
 * Utility class to generate responses 409 and testing errors.
 */
class Response409 extends Response
{
    public function __construct($body = null)
    {
        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer fake_token'
        ];
        parent::__construct(409, $headers, $body);
    }
}
