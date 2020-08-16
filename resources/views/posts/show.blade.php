@extends('layout.app')

@section('content')
<div class="card">
  <h5 class="card-header">details</h5>
  <div class="card-body">
  <h5 class="card-title">id : <span>{{$post->id}}</span></h5>
  <h5 class="card-title">title : <span> {{$post->title}}</span></h5>
  <h5 class="card-title">description : <span> {{$post->description}}</span></h5>
  <a href={{route('posts.index')}} class="btn btn-primary mt-3">back to blogs</a>
  </div>
</div>
@endsection