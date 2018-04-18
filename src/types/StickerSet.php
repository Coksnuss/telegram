<?php

namespace TelegramBot\types;

/**
 * This object represents a sticker set.
 */
class StickerSet
{
    use FactoryTrait;

    /**
     * @var string Sticker set name
     */
    public $name;

    /**
     * @var string Sticker set title
     */
    public $title;

    /**
     * @var bool True, if the sticker set contains masks
     */
    public $containsMasks;

    /**
     * @var Sticker[] List of all set stickers
     */
    public $stickers;
}
