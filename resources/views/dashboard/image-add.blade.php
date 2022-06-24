@extends('layout.dashboard')

@section('title')
    Add Images
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
                <form action="{{ route('images.store') }}" enctype="multipart/form-data" class="m-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="choosenProduct">Product:</label>
                        <select id="choosenProduct" class="form-control" name="productid">
                            <option value="" selected>Choose...</option>
                            @foreach ($dataInfo as $info)
                                <option value='{{ $info->id }}'>{{ $info->productname }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('productid')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="productPrice">Price:</label>
                        <input type="number" class="form-control" id="productPrice" name="price"
                            placeholder="Enter Price...">
                    </div>
                    @error('price')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="descriptionDetails">
                            Description:
                        </label>
                        <textarea name="description" id="descriptionDetails" class="form-control" cols="50" rows="6"
                            placeholder="Enter Description..."></textarea>
                    </div>
                    @error('description')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="multipleImages">Product Images:</label>
                        <input type="file" class="form-control" id="multipleImages" name="images[]"
                            placeholder="Select Images..." multiple />
                    </div>
                    @error('images')
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
