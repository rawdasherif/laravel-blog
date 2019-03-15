
@extends('layouts.app')

@section('content')

<a  class="btn btn-info" href="{{route('posts.index')}}" >Back</a>
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
<form action="{{route('posts.store')}}" method ="POST">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">TITLE</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">DESCRIPTION:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect2">WRITTEN BY</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="user_id">
    @foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
    <br>
  <input class="btn btn-info" type="submit" value="update" >

  </div>

</form>
@endsection