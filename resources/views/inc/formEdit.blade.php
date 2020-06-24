
{!!Form::open(['action'=>['SportsPostController@update', $posts->id], 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
{{ csrf_field() }}
<div class="form-group">
{{ Form::label('title','Title', ['class'=>'label-control']) }}

{{ Form::text('title',$posts->title,['class'=>'form-control','placeholder'=>'Enter the Title']) }}
</div>
<div class="form-group">
{{ Form::label('teams','Select Team', ['class'=>'label-control']) }}
{{ Form::select('teams',$teams,$posts->team_id,['class'=>'form-control','placeholder'=>'Select the Team']) }}


</div>
<div class="form-group">
    {{ Form::label('type','Select News Type', ['class'=>'label-control']) }}
    {{ Form::select('type',$type,$posts->category_id,['class'=>'form-control',
    'placeholder'=>'Select the News Type']) }}


    </div>

    <div class="form-group">
        {{ Form::label('post','Type the Post below', ['class'=>'label-control']) }}
        {{ Form::textarea('post',$posts->body,['class'=>'form-control','id'=>'article-ckeditor',
        'placeholder'=>'Enter the post to be publsh']) }}


        </div>
        <div class="form-group">
            {{ Form::label('image','Upload your Image', ['class'=>'label-control']) }}
            {{ Form::file('file',['class'=>'form-control' ]) }}


            </div>
            <div class="form-group">
{{ Form::hidden('_method','PUT') }}
                {{ Form::button('<span class="glyphicon glyphicon-save"> </span>Update',
                ['class'=>'btn btn-primary form-control','type'=>'submit' ]) }}


                </div>


{!! Form::close() !!}
