@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-admin.content-header>
        Редактирование тега
    </x-admin.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-5">
                    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" placeholder="Название тега"
                                value="{{ $tag->title }}">
                            @error('title')
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