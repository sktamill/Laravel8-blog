<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IndexRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['tagsCount'] = Tag::all()->count();

        return view('admin.main.index',compact('data'));
    }

    public function category()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function categoryCreate()
    {
        return view('admin.category.create');
    }

    public function categoryStore(IndexRequest $request)
    {
        $data = $request->validated();

        Category::firstOrCreate($data);

        return redirect()->route('category.index');
    }

    public function categoryShow(Category $category)
    {
       // dd($category);
        //Category::firstOrCreate($data);

        return view('admin.category.show', compact('category'));
    }

    public function categoryEdit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function categoryUpdate(IndexRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('category.index');
    }

    public function categoryDestroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }


}
