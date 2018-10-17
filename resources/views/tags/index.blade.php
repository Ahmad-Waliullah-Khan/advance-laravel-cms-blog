@extends('layouts.app')

@section('content')
    <h1>Tags
        <a class="btn btn-lg btn-success pull-right" href="/tag/create">Register Tag</a>
    </h1>
    <br>
    <hr>
    <br>
    @if(count($tags) > 0)
        @foreach($tags as $tag)
            <div class="well">
                <div class="row">
                        <h4><a href="/tag/{{$tag->id}}">{{$tag->name}}</a>
                            <a href="/tag/{{$tag->id}}/edit" class="btn btn-success pull-right">Edit</a>

                            @if(!Auth::guest())
                                @if(Auth::user()->user_role == 1)

                                    {!!Form::open(['action' => ['TagController@destroy', $tag->id], 'method' => 'POST', 'class'=> 'pull-right'])!!}
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
        {{$tags->links()}}
    @else 
        <p>No tags Found</p>
    @endif
@endsection