<?php

namespace nickurt\Oxxa\HttpClient;

use Exception;
use Http\Client\Exception\NetworkException;
use Http\Client\Exception\RequestException;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;
use Psr\Http\Message\RequestInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * @var \Http\Client\HttpClient
     */
    protected $httpClient;

    /**
     * @var \Http\Message\MessageFactory
     */
    protected $requestFactory;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * HttpClient constructor.
     * @param null $httpClient
     * @param RequestFactory|null $requestFactory
     */
    public function __construct($httpClient = null, RequestFactory $requestFactory = null)
    {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: MessageFactoryDiscovery::find();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function get($params)
    {
        return $this->request($params, 'GET');
    }

    /**
     * @param $params
     * @param string $httpMethod
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function request($params, $httpMethod = 'GET', array $headers = [], array $options = [])
    {
        $fullPath = $this->getOptions()['base_url'].'?'.http_build_query($params);

        $request = $this->requestFactory->createRequest(
            $httpMethod,
            $fullPath,
            $headers
        );

        return $this->sendRequest($request);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     * @throws \Http\Client\Exception
     */
    private function sendRequest(RequestInterface $request)
    {
        try {
            $response = $this->httpClient->sendRequest($request);

            return json_decode(json_encode(simplexml_load_string($response->getBody())), true);
        } catch (NetworkException $networkException) {
            throw new NetworkException($networkException->getMessage(), $request, $networkException);
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage(), $request, $exception);
        }
    }
}