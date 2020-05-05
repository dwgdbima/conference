<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- Main App -->
<script src="<?= base_url('assets/') ?>dist/js/acceptuser.js"></script>

<script>
    var table;
    $(document).ready(function() {
        //datatables
        $('#user_active').DataTable({
            "processing": true,
            "scrollCollapse": true,
            "scrollX": true,
            "autoWidth": true,
            "columnDefs": [{
                    "targets": [5],
                    "orderable": false
                },
                {
                    "targets": [4, 5],
                    "className": 'text-center'
                }
            ],
            "fixedColumns": 1,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/get_data_user_active') ?>",
                "type": "POST"
            },
        });
        $(document).on({
            mouseenter: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").addClass("highlight")
                });
            },
            mouseleave: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").removeClass("highlight")
                });
            }
        }, ".dataTables_wrapper tr");
        $(document).ready(function() {
            $("table.dataTable").find("tr").children("th").css("background-color", "#f4f6f9");
        })
    });

    var table;
    $(document).ready(function() {
        //datatables
        $('#user_new').DataTable({
            "processing": true,
            "scrollCollapse": true,
            "scrollX": true,
            "autoWidth": true,
            "columnDefs": [{
                    "targets": [5],
                    "orderable": false
                },
                {
                    "targets": [4, 5],
                    "className": 'text-center'
                }
            ],
            "fixedColumns": {
                "leftColumns": false,
                "rightColumns": 1
            },
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/get_data_user_new') ?>",
                "type": "POST"
            },
        })
        $(document).on({
            mouseenter: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").addClass("highlight")
                });
            },
            mouseleave: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").removeClass("highlight")
                });
            }
        }, ".dataTables_wrapper tr");
        $(document).ready(function() {
            $("table.dataTable").find("tr").children("th").css("background-color", "#f4f6f9");
        })
    });
    $(document).ready(function() {
        $(document).on('click', 'a[data-role=accept]', function() {
            const id = $(this).data('id');
            $('#buttonaccept').on('click', function() {
                $.ajax({
                    url: "<?= site_url('admin/useraccept') ?>",
                    data: {
                        id: id
                    },
                    method: "post",
                    dataType: "json",
                    success: function() {
                        $('#modal-accept').modal('toggle');
                        $('#user_new').DataTable().ajax.reload();
                    }
                })
            })
        })
    });
    $(document).ready(function() {
        $(document).on('click', 'a[data-role=decline]', function() {
            const id = $(this).data('id');
            $('#buttondecline').on('click', function() {
                $.ajax({
                    url: "<?= site_url('admin/userdecline') ?>",
                    data: {
                        id: id
                    },
                    method: "post",
                    dataType: "json",
                    success: function() {
                        $('#modal-decline').modal('toggle');
                        $('#user_new').DataTable().ajax.reload();
                    }
                })
            })
        })
    });

    var table;
    $(document).ready(function() {
        //datatables
        $('#abstract').DataTable({
            "processing": true,
            "scrollCollapse": true,
            "scrollX": true,
            "autoWidth": true,
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                },
                {
                    "targets": [2, 3],
                    "className": 'text-center'
                }
            ],
            "fixedColumns": 1,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/get_data_abstract') ?>",
                "type": "POST"
            },
        });
        $(document).on({
            mouseenter: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").addClass("highlight")
                });
            },
            mouseleave: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").removeClass("highlight")
                });
            }
        }, ".dataTables_wrapper tr");
        $(document).ready(function() {
            $("table.dataTable").find("tr").children("th").css("background-color", "#f4f6f9");
        })
    });

    var table;
    $(document).ready(function() {
        //datatables
        $('#abstract_new').DataTable({
            "processing": true,
            "scrollCollapse": true,
            "scrollX": true,
            "autoWidth": true,
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                },
                {
                    "targets": [2, 3],
                    "className": 'text-center'
                }
            ],
            "fixedColumns": 1,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/get_data_abstract_new') ?>",
                "type": "POST"
            },
        });
        $(document).on({
            mouseenter: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").addClass("highlight")
                });
            },
            mouseleave: function() {
                trIndex = $(this).index() + 1;
                $("table.dataTable").each(function(index) {
                    $(this).find("tr:eq(" + trIndex + ")").removeClass("highlight")
                });
            }
        }, ".dataTables_wrapper tr");
        $(document).ready(function() {
            $("table.dataTable").find("tr").children("th").css("background-color", "#f4f6f9");
        })
    });
</script>
</body>

</html>