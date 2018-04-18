<?php

namespace TelegramBot\types;

/**
 * This object represent a user's profile pictures.
 */
class UserProfilePhotos implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var int Total number of profile pictures the target user has
     */
    public $totalCount;

    /**
     * @var PhotoSize[][] Requested profile pictures (in up to 4 sizes each)
     */
    public $photos;
}
