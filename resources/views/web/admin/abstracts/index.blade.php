@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="abstracts-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SUBM ID</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Abstract</th>
                    <th>Decision</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $('#abstracts-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.abstracts.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'submission_id', name: 'submission_id'},
            {data: 'submission.title', name: 'submission.title'},
            {data: 'submission.topic.name', name: 'submission.topic.name'},
            {data: 'file', name: 'file'},
            {data: 'decision', name: 'decision'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 2, 3, 4, 5, 6]
                },
                {
                    className: 'text-center', targets: [0, 1, 4, 5, 6]
                }
        ]
    });

    $(document).on('click', 'a[data-role="delete-abstract"]', function(event) {
        let id = $(this).data('id'),
            url = '{{route("admin.abstracts.destroy", ":id")}}';
        url = url.replace(':id', id);

        swal.fire({
            title: "Delete abstract?",
            text: "Deleted abstract cannot be recovered.",
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
                        $('#abstracts-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Delete Abstract Successful!",
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