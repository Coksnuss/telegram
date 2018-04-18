<?php

namespace TelegramBot\types;

/**
 * Represents a photo to be sent.
 */
class InputMediaPhoto
{
    use FactoryTrait;

    /**
     * @var string Type of the result, must be photo
     */
    public $type;

    /**
     * @var string File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More info on Sending Files »
     */
    public $media;

    /**
     * @var string Optional. Caption of the photo to be sent, 0-200 characters
     */
    public $caption;

    /**
     * @var string Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parseMode;
}
