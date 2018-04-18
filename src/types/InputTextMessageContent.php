<?php

namespace TelegramBot\types;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 */
class InputTextMessageContent
{
    use FactoryTrait;

    /**
     * @var string Text of the message to be sent, 1-4096 characters
     */
    public $messageText;

    /**
     * @var string Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     */
    public $parseMode;

    /**
     * @var bool Optional. Disables link previews for links in the sent message
     */
    public $disableWebPagePreview;
}
