@extends('layouts/app') 
@section('content')
<h3>Posts</h3>
@if (count($posts) > 0)
@foreach ($posts as $post)
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <img style="width: 100%" src="{{config('app.url')}}/storage/cover_images/{{$post->cover_image}}" alt="">
            </div>
            <div class="col-md-8 col-sm-4">
                    <h3><a href="{{config('app.url')}}/posts/{{$post->id}}">{{$post->title}}</a></h3>

            </div>
        </div>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    </div>
@endforeach
 @else
<p>No Posts Found</p>
@endif
@endsection   