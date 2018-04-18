<?php

namespace TelegramBot\types;

/**
 * This object represents a voice note.
 */
class Voice
{
    use FactoryTrait;

    /**
     * @var string Unique identifier for this file
     */
    public $fileId;

    /**
     * @var int Duration of the audio in seconds as defined by sender
     */
    public $duration;

    /**
     * @var string Optional. MIME type of the file as defined by sender
     */
    public $mimeType;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
