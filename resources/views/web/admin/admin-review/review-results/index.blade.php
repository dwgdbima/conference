@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="review-results-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>FP ID</th>
                    <th>SUBM ID</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Paper</th>
                    <th>Decision</th>
                    <th>Revised Paper</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $('#review-results-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.admin-review.review-results.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'submission_id', name: 'submission_id'},
            {data: 'submission.title', name: 'submission.title'},
            {data: 'submission.topic.name', name: 'submission.topic.name'},
            {data: 'file', name: 'file'},
            {data: 'first_decision', name: 'first_decision'},
            {data: 'file_first_revise', name: 'file_first_revise'},
            {data: 'file_first_revise_status', name: 'file_first_revise_status'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 2, 3, 4, 6]
                },
                {
                    className: 'text-center', targets: [0, 1, 4, 5 , 6, 7]
                }
        ]
    });
</script>
@endpush