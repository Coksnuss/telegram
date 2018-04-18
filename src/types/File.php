<?php

namespace TelegramBot\types;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
 */
class File implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var string Unique identifier for this file
     */
    public $fileId;

    /**
     * @var int Optional. File size, if known
     */
    public $fileSize;

    /**
     * @var string Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
     */
    public $filePath;
}
