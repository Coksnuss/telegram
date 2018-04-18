<?php

namespace TelegramBot\types;

/**
 * This object represents a point on the map.
 */
class Location
{
    use FactoryTrait;

    /**
     * @var float Longitude as defined by sender
     */
    public $longitude;

    /**
     * @var float Latitude as defined by sender
     */
    public $latitude;
}
