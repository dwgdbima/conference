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
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.new-users.index')!!}",
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
        $(document).on('click', 'a[data-role=action-user]', function(event) {
            event.preventDefault();
            let id = $(this).data('id'),
                accept = '{!! route("admin.new-users.update", ":id") !!}',
                deny = '{!! route("admin.new-users.destroy", ":id") !!}',
                csrf_token = $('meta[name="csrf-token"]').attr('content');

            accept = accept.replace(':id', id);
            deny = deny.replace(':id', id);
            
            swal.fire({
                title: "Action",
                text: "Accept or Reject the User?",
                icon: "question",    
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Accept",
                denyButtonText: "Reject",
            }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: accept,
                            data: {
                                '_method': 'PUT',
                                '_token': '{{csrf_token()}}',
                            },
                            success: function (response) {
                                console.log(response)
                                $('#users-table').DataTable().ajax.reload();
                                Swal.fire({
                                    "title":"Accept User Successful!",
                                    "text":"","showConfirmButton":false,
                                    "icon":"success",
                                    "toast":true,
                                    "position":"top-end",
                                    "showCloseButton":true
                                });
                            },
                        });
                }else if(result.isDenied){
                    $.ajax({
                        type: "POST",
                        url: deny,
                        data: {
                            '_method': 'DELETE',
                            '_token': csrf_token
                        },
                        success: function (response) {
                            $('#users-table').DataTable().ajax.reload();
                            Swal.fire({
                                "title":"Reject User Successful!",
                                "text":"","showConfirmButton":false,
                                "icon":"success",
                                "toast":true,
                                "position":"top-end",
                                "showCloseButton":true
                            });
                        },
                    });
                }
            });
        });
    });
</script>
@endpush