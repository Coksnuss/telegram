<?php

namespace TelegramBot\types;

/**
 * Represents a link to a photo stored on the Telegram servers. By default, this photo will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 */
class InlineQueryResultCachedPhoto
{
    use FactoryTrait;

    /**
     * @var string Type of the result, must be photo
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 bytes
     */
    public $id;

    /**
     * @var string A valid file identifier of the photo
     */
    public $photoFileId;

    /**
     * @var string Optional. Title for the result
     */
    public $title;

    /**
     * @var string Optional. Short description of the result
     */
    public $description;

    /**
     * @var string Optional. Caption of the photo to be sent, 0-200 characters
     */
    public $caption;

    /**
     * @var string Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parseMode;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the photo
     */
    public $inputMessageContent;
}
