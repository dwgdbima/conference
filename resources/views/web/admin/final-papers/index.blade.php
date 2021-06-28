@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="papers-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SUBM ID</th>
                    <th>USER ID</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Final Paper</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $('#papers-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.final-papers.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'submission_id', name: 'submission_id'},
            {data: 'submission.participant_id', name: 'submission.participant_id'},
            {data: 'submission.title', name: 'submission.title'},
            {data: 'submission.topic.name', name: 'submission.topic.name'},
            {data: 'file_final', name: 'file_final'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 3, 4, 5, 6]
                },
                {
                    className: 'text-center', targets: [0, 1, 2, 6]
                }
        ]
    });
</script>
@endpush