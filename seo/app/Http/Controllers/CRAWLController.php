<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\URLController;
use App\Http\Controllers\DOMController;
use PharIo\Manifest\Url;
use PHPHtmlParser\Dom;

class CRAWLController extends Controller
{
    
    public static function get($url){
        $dom = new Dom;
        return $dom->loadStr(URLController::get_info($url)['body']);
    }

    public static function find($url,$find){
        return CRAWLController::get($url)->find($find);
    }

    public static function links($url,$type){
        if($type==null ||$type==1){
            $r=CRAWLController::find($url,'a');
        }elseif($type==1 || $type==2){
            $r=DOMController::filter($url,'a')->alt;
        }else{
            $r='Error!';
        }
        return $r;
    }

    public static function metas($url){
        return get_meta_tags($url);
    }

    public static function images($url,$type){
        $links=CRAWLController::find($url,'img');
        if($type==null ||$type==1){
            $r=$links;
        }elseif($type==1 || $type==2){
            $r=$links;
        }else{
            $r='Error!';
        }
        return $r;
    }

    public static function videos($url){
        return CRAWLController::find($url,'video')->src;
    }

}
