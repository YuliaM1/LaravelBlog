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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="w-25">ID</th>
                                        <th>Название</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->message }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('posts.show', $comment->post->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('personal.comments.edit', $comment->id) }}" class="ml-3">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="{{ route('personal.comments.delete', $comment->id) }}"
                                                method="POST" class="ml-3">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection