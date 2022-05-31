<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function tag()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    public function tagCreate()
    {
        return view('admin.tag.create');
    }

    public function tagStore(TagRequest $request)
    {
        $data = $request->validated();

        Tag::firstOrCreate($data);

        return redirect()->route('tag.index');
    }

    public function tagShow(Tag $tag)
    {
       // dd($category);
        //tag::firstOrCreate($data);

        return view('admin.tag.show', compact('tag'));
    }

    public function tagEdit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function tagUpdate(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('tag.index');
    }

    public function tagDestroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }


}
