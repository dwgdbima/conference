@extends('web.reviewer.main')
@section('content')
<h1 class="text-center">Welcome {{Str::title(Auth::user()->reviewer->name) }}</h1>

<ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
    @forelse ($review_papers as $review_paper)
    <li class="nav-item">
        <a class="nav-link @if($loop->first)active @endif" id="fp-{{$review_paper->paper_id}}-tab" data-toggle="pill"
            href="#fp-{{$review_paper->paper_id}}" role="tab" aria-controls="fp-{{$review_paper->paper_id}}"
            aria-selected="true">SUBM-{{$review_paper->paper->submission_id}}
            @if ($review_paper->paper->file_second_revise_status == 1)
            <span class="badge badge-danger">new</span>
            @endif</a>
    </li>
    @empty
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#" role="tab" aria-selected="false">Empty</a>
    </li>
    @endforelse
</ul>

<div class="tab-custom-content">
    <p class="lead mb-0">Review Full Paper</p>
</div>

<div class="tab-content" id="custom-content-above-tabContent">
    @forelse ($review_papers as $review_paper)
    <div class="tab-pane fade @if($loop->first)active show @endif " id="fp-{{$review_paper->paper_id}}" role="tabpanel"
        aria-labelledby="fp-{{$review_paper->paper_id}}-tab">
        <dl class="row">
            <dt class="col-sm-2">Presenter</dt>
            <dd class="col-sm-10">{{$review_paper->paper->submission->presenter}}</dd>
            <dt class="col-sm-2">Title</dt>
            <dd class="col-sm-10">{{$review_paper->paper->submission->title}}</dd>
            <dt class="col-sm-2">Topic</dt>
            <dd class="col-sm-10">{{$review_paper->paper->submission->topic->name}}</dd>
            <dt class="col-sm-2">Full Paper</dt>
            <dd class="col-sm-10">
                @isset($review_paper->paper->file_second_revise)
                <x-download-file-name path="{{$review_paper->paper->file_second_revise}}" />
                @endisset

                @empty($review_paper->paper->file_second_revise)
                @isset($review_paper->paper->file_first_revise)
                <x-download-file-name path="{{$review_paper->paper->file_first_revise}}" />
                @endisset
                @empty($review_paper->paper->file_first_revise)
                <x-download-file-name path="{{$review_paper->paper->file}}" />
                @endempty
                @endempty
                @if ($review_paper->paper->file_second_revise_status == 1)
                <span class="badge badge-danger">new</span>
                @endif
            </dd>
        </dl>
        @if ($review_paper->paper->recomendation >= 1)
        <p class="header-detail-content lead">Your Previous Review Result</p>
        <dl class="row">
            <dt class="col-sm-2">Decision</dt>
            <dd class="col-sm-10">
                <x-decision decision="{{$review_paper->paper->recomendation}}" />
            </dd>
            <dt class="col-sm-2">Review Note</dt>
            <dd class="col-sm-10">
                @isset($review_paper->paper->note_reviewer)
                {{$review_paper->paper->note_reviewer}}
                @endisset
                @empty($review_paper->paper->note_reviewer)
                <span class="text-secondary font-italic">No Note</span>
                @endempty
            </dd>
            <dt class="col-sm-2">Review File</dt>
            <dd class="col-sm-10">
                @isset($review_paper->paper->file_reviewer)
                <x-download-file-name path="{{$review_paper->paper->file_reviewer}}" />
                @endisset
                @empty($review_paper->paper->file_reviewer)
                <span class="text-secondary font-italic">No Note</span>
                @endempty
            </dd>
            <dt class="col-sm-auto">
                @if ($review_paper->paper->file_second_revise_status == 0)
                <a href="#" class="btn btn-primary btn-sm" data-role="edit-review"
                    data-id="{{$review_paper->paper->id}}"><i class="fas fa-edit"></i> Edit Review</a>
                @else
                <a href="#" class="btn btn-secondary btn-sm disabled" role="button" aria-disabled="true"><i
                        class="fas fa-lock"></i> Edit Review</a>
                @endif
            </dt>
        </dl>
        @endif
        <p class="header-detail-content lead">Review Form</p>
        @if ($review_paper->paper->file_second_revise_status == 1)
        <form action="{{route('reviewers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$review_paper->paper->id}}" name="id">
            <div class="row">
                <div class="col-md-2"><label>Decision</label></div>
                <div class="col-md-10">
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-undecide-{{$review_paper->paper->id}}" name="recomendation"
                            value="0" checked>
                        <label for="decision-undecide-{{$review_paper->paper->id}}">
                            Undecide
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-accept-{{$review_paper->paper->id}}" name="recomendation"
                            value="1">
                        <label for="decision-accept-{{$review_paper->paper->id}}">
                            Accept
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-revise-{{$review_paper->paper->id}}" name="recomendation"
                            value="2">
                        <label for="decision-revise-{{$review_paper->paper->id}}">
                            Revise
                        </label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" id="decision-reject-{{$review_paper->paper->id}}" name="recomendation"
                            value="3">
                        <label for="decision-reject-{{$review_paper->paper->id}}">
                            Reject
                        </label>
                    </div>
                </div>
                <div class="col-md-2"><label for="note_reviewer-{{$review_paper->paper->id}}">Review Note</label></div>
                <div class="col-md-10">
                    <x-forms.textarea id="note_reviewer-{{$review_paper->paper->id}}" name="note_reviewer"
                        placeholder="Review Note. . ." rows="5">

                    </x-forms.textarea>
                </div>
                <div class="col-md-2"><label for="file_reviewer-{{$review_paper->paper->id}}">Review File</label></div>
                <div class="col-md-10">
                    <x-forms.input-file id="file_reviewer-{{$review_paper->paper->id}}" name="file_reviewer"
                        placeholder="Choose File" />
                </div>
                <div class="col-md-12"><button type="submit" class="btn btn-primary float-right">Submit</button></div>
            </div>
        </form>
        @else
        <h4 class="text-secondary font-italic ml-4">You have revised this paper.<br>Wait for the new revision of this
            paper.
        </h4>
        @endif
    </div>
    @empty
    <div class="tab-pane fade active show" role="tabpanel">
        <h1>Empty</h1>
    </div>
    @endforelse
</div>

<div class="modal fade" id="modal-edit-review">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="edit-review-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3"><label for="">Decision</label></div>
                        <div class="col-md-9">
                            <div class="icheck-primary d-inline mr-3">
                                <input type="radio" id="edit-decision-undecide" name="recomendation" value="0" checked>
                                <label for="edit-decision-undecide">
                                    Undecide
                                </label>
                            </div>
                            <div class="icheck-primary d-inline mr-3">
                                <input type="radio" id="edit-decision-accept" name="recomendation" value="1">
                                <label for="edit-decision-accept">
                                    Accept
                                </label>
                            </div>
                            <div class="icheck-primary d-inline mr-3">
                                <input type="radio" id="edit-decision-revise" name="recomendation" value="2">
                                <label for="edit-decision-revise">
                                    Revise
                                </label>
                            </div>
                            <div class="icheck-primary d-inline mr-3">
                                <input type="radio" id="edit-decision-reject" name="recomendation" value="3">
                                <label for="edit-decision-reject">
                                    Reject
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3"><label for="edit_note_reviewer">Review Note</label></div>
                        <div class="col-md-9">
                            <x-forms.textarea id="edit_note_reviewer" name="note_reviewer"
                                placeholder="Review Note. . ." rows="5">
                            </x-forms.textarea>
                        </div>
                        <div class="col-md-3"><label for="edit_file_reviewer">Review File</label></div>
                        <div class="col-md-9">
                            <x-forms.input-file id="edit_file_reviewer" name="file_reviewer"
                                placeholder="Choose File" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@push('scripts')
<script>
    $(document).on('click', 'a[data-role="edit-review"]', function(event) {
        event.preventDefault();
        let id = $(this).data('id'),
            url_put = '{{route("reviewers.update", ":id")}}',
            url_get = '{{route("reviewers.show", ":id")}}';
        url_put = url_put.replace(':id', id);
        url_get = url_get.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url_get,
            success: function(response) {
                console.log(response)
                $('input[name="recomendation"][value='+response.paper.recomendation+']').prop('checked', true);
                $('#edit_note_reviewer').val(response.paper.note_reviewer);
                $('#edit-review-form').attr('action', url_put);
                $('#modal-edit-review').modal('show');
            }
        })
        
    })
</script>
@endpush