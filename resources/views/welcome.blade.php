@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-4">
<h2 class="text-center">Latest News</h2>

@if(count($posts) > 0)
<div class="card">
@foreach ($posts as $post )
<a href="/post/{{$post->id}}">
<div class="card-body">
<div class="pull-left" style="margin-right:20px">
<img src="{{$post->image}}" width="100px" height="100px" class="img-fluid">
</div>
<div class="text-left">
    {{$post->title}}<br/>

    <h5> <span class="fa fa-eye" style="padding-right:5px">
    </span>{{$post->visit_count}}</h5>
<i>
 <span class="glyphicon glyphicon-time" style="padding-right:5px ;margin-left:120px"></span>
 {{$post->created_at->diffForHumans()}}</i>

</div>
</div>
</a>
@endforeach
</div>
@else
<h1 class="text-center" style=" color:grey"> No posts</h1>

@endif

{{$posts->links()}}
</div>
<div class="col-md-8">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($slide->take(5) as $key=> $post )
            <li data-target="#carouselExampleIndicators" data-slide-to={{$key}}
            class={{$key==0? 'active':''}}></li>

            @endforeach
        </ol>
        <div class="carousel-inner">
@if(count($slide)>0)
            @foreach ($slide->take(5) as $key=> $post )
          <div class=" carousel-item {{ $key==0 ? 'active':'' }} ">
            <img class="d-block w-100 img-fluid"
             src="{{$post->image}}"/>
            <div class="carousel-caption d-md-block">
                <h2 class="text-left">{{$post->title}}
<a  href="/post/{{$post->id}}"><button class="btn btn-danger">
    <span class="fa fa-eye" style="padding-right:8px"></span>View More...</button></a>
</h2>
              </div>

        </div>

          @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators"
         role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>



        <script>
            $(document).ready(function(){
                    $('.carousel').carousel('cycle')

                    });
                </script>
</div>
@else
<h1 class="text-center" style=" color:grey"> No available Posts</h1>

@endif
</div>
</div>

<div class="col-md-12">
    <h4 class="text-center" style=" color:white; padding:7px">
        Videos</h4>





<div class="row">

    @if (count($videos)>0)

        @foreach ($videos as $video )

     <div class="col-md-4 flex" style="padding: 10px">

     <iframe width="100%" height="200"
     src="https://www.youtube.com/embed/{{$video->url}}"
     frameborder="0" allow="accelerometer; encrypted-media;
     gyroscope; picture-in-picture" allowfullscreen>
    </iframe>

    <h4>{{$video->title}}</h4>
<i>{{$video->created_at->diffForHumans()}}</i>

     </div>
     @endforeach
@else

<h1 class="text-center" style=" color:grey">No videos for now</h1>

@endif


</div>
</div>

<div class="col-md-12">
     <div class="row">


    <div class="col-md-7">
        <h4 class="text-left">
            Popular Posts</h4>
        @if(count($popular) > 0)
<div class="card">
@foreach ($popular as $post )
<a href="/post/{{$post->id}}">
<div class="card-body">
<div class="pull-left" style="margin-right:20px">
<img src="{{$post->image}}" width="100px" height="100px" class="img-fluid">
</div>
<div class="text-left">
    {{$post->title}}<br/>

    <h5> <span class="fa fa-eye" style="padding-right:5px">
    </span>{{$post->visit_count}}</h5>
<i>
 <span class="glyphicon glyphicon-time" style="padding-right:5px "></span>
 {{$post->created_at->diffForHumans()}}</i>

</div>
</div>
</a>
@endforeach
</div>
@else
<h1 class="text-center" style=" color:grey"> No posts</h1>

@endif


</div>


<div class="col-md-5"></div>


    </div>










</div>



@endsection

