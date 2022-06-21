@extends('layout.admin')
@section('title')
    Update
@endsection

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Password</b>&nbsp;Update</a>
        </div>

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
            <div class="card-body register-card-body">
                <h5 class="login-box-msg">{{ $email }}</h5>

                <form action="{{ route('admin.updatePassword', ['email' => $email, 'token' => $token]) }}" method="get">
                    @csrf    
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('password')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">                       
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('confirm')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
