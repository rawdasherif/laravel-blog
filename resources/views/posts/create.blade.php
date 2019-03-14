
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
<a href="{{route('posts.index')}}">Back</a>
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

<form action="{{route('posts.store')}}" method ="POST">
@csrf
  <label>Title:</label>
  <input type="text" name="title" >
  <br>
  <br>
  Description:<br>
  <textarea name="description"></textarea>
  <br><br>
  <label>Select User:</label>
  <select name="user_id">
  @foreach ($users as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>
  @endforeach
  </select>
  <br>
  <input type="submit" value="Submit">

</form> 

</body>
</html>
