@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>View Video</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form >


                                <div class="form-group">
                                    Title
                                    <input disabled class="form-control" type="text" value=" {{$video->title}}">

                                </div>
                                <div class="form-group">
                                    Description
                                    <textarea disabled class="form-control" > {{$video->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    Thumbnail
                                    <img    src="/{{$video->thumbnail}}" width="250" height="250">
                                </div>
                                @if($video->video != null)
                                    <video width="1000" height="500" controls>
                                        <source src="/{{$video->video}}" type="video/mp4">
                                        Your browser does not support HTML5 video.
                                    </video>
                                @elseif($video->path != null)
                                    <video width="1000" height="500" controls>
                                        <source src="{{$video->path}}" type="video/mp4">
                                        Your browser does not support HTML5 video.
                                    </video>
                                @endif
                            </form>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
    </div>

@endsection
