<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\Post\StorePostRequest ;
use App\Http\Requests\Post\UpdatePostRequest ;

class PostsController extends Controller
{
    public function index (){
      $posts =Post::all();
      return view ('posts.index',[
        'posts' =>$posts
      ]);
    }

    public function create (){
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
      }

      public function store (StorePostRequest $request)
      {
        
        Post::create($request->all());
        return redirect()->route('posts.index');

      }  
      public function edit($post){
        $post=Post::find($post);
        $users = User::all();
        return view ('posts.edit',[
          'post'=>$post,
          'users' => $users,
        ]);
      }

      public function update(UpdatePostRequest  $request,Post $post )
        {
          $post->slug = null;
          $post->title = request()->all()['title'];
          $post->description = request()->all()['description'];
          $post->save();
            return redirect()->route('posts.index');

        }
      public function show(Post $post){

           return view ('posts.show',[
              'post' =>$post,
           ]);
         
        } 
      
      public function destroy(Post $post)
        {
             $post->delete();
             return redirect()->route('posts.index');
        }  

}
