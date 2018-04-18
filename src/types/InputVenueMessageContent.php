<?php

namespace TelegramBot\types;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 */
class InputVenueMessageContent
{
    use FactoryTrait;

    /**
     * @var float Latitude of the venue in degrees
     */
    public $latitude;

    /**
     * @var float Longitude of the venue in degrees
     */
    public $longitude;

    /**
     * @var string Name of the venue
     */
    public $title;

    /**
     * @var string Address of the venue
     */
    public $address;

    /**
     * @var string Optional. Foursquare identifier of the venue, if known
     */
    public $foursquareId;
}
