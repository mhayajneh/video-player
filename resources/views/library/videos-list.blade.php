@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4 text-center">All videos</h1>


        <div class="row">
            @foreach($videos AS $video)
                <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="{{route('videoDetails',array($video->videoID))}}"><img class="card-img-top" src="/{{$video->thumbnail}}" onerror='this.src="http://placehold.it/700x400"' alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{route('videoDetails',array($video->videoID))}}">{{$video->title}}</a>
                            </h4>
                            <p class="card-text">{{$video->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
     <!-- /.row -->



    </div>
    <!-- /.container -->

@endsection
