@extends('layouts.app')

@section('content')
    <a href="/category" class="btn btn-default">Go Back</a>

    <br>
    <br>
    

    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}"/>
                    </div>
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    <div class="col-md-8 col-sm-8">

                    </div>
                </div>
                
            </div>
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No Posts Found</p>
    @endif
@endsection