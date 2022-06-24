@extends('layout.dashboard')

@section('title')
    Update Category
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('category') }}">Category</a></li>
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
                <form action="{{ route('category.update') }}" class="m-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Category Name:</label>
                        <input type="text" value="{{ $dataInfo->categoryname }}" class="form-control" id="categoryName"
                            name="categoryname">
                        <input type="hidden" value="{{ $dataInfo->id }}" name="categoryid">
                    </div>
                    @error('categoryname')
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
                        <label for="inputCategory">Parent Category:</label>
                        <select id="inputCategory" class="form-control" name="parentid"
                            value="{{ $dataInfo->categoryname }}">
                            <option value="0" @if ($dataInfo->parentid == 0) selected @endif>Parent ID</option>
                            @foreach ($selectItems as $info)
                                <option value='{{ $info->id }}' @if ($dataInfo->parentid == $info->id) selected @endif>
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
