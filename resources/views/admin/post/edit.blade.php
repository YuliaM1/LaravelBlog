@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-content-header>
        Редактирование поста
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Посты</a></li>
            <li class="breadcrumb-item active">{{ $post->title }}</li>
        </x-slot>
    </x-content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" placeholder="Название поста"
                                value="{{ $post->title }}">
                            @error('title')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label>Контент</label>
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            @error('content')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Превью поста</label>
                            <div>
                                <img src="{{ Storage::url($post->preview_image) }}" alt="preview_image"
                                    class="w-100 mb-2">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Главное изображение</label>
                            <div>
                                <img src="{{ Storage::url($post->main_image) }}" alt="main_image" class="w-100 mb-2">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Категория</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected'
                                    : '' }}>
                                    {{$category->title }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Теги</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple"
                                data-placeholder="Выберите теги" style="width: 100%;">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ is_array($post->tags->toArray()) &&
                                    in_array($tag->id,
                                    $post->tags->pluck('id')->toArray()) ? 'selected' :
                                    '' }}>{{
                                    $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection

@push('css-start')
<link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}">
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

<style>
    .custom-file-input:lang(en)~.custom-file-label::after {
        content: 'Выбрать';
    }
</style>
@endpush

@push('js')
<script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
        ]
    });
});
$(function () {
  bsCustomFileInput.init();
});
$('.select2').select2();
</script>
@endpush