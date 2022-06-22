@extends('layout.dashboard')

@section('title')
    Add Category
@endsection

@section('content')
    <x-content-header heading="Category" r-name="category" title="Add" />

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
                <form action="{{ route('category.insert') }}" class="m-3" method="POST">
                    @csrf
                    <x-input-box type="text" label="Category Name:" id="categoryName" name="categoryname"
                        placeholder="Enter Category Name..." />
                    @error('categoryname')
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
                        <label for="inputCategory">Parent Category:</label>
                        <select id="inputCategory" class="form-control" name="parentid">
                            <option selected value="0">Parent ID</option>
                            @foreach ($dataInfo as $info)
                                <option value='{{ $info->id }}'>{{ $info->categoryname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection