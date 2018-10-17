@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'post', 'enctype' => 'multipart/form-data'])  !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>

         <div class="form-group">
            {{Form::label('category_id', 'Category')}}
           <select class="form-control" name="category_id">
            @if(count($otherCategories) > 0)
            <option value="{{$post->category->id}}">{{$post->category->name}}</option>
            @foreach($otherCategories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            @else
                <option value="No Category">No Category Found</option>
            @endif
           </select>
        </div>

        <div class="form-group">
            {{Form::label('tags', 'Tags')}}
            {{Form::select('tags[]', $tags, null, ['class' => 'js-basic-multiple form-control', 'multiple' => 'multiple'])}}
        </div>

         

        {{--  <div class="form-group">
            {{Form::label('tags', 'Tags')}}
            <select class="js-basic-multiple form-control" name="tags[]" multiple="multiple">

              @if(count($otherTags) > 0)
                @foreach($otherTags as $otherTag)
                    <option value="{{$otherTag->id}}">{{$otherTag->name}}</option>
                @endforeach
                @else
                    
            @endif
            </select>
        </div> --}}

        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-basic-multiple').select2();
            //Todo
            //prepopulate already registered tags
            $('.js-basic-multiple').select2().val({!! json_encode($post->tags()->allRelatedIds())!!}).trigger('change');
        });
    </script>

@endsection