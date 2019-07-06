<?php

namespace App\Http\Controllers;

use App\videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VideosController extends Controller
{
    public function __construct()
    {
    }

    public function videosList()
    {
        $videos = videos::all();
        return view('library.videos-list',compact(['videos']));
    }

    public function videoDetails($videoID)
    {
        $video = videos::find($videoID);
        return view('library.video-details',compact(['video']));
    }

    public function search(request $request)
    {
        if(videos::searchForVideos($request->all())){
            $video = videos::where('title',$request['search'])->first();
            return Redirect::route('videoDetails',array($video->videoID));

        }else
        {
            return Redirect::back()->with('alert_warning','There\'s no such video');
        }

    }
}
