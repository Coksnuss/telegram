<?php

namespace TelegramBot\types;

/**
 * This object represents a chat.
 */
class Chat implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var int Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     */
    public $id;

    /**
     * @var string Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     */
    public $type;

    /**
     * @var string Optional. Title, for supergroups, channels and group chats
     */
    public $title;

    /**
     * @var string Optional. Username, for private chats, supergroups and channels if available
     */
    public $username;

    /**
     * @var string Optional. First name of the other party in a private chat
     */
    public $firstName;

    /**
     * @var string Optional. Last name of the other party in a private chat
     */
    public $lastName;

    /**
     * @var bool Optional. True if a group has 'All Members Are Admins' enabled.
     */
    public $allMembersAreAdministrators;

    /**
     * @var ChatPhoto Optional. Chat photo. Returned only in getChat.
     */
    public $photo;

    /**
     * @var string Optional. Description, for supergroups and channel chats. Returned only in getChat.
     */
    public $description;

    /**
     * @var string Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     */
    public $inviteLink;

    /**
     * @var Message Optional. Pinned message, for supergroups and channel chats. Returned only in getChat.
     */
    public $pinnedMessage;

    /**
     * @var string Optional. For supergroups, name of group sticker set. Returned only in getChat.
     */
    public $stickerSetName;

    /**
     * @var bool Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     */
    public $canSetStickerSet;
}
