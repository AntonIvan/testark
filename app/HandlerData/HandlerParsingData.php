<?php

namespace App\HandlerData;

use App\HandlerDB\HandlerDB;
use App\ParserData\ParserData;

class HandlerParsingData
{

    public function __construct()
    {
        $this->db = resolve(HandlerDB::class);
    }

    public function arrayDiffHandler() {
        $data = $this->parserData(resolve(ParserData::class)->request());
        if(count($data) != $this->db->count()) {
            return $data;
        }
        return false;
    }

    private function parserData($array) {
        $orders = [];
        foreach ($array['orders'] as $item) {
            $orders[] = $item['id'];
        }
        return $orders;
    }
}
