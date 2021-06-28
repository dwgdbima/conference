@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-header text-secondary font-weight-bold">
        <div class="row">
            <div class="col-auto">Owner :</div>
            <div class="col-auto border-right"><a
                    href="{{route('admin.active-users.show', $abstract->submission->participant_id)}}">USER-{{$abstract->submission->participant_id}}</a>
            </div>
            <div class="col-auto border-right"><a
                    href="{{route('admin.submissions.show', $abstract->submission->id)}}">SUBM-{{$abstract->submission->id}}</a>
            </div>
            <div class="col-auto">ABS-{{$abstract->id}}</div>
        </div>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Presenter</dt>
            <dd class="col-sm-9">{{$abstract->submission->presenter}}</dd>
            <dt class="col-sm-3">Title</dt>
            <dd class="col-sm-9">{{$abstract->submission->title}}</dd>
            <dt class="col-sm-3">Topic</dt>
            <dd class="col-sm-9">{{$abstract->submission->topic->name}}</dd>
            <dt class="col-sm-3">Abstract File</dt>
            <dd class="col-sm-9">
                <x-download-file-name path="{{$abstract->file}}" />
            </dd>
            <dt class="col-sm-3">Decision</dt>
            <dd class="col-sm-9">
                <x-decision decision="{{$abstract->decision}}" />
            </dd>
            <dt class="col-sm-3">Decide Note</dt>
            <dd class="col-sm-9">
                @if (is_null($abstract->note))
                <span class="text-secondary font-italic">No Note</span>
                @else
                {{$abstract->note}}
                @endif
            </dd>
        </dl>
    </div>
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush