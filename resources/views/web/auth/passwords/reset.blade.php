@extends('web.auth.main')

@section('box-msg', 'You are only one step a way from your new password, recover your password now.')

@section('styles')

@endsection

@section('content')
<form action="{{ route('password.update') }}" method="POST">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <x-forms.input id="email" type="email" name="email" placeholder="Email" inputgroup="append"
        inputgroupicon="fas fa-envelope" :value="$email ?? old('email')" />

    <x-forms.input id="password" type="password" name="password" placeholder="Password" inputgroup="append"
        inputgroupicon="fas fa-lock" :value="old('password')" />

    <x-forms.input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm password"
        inputgroup="append" inputgroupicon="fas fa-lock" />
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection

@section('scripts')

@endsection