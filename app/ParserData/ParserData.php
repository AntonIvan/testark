<?php

namespace App\ParserData;

use GuzzleHttp\Client;

class ParserData
{
    private $client;

    private $url = "https://admin.food-app.ru/api/orders?sid=yy3vkqyj&token=fPFZScSrDlHlfRxXPUHggJAF0LYwgKJsHt5wukcj";

    function __construct()
    {
        $this->client = new Client();
    }

    function request() {
        return json_decode( $this->client->request('GET', $this->url)->getBody()->getContents(), true);
    }
}
