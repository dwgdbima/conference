@extends('web.auth.main')

@section('box-msg', 'You forgot your password? Here you can easily retrieve a new password.')

@section('login', 'Forgot Password')

@section('content')
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"
            required autocomplete="email" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <span class="error invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection

@section('scripts')

@endsection