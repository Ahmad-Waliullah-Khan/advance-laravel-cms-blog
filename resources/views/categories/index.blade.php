@extends('layouts.app')

@section('content')
    <h1>Categories
        <a class="btn btn-lg btn-success pull-right" href="/category/create">Register Category</a>
    </h1>
    <br>
    <hr>
    <br>
    @if(count($categories) > 0)
        @foreach($categories as $category)
            <div class="well">
                <div class="row">
                        <h4><a href="/category/{{$category->id}}">{{$category->name}}</a>
                            <a href="/category/{{$category->id}}/edit" class="btn btn-success pull-right">Edit</a>

                            @if(!Auth::guest())
                                @if(Auth::user()->user_role == 1)

                                    {!!Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST', 'class'=> 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                @endif
                            @endif

                        </h4>
                    <div class="col-md-8 col-sm-8">

                    </div>
                </div>
                
            </div>
        @endforeach
        {{$categories->links()}}
    @else 
        <p>No categories Found</p>
    @endif
@endsection