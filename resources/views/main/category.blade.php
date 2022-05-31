@extends('layouts.main')

@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
        <div class="container-fluid mb-5">
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">

                <ul>
                    @foreach($categories as $category)
                        <li>
                            <p>{{$category->title}}</p>
                            <ul class="mb-5">
                                @foreach($category->posts->toArray() as $post)
                                    <li>
                                        <a href="{{route('name.post', $post['id'])}}">{{$post['title']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </section>
        </div>
    </div>
@endsection
