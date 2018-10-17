@extends('layouts.app')

@section('content')
    @if(Auth::guest())
    <h1>Unauthorized Page! <a class="btn btn-default" href="/posts">Go Back</a></h1>
    @endif
    @if(!Auth::guest())
        @if(Auth::user()->user_role != 3)

           <h1>Register Tag</h1>
           {!! Form::open(['action' => 'TagController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
               <div class="form-group">
                   {{Form::label('name', 'Tag Name')}}
                   {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
               </div>
               {{Form::submit('Register', ['class' => 'btn btn-primary'])}}
           {!! Form::close() !!}
        @else 

        <h1>Only Author can register tags! <a class="btn btn-default" href="/posts">Go Back</a></h1>

        @endif
    @endif    
@endsection