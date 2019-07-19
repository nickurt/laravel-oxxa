<?php

namespace nickurt\Oxxa\Api;

class Funds extends AbstractApi
{
    /**
     * @return array
     */
    public function get()
    {
        return $this->request(['command' => 'funds_get']);
    }

    /**
     * @param array $params
     * @return array
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'funds_list'], $params));
    }
}