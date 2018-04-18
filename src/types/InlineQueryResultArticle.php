<?php

namespace TelegramBot\types;

/**
 * Represents a link to an article or web page.
 */
class InlineQueryResultArticle implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be article
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 Bytes
     */
    public $id;

    /**
     * @var string Title of the result
     */
    public $title;

    /**
     * @var InputMessageContent Content of the message to be sent
     */
    public $inputMessageContent;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var string Optional. URL of the result
     */
    public $url;

    /**
     * @var bool Optional. Pass True, if you don't want the URL to be shown in the message
     */
    public $hideUrl;

    /**
     * @var string Optional. Short description of the result
     */
    public $description;

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
