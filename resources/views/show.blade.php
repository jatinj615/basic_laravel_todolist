@extends('layout.app')

@section('body')
<br><br>
	<div class="text-center">
	<h1>{{$item->title}}</h1>
	<p>{{$item->body}}</p>
	<br>
	<a href="/todo" class="btn btn-info">Back</a>
	</div>
@endsection