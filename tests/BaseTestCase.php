<?php

namespace Piggy\Api\Tests;

use DateTime;
use DateTimeInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;
use function Piggy\Api\hasGuzzle5;

/**
 * Class BaseTestCase
 * @package Piggy\Api\Tests
 */
class BaseTestCase extends TestCase
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (hasGuzzle5()) {
            $mock = new MockHandlerAdapter();
            $httpClient = new HttpClient(['handler' => $mock]);
        } else {
            $mock = new MockHandler();
            $handlerStack = HandlerStack::create($mock);
            $httpClient = new HttpClient(['handler' => $handlerStack]);
        }

        $this->httpClient = $httpClient;
        $this->mockHandler = $mock;
    }

    /**
     * @param array $data
     * @param array|null $meta
     * @param int $code
     */
    protected function addExpectedResponse(array $data, array $meta = null, int $code = 200)
    {
        $payload = json_encode([
            "data" => $data,
            "meta" => $meta
        ]);

        if (hasGuzzle5()) {
            $stream = fopen('php://memory', 'r+');
            fwrite($stream, $payload);
            rewind($stream);

            $streamWrapper = new Stream($stream);
            $response = new Response($code, [], $streamWrapper);
        } else {
            $response = new \GuzzleHttp\Psr7\Response($code, [], $payload);
        }

        $this->mockHandler->append($response);
    }

    /**
     * @param string $date
     * @return DateTime|false
     */
    public function parseDate(string $date)
    {
        return DateTime::createFromFormat(DateTimeInterface::ATOM, $date);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }

    /**
     * @return MockHandler
     */
    public function getMockHandler()
    {
        return $this->mockHandler;
    }
}
