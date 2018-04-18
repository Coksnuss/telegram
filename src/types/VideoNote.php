<?php

namespace TelegramBot\types;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 */
class VideoNote implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Unique identifier for this file
     */
    public $fileId;

    /**
     * @var int Video width and height as defined by sender
     */
    public $length;

    /**
     * @var int Duration of the video in seconds as defined by sender
     */
    public $duration;

    /**
     * @var PhotoSize Optional. Video thumbnail
     */
    public $thumb;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
