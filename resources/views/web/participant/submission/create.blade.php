@extends('web.participant.main')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h1>Create Submission</h1>
</div>
<form action="{{route('participant.submissions.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <x-forms.input id="presenter" name="presenter" placeholder="Enter Presenters Name" label="Presenter"
                value="{{Auth()->user()->participant->salutation}} {{Auth()->user()->participant->first_name}} {{Auth()->user()->participant->last_name}}" />
        </div>
        <div class=" col-md-6">
            <x-forms.input id="title" name="title" placeholder="Enter Title" label="Title" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-forms.select-topic id="topic_id" name="topic_id" placeholder="Enter Topic" label="Topic" />
        </div>
        <div class=" col-md-6">
            <x-forms.select-type-submission id="type" name="type" placeholder="Enter Type" label="Type" />
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{route('participant.submissions.index')}}" class="btn btn-default">Back</a>
        <button type=" submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
@push('styles')

@endpush