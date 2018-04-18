<?php

namespace TelegramBot\types;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 */
class InputLocationMessageContent implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var float Latitude of the location in degrees
     */
    public $latitude;

    /**
     * @var float Longitude of the location in degrees
     */
    public $longitude;

    /**
     * @var int Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     */
    public $livePeriod;
}
