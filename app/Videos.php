<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class videos extends Model
{
    protected $table = 'videos';
    protected $fillable = ['title','description','thumbnail','video','path'];
    protected $primaryKey = 'videoID';





    public static function storeVideo($request)
    {
        $video = new videos;
        $video->title = $request['title'];
        $video->description = $request['description'];
        $video->thumbnail = User::storeFiles('thumbnail');
        if (request()->video != null)
            $video->video = User::storeFiles('video');
        $video->path = $request['path'];
        $video->save();
    }

    public static function editVideo($request,$videoID)
    {
        $video = videos::find($videoID);
        $video->title = $request['title'];
        $video->description = $request['description'];
        if (request()->hasFile('thumbnail'))
            $video->thumbnail = User::storeFiles('thumbnail');
        if (request()->hasFile('video'))
            $video->video = User::storeFiles('video');
        $video->path = $request['path'];
        $video->save();
    }

    public static function deleteVideo($videoID)
    {
        $video = videos::find($videoID);
        if ($video != null)
            $video->delete();
    }


    public static function searchForVideos($request)
    {
        $video = videos::where('title',$request['search'])->first();
        if ($video != null)
            return true;
        else
            return false;
    }



}
