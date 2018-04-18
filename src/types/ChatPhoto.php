<?php

namespace TelegramBot\types;

/**
 * This object represents a chat photo.
 */
class ChatPhoto
{
    use FactoryTrait;

    /**
     * @var string Unique file identifier of small (160x160) chat photo. This file_id can be used only for photo download.
     */
    public $smallFileId;

    /**
     * @var string Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     */
    public $bigFileId;
}
