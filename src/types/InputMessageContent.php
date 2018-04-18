<?php

namespace TelegramBot\types;

abstract class InputMessageContent
{
    public static function fromObject($obj, $dimension = 0, $class = self::class)
    {
        if (property_exists($obj, 'message_text')) {
            return InputTextMessageContent::fromObject($obj, $dimension);
        } elseif (property_exists($obj, 'title')) {
            return InputVenueMessageContent::fromObject($obj, $dimension);
        } elseif (property_exists($obj, 'phone_number')) {
            return InputContactMessageContent::fromObject($obj, $dimension);
        } else {
            return InputLocationMessageContent::fromObject($obj, $dimension);
        }
    }
}
