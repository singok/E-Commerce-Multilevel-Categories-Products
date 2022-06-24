@extends('layout.front')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ $pageTitle }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">products</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        @foreach ($products as $prod)
            <div class="card mx-1 my-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $prod->productname }}</h5>
                    <h6 class="card-title">Category : {{ $prod->category->categoryname }}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
