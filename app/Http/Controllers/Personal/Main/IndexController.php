<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IndexRequest;
use App\Http\Requests\Personal\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserFavorites;

class IndexController extends Controller
{
    public function personal()
    {
        return view('personal.main.index');
    }

    public function personalFavorites()
    {
        $posts = auth()->user()->favoritesPosts; //collection, () sql request
       // dd($posts );
        return view('personal.main.favorites', compact('posts'));
    }

    public function personalDestroy(Post $post)
    {
       auth()->user()->favoritesPosts()->detach($post->id);

       return redirect()->route('personal.favorites');
    }


    public function personalComment()
    {
       $comments = auth()->user()->comment;
       //dd($comments);
       return view('personal.main.comment', compact('comments'));
    }

    public function personalCommentEdit(Comment $comment)
    {
       //dd($comment);
       return view('personal.main.edit', compact('comment'));
    }

    public function personalCommentUpdate(UpdateRequest $request, Comment $comment)
    {
       $data = $request->validated();
       $comment->update($data);
       return redirect()->route('personal.comment');
    }

    public function personalCommentDestroy(Comment $comment)
    {
       $comment->delete();
       return redirect()->route('personal.comment');
    }



}
