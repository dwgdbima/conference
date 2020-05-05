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
                <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrator</a>
                <a href="#"><i class="fa fa-circle text-success" style="font-size: xx-small; vertical-align: middle;"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!--DASHBOARD  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link <?php if ($this->uri->segment(2) == "") {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Data Sumary -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/datasumary" class="nav-link <?php if ($this->uri->segment(2) == "datasumary") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Data Sumary</p>
                    </a>
                </li>
                <!-- Users -->
                <li class="nav-item has-treeview <?php if ($this->uri->segment(2) == "useractive" || $this->uri->segment(2) == "usernew") {
                                                        echo "menu-open";
                                                    } ?>">
                    <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "useractive" || $this->uri->segment(2) == "usernew") {
                                                    echo "active";
                                                } ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/useractive" class="nav-link <?php if ($this->uri->segment(2) == "useractive") {
                                                                                            echo "active";
                                                                                        } ?>">
                                <i class="far fas fa-user-check nav-icon"></i>
                                <p>Active Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/usernew" class="nav-link <?php if ($this->uri->segment(2) == "usernew") {
                                                                                            echo "active";
                                                                                        } ?>">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>New Users<span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Abstracs -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Abstracts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/abstracts" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Data Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/newabstracts" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>New Abstracts<span class="right badge badge-danger">New</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Payment Proofs  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/paymentproofs" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Payment Proofs</p>
                    </a>
                </li>
                <!--Full Papers  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/papers" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Full Papers</p>
                    </a>
                </li>
                <!-- Paper Review -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fas fa-file-download"></i>
                        <p>
                            Paper Review
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/paperreview" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Data Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/reviewers" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Reviewers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin" class="nav-link">
                                <i class="	fas fa-edit nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Result/Action</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin" class="nav-link">
                                <i class="fas fa-archive nav-icon"></i>
                                <p>Archive</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Revised Papers  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Revised Papers</p>
                    </a>
                </li>
                <!-- Copyright Transfer  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link">
                        <i class="nav-icon fa fa-copyright"></i>
                        <p>Copyright Transfers</p>
                    </a>
                </li>
                <!-- Online Prceedings -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link">
                        <i class="nav-icon fa fa-globe"></i>
                        <p>Online Proceedings</p>
                    </a>
                </li>
                <!-- File Data Table -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>File Data Table</p>
                    </a>
                </li>
                <!-- Email List -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Email List</p>
                    </a>
                </li>
                <!-- Configuration -->
                <li class="nav-item has-treeview">
                    <span class="ml-2 mr-2 mt-2 mb-2"></span>
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Configuration
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>System Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/reviewers" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Reviewers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Edit Topic</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Finance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Quota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Disk Usage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>System Backup</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Activity Log</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Automail Log</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Server Time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>Visitors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>View Site</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fas fa-angle-double-right"></i>
                                <p>FAQs</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>