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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
  <select name="user_id">
  @foreach ($users as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>
  @endforeach
  </select>
  <br>
  <input type="submit" value="update" >

</form> 

</body>
</html>
