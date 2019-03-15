@extends('layouts.app')

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">SLUG</th>
      <th scope="col">CREATED AT</th>
      <th scope="col">WRITTEN BY</th>
      <th scope="col">BUTTONS</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
  <tr>
    <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->slug}}</td>
    <td>{{$post->created_at->format('Y-m-d')}}</td>
    <td>{{isset($post->user) ? $post->user->name : 'Not Found'}}</td>
    <td><a class="btn btn-info" href="{{route('posts.edit',$post->id)}}">Edit</a>
    <a  class="btn btn-warning" href="{{route('posts.show',$post->id)}}">View</a>
    <form method='POST'  action="{{route('posts.destroy',$post->id)}}">
    @csrf
    {{ method_field('DELETE')}}
    <button  class="btn btn-danger" type="submit"  onclick="return myFunction();" >Delete</button>
    <script>
      function myFunction(){
        var agree = confirm("Are you sure you want to delete this Post?");
          if(agree == true){
            return true
            }
            else{
            return false;
            }
      }
    </script>
    </form>

    </td>

  </tr>
  @endforeach
   
  </tbody>
</table>
</table>
@endsection
