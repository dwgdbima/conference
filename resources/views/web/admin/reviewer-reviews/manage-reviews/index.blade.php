@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="unreviews-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>FP ID</th>
                    <th>SUBM ID</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Paper</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{{-- MANAGE REVIEW --}}
<div class="modal fade" id="modal-manage-review">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.reviewer-reviews.manage-reviews.store')}}" id="manage-review-form"
                method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Submit Reviewer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="paper_id" name="paper_id">
                    <x-forms.select2 id="reviewer_id" name="reviewer_id" placeholder="Select Reviewer">
                        <option value=""></option>
                        @foreach ($reviewers as $reviewer)
                        <x-forms.option value="{{$reviewer->id}}">{{$reviewer->name}}</x-forms.option>
                        @endforeach
                    </x-forms.select2>
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
    $('#unreviews-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.reviewer-reviews.manage-reviews.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'submission_id', name: 'submission_id'},
            {data: 'submission.title', name: 'submission.title'},
            {data: 'submission.topic.name', name: 'submission.topic.name'},
            {data: 'file', name: 'file'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 2, 3, 4, 5]
                },
                {
                    className: 'text-center', targets: [0, 1, 4, 5]
                }
        ]
    });

    $(document).on('click', 'a[data-role="manage-review"]', function(event) {
        event.preventDefault();

        let id = $(this).data('id');

        $('#paper_id').val(id);
        $('#modal-manage-review').modal('show');
    })
</script>
@endpush