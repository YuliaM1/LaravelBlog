@extends('personal.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-content-header>
        Понравившиеся посты
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Профиль</a></li>
            <li class="breadcrumb-item active">Понравившиеся посты</li>
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
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.posts.show', $post->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('personal.likes.delete', $post->id) }}" method="POST"
                                                class="ml-3">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="far fa-heart text-danger"></i>
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