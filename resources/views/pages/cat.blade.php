@extends('layouts.app')

@section('content')



@section('content')
<div class="row">
<div class="col-md-8">
<h2 class="text-center">{{$cat->type}}</h2>

@if(count($posts) > 0)
<div class="card">
@foreach ($posts as $post )
<a href="/post/{{$post->id}}">
<div class="card-body">
<div class="pull-left" style="margin-right:20px">
<img class="img-fluid" src="../storage/images/{{$post->image}}" width="100px" height="100px" />
</div>
<div class="text-left">
{{$post->title}} <br>
<i class="pull-right"
 style="background-color: rgb(250, 7, 7); padding:3px;margin-top:10px">
 <span class="glyphicon glyphicon-time" style="padding-right:5px"></span>{{$post->created_at->diffForHumans()}}</i>
</div>
</div>
</a>
@endforeach
@else

          <h1 class="text-center" style=" color:grey">no available post </h1>
@endif
</div>

{{$posts->links()}}

</div>
<div class="col-md-4">


      </div>

</div>


<div class="row">

    <div class="col-md-12">
        @if(count($slide) > 0)
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($slide->take(10) as $key=> $post )
                <li data-target="#carouselExampleIndicators" data-slide-to={{$key}}
                class={{$key==0? 'active':''}}></li>

                @endforeach
            </ol>
            <div class="carousel-inner">

                @foreach ($slide->take(10) as $key=> $post )
              <div class=" carousel-item {{ $key==0 ? 'active':'' }} ">
                <img class="d-block w-100 img-fluid"
                 src="../storage/images/{{$post->image}}"/>
                <div class="carousel-caption d-md-block">
                    <h2 class="text-left">{{$post->title}}
    <a  href="/post/{{$post->id}}"><button class="btn btn-danger"><span class="fa fa-eye" style="padding-right:8px"></span>Read More...</button></a>
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




          </div>




@else

          <h1 class="text-center" style=" color:grey">no available post </h1>
          @endif



    </div>



@endsection



@endsection
