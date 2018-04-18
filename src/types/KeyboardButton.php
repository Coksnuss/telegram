<?php

namespace TelegramBot\types;

/**
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead of this object to specify text of the button. Optional fields are mutually exclusive.
 */
class KeyboardButton
{
    use FactoryTrait;

    /**
     * @var string Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     */
    public $text;

    /**
     * @var bool Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
     */
    public $requestContact;

    /**
     * @var bool Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only
     */
    public $requestLocation;
}
