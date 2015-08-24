<?php

namespace TelegramBot;

use GuzzleHttp\Client as HttpClient;

class TelegramBot
{
    const API_BASE_URL = 'https://api.telegram.org/bot%s/';

    private $client;


    public function __construct($token)
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => $this->getBaseUrl($token)
        ]);
    }

    public function setWebhook($url)
    {
        $this->postAsync('setWebhook', [
            'form_params' => [
                'url' => $url,
            ],
        ])->then(function ($response) {
            var_dump($response->getBody());
        });
    }

    private function getBaseUrl($token)
    {
        return sprintf(self::API_BASE_URL, $token);
    }
}
