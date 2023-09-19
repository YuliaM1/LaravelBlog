@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <x-content-header>
        Главная
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item active">Главная</li>
        </x-slot>
    </x-content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $data['posts'] }}</h3>

                            <p>Посты</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-image"></i>
                        </div>
                        <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Подробнее <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $data['categories'] }}</h3>

                            <p>Категории</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="small-box-footer">Подробнее <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $data['tags'] }}</h3>

                            <p>Теги</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <a href="{{ route('admin.tags.index') }}" class="small-box-footer">Подробнее <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $data['users'] }}</h3>

                            <p>Пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="small-box-footer">Подробнее <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection