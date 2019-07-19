<?php

namespace nickurt\Oxxa\HttpClient;

class HttpClient implements HttpClientInterface
{
    /** @var \Http\Client\HttpClient */
    protected $httpClient;

    /** @var array */
    protected $options = [];

    /**
     * @param array $params
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($params)
    {
        return $this->request($params, 'GET');
    }

    /**
     * @param array $params
     * @param string $httpMethod
     * @param array $headers
     * @param array $options
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($params, $httpMethod = 'GET', array $headers = [], array $options = [])
    {
        $fullPath = $this->getOptions()['base_url'] . '?' . http_build_query($params);

        $response = $this->getClient()->request(
            $httpMethod,
            $fullPath,
            []
        );

        return json_decode(json_encode(simplexml_load_string($response->getBody())), true);
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
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        if (!isset($this->client)) {
            $this->client = new \GuzzleHttp\Client();

            return $this->client;
        }

        return $this->client;
    }

    /**
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
}