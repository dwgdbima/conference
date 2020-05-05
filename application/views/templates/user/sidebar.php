<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>admin" class="brand-link">
        <img src="<?= base_url('assets/') ?>dist/img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ICEMINE</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>upload/image/<?= $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucfirst(strtolower($user['first_name'])); ?></a>
                <a href="#"><i class="fa fa-circle text-success" style="font-size: xx-small; vertical-align: middle;"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!--DASHBOARD  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user" class="nav-link <?php if ($this->uri->segment(2) == "") {
                                                                        echo "active";
                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!--DASHBOARD  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/profile" class="nav-link <?php if ($this->uri->segment(2) == "profile") {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <!-- Submission Summary -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/submission_summary" class="nav-link <?php if ($this->uri->segment(2) == "submission_summary") {
                                                                                            echo "active";
                                                                                        } ?>">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Submission Summary</p>
                    </a>
                </li>
                <!-- Abstract -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/abstract" class="nav-link <?php if ($this->uri->segment(2) == "abstract") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Abstract</p>
                    </a>
                </li>
                <!-- My Files -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/my_files" class="nav-link <?php if ($this->uri->segment(2) == "my_files") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>My Files</p>
                    </a>
                </li>
                <!-- Review Result -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/review_result" class="nav-link <?php if ($this->uri->segment(2) == "review_result") {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-file-download"></i>
                        <p>Review Result</p>
                    </a>
                </li>
                <!-- Feedback -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/feedback" class="nav-link <?php if ($this->uri->segment(2) == "feedback") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Feedback</p>
                    </a>
                </li>
                <!-- Contact -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>user/contact" class="nav-link <?php if ($this->uri->segment(2) == "contact") {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>