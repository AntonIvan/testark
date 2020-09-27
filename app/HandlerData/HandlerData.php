<?php

namespace App\HandlerData;

use App\HandlerDB\HandlerDB;

class HandlerData
{
    private $db;
    private $handler;

    public function __construct()
    {
       $this->db = resolve(HandlerDB::class);
       $this->handler = resolve(HandlerParsingData::class);
    }

    function handler() {
        $array = $this->handler->arrayDiffHandler();
        if($array !== false) {
            $this->db->write($array);
        }
        return $this->db->read();
    }

    function whileHandler() {
        while(true) {
            $array = $this->handler->arrayDiffHandler();
            if($array !== false) {
                return $this->readWrite($array);
            }
            sleep(15);
        }
    }

    private function readWrite($array) {
        $this->db->write($array);
        return $this->db->read();
    }



}
