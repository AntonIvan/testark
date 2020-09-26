<?php

namespace App\HandlerDB;
use App\Models\Order;

class HandlerDB
{
    function write($array) {
        $data = array_diff($array, $this->unionArray($this->read()));
        foreach ($data as $item) {
            $order = new Order;
            $order->order = $item;
            $order->save();
        }

    }

    function read() {
        return Order::all();
    }

    function count() {
        return Order::all()->count();
    }

    private function unionArray($array) {
        $new = [];
        foreach ($array as $item) {
            $new[$item['id']] = $item['order'];
        }
        return $new;
    }
}
