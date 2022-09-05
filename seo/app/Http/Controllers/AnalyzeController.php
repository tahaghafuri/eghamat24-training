<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;
use App\Http\Controllers\DOMController;
use App\Http\Controllers\URLController;

class AnalyzeController extends Controller
{
    
    public function url(Request $request){
        $url=$request->input('url');

        $infos=APIController::get_info($url);
        $infos['title']=str_replace('</title>','',str_replace('<title>','',DOMController::filter($url,'title')));
        $metas=APIController::metas($url);
        $links[0]=APIController::links($url,1); // href
        $links[1]=APIController::links($url,2); // alt
        $images[0]=APIController::images($url,1); // src
        $images[1]=APIController::images($url,2); // alt
        // $videos=APIController::videos($url); // have bug
        $ps=APIController::p($url);
        $bs=APIController::b($url);
        $strongs=APIController::strong($url);
        $hs=count(APIController::h($url,2))+count(APIController::h($url,3))+count(APIController::h($url,4))+count(APIController::h($url,5))+count(APIController::h($url,6));
        $h1s=APIController::h($url,1);

        return view('analyze',[
            'infos'=>$infos,
            'metas'=>$metas,
            'urls'=>$url,
            'images'=>$images,
            'links'=>$links,
            'ps'=>$ps,
            'bs'=>$bs,
            'strongs'=>$strongs,
            'hs'=>$hs,
            'h1s'=>$h1s
        ]);
        
        // echo '<pre>';
        // var_dump(URLController::get_url($url));
        // echo '</pre>';
    }

}
