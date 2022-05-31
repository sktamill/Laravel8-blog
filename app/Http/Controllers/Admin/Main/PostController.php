<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function post()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function postCreate()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function postStore(PostRequest $request)
    {
        $data = $request->validated();
        try {
            //dd($data);
            if(isset($data['tags_id'])) {
                $tagIds = $data['tags_id'];
                unset($data['tags_id']);
            }

            $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);

            $post = Post::firstOrCreate($data);

            if(isset($tagIds)) $post->tags()->attach($tagIds);

        }catch (\Exception $exception){
            abort(500);
        }

        return redirect()->route('post.index');
    }

    public function postShow(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function postEdit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function postUpdate(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        try{
            if(isset($data['tags_id'])) {
                $tagIds = $data['tags_id'];
                unset($data['tags_id']);
            }

            if(isset($data['preview_image'])) $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
            if(isset($data['main_image'])) $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);

            $post->update($data);

            if(isset($tagIds)) $post->tags()->sync($tagIds);

        }catch (\Exception $exception){
            abort(500);
        }
        return redirect()->route('post.index');
    }

    public function postDestroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


}
