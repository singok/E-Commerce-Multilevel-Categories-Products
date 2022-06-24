@extends('dashboard.dash')

@section('title')
    Trash Bin
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Deleted Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('category') }}">Deleted Categories</a></li>
                        <li class="breadcrumb-item active">category-deleted</li>
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
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Parent ID</th>
                            <th scope="col" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfo as $info)
                            <tr>
                                <th scope="row">{{ $info->order }}</th>
                                <td>{{ $info->categoryname }}</td>
                                <td>{{ $info->parentid }}</td>
                                <td>
                                    <a href="{{ route('category.restinct', ['id' => $info->id ]) }}"><i class="fa-solid fa-trash-arrow-up" style="color:green"></i></a>
                                    <a href="{{ route('category.remove', ['id' => $info->id ]) }}" style="color: red"><i class="fa-solid fa-trash ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
