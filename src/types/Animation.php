<?php

namespace TelegramBot\types;

/**
 * You can provide an animation for your game so that it looks stylish in chats (check out Lumberjack for an example). This object represents an animation file to be displayed in the message containing a game.
 */
class Animation
{
    use FactoryTrait;

    /**
     * @var string Unique file identifier
     */
    public $fileId;

    /**
     * @var PhotoSize Optional. Animation thumbnail as defined by sender
     */
    public $thumb;

    /**
     * @var string Optional. Original animation filename as defined by sender
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
