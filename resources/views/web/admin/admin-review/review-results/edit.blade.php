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
            <dd class="col-sm-9"><a href="{{route('download', $paper->file)}}">{{Str::afterLast($paper->file, '/')}}</a>
            </dd>
        </dl>
        <hr />
        <h4 class="mb-4">Review Form</h4>
        <form action="{{route('admin.admin-review.review-results.update', $paper->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
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
                        {{$paper->note_admin}}
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