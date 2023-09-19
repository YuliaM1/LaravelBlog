@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-admin.content-header>
        Редактирование пользователя
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>
            <li class="breadcrumb-item active">{{ $user->name }}</li>
        </x-slot>
    </x-admin.content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-5">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" class="form-control" placeholder="Имя пользователя"
                                value="{{ $user->name }}">
                            @error('name')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{ $user->email }}">
                            @error('email')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Роль</label>
                            <select class="form-control" name="role">
                                @foreach ($roles as $key => $value)
                                <option value="{{ $key }}" {{ $key==$user->role ? 'selected' : '' }}>{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
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