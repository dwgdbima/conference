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
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Paper</th>
                    <th>Admin Decision</th>
                    <th>Admin Revise</th>
                    <th>Reviewer Recomendation</th>
                    <th>Reviewer Revise</th>
                    <th>Final Decision</th>
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
        ajax: "{!!route('admin.papers.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'submission_id', name: 'submission_id'},
            {data: 'submission.title', name: 'submission.title'},
            {data: 'submission.topic.name', name: 'submission.topic.name'},
            {data: 'file', name: 'file'},
            {data: 'first_decision', name: 'first_decision'},
            {data: 'file_first_revise', name: 'file_first_revise'},
            {data: 'recomendation', name: 'recomendation'},
            {data: 'file_second_revise', name: 'file_second_revise'},
            {data: 'final_decision', name: 'final_decision'},
            {data: 'file_final', name: 'file_final'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 2, 3, 4, 6, 8, 10, 11]
                },
                {
                    className: 'text-center', targets: [0, 1, 4, 5, 6, 7, 8, 9, 10, 11]
                }
        ]
    });

    $(document).on('click', 'a[data-role="delete-paper"]', function(event) {
        event.preventDefault();
        let id = $(this).data('id'),
            url = '{{route("admin.papers.destroy", ":id")}}';
        url = url.replace(':id', id);

        swal.fire({
            title: "Delete paper?",
            text: "Deleted paper cannot be recovered.",
            icon: "warning",    
            showCancelButton: true,
            confirmButtonText: "Yes, Delete!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        '_method': 'DELETE',
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
                        $('#papers-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Delete Paper Successful!",
                            "text":"","showConfirmButton":false,
                            "icon":"success",
                            "toast":true,
                            "position":"top-end",
                            "showCloseButton":true
                        });
                    },
                })
            }
        });
    })
</script>
@endpush