@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-header text-secondary font-weight-bold">
        <div class="row">
            <div class="col-auto">Owner :</div>
            <div class="col-auto border-right"><a
                    href="{{route('admin.active-users.show', $paper->submission->participant_id)}}">USER-{{$paper->submission->participant_id}}</a>
            </div>
            <div class="col-auto border-right"><a
                    href="{{route('admin.submissions.show', $paper->submission->id)}}">SUBM-{{$paper->submission->id}}</a>
            </div>
            <div class="col-auto">FP-{{$paper->id}}</div>
        </div>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Presenter</dt>
            <dd class="col-sm-9">{{$paper->submission->presenter}}</dd>
            <dt class="col-sm-3">Title</dt>
            <dd class="col-sm-9">{{$paper->submission->title}}</dd>
            <dt class="col-sm-3">Topic</dt>
            <dd class="col-sm-9">{{$paper->submission->topic->name}}</dd>
            <dt class="col-sm-3">Paper File</dt>
            <dd class="col-sm-9">
                @if (is_null($paper->file_first_revise))
                <x-download-file-name path="{{$paper->file}}" />
                @else
                <x-download-file-name path="{{$paper->file_first_revise}}" />
                @endif
            </dd>
        </dl>
        <hr />
        <h4>Admin Review</h4>
        <dl class="row">
            <dt class="col-sm-3">Recomendation</dt>
            <dd class="col-sm-9">
                <x-decision decision="{{$paper->first_decision}}" />
            </dd>
            <dt class="col-sm-3">Review Note</dt>
            <dd class="col-sm-9">
                @if (is_null($paper->note_admin))
                <span class="text-secondary font-italic">No File</span>
                @else
                {{$paper->note_admin}}
                @endif
            </dd>
            <dt class="col-sm-3">Review File</dt>
            <dd class="col-sm-9">
                <x-download-file-name path="{{$paper->file_admin}}" />
            </dd>
            <dt class="col-sm-3">Revised Paper File</dt>
            <dd class="col-sm-9">
                <x-download-file-name path="{{$paper->file_first_revise}}" />
            </dd>
        </dl>
        <hr />
        <h4>Reviewer Review</h4>
        @isset($paper->reviewPaper->reviewer)
        <dl class="row">
            <dt class="col-sm-3">Reviewer</dt>
            <dd class="col-sm-9">
                {{$paper->reviewPaper->reviewer->name}}
            </dd>
            <dt class="col-sm-3">Recomendation</dt>
            <dd class="col-sm-9">
                <x-decision decision="{{$paper->recomendation}}" />
            </dd>
            <dt class="col-sm-3">Review Note</dt>
            <dd class="col-sm-9">
                @if (is_null($paper->note_reviewer))
                <span class="text-secondary font-italic">No File</span>
                @else
                {{$paper->note_reviewer}}
                @endif
            </dd>
            <dt class="col-sm-3">Review File</dt>
            <dd class="col-sm-9">
                <x-download-file-name path="{{$paper->file_reviewer}}" />
            </dd>
            <dt class="col-sm-3">Revised Paper File</dt>
            <dd class="col-sm-9">
                <x-download-file-name path="{{$paper->file_second_revise}}" />
            </dd>
        </dl>
        @endisset
        @empty($paper->reviewPaper->reviewer)
        <h1 class="text-secondary font-italic">Don't have a reviewer yet</h1>
        @endempty
    </div>
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush