<?php

namespace TelegramBot\types;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 */
class InlineQueryResultDocument implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be document
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 bytes
     */
    public $id;

    /**
     * @var string Title for the result
     */
    public $title;

    /**
     * @var string Optional. Caption of the document to be sent, 0-200 characters
     */
    public $caption;

    /**
     * @var string Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parseMode;

    /**
     * @var string A valid URL for the file
     */
    public $documentUrl;

    /**
     * @var string Mime type of the content of the file, either “application/pdf” or “application/zip”
     */
    public $mimeType;

    /**
     * @var string Optional. Short description of the result
     */
    public $description;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the file
     */
    public $inputMessageContent;

    /**
     * @var string Optional. URL of the thumbnail (jpeg only) for the file
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
