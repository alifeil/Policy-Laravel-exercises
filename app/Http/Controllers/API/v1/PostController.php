<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function create(Request $request){
        $post = new Post();
        $post->text = $request->text;
        $post->user_id = $request->user()->id;
        $post->save();

        return response(['success' => true]);
    }

    public function delete(Request $request, Post $post){
        //$this->authorize('delete', $post);
        if ($request->user()->cannot('delete', $post)){
            return response(['error' => 'Unautorized'], 403);;
        }
        $post->delete();

        return response(['success' => true]);
    }

    public function update(Request $request, Post $post){
        $post->text = $request->text;
        $post->save();

        return response(['success' => true]);

    }
}
