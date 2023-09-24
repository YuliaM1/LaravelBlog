@extends('personal.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-content-header>
        Комментарии
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Профиль</a></li>
            <li class="breadcrumb-item active">Комментарии</li>
        </x-slot>
    </x-content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('personal.comments.update', $comment->id) }}" method="POST" class="w-50">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Текст комментария</label>
                            <textarea class="form-control w-100" name="message" cols="30"
                                rows="10">{{ $comment->message }}</textarea>
                            @error('message')
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