@extends('layout.dashboard')

@section('title')
    Add Product
@endsection

@section('content')
    <x-content-header heading="Product" r-name="product" title="Add" />

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
                <form action="{{ route('product.store') }}" class="m-3" method="POST">
                    @csrf
                    <x-input-box type="text" label="Product Name:" id="productName" name="productname"
                        placeholder="Enter Product Name..." />
                    @error('productname')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <x-input-box type="number" label="Order:" id="order" name="order" placeholder="Enter Order..." />
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
