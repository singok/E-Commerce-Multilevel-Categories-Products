@extends('layout.dashboard')

@section('title')
    Update Images
@endsection

@section('content')
    <x-content-header heading="Product Images" r-name="images.index" title="Update" />

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
                            @foreach ($selectProductItems as $items)
                                <option value='{{ $items->id }}' @if ($items->id == $dataInfo->productid) selected @endif>
                                    {{ $items->productname }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('productid')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <x-input-box type="text" label="Specification:" id="specificationDetails" name="specification"
                        placeholder="Enter Specification..." value="{{ $dataInfo->specification }}" />
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
                            placeholder="Enter Description...">{{ $dataInfo->description }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-control mb-5">
                        <label>Image:</label>
                        @php
                            $arr = explode('|', $dataInfo->multipleimages);
                            foreach ($arr as $img) {
                                echo "<img src=".asset('storage/productimages/'.$img)." height='50px' width='50px'>&nbsp;";
                            }
                        @endphp
                    </div>
                    <x-input-box type="file" label="Product Images:" id="multipleImages" name="images[]"
                        placeholder="Select Images..." multiple />
                    @error('images')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
