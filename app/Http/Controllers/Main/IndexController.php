<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('favoritesUsers')->orderBy('favorites_users_count','DESC')->get()->take(4);
        //dd($likedPosts);
        return view('main.index', compact('posts','randomPosts','likedPosts'));
    }

    public function post(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id',$post->category_id)
            ->where('id','!=',$post->id)
            ->get()
            ->take(3);
        return view('main.post', compact('post', 'date', 'relatedPosts'));
    }

    public function postStore(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->route('name.post', $post->id);
    }

    public function postFavoritesStore(Post $post)
    {
        auth()->user()->favoritesPosts()->toggle($post->id);

        return redirect()->back();
    }

    public function categories()
    {
        $categories = Category::all();
        return view('main.category', compact('categories'));
    }
}
