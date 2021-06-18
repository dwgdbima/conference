@extends('web.participant.main')
@section('content')
<h1 class="text-secondary mt-4">Verify Your Email Address</h1>
<h4>Before proceeding, please check your email for a verification link.</h4>
<h4>If you did not receive the email</h4>
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit"
        class="btn btn-link p-0 m-0 mb-4 align-baseline">{{ __('click here to request another') }}</button>.
</form>
@endsection