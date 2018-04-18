<?php

namespace TelegramBot\types;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 */
class ChosenInlineResult implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string The unique identifier for the result that was chosen
     */
    public $resultId;

    /**
     * @var User The user that chose the result
     */
    public $from;

    /**
     * @var Location Optional. Sender location, only for bots that require user location
     */
    public $location;

    /**
     * @var string Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
     */
    public $inlineMessageId;

    /**
     * @var string The query that was used to obtain the result
     */
    public $query;
}
