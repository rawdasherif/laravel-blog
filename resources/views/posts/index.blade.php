<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

a:link, a:visited {
  background-color: red;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

}

a:hover, a:active {
  background-color: red;
}

input{
  background-color:  red;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

</style>
</head>
<body>

<a style="background-color: green;" href="{{route('posts.create')}}">create post</a>
<a style="background-color: yellow;" href="{{route('home')}}">logout</a>


<h2>POSTS Table</h2>

<table>
  <tr>
    <th>ID</th>
    <th>TITLE</th>
    <th>CREATED AT</th>
    <th>POSTS BY</th>
  </tr>
  @foreach($posts as $post)
  <tr>
    <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->created_at}}</td>
    <td>{{isset($post->user) ? $post->user->name : 'Not Found'}}</td>
    <td><a href="{{route('posts.edit',$post->id)}}">Edit</a>
    <a href="{{route('posts.show',$post->id)}}">View</a>
    <form method='POST'  action="{{route('posts.destroy',$post->id)}}">
    @csrf
    {{ method_field('DELETE')}}
    <input type="submit" value="Delete" >
    </form>

    </td>

  </tr>
  @endforeach

</table>

</body>
</html>
