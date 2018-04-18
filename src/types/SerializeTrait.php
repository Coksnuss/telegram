<?php

namespace TelegramBot\types;

trait SerializeTrait
{
    public function jsonSerialize() {
        return array_filter((array) $this, function ($v) {
            return $v !== null;
        });
    }
}
