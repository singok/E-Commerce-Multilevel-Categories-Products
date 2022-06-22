@extends('layout.dashboard')
@section('title')
Dashboard
@endsection

@section('content')
<!-- Content Header (Page header) -->
<x-content-header heading="Dashboard" r-name="admin.dashboard" title="dashboard" />
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <x-card bg-color="info" icon-name="bag" total="{{ $categoryCount }}" card-name="Categories" />
            <x-card bg-color="success" icon-name="stats-bars" total="500" card-name="Products" />
            <x-card bg-color="warning" icon-name="person-add" total="210" card-name="Sales" />
            <x-card bg-color="danger" icon-name="pie-graph" total="1500" card-name="Vendors" />
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection