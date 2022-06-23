@extends('layout.dashboard')

@section('title')
    Add Images
@endsection

@section('content')
    <x-content-header heading="Product Images" r-name="product" title="Add" />

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
                    <x-input-box type="text" label="Specification:" id="specificationDetails" name="specification"
                        placeholder="Enter Specification..." />
                    @error('specification')
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
                    <x-input-box type="file" label="Product Images:" id="multipleImages" name="images[]"
                        placeholder="Select Images..." multiple/>
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
