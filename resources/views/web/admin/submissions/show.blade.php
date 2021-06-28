@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-header text-secondary font-weight-bold">
        <div class="row">
            <div class="col-auto">Owner :</div>
            <div class="col-auto"><a
                    href="{{route('admin.active-users.show', $submission->participant_id)}}">USER-{{$submission->participant_id}}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-2">Presenter</dt>
            <dd class="col-sm-10">{{$submission->presenter}}</dd>
            <dt class="col-sm-2">Title</dt>
            <dd class="col-sm-10">{{$submission->title}}</dd>
            <dt class="col-sm-2">Topic</dt>
            <dd class="col-sm-10">{{$submission->topic->name}}</dd>
            <dt class="col-sm-2">Type</dt>
            <dd class="col-sm-10">{{$submission->type}}</dd>
            <dt class="col-sm-2">Payment</dt>
            <dd class="col-sm-10">
                <x-download-file-name path="{{$submission->payment_file}}" />
                @switch($submission->payment)
                @case(0)
                <span class="badge badge-warning">Pending</span>
                @break
                @case(1)
                <span class="badge badge-info">Paid</span>
                @break
                @case(2)
                <span class="badge badge-success">Accepted</span>
                @break
                @case(3)
                <span class="badge badge-danger">Rejected</span>
                @break
                @default
                <span class="badge badge-warning">Pending</span>
                @endswitch
            </dd>
        </dl>
        <hr />
        <h4>Abstract</h4>
        @isset($submission->abstract)
        <dl class="row">
            <dt class="col-sm-2">Abstract ID</dt>
            <dd class="col-sm-10">
                <a
                    href="{{route('admin.abstracts.show', $submission->abstract->id)}}">ABS-{{$submission->abstract->id}}</a>
            </dd>
            <dt class="col-sm-2">Abstract</dt>
            <dd class="col-sm-10">
                <x-download-file-name path="{{$submission->abstract->file}}" />
            </dd>
        </dl>
        @endisset
        @empty($submission->abstract)
        <h4 class="text-secondary font-italic">No Abstract</h4>
        @endempty
        <hr />
        <h4>Paper</h4>
        @isset($submission->paper)
        <dl class="row">
            <dt class="col-sm-2">Paper ID</dt>
            <dd class="col-sm-10">
                <a href="{{route('admin.papers.show', $submission->paper->id)}}">FP-{{$submission->paper->id}}</a>
            </dd>
            <dt class="col-sm-2">Paper</dt>
            <dd class="col-sm-10">
                <x-download-file-name path="{{$submission->paper->file}}" />
            </dd>
            <dt class="col-sm-2">Final Paper</dt>
            <dd class="col-sm-10">
                @isset($submission->paper->file_final)
                <x-download-file-name path="{{$submission->paper->file_final}}" />
                @endisset
                @empty($submission->paper->file_final)
                <span class="text-secondary font-italic">No File</span>
                @endempty
            </dd>
        </dl>
        @endisset
        @empty($submission->paper)
        <h4 class="text-secondary font-italic">No Paper</h4>
        @endempty
    </div>
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush