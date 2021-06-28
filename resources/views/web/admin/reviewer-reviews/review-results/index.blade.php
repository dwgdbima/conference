@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="review-results-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>PAP ID</th>
                    <th>SUBM ID</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Reviewer</th>
                    <th>Paper</th>
                    <th>Recomendation</th>
                    <th>Revised Paper</th>
                    <th>Final Decision</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{{-- EDIT REVIEWER --}}
<div class="modal fade" id="modal-edit-reviewer">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="edit-reviewer" method="post">
                @csrf
                @method('put')
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
    $('#review-results-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{!!route('admin.reviewer-reviews.review-results.index')!!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'submission_id', name: 'submission_id'},
            {data: 'submission.title', name: 'submission.title'},
            {data: 'submission.topic.name', name: 'submission.topic.name'},
            {data: 'review_paper.reviewer.name', name: 'review_paper.reviewer.name'},
            {data: 'file', name: 'file'},
            {data: 'recomendation', name: 'recomendation'},
            {data: 'file_second_revise', name: 'file_second_revise'},
            {data: 'final_decision', name: 'final_decision'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
                {
                    orderable: false, targets: [ 2, 3, 4, 5, 7, 9]
                },
                {
                    className: 'text-center', targets: [0, 1, 5 , 6, 7, 8, 9]
                }
        ]
    });

    $(document).on('click', 'a[data-role="decision"]', function(event) {
        event.preventDefault();

        let id = $(this).data('id');

        swal.fire({
            title: "Final Decision",
            text: "Accept or Reject the Paper?",
            icon: "question",    
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Accept",
            denyButtonText: "Reject",
        }).then((result) => {
            if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: '{{route("admin.reviewer-reviews.review-results.store")}}',
                        data: {
                            '_method': 'POST',
                            '_token': '{{csrf_token()}}',
                            'id': id,
                            'final_decision': 1,
                        },
                        success: function (response) {
                            console.log(response)
                            $('#review-results-table').DataTable().ajax.reload();
                            Swal.fire({
                                "title":"Final Decision Accepted!",
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
                    url: '{{route("admin.reviewer-reviews.review-results.store")}}',
                    data: {
                        '_method': 'POST',
                        '_token': '{{csrf_token()}}',
                        'id': id,
                        'final_decision': 3,
                    },
                    success: function (response) {
                        $('#review-results-table').DataTable().ajax.reload();
                        Swal.fire({
                            "title":"Final Decision Rejected!",
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
    })

    $(document).on('click', 'a[data-role="edit"]', function(event) {
        event.preventDefault();
        let id = $(this).data('id'),
            reviewer_id = $(this).data('reviewer-id'),
            reviewer_name = $(this).data('reviewer-name'),
            url = '{{route("admin.reviewer-reviews.review-results.update", ":id")}}';
        url = url.replace(':id', id);

        $('#reviewer_id').val(reviewer_id).trigger('change');
        $('#paper_id').val(id);
        $('#edit-reviewer').attr('action', url);
        $('#modal-edit-reviewer').modal('show');
    });
</script>
@endpush