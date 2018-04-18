<?php

namespace TelegramBot\types;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 */
class InlineQueryResultVideo implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be video
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 bytes
     */
    public $id;

    /**
     * @var string A valid URL for the embedded video player or video file
     */
    public $videoUrl;

    /**
     * @var string Mime type of the content of video url, “text/html” or “video/mp4”
     */
    public $mimeType;

    /**
     * @var string URL of the thumbnail (jpeg only) for the video
     */
    public $thumbUrl;

    /**
     * @var string Title for the result
     */
    public $title;

    /**
     * @var string Optional. Caption of the video to be sent, 0-200 characters
     */
    public $caption;

    /**
     * @var string Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parseMode;

    /**
     * @var int Optional. Video width
     */
    public $videoWidth;

    /**
     * @var int Optional. Video height
     */
    public $videoHeight;

    /**
     * @var int Optional. Video duration in seconds
     */
    public $videoDuration;

    /**
     * @var string Optional. Short description of the result
     */
    public $description;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
     */
    public $inputMessageContent;
}
