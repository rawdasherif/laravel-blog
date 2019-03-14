<form method="post" action="/posts/{{ $post->id }}">
    {{ method_field('DELETE') }}
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="dlt">Delete ID: </label>
       <input name="id" class="form-control">
       <div class="form-group">
       <button type="submit" class="btn btn-primary">Delete</button>
       </div>
    </form>
