@extends('layout.dashboard')

@section('title')
    Edit Specification
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Specification</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('images.index') }}">Product Details</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
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
            <div class="row">
                <form action="{{ route('specification.update') }}" class="m-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="specificationTitle">Title:</label>
                        <input type="text" class="form-control" id="specificationTitle" name="title" value="{{ $dataInfo->title }}">
                        <input type="hidden" name="specificationId" value="{{ $specId }}"/>
                    </div>
                    @error('title')
                        <div class="alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="specificationDescription">Description:</label>
                        <input type="text" class="form-control" id="specificationDescription" name="description" value="{{ $dataInfo->description }}">
                    </div>
                    @error('description')
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
