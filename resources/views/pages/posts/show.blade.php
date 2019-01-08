@extends('layouts/app') 
@section('content')
<a href="{{config('app.url')}}/posts" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>

<img style="width: 100%" src="{{config('app.url')}}/storage/cover_images/{{$post->cover_image}}" alt="">
<div>
  {!!$post->body!!}
</div>
<hr>    
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>

<hr>
{{-- if user is not a guest --}}
@if (!Auth::guest())

    {{-- if user is the author --}}
    @if (Auth::user()->id == $post->user_id)
        
<a href="{{config('app.url')}}/posts/{{$post->id}}/edit/" class="btn btn-default">Edit</a>

{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif

@endif
@endsection  