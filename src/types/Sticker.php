<?php

namespace TelegramBot\types;

/**
 * This object represents a sticker.
 */
class Sticker
{
    use FactoryTrait;

    /**
     * @var string Unique identifier for this file
     */
    public $fileId;

    /**
     * @var int Sticker width
     */
    public $width;

    /**
     * @var int Sticker height
     */
    public $height;

    /**
     * @var PhotoSize Optional. Sticker thumbnail in the .webp or .jpg format
     */
    public $thumb;

    /**
     * @var string Optional. Emoji associated with the sticker
     */
    public $emoji;

    /**
     * @var string Optional. Name of the sticker set to which the sticker belongs
     */
    public $setName;

    /**
     * @var MaskPosition Optional. For mask stickers, the position where the mask should be placed
     */
    public $maskPosition;

    /**
     * @var int Optional. File size
     */
    public $fileSize;
}
