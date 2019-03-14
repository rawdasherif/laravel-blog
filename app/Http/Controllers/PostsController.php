<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\User;

class PostsController extends Controller
{
    public function index (){
      $posts =post::all();
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

      public function store (){
        $request=request()->all();

        post::create([
          'title' =>$request['title'],
          'description' =>$request['description'],
          'user_id'=>$request['user_id']

        ]);

      }  
      public function edit($post){
        $post=post::find($post);
        $users = User::all();
        return view ('posts.edit',[
          'post'=>$post,
          'users' => $users,
        ]);
      }

      public function update(Post $post )
        {
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
      
      public function destroy(post $post)
        {
             $post->delete();
             return redirect()->route('posts.index');
        }  

}
