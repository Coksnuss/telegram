<?php

namespace TelegramBot;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\Promise\Promise;

class TelegramBot
{
    const API_BASE_URL = 'https://api.telegram.org/bot%s/';

    private $client;
    private $handler;


    public function __construct($token, $asyncTimeout = 5, $tick = 0.01, $middleware = [])
    {
        $this->handler = new CurlMultiHandler(['select_timeout' => $tick]);

        $handlerStack = HandlerStack::create($this->handler);
        foreach ($middleware as $name => $handler) {
            if (is_int($name)) {
                $handlerStack->push($handler);
            } else {
                $handlerStack->push($handler, $name);
            }
        }

        $this->client = new HttpClient([
            'handler' => $handlerStack,
            'base_uri' => $this->getBaseUrl($token),
            'curl' => [CURLOPT_TIMEOUT_MS => $asyncTimeout * 1000],
        ]);
    }

    /**
     * Event Loop Integration.
     */
    public function tick()
    {
        $this->handler->tick();
        \GuzzleHttp\Promise\queue()->run();
    }

    /**
     * A simple method for testing your bot's auth token.
     *
     * @return User Returns basic information about the bot.
     * @throws TelegramException
     */
    public function getMe()
    {
        return $this->_getMe(false);
    }

    /**
     * @see getMe()
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMeAsync()
    {
        return $this->_getMe(true);
    }

    /**
     * Use this method to send text messages.
     *
     * Valid params:
     * - parse_mode (String): Send 'Markdown', if you want Telegram apps to show bold, italic and inline URLs in your
     *   bot's message.
     * - disable_web_page_preview (boolean): Disables link previews for links in this message
     * - reply_to_message_id (integer): If the message is a reply, ID of the original message
     * - reply_markup (ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply):
     * Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard
     * or to force a reply from the user
     *
     * @param integer $chatId Unique identifier for the message recipient — User
     * or GroupChat id.
     * @param string $text Text of the message to be sent.
     * @param array $params Optional params.
     * @return Message The sent Message.
     * @throws TelegramException
     */
    public function sendMessage($chatId, $text, $params = [])
    {
        return $this->_sendMessage($chatId, $text, $params, false);
    }

    /**
     * @see sendMessage()
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMessageAsync($chatId, $text, $params = [])
    {
        return $this->_sendMessage($chatId, $text, $params, true);
    }

    public function forwardMessage($chatId, $fromChatId, $messageId, $params = [])
    {
        return $this->_forwardMessage($chatId, $fromChatId, $messageId, $params, false);
    }

    public function forwardMessageAsync($chatId, $fromChatId, $messageId, $params = [])
    {
        return $this->_forwardMessage($chatId, $fromChatId, $messageId, $params, true);
    }

    public function sendPhoto($chatId, $photo, $params = [])
    {
        return $this->_sendPhoto($chatId, $photo, $params, false);
    }

    public function sendPhotoAsync($chatId, $photo, $params = [])
    {
        return $this->_sendPhoto($chatId, $photo, $params, true);
    }

    public function sendAudio($chatId, $audio, $params = [])
    {
        return $this->_sendAudio($chatId, $audio, $params, false);
    }

    public function sendAudioAsync($chatId, $audio, $params = [])
    {
        return $this->_sendAudio($chatId, $audio, $params, true);
    }

    public function sendDocument($chatId, $document, $params = [])
    {
        return $this->_sendDocument($chatId, $document, $params, false);
    }

    public function sendDocumentAsync($chatId, $document, $params = [])
    {
        return $this->_sendDocument($chatId, $document, $params, true);
    }

    public function sendSticker($chatId, $sticker, $params = [])
    {
        return $this->_sendSticker($chatId, $sticker, $params, false);
    }

    public function sendStickerAsync($chatId, $sticker, $params = [])
    {
        return $this->_sendSticker($chatId, $sticker, $params, true);
    }

    public function sendVideo($chatId, $video, $params = [])
    {
        return $this->_sendVideo($chatId, $video, $params, false);
    }

    public function sendVideoAsync($chatId, $video, $params = [])
    {
        return $this->_sendVideo($chatId, $video, $params, true);
    }

    public function sendVoice($chatId, $voice, $params = [])
    {
        return $this->_sendVoice($chatId, $voice, $params, false);
    }

    public function sendVoiceAsync($chatId, $voice, $params = [])
    {
        return $this->_sendVoice($chatId, $voice, $params, true);
    }

    public function sendLocation($chatId, $latitude, $longitude, $params = [])
    {
        return $this->_sendLocation($chatId, $latitude, $longitude, $params, false);
    }

    public function sendLocationAsync($chatId, $latitude, $longitude, $params = [])
    {
        return $this->_sendLocation($chatId, $latitude, $longitude, $params, true);
    }

    public function sendVenue($chatId, $latitude, $longitude, $title, $address, $params = [])
    {
        return $this->_sendVenue($chatId, $latitude, $longitude, $title, $address, $params, false);
    }

    public function sendVenueAsync($chatId, $latitude, $longitude, $title, $address, $params = [])
    {
        return $this->_sendVenue($chatId, $latitude, $longitude, $title, $address, $params, true);
    }

    public function sendContact($chatId, $phoneNumber, $firstName, $params = [])
    {
        return $this->_sendContact($chatId, $phoneNumber, $firstName, $params, false);
    }

    public function sendContactAsync($chatId, $phoneNumber, $firstName, $params = [])
    {
        return $this->_sendContact($chatId, $phoneNumber, $firstName, $params, true);
    }

    public function sendChatAction($chatId, $action)
    {
        return $this->_sendChatAction($chatId, $action, false);
    }

    public function sendChatActionAsync($chatId, $action)
    {
        return $this->_sendChatAction($chatId, $action, true);
    }

    public function getUserProfilePhotos($userId, $params = [])
    {
        return $this->_getUserProfilePhotos($userId, $params, false);
    }

    public function getUserProfilePhotosAsync($userId, $params = [])
    {
        return $this->_getUserProfilePhotos($userId, $params, true);
    }

    public function getUpdates($params = [])
    {
        return $this->_getUpdates($params, false);
    }

    public function getUpdatesAsync($params = [])
    {
        return $this->_getUpdates($params, true);
    }

    public function setWebhook($params = [])
    {
        return $this->_setWebhook($params, false);
    }

    public function setWebhookAsync($params = [])
    {
        return $this->_setWebhook($params, true);
    }

    public function getFile($fileId)
    {
        return $this->_getFile($fileId, false);
    }

    public function getFileAsync($fileId)
    {
        return $this->_getFile($fileId, true);
    }

    public function kickChatMember($chatId, $userId)
    {
        return $this->_kickChatMember($chatId, $userId, false);
    }

    public function kickChatMemberAsync($chatId, $userId)
    {
        return $this->_kickChatMember($chatId, $userId, true);
    }

    public function leaveChat($chatId)
    {
        return $this->_leaveChat($chatId, false);
    }

    public function leaveChatAsync($chatId)
    {
        return $this->_leaveChat($chatId, true);
    }

    public function unbanChatMember($chatId, $userId)
    {
        return $this->_unbanChatMember($chatId, $userId, false);
    }

    public function unbanChatMemberAsync($chatId, $userId)
    {
        return $this->_unbanChatMember($chatId, $userId, true);
    }

    public function getChat($chatId)
    {
        return $this->_getChat($chatId, false);
    }

    public function getChatAsync($chatId)
    {
        return $this->_getChat($chatId, true);
    }

    public function getChatAdministrators($chatId)
    {
        return $this->_getChatAdministrators($chatId, false);
    }

    public function getChatAdministratorsAsync($chatId)
    {
        return $this->_getChatAdministrators($chatId, true);
    }

    public function getChatMembersCount($chatId)
    {
        return $this->_getChatMembersCount($chatId, false);
    }

    public function getChatMembersCountAsync($chatId)
    {
        return $this->_getChatMembersCount($chatId, true);
    }

    public function getChatMember($chatId, $userId)
    {
        return $this->_getChatMember($chatId, $userId, false);
    }

    public function getChatMemberAsync($chatId, $userId)
    {
        return $this->_getChatMember($chatId, $userId, true);
    }

    public function answerCallbackQuery($callbackQueryId, $params = [])
    {
        return $this->_answerCallbackQuery($callbackQueryId, $params, false);
    }

    public function answerCallbackQueryAsync($callbackQueryId, $params = [])
    {
        return $this->_answerCallbackQuery($callbackQueryId, $params, true);
    }

    public function editMessageText($text, $params = [])
    {
        return $this->_editMessageText($text, $params, false);
    }

    public function editMessageTextAsync($text, $params = [])
    {
        return $this->_editMessageText($text, $params, true);
    }

    public function editMessageCaption($params = [])
    {
        return $this->_editMessageCaption($params, false);
    }

    public function editMessageCaptionAsync($params = [])
    {
        return $this->_editMessageCaption($params, true);
    }

    public function editMessageReplyMarkup($params = [])
    {
        return $this->_editMessageReplyMarkup($params, false);
    }

    public function editMessageReplyMarkupAsync($params = [])
    {
        return $this->_editMessageReplyMarkup($params, true);
    }

    public function answerInlineQuery($inlineQueryId, $results, $params = [])
    {
        return $this->_answerInlineQuery($inlineQueryId, $results, $params, false);
    }

    public function answerInlineQueryAsync($inlineQueryId, $results, $params = [])
    {
        return $this->_answerInlineQuery($inlineQueryId, $results, $params, true);
    }

    private function _getMe($async)
    {
        return $this->request('getMe', [], $async);
    }

    private function _sendMessage($chatId, $text, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['text'] = $text;
        $this->processReplyMarkup($params);

        return $this->request('sendMessage', $params, $async);
    }

    private function _forwardMessage($chatId, $fromChatId, $messageId, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['from_chat_id'] = $fromChatId;
        $params['message_id'] = $messageId;

        return $this->request('forwardMessage', $params, $async);
    }

    private function _sendPhoto($chatId, $photo, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['photo'] = $photo;
        $this->processReplyMarkup($params);

        return $this->request('sendPhoto', $params, $async);
    }

    private function _sendAudio($chatId, $audio, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['audio'] = $audio;
        $this->processReplyMarkup($params);

        return $this->request('sendAudio', $params, $async);
    }

    private function _sendDocument($chatId, $document, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['document'] = $document;
        $this->processReplyMarkup($params);

        return $this->request('sendDocument', $params, $async);
    }

    private function _sendSticker($chatId, $sticker, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['sticker'] = $sticker;
        $this->processReplyMarkup($params);

        return $this->request('sendSticker', $params, $async);
    }

    private function _sendVideo($chatId, $video, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['video'] = $video;
        $this->processReplyMarkup($params);

        return $this->request('sendVideo', $params, $async);
    }

    private function _sendVoice($chatId, $voice, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['voice'] = $voice;
        $this->processReplyMarkup($params);

        return $this->request('sendVoice', $params, $async);
    }

    private function _sendLocation($chatId, $latitude, $longitude, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['latitude'] = $latitude;
        $params['longitude'] = $longitude;
        $this->processReplyMarkup($params);

        return $this->request('sendLocation', $params, $async);
    }

    private function _sendVenue($chatId, $latitude, $longitude, $title, $address, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['latitude'] = $latitude;
        $params['longitude'] = $longitude;
        $parmas['title'] = $title;
        $params['address'] = $address;
        $this->processReplyMarkup($params);

        return $this->request('sendVenue', $params, $async);
    }

    private function _sendContact($chatId, $phoneNumber, $firstName, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['phone_number'] = $phoneNumber;
        $params['first_name'] = $firstName;
        $this->processReplyMarkup($params);

        return $this->request('sendContact', $params, $async);
    }

    private function _sendChatAction($chatId, $action, $async)
    {
        $params = [
            'chat_id' => $chatId,
            'action' => $action,
        ];

        return $this->request('sendChatAction', $params, $async);
    }

    private function _getUserProfilePhotos($userId, $params, $async)
    {
        $params['user_id'] = $userId;

        return $this->request('getUserProfilePhotos', $params, $async);
    }

    private function _getUpdates($params, $async)
    {
        return $this->request('getUpdates', $params, $async);
    }

    private function _setWebhook($params, $async)
    {
        return $this->request('setWebhook', $params, $async);
    }

    private function _getFile($fileId, $async)
    {
        $params = [
            'file_id' => $fileId,
        ];

        return $this->request('getFile', $params, $async);
    }

    private function _kickChatMember($chatId, $userId, $async)
    {
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->request('kickChatMember', $params, $async);
    }

    private function _leaveChat($chatId, $async)
    {
        $params = [
            'chat_id' => $chatId,
        ];

        return $this->request('leaveChat', $params, $async);
    }

    private function _unbanChatMember($chatId, $userId, $async)
    {
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->request('unbanChatMember', $params, $async);
    }

    private function _getChat($chatId, $async)
    {
        $params = [
            'chat_id' => $chatId,
        ];

        return $this->request('getChat', $params, $async);
    }

    private function _getChatAdministrators($chatId, $async)
    {
        $params = [
            'chat_id' => $chatId,
        ];

        return $this->request('getChatAdministrators', $params, $async);
    }

    private function _getChatMembersCount($chatId, $async)
    {
        $params = [
            'chat_id' => $chatId,
        ];

        return $this->request('getChatMembersCount', $params, $async);
    }

    private function _getChatMember($chatId, $userId, $async)
    {
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->request('getChatMember', $params, $async);
    }

    private function _answerCallbackQuery($callbackQueryId, $params, $async)
    {
        $params['callback_query_id'] = $callbackQueryId;

        return $this->request('answerCallbackQuery', $params, $async);
    }

    private function _editMessageText($text, $params, $async)
    {
        $params['text'] = $text;
        $this->processReplyMarkup($params);
        $this->checkRequiredUpdateMessageParams($params);

        return $this->request('editMessageText', $params, $async);
    }

    private function _editMessageCaption($params, $async)
    {
        $this->processReplyMarkup($params);
        $this->checkRequiredUpdateMessageParams($params);

        return $this->request('editMessageCaption', $params, $async);
    }

    private function _editMessageReplyMarkup($params, $async)
    {
        $this->processReplyMarkup($params);
        $this->checkRequiredUpdateMessageParams($params);

        return $this->request('editMessageReplyMarkup', $params, $async);
    }

    private function _answerInlineQuery($inlineQueryId, $results, $params, $async)
    {
        $params['inline_query_id'] = $inlineQueryId;
        $params['results'] = $results;

        return $this->request('answerInlineQuery', $params, $async);
    }

    private function processReplyMarkup(&$params)
    {
        if (isset($params['reply_markup'])) {
            $params['reply_markup'] = json_encode($params['reply_markup']);
        }
    }

    private function checkRequiredUpdateMessageParams($params)
    {
        if (
            !isset($params['inline_message_id']) &&
            (!isset($params['chat_id']) || !isset($params['message_id']))
        ) {
            throw new TelegramException(
                'Missing required parameters. Either chat_id and message_id' .
                ' or inline_message_id must be specified.'
            );
        }
    }

    /**
     * @return
     * @throws TelegramException only on synchronous request
     */
    private function request($method, $params, $async)
    {
        $promise = $this->queryAsync($method, $params);

        if ($async) {
            return $promise;
        } else {
            return $promise->wait();
        }
    }

    private function queryAsync($method, $params)
    {
        $request = $this->client->postAsync($method, ['form_params' => $params]);

        return $request->then(
            function ($response) {
                return $this->decodeResponse($response)->result;
            },
            function ($exception) {
                if ($exception instanceof ClientException) {
                    $response = $this->decodeResponse($exception->getResponse());
                    throw new TelegramException($response->description, $response->error_code, $exception);
                } else {
                    throw new TelegramException($exception->getMessage(), $exception->getCode(), $exception);
                }
            }
        );
    }

    /**
     * Parses the JSON content from a guzzle response.
     *
     * @param Psr\Http\Message\ResponseInterface $response The response
     * @return object The parsed JSON response.
     */
    private function decodeResponse($response)
    {
        return json_decode($response->getBody()->__toString());
    }

   /**
     * Generates the base url to be used for API requests.
     *
     * @param string $token The token of the bot
     * @return string The base url to be used
     */
    private function getBaseUrl($token)
    {
        return sprintf(self::API_BASE_URL, $token);
    }
}
