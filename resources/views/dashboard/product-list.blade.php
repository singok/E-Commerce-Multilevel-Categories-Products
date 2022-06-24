@extends('dashboard.dash')

@section('title')
    Product
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product') }}">Product</a></li>
                        <li class="breadcrumb-item active">products</li>
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
                    <a href="{{ route('product.add') }}"><button type="button" class="btn btn-primary">Add product</button></a>
                </div>
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Slug</th>
                            <th scope="col">Category</th>
                            <th scope="col" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfo as $info)
                            <tr>
                                <th scope="row">{{ $info->order }}</th>
                                <td>{{ $info->productname }}</td>
                                <td>{{ $info->slug }}</td>
                                <td>{{ $info->category->categoryname }}</td>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $info->id]) }}"><i
                                            class="fa-solid fa-pen-to-square mr-2" style="color: black"></i></a>
                                    <a href="{{ route('product.remove', ['id' => $info->id]) }}"
                                        style="color: rgb(231, 180, 9)"><i class="fa-solid fa-trash ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
