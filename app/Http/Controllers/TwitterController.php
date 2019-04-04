<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Twitter;
use Carbon\Carbon;
use App\Notifications\TweetPublished;
use Illuminate\Support\Facades\Notification;
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


    public function saveTweet(Request $request){
        $tweet = Tweet::create([
            'account' => $request->input('account'),
            'tweet' => $request->input('tweet'),
            'tweeted_at' => $request->input('tweeted_at')
        ]);

        $message = Tweet::whereDate('tweeted_at', Carbon::today())->first();
        // var_dump($message);
        // die();
        $message->notify(new TweetPublished());
        $message->delete();

        return redirect()->back();



    }

}
