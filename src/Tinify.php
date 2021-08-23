<?php

namespace Orh\Laravel\Tinify;

use Tinify\AccountException;
use Tinify\ClientException;
use Tinify\Source;
use Tinify\Tinify as BaseTinify;

class Tinify
{
    public function __construct()
    {
        BaseTinify::setKey(config('tinify.api_key'));

        if ($appIdentifier = config('tinify.app_identifier')) {
            BaseTinify::setAppIdentifier($appIdentifier);
        }

        if ($proxy = config('tinify.proxy')) {
            BaseTinify::setProxy($proxy);
        }
    }

    public function getCompressionCount()
    {
        return BaseTinify::getCompressionCount();
    }

    public function fromFile($path)
    {
        return Source::fromFile($path);
    }

    public function fromBuffer($string)
    {
        return Source::fromBuffer($string);
    }

    public function fromUrl($string)
    {
        return Source::fromUrl($string);
    }

    public function validate()
    {
        try {
            BaseTinify::getClient()->request('post', '/shrink');
        } catch (AccountException $err) {
            if ($err->status == 429) {
                return true;
            }

            throw $err;
        } catch (ClientException $err) {
            return true;
        }
    }
}
