<?php

namespace TelegramBot\types;

/**
 * This object represents a phone contact.
 */
class Contact
{
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

    /**
     * @var int Optional. Contact's user identifier in Telegram
     */
    public $userId;
}
