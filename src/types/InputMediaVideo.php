<?php

namespace TelegramBot\types;

/**
 * Represents a video to be sent.
 */
class InputMediaVideo
{
    use FactoryTrait;

    /**
     * @var string Type of the result, must be video
     */
    public $type;

    /**
     * @var string File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More info on Sending Files »
     */
    public $media;

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
    public $width;

    /**
     * @var int Optional. Video height
     */
    public $height;

    /**
     * @var int Optional. Video duration
     */
    public $duration;

    /**
     * @var bool Optional. Pass True, if the uploaded video is suitable for streaming
     */
    public $supportsStreaming;
}
