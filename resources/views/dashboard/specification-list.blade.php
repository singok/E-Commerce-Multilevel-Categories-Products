@extends('dashboard.dash')

@section('title')
    Specification
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-content-header heading="Specification - {{ $productname }}" r-name="images.index" title="list" />
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
                <div class="row m-2">
                    <form action="{{ route('specification.add') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Enter Title..." name="title">
                                <input type="hidden" value="{{ $productid }}" name="productid">
                                @error('title')
                                    <div class="alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" placeholder="Enter Description..."
                                    name="description">
                                @error('description')
                                    <div class="alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-auto">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table m-2">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col" align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfo as $info)
                            <tr>
                                <td>{{ $info->title }}</td>
                                <td>{{ $info->description }}</td>
                                <td>
                                    <a id="updateSpecification"
                                        href="{{ route('specification.edit', ['id' => $info->id]) }}"><i
                                            class="fa-solid fa-pen-to-square mr-2" style="color: black"></i></a>
                                    <a href="{{ route('specification.delete', ['id' => $info->id]) }}"
                                        style="color: red"><i class="fa-solid fa-trash ml-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @push('script')
        <script>
            $(document).ready(function() {
                $('#updateSpecification').on('click', function() {
                    var path = $(this).attr('href');
                    $.ajax({
                        _token: '{{ csrf_token() }}',
                        url: path,
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
