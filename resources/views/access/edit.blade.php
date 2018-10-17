@extends('layouts.app')

@section('content')
    @if(Auth::guest())
    <h1>Unauthorized Page! <a class="btn btn-default" href="/posts">Go Back</a></h1>
    @endif

    @if(!Auth::guest())
        @if(Auth::user()->user_role != 3)

           <h1>Edit Category</h1>
           {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'post', 'enctype' => 'multipart/form-data'])  !!}
               <div class="form-group">
                   {{Form::label('name', 'Category Name')}}
                   {{Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
               </div>
               {{Form::hidden('_method', 'PUT')}}
               {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
           {!! Form::close() !!}

        @else 

        <h1>Only Author can edit category! <a class="btn btn-default" href="/posts">Go Back</a></h1>

        @endif
    @endif        
@endsection