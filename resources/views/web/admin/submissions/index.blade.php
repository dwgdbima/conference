@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="submissions-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Presenter</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Type</th>
                    <th>Payment</th>
                    <th>Abstract</th>
                    <th>Paper</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{{-- PAYMENT --}}
<div class="modal fade" id="modal-payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div>
                    <button type="button" data-role="action-payment" data-type="accept"
                        class="btn btn-success">Accept</button>
                    <button type="button" data-role="action-payment" data-type="decline"
                        class="btn btn-danger">Decline</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Submission</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
                <div></div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@push('scripts')
<script>
    $('#submissions-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.submissions.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'participant_id', name: 'participant_id'},
            {data: 'presenter', name: 'presenter'},
            {data: 'title', name: 'title'},
            {data: 'topic.name', name: 'topic.name'},
            {data: 'type', name: 'type'},
            {data: 'payment', name: 'payment'},
            {data: 'abstract.file', name: 'abstract.file'},
            {data: 'paper.file', name: 'paper.file'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 2, 3, 4, 5, 7, 8, 9]
                },
                {
                    className: 'text-center', targets: [0, 1, 6, 7, 8]
                }
        ]
    });

// PAYMENT ACTION
    $(document).on('click', 'a[data-role="payment"]', function(event) {
        event.preventDefault();

        let id = $(this).data('id'),
            url_show = '{{route("admin.submissions.show", ":id")}}',
            url_update = '{{route("admin.submissions.update", ":id")}}';

        url_show = url_show.replace(':id', id);
        url_update = url_update.replace(':id', id);

        $.ajax({
            url: url_show,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('sukses');
                let img = '{{route("show", ":path")}}',
                    html;
                
                if(response.submission.payment_file == null){
                    html = `<h1 class="text-center text-secondary">THERE IS NO FILE YET</h1>`
                }else{
                    img = img.replace(':path', response.submission.payment_file);
                    html = `<img src="${img}" class="img-fluid">`
                }

                $('#modal-payment .modal-body').html(html);
                $('#modal-payment').modal('show');
            }
        });

        $(document).on('click', 'button[data-role="action-payment"]', function(event) {
            let type = $(this).data('type');

            $('#modal-payment').modal('hide');

            swal.fire({
            title: type.charAt(0).toUpperCase() + type.slice(1) + " Submission?",
            text: "Are you sure to " + type + " the payment?",
            icon: "question",    
            showCancelButton: true,
            confirmButtonText: "Yes, " + type,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url_update,
                        type: 'POST',
                        data: {
                            '_method': 'PUT',
                            '_token': '{{csrf_token()}}',
                            'type': type,
                        },
                        success: function(response) {
                            $('#submissions-table').DataTable().ajax.reload();
                            $('#modal-payment').modal('hide');
                            Swal.fire({
                                "title":response.message,
                                "text":"","showConfirmButton":false,
                                "icon":"success",
                                "toast":true,
                                "position":"top-end",
                                "showCloseButton":true
                            });
                        }
                    })
                } else {
                    $('#modal-payment').modal('show');
                }
            })
        })
    });

// DELETE SUBMISSION
    $(document).on('click', 'a[data-role="delete-submission"]', function(event) {
        event.preventDefault();

        let id = $(this).data('id'),
            url = '{{route("admin.submissions.destroy", ":id")}}';
        url = url.replace(":id", id);

        swal.fire({
            title: "Delete Submission?",
            text: "Deleted submission cannot be recovered.",
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
                        $('#submissions-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Delete Submission Successful!",
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