<?php

namespace TelegramBot\types;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 */
class InlineQueryResultContact implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be contact
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 Bytes
     */
    public $id;

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
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the contact
     */
    public $inputMessageContent;

    /**
     * @var string Optional. Url of the thumbnail for the result
     */
    public $thumbUrl;

    /**
     * @var int Optional. Thumbnail width
     */
    public $thumbWidth;

    /**
     * @var int Optional. Thumbnail height
     */
    public $thumbHeight;
}
