
{!!Form::open(['action'=>'SportsPostController@store', 'method'=>'Post', 'enctype'=>'multipart/form-data'])!!}
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
    {{ Form::label('type','Select News Type', ['class'=>'label-control']) }}
    {{ Form::select('type',$type,null,['class'=>'form-control',
    'placeholder'=>'Select the News Type']) }}


    </div>

    <div class="form-group">
        {{ Form::label('post','Type the Post below', ['class'=>'label-control']) }}
        {{ Form::textarea('post','',['class'=>'form-control','id'=>'article-ckeditor',
        'placeholder'=>'Enter the post to be publsh']) }}


        </div>
        <div class="form-group">
            {{ Form::label('image','Upload your Image', ['class'=>'label-control']) }}
            {{ Form::file('file',['class'=>'form-control' ]) }}


            </div>
            <div class="form-group">

                {{ Form::button('<span class="glyphicon glyphicon-save"> </span>Publish',
                ['class'=>'btn btn-primary form-control','type'=>'submit' ]) }}


                </div>


{!! Form::close() !!}
