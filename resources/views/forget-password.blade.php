@extends('layout.admin')

@section('title')
    Forget password
@endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Pasword</b>&nbsp;Forget</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="card-body login-card-body">
                <p class="login-box-msg">We will send you a reset link. Please, provide your email address.</p>

                <form action="{{ route('admin.resetlink') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <a href="{{ route('admin.login') }}" class="mt-2 text-center">Login</a>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
