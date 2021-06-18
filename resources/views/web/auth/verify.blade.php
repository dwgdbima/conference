@extends('web.main')
@section('content')
<div class="lockscreen bg-transparent">
    <div class="lockscreen-wrapper mt-3">
        <div class="lockscreen-logo">
            <a href="{{ url('/') }}"><b>Verify your email</b></a>
        </div>
        <div class="help-block text-center mb-4">
            Before proceeding, please check your email for a verification link.
        </div>
        <!-- User name -->
        <div class="lockscreen-name">
            {{ Auth::user()->participant->salutation . ' ' . Str::title(Auth::user()->participant->first_name) }}</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{asset(Auth::user()->participant->photo)}}" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="input verification link">

                    <div class="input-group-append">
                        <button type="button" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center mt-5">
            If you did not receive the email
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request
                    another</button>.
            </form>
        </div>
    </div>
</div>
<!-- /.center -->
@endsection