@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-admin.content-header>
        Добавление тега
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Теги</a></li>
            <li class="breadcrumb-item active">Добавление тега</li>
        </x-slot>
    </x-admin.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-5">
                    <form action="{{ route('admin.tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" placeholder="Название тега"
                                value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection