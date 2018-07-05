<?php

namespace nickurt\Oxxa\Api;

class Funds extends AbstractApi
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->request(['command' => 'funds_get']);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'funds_list'], $params));
    }
}