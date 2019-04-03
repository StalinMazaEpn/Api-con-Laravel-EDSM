<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Twitter;
use Carbon\Carbon;
#Modelo

class TwitterController extends Controller
{
    //$count, $screenName (edteamlat)
    public function timeline(){
        return Twitter::getUserTimeline([
            'screen_name' => 'edteamlat',
            'count' => 20,
            'format' => 'json'
        ]);
    }


    public function timeline_params($count,$screenName){
        return Twitter::getUserTimeline([
            'screen_name' => $screenName,
            'count' => (int)$count,
            'format' => 'json'
        ]);
    }

    public function search($count,$search){
        try{
            return Twitter::getSearch([
                'q' => $search,
                'count' => (int)$count,
                'format' => 'json'
            ]);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

}
