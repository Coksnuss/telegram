<?php

namespace TelegramBot\types;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 */
class InlineQueryResultVenue implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be venue
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 Bytes
     */
    public $id;

    /**
     * @var float Latitude of the venue location in degrees
     */
    public $latitude;

    /**
     * @var float Longitude of the venue location in degrees
     */
    public $longitude;

    /**
     * @var string Title of the venue
     */
    public $title;

    /**
     * @var string Address of the venue
     */
    public $address;

    /**
     * @var string Optional. Foursquare identifier of the venue if known
     */
    public $foursquareId;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the venue
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
