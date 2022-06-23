@extends('layout.dashboard')

@section('title')
    Update Product
@endsection

@section('content')
    <x-content-header heading="Product" r-name="product" title="Update" />

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('product.update') }}" class="m-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" value="{{ $dataInfo->productname }}" class="form-control" id="productName"
                            name="productname">
                        <input type="hidden" value="{{ $dataInfo->id }}" name="productid">
                    </div>
                    @error('productname')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="order">Order:</label>
                        <input type="number" value="{{ $dataInfo->order }}" class="form-control" id="order"
                            name="order">
                    </div>
                    @error('order')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="inputCategory">Category:</label>
                        <select id="inputCategory" class="form-control" name="categoryid">
                            @foreach ($selectItems as $info)
                                <option value='{{ $info->id }}' @if ($dataInfo->categoryid == $info->id) selected @endif>
                                    {{ $info->categoryname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
