<?php

namespace TelegramBot\types;

/**
 * This object represents a shipping address.
 */
class ShippingAddress implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string ISO 3166-1 alpha-2 country code
     */
    public $countryCode;

    /**
     * @var string State, if applicable
     */
    public $state;

    /**
     * @var string City
     */
    public $city;

    /**
     * @var string First line for the address
     */
    public $streetLine1;

    /**
     * @var string Second line for the address
     */
    public $streetLine2;

    /**
     * @var string Address post code
     */
    public $postCode;
}
