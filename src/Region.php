<?php

namespace LittleGreenMan\LinodeV4;

use Locale;

class Region
{
    protected string $id;

    protected string $country;

    protected string $countryName;

    protected array $capabilities;

    protected string $status;

    protected array $resolvers;

    public function __construct($regionData)
    {
        foreach ($regionData as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }

        $this->countryName = Locale::getDisplayName($this->country);
    }
}
