@extends('dashboard.dash')

@section('title')
    Product Images
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header heading="Product Images" r-name="product" title="Images" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="row m-2">
                    <x-button r-name="images.create" btn-type="info" label="Add images & description" />
                </div>
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
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
                                <td>{{ $info->specification }}</td>
                                <td>{{ $info->description }}</td>
                                <td>
                                    @php
                                        $arr = explode('|', $info->multipleimages);
                                        foreach ($arr as $img) {
                                            $url = asset('storage/productimages/'.$img);
                                            echo "<img src='".$url."' height='50px' width='50px'>&nbsp;";
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $info->id]) }}"><i
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
