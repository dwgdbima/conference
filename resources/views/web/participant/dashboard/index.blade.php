@extends('web.participant.main')
@section('content')
<h1>Welcome {{ Auth::user()->participant->salutation . ' ' . Str::title(Auth::user()->participant->first_name) }}</h1>
@endsection