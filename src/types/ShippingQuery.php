<?php

namespace TelegramBot\types;

/**
 * This object contains information about an incoming shipping query.
 */
class ShippingQuery implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Unique query identifier
     */
    public $id;

    /**
     * @var User User who sent the query
     */
    public $from;

    /**
     * @var string Bot specified invoice payload
     */
    public $invoicePayload;

    /**
     * @var ShippingAddress User specified shipping address
     */
    public $shippingAddress;
}
