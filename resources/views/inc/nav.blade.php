
<nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container-fluid">
      <div class="pull-right">  <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Footballing Galactico') }}

        </a>
      </div>
           <button type="button" class="navbar-toggle collapsed"
           data-toggle="collapse" data-target="#navbar"
           aria-expanded="false" aria-controls="navbar">
             <span class="sr-only"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>




         <div id="navbar" class="navbar-collapse collapse ">


            <div class="pull-right" style="margin-right:40px">


           <ul class="nav nav-list navbar-nav pull-left">
                         @foreach ($type as $keys=>$type )
           <li class="nav-item" ><a href='/category/{{$keys}}'>{{$type}}</a></li>
   @endforeach


       <li class="dropdown">

               <a href="#" class="dropdown-toggle"
               data-toggle="dropdown" role="button" aria-haspopup="true"
               aria-expanded="false">Teams</a>


               <ul class="dropdown-menu">


                       @foreach ($teams as $key=> $team )
               <li ><a href='/team/{{$key}}'>{{$team}}</a></li>
   @endforeach
               </ul>
             </li>
           </ul>
            </div>
         </div>

        </div>

    </nav>


<div class="scrollMenu" >

    @foreach ($teams as $key=> $team )
    <a href='/team/{{$key}}'>{{$team}}</a>
@endforeach
</div>

