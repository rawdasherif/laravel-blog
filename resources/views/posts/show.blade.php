@extends('layouts.app')

@section('content')

<dl class="row">
  <dt class="col-sm-3">Title :</dt>
  <dd class="col-sm-9">{{$post->title}} </dd>

  <dt class="col-sm-3">Description :</dt>
  <dd class="col-sm-9">
    <p>{{$post->description}}</p>
  </dd>

  <dt class="col-sm-3">written by :</dt>
  <dd class="col-sm-9">{{$post->user->name}} </dd>

  <dt class="col-sm-3 text-truncate">Created At  :</dt>
  <dd class="col-sm-9">{{$post->created_at->format('l jS \of F Y h:i:s A')}}</dd>

  <a   class="btn btn-info" href="{{route('posts.index')}}">Back</a>
</dl>

@endsection
