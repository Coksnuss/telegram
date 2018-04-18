<?php

namespace TelegramBot\types;

abstract class InlineQueryResult
{
    public static function fromObject($obj, $dimension = 0, $class = self::class)
    {
        switch ($obj->type) {
            case 'article': return InlineQueryResultArticle::fromObject($obj, $dimension);
            case 'photo': return property_exists($obj, 'thumb_url') ?
                InlineQueryResultPhoto::fromObject($obj, $dimension) :
                InlineQueryResultCachedPhoto::fromObject($obj, $dimension);
            case 'gif': return property_exists($obj, 'thumb_url') ?
                InlineQueryResultGif::fromObject($obj, $dimension) :
                InlineQueryResultCachedGif::fromObject($obj, $dimension);
            case 'mpeg4_gif': return property_exists($obj, 'thumb_url') ?
                InlineQueryResultMpeg4Gif::fromObject($obj, $dimension) :
                InlineQueryResultCachedMpeg4Gif::fromObject($obj, $dimension);
            case 'video': return property_exists($obj, 'thumb_url') ?
                InlineQueryResultVideo::fromObject($obj, $dimension) :
                InlineQueryResultCachedVideo::fromObject($obj, $dimension);
            case 'audio': return property_exists($obj, 'audio_url') ?
                InlineQueryResultAudio::fromObject($obj, $dimension) :
                InlineQueryResultCachedAudio::fromObject($obj, $dimension);
            case 'voice': return property_exists($obj, 'voice_url') ?
                InlineQueryResultVoice::fromObject($obj, $dimension) :
                InlineQueryResultCachedVoice::fromObject($obj, $dimension);
            case 'document': return property_exists($obj, 'document_url') ?
                InlineQueryResultDocument::fromObject($obj, $dimension) :
                InlineQueryResultCachedDocument::fromObject($obj, $dimension);
            case 'location': return InlineQueryResultLocation::fromObject($obj, $dimension);
            case 'venue': return InlineQueryResultVenue::fromObject($obj, $dimension);
            case 'contact': return InlineQueryResultContact::fromObject($obj, $dimension);
            case 'game': return InlineQueryResultGame::fromObject($obj, $dimension);
            case 'sticker': return InlineQueryResultCachedSticker::fromObject($obj, $dimension);
        }
    }
}

