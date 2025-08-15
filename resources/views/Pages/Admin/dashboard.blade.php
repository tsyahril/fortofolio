@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Bisa ditambahkan judul atau lainnya di sini -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Info Box: Users -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-users"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number"></span>
                    </div>
                </div>
            </div>

            <!-- Fix for small devices -->
            <div class="clearfix hidden-md-up"></div>

            <!-- Info Box: List -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-list-alt"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number"></span>
                    </div>
                </div>
            </div>

            <!-- Fix for small devices -->
            <div class="clearfix hidden-md-up"></div>

            <!-- Info Box: Books -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-book"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number"></span>
                    </div>
                </div>
            </div>

            <!-- Info Box: Database -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-database"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
