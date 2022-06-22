@extends('dashboard.dash')

@section('title')
    Trash Bin
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header heading="Deleted Categories" r-name="category" title="category-deleted" />
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
