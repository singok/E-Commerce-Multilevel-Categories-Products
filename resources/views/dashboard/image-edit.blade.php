@extends('layout.dashboard')

@section('title')
    Update Images
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
                        <li class="breadcrumb-item"><a href="{{ route('images.index') }}">Product Images</a></li>
                        <li class="breadcrumb-item active">Update</li>
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
                <form action="{{ route('images.update') }}" enctype="multipart/form-data" class="m-3" method="POST">
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
                    <div class="form-group">
                        <label for="Price">Price:</label>
                        <input type="text" class="form-control" id="Price" name="price"
                            placeholder="Enter Price..." value="{{ $dataInfo->price }}" />
                        <input type="hidden" name="imageId" value="{{ $imageid }}" />
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
                            placeholder="Enter Description...">{{ $dataInfo->description }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row mx-1">
                        <label>Image:</label>
                        <div class="section mx-2">
                            @php
                                $arr = explode('|', $dataInfo->multipleimages);
                                foreach ($arr as $img) {
                                    echo '<img src="'.asset('storage/productimages/'.$img).'" height="50px" width="50px">&nbsp;';
                                }
                            @endphp
                        </div>
                    </div>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
