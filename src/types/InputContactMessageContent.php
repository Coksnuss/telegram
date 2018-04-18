<?php

namespace TelegramBot\types;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 */
class InputContactMessageContent implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Contact's phone number
     */
    public $phoneNumber;

    /**
     * @var string Contact's first name
     */
    public $firstName;

    /**
     * @var string Optional. Contact's last name
     */
    public $lastName;
}
