@extends('layouts.main')

@section('page-title')
{{ $post->title }}
@endsection

@section('content')

<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{
            $post->created_at->translatedFormat('F d, Y
            • H:i'); }} • {{ $post->comments->count() }} комментария
        </p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ Storage::url($post->main_image) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <section class="mb-2">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
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
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if ($relatedPosts->count() != 0)
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost)
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ Storage::url($relatedPost->preview_image) }}" alt="related post"
                                class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <a href="{{ route('posts.show', $relatedPost->id) }}" class="blog-post-permalink">
                                <h5 class="post-title">{{ $relatedPost->title }}</h5>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
                @if ($comments->count() != 0)
                <section class="comment-list-section mb-5">
                    <h2 class="section-title mb-5" data-aos="fade-up">Комментарии</h2>
                    @foreach ($comments as $comment)
                    <div class="comment-text mb-2 pb-1 border-bottom" data-aos="fade-up">
                        <div class="username">
                            <span class="font-weight-bold">{{ $comment->user->name }}</span>
                            <span class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        {{ $comment->message }}
                    </div>
                    @endforeach
                </section>
                @endif
                @auth
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                    <form action="{{ route('posts.comments.store', $post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label class="sr-only">Комментарий</label>
                                <textarea name="message" class="form-control" placeholder="Напишите комментарий"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Отправить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
            </div>
        </div>
    </div>
</main>

@endsection