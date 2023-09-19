@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-admin.content-header>
        {{ $tag->title }}
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Теги</a></li>
            <li class="breadcrumb-item active">{{ $tag->title }}</li>
        </x-slot>
    </x-admin.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12 mb-3 d-flex">
                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-primary">Редактировать</a>
                    <form action="{{ route('admin.tags.delete', $tag->id) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <th class="w-25">ID</th>
                                        <td>{{ $tag->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Название</th>
                                        <td>{{ $tag->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@endsection