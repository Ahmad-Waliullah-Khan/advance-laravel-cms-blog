@extends('layouts.app')

@section('content')
    <h1>Site Settings</h1>
    {!! Form::open(['action' => ['SettingsController@update', $siteSettings->id], 'method' => 'post', 'enctype' => 'multipart/form-data'])  !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $siteSettings->name, ['class' => 'form-control', 'placeholder' => 'Site Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('site_logo', 'Logo')}}
            {{Form::file('site_logo')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection