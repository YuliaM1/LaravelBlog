@extends('layouts.main')

@section('page-title')
Блог
@endsection

@section('content')

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="blog-post-category">{{ $post->category->title }}</p>
                        @auth
                        <form action="{{ route('posts.likes.store', $post->id) }}" method="POST">
                            @csrf
                            <span>{{ $post->liked_users_count }}</span>
                            <button type="submit" class="bg-transparent border-0">
                                @if (auth()->user()->likedPosts->contains($post))
                                <i class="fas fa-heart"></i>
                                @else
                                <i class="far fa-heart"></i>
                                @endif
                            </button>
                        </form>
                        @endauth
                        @guest
                        <div>
                            <span>{{ $post->liked_users_count }}</span>
                            <i class="far fa-heart ml-1"></i>
                        </div>
                        @endguest
                    </div>
                    <a href="{{ route('posts.show', $post->id) }}" class="blog-post-permalink">
                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row" data-aos="fade-up">
                <div class="mx-auto" style="margin-top: -100px;">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach ($randomPosts as $post)
                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth
                                <form action="{{ route('posts.likes.store', $post->id) }}" method="POST">
                                    @csrf
                                    <span>{{ $post->liked_users_count }}</span>
                                    <button type="submit" class="bg-transparent border-0">
                                        @if (auth()->user()->likedPosts->contains($post))
                                        <i class="fas fa-heart"></i>
                                        @else
                                        <i class="far fa-heart"></i>
                                        @endif
                                    </button>
                                </form>
                                @endauth
                                @guest
                                <div>
                                    <span>{{ $post->liked_users_count }}</span>
                                    <i class="far fa-heart ml-1"></i>
                                </div>
                                @endguest
                            </div>
                            <a href="{{ route('posts.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}
                                </h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Популярные посты</h5>
                    <ul class="post-list">
                        @foreach ($popularPosts as $post)
                        <li class="post">
                            <a href="{{ route('posts.show', $post->id) }}" class="post-permalink media">
                                <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">{{ $post->title }}
                                    </h6>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Categories</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('categories.posts.index', $category->id) }}"
                                class="text-dark font-weight-bold">
                                {{ $category->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection