@extends('dashboard.dash')

@section('title')
    Category
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="row m-2">
                    <a href="{{ route('category.add') }}"><button type="button" class="btn btn-primary">Add
                            Category</button></a>
                </div>
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Category Name</th>
                            <th scope="col" colspan="2" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfo as $info)
                            <tr>
                                <th scope="row">{{ $info->order }}</th>
                                <td>{{ $info->categoryname }}</td>
                                <td>edit</td>
                                <td>delete</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
