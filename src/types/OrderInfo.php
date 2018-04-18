<?php

namespace TelegramBot\types;

/**
 * This object represents information about an order.
 */
class OrderInfo implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Optional. User name
     */
    public $name;

    /**
     * @var string Optional. User's phone number
     */
    public $phoneNumber;

    /**
     * @var string Optional. User email
     */
    public $email;

    /**
     * @var ShippingAddress Optional. User shipping address
     */
    public $shippingAddress;
}
