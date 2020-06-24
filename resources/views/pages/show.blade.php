@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
     <form  style="display: none"  action="{{route('posts.count', ['id'=>$post->id])}}" method="POST">
{{csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
     <input type="text" name="visitCount" value="{{$post->visit_count}}" id="visitCount">


     </form>


<h2 class="text-left">{{$post->title}}</h2>
<div>
   <h5 id="date" class="pull-left" >

 <i style="padding-left:10px"> <span class="glyphicon glyphicon-time"
     style="padding-right:5px"></span>
          Post Created at {{$post->created_at->diffForHumans()}}</i></h5>

        <h5 class="pull-right"> <span class="fa fa-eye" style="padding-right:8px">
    </span>{{$post->visit_count}}</h5></div>

    <img src="../storage/images/{{$post->image}}" width="800px" height="400px" class="img-fluid" />
    <br/>
    <br/>
<div style="padding-bottom: 20px">
          <button class=" btn btn-primary fb-share-button"
          data-href="http://localhost:8000/post/{{$post->id}}"
          data-layout="button_count"><span class="glyphicon glyphicon-share"></span> Share on Facebook
 </button>

        <a  class="btn btn-success" rel="canonical"
    href="https://twitter.com/intent/tweet?text={{$post->title}}&url=http://http://localhost:8000/post/{{$post->id}}&hashtags=hashtag1"
        data-size="large">
     <span class="glyphicon glyphicon-share"></span>Share on Tweet</a>
</div>
<div>
<p class="text-left">{!!$post->body!!}</p>


</div>


<div>

@if(Auth::check())

<a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=>['SportsPostController@destroy',$post->id ], 'method'=>'POST',
'class'=>'pull-right'])!!}
{{ Form::hidden('_method','DELETE') }}
{{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}

{!! Form::close() !!}

@endif


</div>
    </div>


        <div class="col-md-4">

<h2 class="text-center">Related News</h2>

@if(count($side) > 0)
<div class="card">
@foreach ($side as $sid )
<a href="/post/{{$sid->id}}">
<div class="card-body">
<div class="pull-left" style="margin-right:20px">
<img src="../storage/images/{{$sid->image}}" width="70px" height="70px" />
</div>
<div class="text-left">
    {{$sid->title}}
</div>
</div>
</a>
@endforeach
</div>
@endif

{{$side->links()}}
</div>








<meta property="og:url"           content="http://localhost:8000/post/{{$post->id}}" />
<meta property="og:title"         content="{{$post->title}}" />
  <meta property="og:description"   content="{{$post->body}}" />
  <meta property="og:image"         content="http://locahost:8000/storage/images/{{$post->image}}" />








@endsection
