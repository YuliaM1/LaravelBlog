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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection