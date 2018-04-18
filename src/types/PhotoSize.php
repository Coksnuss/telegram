<?php

namespace TelegramBot\types;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 */
class PhotoSize implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Unique identifier for this file
     */
    public $fileId;

    /**
     * @var int Photo width
     */
    public $width;

    /**
     * @var int Photo height
     */
    public $height;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
