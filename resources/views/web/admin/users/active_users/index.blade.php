@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="users-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Institution</th>
                    <th>Participation</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#users-table').DataTable({
        scrollX: true,
        // autoWidth: true,
        // scrollCollapse: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.active-users.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'user.email', name: 'user.email'},
            {data: 'phone', name: 'phone'},
            {data: 'institution', name: 'institution'},
            {data: 'participation', name: 'participation'},
            {data: 'country', name: 'country'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [1, 2, 3, 4, 5, 6, 7]
                },
                {
                    className: 'text-center', targets: [0, 5, 6, 7,]
                }
        ]
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(function () {
        $(document).on('click', 'a[data-role=delete-user]', function(event) {
            event.preventDefault();
            let id = $(this).data('id'),
                url = '{!! route("admin.active-users.destroy", ":id") !!}',
                csrf_token = $('meta[name="csrf-token"]').attr('content');

            url = url.replace(':id', id);
            
            swal.fire({
                title: "Delete User?",
                text: "Deleted user cannot be recovered.",
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
                            '_token': csrf_token
                        },
                        success: function (response) {
                            $('#users-table').DataTable().ajax.reload();
                            Swal.fire({
                                "title":"Delete User Successful!",
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
        });
    });
</script>
@endpush