<?php

namespace TelegramBot\types;

/**
 * This object contains information about one member of a chat.
 */
class ChatMember
{
    use FactoryTrait;

    /**
     * @var User Information about the user
     */
    public $user;

    /**
     * @var string The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
     */
    public $status;

    /**
     * @var int Optional. Restricted and kicked only. Date when restrictions will be lifted for this user, unix time
     */
    public $untilDate;

    /**
     * @var bool Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     */
    public $canBeEdited;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can change the chat title, photo and other settings
     */
    public $canChangeInfo;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can post in the channel, channels only
     */
    public $canPostMessages;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can edit messages of other users and can pin messages, channels only
     */
    public $canEditMessages;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can delete messages of other users
     */
    public $canDeleteMessages;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can invite new users to the chat
     */
    public $canInviteUsers;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members
     */
    public $canRestrictMembers;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can pin messages, supergroups only
     */
    public $canPinMessages;

    /**
     * @var bool Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     */
    public $canPromoteMembers;

    /**
     * @var bool Optional. Restricted only. True, if the user can send text messages, contacts, locations and venues
     */
    public $canSendMessages;

    /**
     * @var bool Optional. Restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     */
    public $canSendMediaMessages;

    /**
     * @var bool Optional. Restricted only. True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages
     */
    public $canSendOtherMessages;

    /**
     * @var bool Optional. Restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages
     */
    public $canAddWebPagePreviews;
}
