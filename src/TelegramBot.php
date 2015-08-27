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


    public function __construct($token, $asyncTimeout = 2, $tick = 0.01)
    {
        $this->handler = new CurlMultiHandler([
            'select_timeout' => $tick,
        ]);
        $this->client = new HttpClient([
            'handler' => HandlerStack::create($this->handler),
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

    public function forwardMessage($chatId, $fromChatId, $messageId)
    {
        return $this->_forwardMessage($chatId, $fromChatId, $messageId, false);
    }

    public function forwardMessageAsync($chatId, $fromChatId, $messageId)
    {
        return $this->_forwardMessage($chatId, $fromChatId, $messageId, true);
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

    private function _getMe($async)
    {
        return $this->request('getMe', [], $async);
    }

    private function _sendMessage($chatId, $text, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['text'] = $text;

        return $this->request('sendMessage', $params, $async);
    }

    private function _forwardMessage($chatId, $fromChatId, $messageId, $async)
    {
        $params = [
            'chat_id' => $chatId,
            'fromChatId' => $fromChatId,
            'messageId' => $messageId,
        ];

        return $this->request('forwardMessage', $params, $async);
    }

    private function _sendPhoto($chatId, $photo, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['photo'] = $photo;

        return $this->request('sendPhoto', $params, $async);
    }

    private function _sendAudio($chatId, $audio, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['audio'] = $audio;

        return $this->request('sendAudio', $params, $async);
    }

    private function _sendDocument($chatId, $document, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['document'] = $document;

        return $this->request('sendDocument', $params, $async);
    }

    private function _sendSticker($chatId, $sticker, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['sticker'] = $sticker;

        return $this->request('sendSticker', $params, $async);
    }

    private function _sendVideo($chatId, $video, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['video'] = $video;

        return $this->request('sendVideo', $params, $async);
    }

    private function _sendVoice($chatId, $voice, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['voice'] = $voice;

        return $this->request('sendVoice', $params, $async);
    }

    private function _sendLocation($chatId, $latitude, $longitude, $params, $async)
    {
        $params['chat_id'] = $chatId;
        $params['latitude'] = $latitude;
        $params['longitude'] = $longitude;

        return $this->request('sendLocation', $params, $async);
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
        $promise = new Promise(
            function ($unwrap = true) use ($request) {
                try {
                    $request->wait($unwrap);
                } catch (\Exception $e) {
                }
            },
            [$request, 'cancel']);

        $request->then(
            function ($response) use ($promise) {
                $promise->resolve($this->decodeResponse($response)->result);
            },
            function ($exception) use ($promise) {
                if ($exception instanceof ClientException) {
                    $response = $this->decodeResponse($exception->getResponse());
                    $promise->reject(new TelegramException($response->description, $response->error_code, $exception));
                } else {
                    $promise->reject(new TelegramException($exception->getMessage(), $exception->getCode(), $exception));
                }
            }
        );

        return $promise;
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
