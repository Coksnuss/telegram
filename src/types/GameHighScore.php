<?php

namespace TelegramBot\types;

/**
 * This object represents one row of the high scores table for a game.
 */
class GameHighScore implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var int Position in high score table for the game
     */
    public $position;

    /**
     * @var User User
     */
    public $user;

    /**
     * @var int Score
     */
    public $score;
}
