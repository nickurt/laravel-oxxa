<?php

namespace nickurt\Oxxa\Tests\Endpoints;

use PHPUnit\Framework\TestCase;

abstract class BaseEndpointTest extends TestCase
{
    /** @var \GuzzleHttp\Client */
    protected $httpClient;

    /** @var \nickurt\Oxxa\Client */
    protected $oxxa;

    /**
     * @param \GuzzleHttp\Psr7\Response $expectedResponse
     */
    public function mockApiClientResponse(\GuzzleHttp\Psr7\Response $expectedResponse)
    {
        $this->httpClient = $this->createMock(\GuzzleHttp\Client::class);

        $this->oxxa = new \nickurt\Oxxa\Client();
        $this->oxxa->setCredentials('username', 'password');
        $this->oxxa->getHttpClient()->setClient($this->httpClient);

        $this->httpClient->method('request')->willReturnCallback(function ($method, $uri, $options) use ($expectedResponse) {
            //

            return $expectedResponse;
        });
    }
}