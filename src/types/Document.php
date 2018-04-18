<?php

namespace TelegramBot\types;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 */
class Document implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Unique file identifier
     */
    public $fileId;

    /**
     * @var PhotoSize Optional. Document thumbnail as defined by sender
     */
    public $thumb;

    /**
     * @var string Optional. Original filename as defined by sender
     */
    public $fileName;

    /**
     * @var string Optional. MIME type of the file as defined by sender
     */
    public $mimeType;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
