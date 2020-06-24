@extends('layouts.app')

@section('content')

    <div class="row ">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




<ul id="home_side">
<li>
<a href="/post/create"><button class="btn btn-primary form-control">
    <span class="glyphicon glyphicon-plus"></span> Create Post </button></a>
</li>

<li>
    <a href="/createVideo"><button class="btn btn-primary form-control">
        <span class="glyphicon glyphicon-plus"></span>Upload Video with Url </button></a>
    </li>

<li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();
                                  " class="btn btn-danger form-control">
                   <span class="glyphicon glyphicon-log-out"></span>Logout   
                 </a> 
                 
                 
    <form id="logout-form" action="{{ route('logout') }}" method="POST" 
    style="display: none;">

                   @csrf
                   </form>
    
  
    </li>

</ul>

                </div>
            </div>
        </div>
        <div class="col-md-8">
        </div>
    </div>
</div>
@endsection
