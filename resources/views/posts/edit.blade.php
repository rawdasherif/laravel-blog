<!DOCTYPE html>
<html>
<body>
<style>
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: green;
}
</style>
<a href="{{route('posts.index')}}">Back</a>
<br>
<br>
<form action="/posts/{{ $post->id }}" method ="POST">
@csrf
{{ method_field('PATCH')}}
  <label>Title:</label>
  <input type="text" name="title" value="{{$post->title}}">
  <br>
  <br>
  Description:<br>
  <textarea  style="padding: 14px 25px;" name="description" >{{$post->description}}</textarea>
  <br><br>
  <label>written by:</label>
  <label type="text" name="user_id">{{$post->user->name }}</label>
  <br>
  <input type="submit" value="update" >

</form> 

</body>
</html>
