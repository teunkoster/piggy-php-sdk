<?php

namespace Piggy\Api\Http\Responses;

use stdClass;

/**
 * Class Response
 * @package Piggy\Api\Http
 */
class Response
{
    private $data;

    /**
     * @var stdClass
     */
    private $meta;

    /**
     * Response constructor.
     * @param $data
     * @param $meta
     */
    public function __construct($data, $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @return stdClass
     */
    public function getMeta()
    {
        return $this->meta;
    }
}
