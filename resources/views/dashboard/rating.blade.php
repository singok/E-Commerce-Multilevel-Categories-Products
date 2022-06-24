@extends('dashboard.dash')

@section('title')
    Ratings
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product - {{ $productname }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ratings</a></li>
                        <li class="breadcrumb-item active">list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Review (Out of 5)</th>
                            <th scope="col">Comment</th>
                            <th scope="col" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfo as $info)
                            <tr>
                                <td>{{ $info->username }}</td>
                                <td>{{ $info->review }}</td>
                                <td>{{ $info->comment }}</td>
                                <td>
                                    <a href="{{ route('rating.delete', ['id' => $info->id]) }}"
                                        style="color: red"><i class="fa-solid fa-trash ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
