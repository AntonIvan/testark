<?php

namespace App\Http\Controllers;

use App\HandlerData\HandlerData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HandlerDataController extends Controller
{
    public function __invoke() {
        return view('welcome',['data' => resolve(HandlerData::class)->handler()] );
    }
}
