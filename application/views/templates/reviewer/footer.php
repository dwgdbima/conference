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
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $(document).ready(function() {
        $(document).on('click', 'a[data-role=edit_abstract]', function() {
            const id = $(this).data('id');

            $.ajax({
                url: "<?= site_url('user/getEditAbstract') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#abs_id').val(data.id);
                    $('#abs_title').val(data.title);
                    $('#abs_author').val(data.author);
                    $('#abs_institution').val(data.institution);
                    $('#abs_email').val(data.email);
                    $('#abs_content').html(data.content);
                    $('#abs_keyword').val(data.keyword);
                    $('#abs_topic').val(data.topic);
                    $('#abs_presenter').val(data.presenter);
                    $('#abs_type').val(data.type);
                    $('#abs_info').html(data.info);
                }
            })
        })
    });
    $(document).ready(function() {
        $(document).on('click', 'a[data-role=add_fp]', function() {
            const user_id = $(this).data('user_id');
            const abs_id = $(this).data('abs_id');

            $('#fp_user_id').val(user_id);
            $('#fp_abs_id').val(abs_id);
        })
    });

    $(document).ready(function() {
        $(document).on('click', 'a[data-role=add_rp]', function() {
            const user_id = $(this).data('user_id');
            const abs_id = $(this).data('abs_id');
            console.log(user_id, abs_id);
            $.ajax({
                url: "<?= site_url('user/addrp') ?>",
                data: {
                    user_id: user_id,
                    abs_id: abs_id
                },
                method: "post",
                dataType: "json",
                success: function(data) {

                }
            })
        })
    });
</script>
</body>

</html>