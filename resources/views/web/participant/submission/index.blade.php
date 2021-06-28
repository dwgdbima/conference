@extends('web.participant.main')
@section('content')
<div class="d-flex justify-content-between mb-1">
    <h1 class="m-0">Submission</h1>
    <a href="{{route('participant.submissions.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Add
        New
        Submission</a>
</div>
<hr>
@forelse ($submissions as $submission)
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Submission SUBM-{{$submission->id}}</h3>

        <div class="card-tools">
            <a type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </a>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="display: block;">
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
                @isset($submission->payment_file)
                <a
                    href="{{route('download', $submission->payment_file)}}">{{Str::afterLast($submission->payment_file, '/')}}</a>
                <a href="#" data-role="edit" data-type="payment" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> change</a>
                @if ($submission->payment == 1)
                <span class="badge badge-warning"><i class="fas fa-stopwatch"></i> process</span>
                @elseif($submission->payment == 2)
                <span class="badge badge-success"><i class="fas fa-checklist"></i> Accepted</span>
                @else
                <span class="badge badge-danger"><i class="fas fa-times"></i> Rejected</span>
                @endif

                @endisset
                @empty($submission->payment_file)
                <a href="#" data-role="create" data-type="payment" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Upload</a>
                @endempty
            </dd>
            @empty($submission->abstract)
            <dt class="col-sm-2">Abstract</dt>
            <dd class="col-sm-10">
                <a href="#" data-role="create" data-type="abstract" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Submit</a>
            </dd>
            @endempty
            @empty($submission->paper)
            <dt class="col-sm-2">Full Paper</dt>
            <dd class="col-sm-10">
                <a href="#" data-role="create" data-type="paper" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Upload</a>
            </dd>
            @endempty
        </dl>
        @isset($submission->abstract)
        <hr />
        <h4>Abstract</h4>
        <dl class="row">
            <dt class="col-sm-2">Abstract File</dt>
            <dd class="col-sm-10">
                <x-download-file-name path="{{$submission->abstract->file}}" />
                <a href="#" data-role="edit" data-type="abstract" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> Change</a>
            </dd>
            <dt class="col-sm-2">Decision</dt>
            <dd class="col-sm-10">
                <x-decision decision="{{$submission->abstract->decision}}" />
            </dd>
            <dt class="col-sm-2">Note</dt>
            <dd class="col-sm-10">
                @isset($submission->abstract->note)
                {{$submission->abstract->note}}
                @endisset
                @empty($submission->abstract->note)
                <span class="text-secondary font-italic">No Note</span>
                @endempty
            </dd>
        </dl>
        @endisset

        @isset($submission->paper)
        <hr />
        <h4>Full Paper</h4>
        <dl class="row">
            <dt class="col-sm-2">Full Paper File</dt>
            <dd class="col-sm-10">
                <x-download-file-name path="{{$submission->paper->file}}" />
                @if ($submission->paper->first_decision == 0)
                <a href="#" data-role="edit" data-type="paper" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> Change</a>
                @else
                <a href="#" class="btn btn-secondary btn-xs disabled" role="button" aria-disabled="true"><i
                        class="fas fa-lock"></i>
                    Change</a>
                @endif
            </dd>
            <dt class="col-sm-2">Admin Review</dt>
            <dd class="col-sm-10">
                <dl class="row">
                    <dt class="col-sm-2 text-secondary">Decision</dt>
                    <dd class="col-sm-10">
                        <x-decision decision="{{$submission->paper->first_decision}}" />
                    </dd>
                    <dt class="col-sm-2 text-secondary">Note</dt>
                    <dd class="col-sm-10">
                        @isset($submission->paper->note_admin)
                        {{$submission->paper->note_admin}}
                        @endisset
                        @empty($submission->paper->note_admin)
                        <span class="text-secondary font-italic">No Note</span>
                        @endempty
                    </dd>
                    <dt class="col-sm-2 text-secondary">Review File</dt>
                    <dd class="col-sm-10">
                        @isset($submission->paper->file_admin)
                        {{$submission->paper->file_admin}}
                        @endisset
                        @empty($submission->paper->file_admin)
                        <span class="text-secondary font-italic">No Note</span>
                        @endempty
                    </dd>
                    <dt class="col-sm-2 text-secondary">Revised Paper</dt>
                    <dd class="col-sm-10">
                        @empty($submission->paper->file_first_revise)
                        @if ($submission->paper->first_decision == 0)
                        <a href="#" class="btn btn-secondary btn-xs disabled" role="button" aria-disabled="true"><i
                                class="fas fa-lock"></i> Submit</a>
                        @else
                        <a href="#" data-role="create" data-type="file_first_revise" data-id="{{$submission->id}}"
                            class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Submit</a>
                        @endif
                        @endempty

                        @isset($submission->paper->file_first_revise)
                        <x-download-file-name path="{{$submission->paper->file_first_revise}}" />
                        @if ($submission->paper->file_first_revise_status == 0)
                        <a href="#" data-role="create" data-type="file_first_revise" data-id="{{$submission->id}}"
                            class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> Change</a>
                        @else
                        <a href="#" class="btn btn-secondary btn-xs disabled" role="button" aria-disabled="true"><i
                                class="fas fa-lock"></i>
                            Change</a>
                        @endif
                        @endisset
                    </dd>
                </dl>
            </dd>
            <dt class="col-sm-2">Reviewer Review</dt>
            <dd class="col-sm-10">
                @isset($submission->paper->reviewPaper)
                <dl class="row">
                    <dt class="col-sm-2 text-secondary">Reviewer</dt>
                    <dd class="col-sm-10">
                        {{$submission->paper->reviewPaper->reviewer->name}}
                    </dd>
                    <dt class="col-sm-2 text-secondary">Decision</dt>
                    <dd class="col-sm-10">
                        <x-decision decision="{{$submission->paper->recomendation}}" />
                    </dd>
                    <dt class="col-sm-2 text-secondary">Note</dt>
                    <dd class="col-sm-10">
                        @isset($submission->paper->note_reviewer)
                        {{$submission->paper->note_reviewer}}
                        @endisset
                        @empty($submission->paper->note_reviewer)
                        <span class="text-secondary font-italic">No Note</span>
                        @endempty
                    </dd>
                    <dt class="col-sm-2 text-secondary">Review File</dt>
                    <dd class="col-sm-10">
                        @isset($submission->paper->file_reviewer)
                        {{$submission->paper->file_reviewer}}
                        @endisset
                        @empty($submission->paper->file_reviewer)
                        <span class="text-secondary font-italic">No Note</span>
                        @endempty
                    </dd>
                    <dt class="col-sm-2 text-secondary">Revised Paper</dt>
                    <dd class="col-sm-10">
                        @empty($submission->paper->file_second_revise)
                        @if ($submission->paper->recomendation == 0)
                        <a href="#" class="btn btn-secondary btn-xs disabled" role="button" aria-disabled="true"><i
                                class="fas fa-lock"></i> Submit</a>
                        @else
                        <a href="#" data-role="create" data-type="file_second_revise" data-id="{{$submission->id}}"
                            class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Submit</a>
                        @endif
                        @endempty

                        @isset($submission->paper->file_second_revise)
                        <x-download-file-name path="{{$submission->paper->file_second_revise}}" />
                        @if ($submission->paper->file_second_revise_status == 0)
                        <a href="#" data-role="edit" data-type="file_second_revise" data-id="{{$submission->id}}"
                            class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> Change</a>
                        @else
                        <a href="#" class="btn btn-secondary btn-xs disabled" role="button" aria-disabled="true"><i
                                class="fas fa-lock"></i>
                            Change</a>
                        @endif
                        @endisset
                    </dd>
                </dl>
                @endisset
                @empty($submission->paper->reviewPaper)
                <h5>Don't have a reviewer yet</h5>
                @endempty
            </dd>
            <dt class="col-sm-2">Final Paper</dt>
            <dd class="col-sm-10">
                @if ($submission->paper->final_decision == 1)

                @isset($submission->paper->file_final)
                <x-download-file-name path="{{$submission->paper->file_final}}" />
                <a href="#" data-role="edit" data-type="file_final" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> Change</a>
                @endisset
                @empty($submission->paper->file_final)
                <a href="#" data-role="create" data-type="file_final" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Submit</a>
                @endempty

                @else
                <a href="#" class="btn btn-secondary btn-xs disabled" role="button" aria-disabled="true"><i
                        class="fas fa-lock"></i>
                    Submit</a>
                @endif
            </dd>
        </dl>
        @endisset
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <a href="{{route('participant.submissions.edit', $submission->id)}}" class="btn btn-primary mr-1"><i
                    class="fas fa-edit"></i> Edit</a>
            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
        </div>
    </div>
</div>
@empty
<h1 class="text-center text-secondary font-italic mt-5">THERES NO SUBMISSION YET</h1>
@endforelse

{{-- PAYMENT --}}
<div class="modal fade" id="modal-file-payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="input-file-payment-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input-file id="payment_file" name="payment_file" placeholder="Choose File" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- ABSTRACT --}}
<div class="modal fade" id="modal-file-abstract">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="input-file-abstract-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Abstract</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input-file id="abstract_file" name="abstract_file" placeholder="Choose File" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- PAPER --}}
<div class="modal fade" id="modal-file-paper">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="input-file-paper-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Paper</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input-file id="paper_file" name="paper_file" placeholder="Choose File" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- FIRST REVISE PAPER --}}
<div class="modal fade" id="modal-file-first-revise-paper">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="input-file-first-revise-paper-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Paper</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input-file id="paper_file_first_revise" name="paper_file" placeholder="Choose File" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- SECOND REVISE PAPER --}}
<div class="modal fade" id="modal-file-second-revise-paper">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="input-file-second-revise-paper-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Paper</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input-file id="paper_file_second_revise" name="paper_file" placeholder="Choose File" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- FINAL PAPER --}}
<div class="modal fade" id="modal-final-paper">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="input-final-paper-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Paper</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input-file id="final_paper" name="paper_file" placeholder="Choose File" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
    $(document).ready(function() {
        $(document).on('click', 'a[data-type="payment"]', function(event) {
            event.preventDefault();

            let id = $(this).data('id'),
                role = $(this).data('role'),
                url = '{{route("participant.submissions.payment", ":id")}}',
                title = '';

            url = url.replace(':id', id);

            role == 'create' ? title = 'Add Payment' : title = 'Update Payment';

            $('#input-file-payment-form').attr('action', url);
            $('#modal-file-payment .modal-title').html(title);
            $('#modal-file-payment').modal('show');

        })

        $(document).on('click', 'a[data-type="abstract"]', function(event) {
            event.preventDefault();

            let id = $(this).data('id'),
                role = $(this).data('role'),
                url = '{{route("participant.submissions.abstract", ":id")}}',
                title = '';
            
            url = url.replace(':id', id);
            
            role == 'create' ? title = 'Add Abstract' : title = 'Update Abstract';

            $('#input-file-abstract-form').attr('action', url);
            $('#modal-file-abstract .modal-title').html(title);
            $('#modal-file-abstract').modal('show');

        })

        $(document).on('click', 'a[data-type="paper"]', function(event) {
            event.preventDefault();

            let id = $(this).data('id'),
                role = $(this).data('role'),
                url = '{{route("participant.submissions.paper", ":id")}}',
                title = '';

            url = url.replace(':id', id);
            
            role == 'create' ? title = 'Add Paper' : title = 'Update Paper';

            $('#input-file-paper-form').attr('action', url);
            $('#modal-file-paper .modal-title').html(title);
            $('#modal-file-paper').modal('show');

        })
        
        $(document).on('click', 'a[data-type="file_first_revise"]', function(event) {
            event.preventDefault();

            let id = $(this).data('id'),
                role = $(this).data('role'),
                url = '{{route("participant.submissions.first-revise-paper", ":id")}}',
                title = '';

            url = url.replace(':id', id);
            
            role == 'create' ? title = 'Add Revise Paper' : title = 'Update Revise Paper';

            $('#input-file-first-revise-paper-form').attr('action', url);
            $('#modal-file-first-revise-paper .modal-title').html(title);
            $('#modal-file-first-revise-paper').modal('show');

        })

        $(document).on('click', 'a[data-type="file_second_revise"]', function(event) {
            event.preventDefault();

            let id = $(this).data('id'),
                role = $(this).data('role'),
                url = '{{route("participant.submissions.second-revise-paper", ":id")}}',
                title = '';

            url = url.replace(':id', id);
            
            role == 'create' ? title = 'Add Revise Paper' : title = 'Update Revise Paper';

            $('#input-file-second-revise-paper-form').attr('action', url);
            $('#modal-file-second-revise-paper .modal-title').html(title);
            $('#modal-file-second-revise-paper').modal('show');

        })
        
        $(document).on('click', 'a[data-type="file_final"]', function(event) {
            event.preventDefault();

            let id = $(this).data('id'),
                role = $(this).data('role'),
                url = '{{route("participant.submissions.final-paper", ":id")}}',
                title = '';

            url = url.replace(':id', id);
            
            role == 'create' ? title = 'Add Final Paper' : title = 'Update Final Paper';

            $('#input-final-paper-form').attr('action', url);
            $('#modal-final-paper .modal-title').html(title);
            $('#modal-final-paper').modal('show');

        })
    })
</script>
@endpush