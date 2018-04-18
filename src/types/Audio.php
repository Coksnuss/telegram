<?php

namespace TelegramBot\types;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 */
class Audio implements \JsonSerializable
{
    use SerializeTrait;
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
     * @var string Optional. Performer of the audio as defined by sender or by audio tags
     */
    public $performer;

    /**
     * @var string Optional. Title of the audio as defined by sender or by audio tags
     */
    public $title;

    /**
     * @var string Optional. MIME type of the file as defined by sender
     */
    public $mimeType;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
