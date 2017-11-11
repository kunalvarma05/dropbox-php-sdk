<?php

namespace Kunnu\Dropbox\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use Kunnu\Dropbox\Dropbox;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Kunnu\Dropbox\DropboxApp;
use GuzzleHttp\Handler\MockHandler;
use Kunnu\Dropbox\DropboxClient;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Kunnu\Dropbox\Http\Clients\DropboxHttpClientFactory;
use Kunnu\Dropbox\Http\Clients\DropboxHttpClientInterface;

/**
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
class TestCase extends BaseTestCase
{
    /**
     * @var  DropboxApp
     */
    protected $app;

    /**
     * @var callable
     */
    protected $tracer;

    /**
     * @var array
     */
    protected $history;

    /**
     * Set up the history middleware, to keep track of requests and responses.
     *
     * @see http://docs.guzzlephp.org/en/stable/testing.html
     */
    public function setUp()
    {
        $this->history = [];
        $this->tracer = Middleware::history($this->history);
    }

    /**
     * @return DropboxApp
     */
    public function getApp()
    {
        if (null === $this->app) {
            $this->app = new DropboxApp('fake_id', 'fake_secret', 'fake_token');
        }

        return $this->app;
    }

    /**
     * @return array
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Create a mock handler to test without a real call to Dropbox api.
     *
     * @param array $params An array of Response objects, expected to return from Dropbox api.
     *
     * @return DropboxHttpClientInterface
     *
     * @see http://docs.guzzlephp.org/en/stable/testing.html
     */
    public function getMockHandler(array $params = [])
    {
        $mock = new MockHandler($params);
        $handler = HandlerStack::create($mock);
        $handler->push($this->tracer);
        $client = new Client(['handler' => $handler]);

        return DropboxHttpClientFactory::make($client);
    }

    /**
     * Facility method to quickly retrieve an already mocked Dropbox instance.
     *
     * @param Response $response
     *
     * @return Dropbox
     */
    public function getDropbox(Response $response)
    {
        $options['http_client_handler'] = $this->getMockHandler([$response]);
        $dropbox = new Dropbox($this->getApp(), $options);

        return $dropbox;
    }

    /**
     * Facility method to perform standard assertions on requests:
     * 1) single call to Dropbox api
     * 2) POST method
     * 3) correct uri
     * 4) correct headers
     * 5) correct request body.
     *
     * @param string $endpoint Endpoint url
     * @param array  $body     The body of the request
     * @param bool   $rpc      If it's an RPC endpoint
     */
    public function assertRequest(string $endpoint, array $body, bool $rpc = true)
    {
        $path = $rpc ? DropboxClient::BASE_PATH : DropboxClient::CONTENT_PATH;

        //Test request
        $this->assertCount(1, $this->getHistory(), 'One call to Dropbox api');
        /** @var Request $request */
        $request = $this->getHistory()[0]['request'];
        $this->assertEquals('POST', $request->getMethod(), 'Submit Dropbox call via POST method');
        $this->assertEquals($path . $endpoint, $request->getUri(), 'Correct uri');
        $this->assertEquals(['application/json'], $request->getHeader('Content-Type'), 'Json content type');
        $this->assertEquals(['Bearer fake_token'], $request->getHeader('Authorization'), 'Authorization with token');
        $this->assertEquals(json_encode($body), $request->getBody()->getContents(), 'Correct request body');
    }
}
