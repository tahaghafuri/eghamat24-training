<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\URLController;
use App\Http\Controllers\CRAWLController;
use App\Http\Controllers\DOMController;

class APIController extends Controller
{

    public static function get_url($url){
        return URLController::get_url($url);
    }

    public static function get_info($url){
        return URLController::get_info($url);
    }

    public static function crawl($url){
        return CRAWLController::get($url);
    }

    public static function links($url,$type){
        return CRAWLController::links($url,$type);
    }

    public static function metas($url){
        return CRAWLController::metas($url);
    }

    public static function images($url,$type){
        return CRAWLController::images($url,$type);
    }

    public static function videos($url){
        return CRAWLController::videos($url);
    }

    public static function p($url){
       return DOMController::p($url);
    }

    public static function b($url){
        return DOMController::b($url);
    }

    public static function strong($url){
        return DOMController::strong($url);
    }

    public static function h($url,$num){
        return DOMController::h($url,$num);
    }

}
