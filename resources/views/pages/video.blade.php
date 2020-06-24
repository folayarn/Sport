@extends('layouts.app')

@section('content')
<div class="col-md-12">
<a href="/home" class="btn btn-success text-left">
<span class="glyphicon glyphicon-home"></span>Go Back</a></div>
<div class="col-md-12"><h3 class="text-center">Create Post</h3></div>
<div class="row">

<div class="col-md-2"></div>
<div class="col-md-9">
@include('inc.message')


{!!Form::open(['action'=>'SportsPostController@storeVideo', 'method'=>'Post'])!!}
{{ csrf_field() }}
<div class="form-group">
{{ Form::label('title','Title', ['class'=>'label-control']) }}

{{ Form::text('title','',['class'=>'form-control','placeholder'=>'Enter the Title']) }}
</div>
<div class="form-group">
{{ Form::label('teams','Select Team', ['class'=>'label-control']) }}
{{ Form::select('teams',$teams,null,['class'=>'form-control','placeholder'=>'Select the Team']) }}


</div>

<div class="form-group">
    {{ Form::label('url','Paste your Video Url', ['class'=>'label-control']) }}

    {{ Form::text('url','',['class'=>'form-control','placeholder'=>'Url']) }}
    </div>


            <div class="form-group">

                {{ Form::button('<span class="glyphicon glyphicon-save"> </span>Upload Your Video',
                ['class'=>'btn btn-primary form-control','type'=>'submit' ]) }}


                </div>


{!! Form::close() !!}


</div>
<div class="col-md-1"></div>


</div>




@endsection
