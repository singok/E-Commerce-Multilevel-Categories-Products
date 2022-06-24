@extends('layout.dashboard')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Images</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product') }}">Product Images</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (Session::has('success'))
                    <div class="alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('product.store') }}" class="m-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" class="form-control" id="productName" name="productname"
                            placeholder="Enter Product Name..." />
                    </div>
                    @error('productname')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="order">Order:</label>
                        <input type="number" class="form-control" id="order" name="order"
                            placeholder="Enter Order..." />
                    </div>
                    @error('order')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="inputCategory">Category:</label>
                        <select id="inputCategory" class="form-control" name="categoryid">
                            <option value="" selected>Choose...</option>
                            @foreach ($dataInfo as $info)
                                <option value='{{ $info->id }}'>{{ $info->categoryname }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('categoryid')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
