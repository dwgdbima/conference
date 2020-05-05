<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug</title>
</head>

<body>
    <form action="debugcheck" method="post">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" data-abs_id="1" data-user_id="2" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
        </div>
        <button type="submit">SUBMIT</button>
    </form>

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/') ?>plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/script.js"></script>
</body>
<script>
    $('#email').on('keyup', function() {
        const email = this.value;
        const user_id = $(this).data('user_id');
        const abs_id = $(this).data('abs_id');

        console.log(user_id, abs_id);
        // $.ajax({
        //     url: "<?= site_url('auth/debugcheck') ?>",
        //     data: {
        //         email: email
        //     },
        //     method: "post",
        //     dataType: "json",

        //     success: function(data) {
        //         console.log(data);
        //     }
        // });

    });
    // $(document).ready(function() {
    //     $.validator.setDefaults();
    //     $('#userRegistration').validate({
    //         rules: {
    //             email: {
    //                 required: true,
    //                 email: true,
    //                 remote: {
    //                     url: "debug",
    //                     type: "post"
    //                 }
    //             }
    //         },
    //         messages: {
    //             email: {
    //                 email: "Please enter a vaild email address",
    //                 remote: "this email has been registered"
    //             }
    //         },
    //         errorElement: 'span',
    //         errorPlacement: function(error, element) {
    //             error.addClass('invalid-feedback');
    //             element.closest('.form-group').append(error);
    //         },
    //         highlight: function(element, errorClass, validClass) {
    //             $(element).addClass('is-invalid');
    //         },
    //         unhighlight: function(element, errorClass, validClass) {
    //             $(element).removeClass('is-invalid');
    //         }
    //     });
    // });
</script>

</html>