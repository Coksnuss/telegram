<?php

namespace TelegramBot\types;

/**
 * This object represents a video file.
 */
class Video implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Unique identifier for this file
     */
    public $fileId;

    /**
     * @var int Video width as defined by sender
     */
    public $width;

    /**
     * @var int Video height as defined by sender
     */
    public $height;

    /**
     * @var int Duration of the video in seconds as defined by sender
     */
    public $duration;

    /**
     * @var PhotoSize Optional. Video thumbnail
     */
    public $thumb;

    /**
     * @var string Optional. Mime type of a file as defined by sender
     */
    public $mimeType;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
