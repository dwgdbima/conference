<div class="login-box">
    <div class="login-logo">
        <p><b>Forgot</b> Password</p>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login to start your session</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth/forgotpassword') ?>" method="post" id="ForgotPassword">
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mb-1 mt-2 text-center">
                <a href="#">Login</a>
            </p>
            <p class="mb-0 text-center">
                <a href="#" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->