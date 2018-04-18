<?php

namespace TelegramBot\types;

/**
 * This object represents a Telegram user or bot.
 */
class User implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var int Unique identifier for this user or bot
     */
    public $id;

    /**
     * @var bool True, if this user is a bot
     */
    public $isBot;

    /**
     * @var string User's or bot's first name
     */
    public $firstName;

    /**
     * @var string Optional. User's or bot's last name
     */
    public $lastName;

    /**
     * @var string Optional. User's or bot's username
     */
    public $username;

    /**
     * @var string Optional. IETF language tag of the user's language
     */
    public $languageCode;
}
