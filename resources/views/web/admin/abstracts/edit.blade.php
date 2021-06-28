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
        <form action="{{route('admin.abstracts.update', $abstract->id)}}" method="post">
            @csrf
            @method('put')
            <dl class="row">
                <dt class="col-sm-3">Presenter</dt>
                <dd class="col-sm-9">{{$abstract->submission->presenter}}</dd>
                <dt class="col-sm-3">Title</dt>
                <dd class="col-sm-9">{{$abstract->submission->title}}</dd>
                <dt class="col-sm-3">Topic</dt>
                <dd class="col-sm-9">{{$abstract->submission->topic->name}}</dd>
                <dt class="col-sm-3">Abstract</dt>
                <dd class="col-sm-9">
                    <x-download-file-name path="{{$abstract->file}}" />
                <dt class="col-sm-3">Decision</dt>
                <dd class="col-sm-9">
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-undecide" name="decision" value="0"
                            {{$abstract->decision == '0' ? 'checked' : ''}}>
                        <label for="decision-undecide">
                            Undecide
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-accept" name="decision" value="1"
                            {{$abstract->decision == '1' ? 'checked' : ''}}>
                        <label for="decision-accept">
                            Accept
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-reject" name="decision" value="2"
                            {{$abstract->decision == '2' ? 'checked' : ''}}>
                        <label for="decision-reject">
                            Reject
                        </label>
                    </div>
                </dd>
                <dt class="col-sm-3">Decide Note</dt>
                <dd class="col-sm-9">
                    <x-forms.textarea id="note" name="note" placeholder="Review Note..." rows="5">
                        {{$abstract->note}}
                    </x-forms.textarea>
                </dd>
            </dl>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush