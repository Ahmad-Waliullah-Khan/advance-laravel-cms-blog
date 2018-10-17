@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>

        <div class="form-group">
            {{Form::label('category_id', 'Category')}}
           <select class="form-control" name="category_id">
            @if(count($categories) > 0)
            <option value="No Category">Please Select a Cateogry</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            @else
                <option value="No Category">No Category Found</option>
            @endif
           </select>
        </div>

         <div class="form-group">
            {{Form::label('tags', 'Tags')}}
            <select class="js-basic-multiple form-control" name="tags[]" multiple="multiple">
              @if(count($tags) > 0)
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
                @else
                    
            @endif
            </select>
        </div>
       
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-basic-multiple').select2();
        });
    </script>

@endsection