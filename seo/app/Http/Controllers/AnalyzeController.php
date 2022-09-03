<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;

class AnalyzeController extends Controller
{
    
    public function url(Request $request){
        $url=$request->input('url');

        $infos=APIController::get_info($url);
        $metas=APIController::metas($url);
        // $links[0]=APIController::links($url,1); // href
        // $links[1]=APIController::links($url,2); // alt
        // $images[0]=APIController::images($url,1); // src
        // $images[1]=APIController::images($url,2); // alt
        // $videos=APIController::videos($url);
        $ps=APIController::p($url);
        $bs=APIController::p($url);
        $strongs=APIController::p($url);
        $ps=APIController::p($url);
        $hs=count(APIController::h($url,2))+count(APIController::h($url,3))+count(APIController::h($url,4))+count(APIController::h($url,5))+count(APIController::h($url,6));
        $h1s=APIController::h($url,1);

        return view('analyze',[
            'infos'=>$infos,
            'metas'=>$metas,
            'urls'=>$url,
        ]);
    }

}
