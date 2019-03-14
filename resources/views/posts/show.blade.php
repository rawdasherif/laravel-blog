<html>
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
<body>

<label>Title : </label>
<label>{{$post->title}} </label>
<br><br>
<label>Description : </label>
<label>{{$post->description}} </label>
<br><br>
<label>written by : </label>
<label>{{$post->user->name}} </label>
<br><br>
<label>Created At  : </label>
<label>{{$post->created_at}} </label>
<br><br>
<a href="{{route('posts.index')}}">Back</a>



</body>
</html>