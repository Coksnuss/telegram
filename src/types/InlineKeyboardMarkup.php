<?php

namespace TelegramBot\types;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 */
class InlineKeyboardMarkup
{
    use FactoryTrait;

    /**
     * @var InlineKeyboardButton[][] Array of button rows, each represented by an Array of InlineKeyboardButton objects
     */
    public $inlineKeyboard;
}
