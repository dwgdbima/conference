@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <b>Add Reviewer</b>
    </div>
    <div class="card-body">
        <form action="{{route('admin.reviewers.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <x-forms.input id="name" name="name" label="Full Name" placeholder="Full Name" />
                </div>
                <div class="col-md-5">
                    <x-forms.input id="email" name="email" label="Email" placeholder="Email" />
                </div>
                <div class="cold-md-2">
                    <div class="form-group">
                        <label for=""></label>
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <b>List Reviewers</b>
    </div>
    <div class="card-body">
        <table id="reviewers-table" class="table display nowrap row-border table-hover" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{{-- Edit Reviewer --}}
<div class="modal fade" id="modal-edit-reviewer">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="edit-reviewer-form" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Reviewer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-forms.input id="edit-name" name="name" label="Full Name" placeholder="Full Name" />
                    <x-forms.input id="edit-email" label="Email" placeholder="Email" disabled />
                    <x-forms.input id="edit-password" name="password" label="Password" placeholder="Password" />
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
    $('#reviewers-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.reviewers.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'user.email', name: 'user.email'},
            {data: 'password', name: 'password'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [1, 2, 3, 4]
                },
                {
                    className: 'text-center', targets: [0, 3, 4]
                }
        ]
    });

    $(document).on('click', 'a[data-role="edit-reviewer"]', function(event) {
        event.preventDefault();

        let id = $(this).data('id'),
            url_edit = '{{route("admin.reviewers.edit", ":id")}}',
            url_update = '{{route("admin.reviewers.update", ":id")}}';
            url_edit = url_edit.replace(':id', id);
            url_update = url_update.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url_edit,
            success: function(response) {
                console.log(response.reviewer.name);
                $('#edit-reviewer-form').attr('action', url_update);
                $('#edit-name').val(response.reviewer.name);
                $('#edit-email').val(response.reviewer.user.email);
                $('#edit-password').val(response.reviewer.password);
                $('#modal-edit-reviewer').modal('show');
            }
        })
    })

    $(document).on('click', 'a[data-role="delete-reviewer"]', function(event) {
        event.preventDefault();
    
        let id = $(this).data('id'),
            url = '{{route("admin.reviewers.destroy", ":id")}}';
            url = url.replace(':id', id);

        swal.fire({
            title: "Delete reviewer?",
            text: "Deleted reviewer cannot be recovered.",
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
                        $('#reviewers-table').DataTable().ajax.reload();
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
    });
</script>
@endpush