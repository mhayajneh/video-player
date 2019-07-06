@extends('layouts.app')
@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">

            <!-- Title -->
            <h1 class="mt-4">{{$video->title}} </h1>




            <!-- Date/Time -->
            <p>Added on {{$video->created_at}}</p>

            <hr>


            <!-- Preview video -->
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
            <hr>

            <!-- Video Content -->
            <p class="lead my-5">{{$video->description}}</p>




        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


    @endsection
