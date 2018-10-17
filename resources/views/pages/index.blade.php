{{-- Designed and Developed by Ahmad W Khan
as assignment for Duminex.com --}}
@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">

	    <div class="row">
	        <div class="col-md-4 col-sm-4">
	            <img style="width:100%;" class="img-circle" src="/storage/cover_images/{{$siteSettings->logo}}"/>
	        </div>
	        <div class="col-md-8 col-sm-8">
	        	<h1>{{$siteSettings->name}}</h1>
	        	<p>This is a simple CMS app built using Laravel, by <a href="http://AhmadWKhan.com">Ahmad W Khan</a></p>
	        </div>
		</div>

		<?php 

			Session::put('site_title', $siteSettings->name);
			Session::put('site_logo', $siteSettings->logo);

		 ?>
    
@endsection