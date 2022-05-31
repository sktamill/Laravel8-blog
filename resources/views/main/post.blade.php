@extends('layouts.main')

@section('content')
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->format('M d, Y')}} | {{$date->format('H:i')}} | {{$post->comment->count()}} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'.$post->main_image)}}" alt="featured image" class="w-100">
            </section>

            <section class="text-right" style="margin-top: -35px;">
                @auth()
                    <form action="{{route('name.post-fav.store', $post->id)}}" method="post">
                        @csrf
                        <span>{{$post->favorites_users_count}}</span>
                        <button type="submit" class="border-0 bg-transparent">

                            @if(auth()->user()->favoritesPosts->contains($post->id))
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif

                        </button>
                    </form>
                @endauth
                @guest()
                    <div>
                        <span>{{$post->favorites_users_count}}</span>
                        <i class="far fa-heart"></i>
                    </div>
                @endguest
            </section>

            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count())
                    <section class="related-posts border-bottom">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $RelatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{asset('storage/'.$RelatedPost->main_image)}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$RelatedPost->category->title}}</p>
                                <a href="{{route('name.post', $RelatedPost->id)}}">
                                    <h5 class="post-title">{{$RelatedPost->title}}</h5>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    {{--@auth()--}}
                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5">Comments ({{$post->comment->count()}})</h2>
                        @foreach($post->comment as $comment)
                        <div class="comment-text mb-4 border-bottom">
                            <span class="username">
                                <div>{{$comment->user->name}}</div>
                                <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                            </span>
                            {!! $comment->message !!}
                        </div>
                        @endforeach
                    </section>
                    {{--@endauth--}}

                    <section class="comment-section">

                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Comment</h2>

                        <form action="{{route('name.post.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                @error('message')
                                    <div class="alert-danger w-50 mb-3">{{$message}}</div>
                                @enderror
                                    <textarea name="message" class="form-control" placeholder="Write a Comment" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Add Comment" class="btn btn-warning">
                                </div>
                            </div>
                        </form>

                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
