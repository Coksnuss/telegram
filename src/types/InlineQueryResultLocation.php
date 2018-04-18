<?php

namespace TelegramBot\types;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 */
class InlineQueryResultLocation implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be location
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 Bytes
     */
    public $id;

    /**
     * @var float Location latitude in degrees
     */
    public $latitude;

    /**
     * @var float Location longitude in degrees
     */
    public $longitude;

    /**
     * @var string Location title
     */
    public $title;

    /**
     * @var int Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     */
    public $livePeriod;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the location
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
