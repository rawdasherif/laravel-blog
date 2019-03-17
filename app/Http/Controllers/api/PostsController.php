<?php

namespace App\Http\Controllers\api;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\Post\StorePostRequest ;

class PostsController extends Controller
{
    public function index()
    {
        return PostResource::collection(post::paginate(2));
    }

    public function show($post)
    {
        $post =Post::find($post);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        post::create($request->all());

        return response()->json([
            'message'=>'successfuly created'
        ],201);
    }
}
