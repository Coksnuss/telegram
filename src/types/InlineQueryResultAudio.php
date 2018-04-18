<?php

namespace TelegramBot\types;

/**
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 */
class InlineQueryResultAudio implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Type of the result, must be audio
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 bytes
     */
    public $id;

    /**
     * @var string A valid URL for the audio file
     */
    public $audioUrl;

    /**
     * @var string Title
     */
    public $title;

    /**
     * @var string Optional. Caption, 0-200 characters
     */
    public $caption;

    /**
     * @var string Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parseMode;

    /**
     * @var string Optional. Performer
     */
    public $performer;

    /**
     * @var int Optional. Audio duration in seconds
     */
    public $audioDuration;

    /**
     * @var InlineKeyboardMarkup Optional. Inline keyboard attached to the message
     */
    public $replyMarkup;

    /**
     * @var InputMessageContent Optional. Content of the message to be sent instead of the audio
     */
    public $inputMessageContent;
}
