@extends('layout.app')

@section('content')
<a href="{{route('posts.create')}}" type="button" class="btn btn-success mb-3">Create blogs</a>
    <table class="table table-striped table-dark text-center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">Created at</th>
            {{-- <th scope="col">Posted by</th> --}}
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
        <tr>
        <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->created_at->format('Y-m-d')}}</td>
            {{-- <td>{{$post->posted_by}}</td> --}}
            <td>
            {{-- <a href='/posts/{{$post->id}}' class="btn btn-info">View</a> --}}
            <a href={{route('posts.show',['post'=>$post->id])}} class="btn btn-info">View</a>
            <a href={{route('posts.edit',['post'=>$post->id])}} class="btn btn-warning">Edit</a>
            <form method="post" action="{{route('photos.destroy',['post'=>$post->id])}}" class="d-inline">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger" id="deletebtn" onclick="return confirm('Are you sure to delete ?')">Delete</button>
            </form>
            </td>
        </tr>
            @endforeach
        
        </tbody>
    </table>
@endsection