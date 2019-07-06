<?php

namespace App\Http\Controllers\admin;

use App\videos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class VideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    protected function validateVideo()
    {
        return $this->validate(Request(),[
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'thumbnail' => 'required|max:150',
            'video' => 'required_without_all:path|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'path' => 'required_without_all:video'
        ]);
    }
    public function index()
    {
        $videos = videos::all();
        return view('admin.videos.video-list',compact(['videos']));
    }

    public function create()
    {
        return view('admin.videos.video-create');
    }
    public function store(request $request)
    {
        $this->validateVideo();

        videos::storeVideo($request->all());

        return Redirect::route('videos.index')->with('success_alert','Video was added successfully');
    }

    public function edit($videoID)
    {
        $video = videos::find($videoID);

        return view('admin.videos.video-edit',compact('video'));
    }
    public function update(request $request, $videoID)
    {
        $this->validateVideo();

        videos::editVideo($request->all(),$videoID);

        return Redirect::route('videos.index')->with('warning_alert','Video was updated successfully');
    }

    public function show($videoID)
    {
        $video = videos::find($videoID);

        return view('admin.videos.video-details',compact(['video']));
    }

    public function delete($videoID)
    {
        videos::deleteVideo($videoID);
        return Redirect::route('videos.index')->with('danger_alert','Video was deleted successfully');
    }

}
