<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class URLController extends Controller
{

    public static function get_url($url){
        return Http::get($url);
    }

    public static function get_info($url){
        $res=URLController::get_url($url);
        return [
            'body' => base64_encode($res->body()),
            'status' => $res->status(),
            'go' => $res->ok(),
            'ok' => $res->successful(),
            'server' => $res->serverError(),
            'client' => $res->clientError(),
            'headers' => $res->headers()
        ];
    }

}
