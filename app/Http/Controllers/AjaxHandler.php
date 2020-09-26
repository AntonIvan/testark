<?php

namespace App\Http\Controllers;

use App\HandlerData\HandlerData;
use Illuminate\Http\Request;

class AjaxHandler extends Controller
{
    function __invoke() {
        return resolve(HandlerData::class)->whileHandler();
    }
}
