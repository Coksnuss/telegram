<?php

namespace TelegramBot\types;

/**
 * This object represents a message.
 */
class Message implements \JsonSerializable
{
    use SerializeTrait;
    use FactoryTrait;

    /**
     * @var int Unique message identifier inside this chat
     */
    public $messageId;

    /**
     * @var User Optional. Sender, empty for messages sent to channels
     */
    public $from;

    /**
     * @var int Date the message was sent in Unix time
     */
    public $date;

    /**
     * @var Chat Conversation the message belongs to
     */
    public $chat;

    /**
     * @var User Optional. For forwarded messages, sender of the original message
     */
    public $forwardFrom;

    /**
     * @var Chat Optional. For messages forwarded from channels, information about the original channel
     */
    public $forwardFromChat;

    /**
     * @var int Optional. For messages forwarded from channels, identifier of the original message in the channel
     */
    public $forwardFromMessageId;

    /**
     * @var string Optional. For messages forwarded from channels, signature of the post author if present
     */
    public $forwardSignature;

    /**
     * @var int Optional. For forwarded messages, date the original message was sent in Unix time
     */
    public $forwardDate;

    /**
     * @var Message Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     */
    public $replyToMessage;

    /**
     * @var int Optional. Date the message was last edited in Unix time
     */
    public $editDate;

    /**
     * @var string Optional. The unique identifier of a media message group this message belongs to
     */
    public $mediaGroupId;

    /**
     * @var string Optional. Signature of the post author for messages in channels
     */
    public $authorSignature;

    /**
     * @var string Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters.
     */
    public $text;

    /**
     * @var MessageEntity[] Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     */
    public $entities;

    /**
     * @var MessageEntity[] Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     */
    public $captionEntities;

    /**
     * @var Audio Optional. Message is an audio file, information about the file
     */
    public $audio;

    /**
     * @var Document Optional. Message is a general file, information about the file
     */
    public $document;

    /**
     * @var Game Optional. Message is a game, information about the game. More about games »
     */
    public $game;

    /**
     * @var PhotoSize[] Optional. Message is a photo, available sizes of the photo
     */
    public $photo;

    /**
     * @var Sticker Optional. Message is a sticker, information about the sticker
     */
    public $sticker;

    /**
     * @var Video Optional. Message is a video, information about the video
     */
    public $video;

    /**
     * @var Voice Optional. Message is a voice message, information about the file
     */
    public $voice;

    /**
     * @var VideoNote Optional. Message is a video note, information about the video message
     */
    public $videoNote;

    /**
     * @var string Optional. Caption for the audio, document, photo, video or voice, 0-200 characters
     */
    public $caption;

    /**
     * @var Contact Optional. Message is a shared contact, information about the contact
     */
    public $contact;

    /**
     * @var Location Optional. Message is a shared location, information about the location
     */
    public $location;

    /**
     * @var Venue Optional. Message is a venue, information about the venue
     */
    public $venue;

    /**
     * @var User[] Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
     */
    public $newChatMembers;

    /**
     * @var User Optional. A member was removed from the group, information about them (this member may be the bot itself)
     */
    public $leftChatMember;

    /**
     * @var string Optional. A chat title was changed to this value
     */
    public $newChatTitle;

    /**
     * @var PhotoSize[] Optional. A chat photo was change to this value
     */
    public $newChatPhoto;

    /**
     * @var True Optional. Service message: the chat photo was deleted
     */
    public $deleteChatPhoto;

    /**
     * @var True Optional. Service message: the group has been created
     */
    public $groupChatCreated;

    /**
     * @var True Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     */
    public $supergroupChatCreated;

    /**
     * @var True Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
     */
    public $channelChatCreated;

    /**
     * @var int Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     */
    public $migrateToChatId;

    /**
     * @var int Optional. The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     */
    public $migrateFromChatId;

    /**
     * @var Message Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
     */
    public $pinnedMessage;

    /**
     * @var Invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments »
     */
    public $invoice;

    /**
     * @var SuccessfulPayment Optional. Message is a service message about a successful payment, information about the payment. More about payments »
     */
    public $successfulPayment;

    /**
     * @var string Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
     */
    public $connectedWebsite;
}
