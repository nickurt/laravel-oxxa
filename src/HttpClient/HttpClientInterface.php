<?php

namespace nickurt\Oxxa\HttpClient;

interface HttpClientInterface
{
    /** @return array */
    public function getOptions();

    /**
     * @param array $params
     * @return mixed
     */
    public function get(array $params);

    /**
     * @param $params
     * @param string $httpMethod
     * @param array $headers
     * @param array $options
     * @return mixed
     */
    public function request($params, $httpMethod = 'GET', array $headers = [], array $options = []);

    /**
     * @param array $options
     */
    public function setOptions(array $options);
}