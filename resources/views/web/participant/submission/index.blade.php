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
        <h3 class="card-title">Submission ID-{{$submission->id}}</h3>

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
                @endisset
                @empty($submission->payment_file)
                <a href="#" data-role="create" data-type="payment" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Upload</a>
                @endempty
            </dd>
            <dt class="col-sm-2">Abstract</dt>
            <dd class="col-sm-10">
                @isset($submission->abstract)
                <a
                    href="{{route('download', $submission->abstract->file)}}">{{Str::afterLast($submission->abstract->file, '/')}}</a>
                <a href="#" data-role="edit" data-type="abstract" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> change</a>
                @endisset
                @empty($submission->abstract)
                <a href="#" data-role="create" data-type="abstract" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Upload</a>
                @endempty
            </dd>
            <dt class="col-sm-2">Full Paper</dt>
            <dd class="col-sm-10">
                @isset($submission->paper)
                <a
                    href="{{route('download', $submission->paper->file)}}">{{Str::afterLast($submission->paper->file, '/')}}</a>
                <a href="#" data-role="edit" data-type="paper" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> change</a>
                @endisset
                @empty($submission->paper)
                <a href="#" data-role="create" data-type="paper" data-id="{{$submission->id}}"
                    class="btn btn-primary btn-xs"><i class="fas fa-upload"></i> Upload</a>
                @endempty
            </dd>
        </dl>
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
                @isset($submission->abstract)
                <input type="hidden" name="id" value="{{$submission->abstract->id}}">
                @endisset
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
                @isset($submission->abstract)
                <input type="hidden" name="id" value="{{$submission->abstract->id}}">
                @endisset
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
    })
</script>
@endpush