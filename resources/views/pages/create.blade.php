@extends('layouts.app')

@section('content')
<div class="col-md-12">
<a href="/home" class="btn btn-success text-left">
<span class="glyphicon glyphicon-home"></span> Go Back</a></div>
<div class="col-md-12"><h3 class="text-center">Create Post</h3></div>

<div class="row">

<div class="col-md-2"></div>
<div class="col-md-9">
@include('inc.message')

@include('inc.form')
</div>
<div class="col-md-1"></div>


</div>




@endsection
