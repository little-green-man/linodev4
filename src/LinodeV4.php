<?php

namespace LittleGreenMan\LinodeV4;

class LinodeV4
{
    private string $api_key;

    public function __construct()
    {
        $this->api_key = config('linodev4.api_key');
    }
}
