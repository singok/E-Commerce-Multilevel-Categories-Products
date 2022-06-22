@extends('dashboard.dash')

@section('title')
    Category
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header heading="Category" r-name="category" title="category" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="row m-2">
                    <x-button r-name="category.add" btn-type="primary" label="Add Category" /> 
                </div>
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
                                    <a href="{{ route('category.edit', ['id' => $info->id ]) }}"><i class="fa-solid fa-pen-to-square mr-2" style="color: black"></i></a>
                                    <a href="{{ route('category.delete', ['id' => $info->id ]) }}" style="color: rgb(231, 180, 9)"><i class="fa-solid fa-trash ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection