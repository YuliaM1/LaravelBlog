@extends('layouts.main')

@section('page-title')
Категории
@endsection

@section('content')

<main class="blog mb-5">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
        <section class="categories-section">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-3">
                    <div class="category-item card mb-3">
                        <a href="{{ route('categories.posts.index', $category->id) }}"
                            class="card-body bg-light text-dark">{{
                            $category->title }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</main>

@endsection