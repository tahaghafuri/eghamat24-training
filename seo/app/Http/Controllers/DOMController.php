<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FastSimpleHTMLDom\Document;

class DOMController extends Controller
{
    
    public static function filter($url,$element){
        $html=Document::str_get_html(file_get_contents($url));
        return $html->find($element);
    }

    public static function p($url){
        return DOMController::filter($url,'p');
    }

    public static function h($url,$num){
        return DOMController::filter($url,'h'.$num);
    }

    public static function b($url){
        return DOMController::filter($url,'b');
    }

    public static function strong($url){
        return DOMController::filter($url,'strong');
    }

}
