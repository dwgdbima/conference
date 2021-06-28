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
            <dt class="col-sm-3">Presentation Type</dt>
            <dd class="col-sm-9">{{$paper->submission->type}}</dd>
            <dt class="col-sm-3">Paper File</dt>
            <dd class="col-sm-9">
                <x-download-file-name path="{{$paper->file}}" />
            </dd>
        </dl>
        <hr />
        <h4>Admin Review Result</h4>
        <dl class="row">
            <dt class="col-sm-3">Recomendation</dt>
            <dd class="col-sm-9">
                <x-decision decision="{{$paper->first_decision}}" />
            </dd>
            <dt class="col-sm-3">Review Note</dt>
            <dd class="col-sm-9">
                @if (is_null($paper->note_admin))
                <span class="text-secondary font-italic">No Note</span>
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
                @if ($paper->file_first_revise_status == 1)
                <span class="badge badge-danger">new</span>
                @else
                <span class="badge badge-secondary">old</span>
                @endif
            </dd>
        </dl>
        <hr />
        <h4 class="mb-4">Review Form</h4>
        <form action="{{route('admin.admin-review.review-results.submit', $paper->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3"><label>Decision</label></div>
                <div class="col-md-9">
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-accept" name="first_decision" value="1"
                            {{$paper->first_decision == 1 ? 'checked' : ''}}>
                        <label for="decision-accept">
                            Accept
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-revise" name="first_decision" value="2"
                            {{$paper->first_decision == 2 ? 'checked' : ''}}>
                        <label for="decision-revise">
                            Revise
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-reject" name="first_decision" value="2"
                            {{$paper->first_decision == 3 ? 'checked' : ''}}>
                        <label for="decision-reject">
                            Reject
                        </label>
                    </div>
                </div>
                <div class="col-md-3"><label for="note_admin">Review Note</label></div>
                <div class="col-md-9">
                    <x-forms.textarea id="note_admin" name="note_admin" placeholder="Review Note. . ." rows="5">

                    </x-forms.textarea>
                </div>
                <div class="col-md-3"><label for="file_admin">Review File</label></div>
                <div class="col-md-9">
                    <x-forms.input-file id="file_admin" name="file_admin" placeholder="Choose File" />
                </div>
                <div class="col-md-12"><button type="submit" class="btn btn-primary float-right">Submit</button></div>
            </div>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush