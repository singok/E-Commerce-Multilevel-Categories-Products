@extends('dashboard.dash')

@section('title')
    Product Images
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Images</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product') }}">Product Images</a></li>
                        <li class="breadcrumb-item active">Images</li>
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
                    <a href="{{ route('images.create') }}"><button type="button" class="btn btn-info">Add images & description</button></a>
                </div>
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Specification</th>
                            <th scope="col">Description</th>
                            <th scope="col">Images</th>
                            <th scope="col" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfo as $info)
                            <tr>
                                <td>{{ $info->product->productname }}</td>
                                <td>{{ $info->price }}</td>
                                <td><a
                                        href="{{ route('specification.index', ['productname' => $info->product->productname, 'id' => $info->product->id]) }}"><i
                                            class="fa-solid fa-marker" style="color: black"></i></a></td>
                                <td>{{ $info->description }}</td>
                                <td>
                                    @php
                                        $arr = explode('|', $info->multipleimages);
                                        foreach ($arr as $img) {
                                            $url = asset('storage/productimages/' . $img);
                                            echo '<img src="'.$url.'" height="50px" width="50px">&nbsp;';
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <a href="{{ route('productimage.edit', ['id' => $info->id]) }}"><i
                                            class="fa-solid fa-pen-to-square mr-2" style="color: black"></i></a>
                                    <a href="{{ route('productimage.remove', ['id' => $info->id]) }}"
                                        style="color: red"><i class="fa-solid fa-trash ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
