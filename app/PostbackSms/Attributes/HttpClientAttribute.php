<?php

namespace App\PostbackSms\Attributes;

use Attribute;
use GuzzleHttp\Client;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\ContextualAttribute;

#[\Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class HttpClientAttribute implements ContextualAttribute
{
    public string $url = 'https://postback-sms.com/api';

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function resolve(self $attribute): Client
    {
        $this->url = $attribute->url;

        return new Client(
            [
                'base_uri' => $this->url,
                'verify' => false
            ]
        );
    }
}
