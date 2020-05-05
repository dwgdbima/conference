<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content myprofile">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="myprofile-img">
                                        <img src="<?= base_url() ?>upload/image/<?= $user['image'] ?>" class="shadow-sm" alt="">
                                    </div>
                                    <div class="tagl">
                                        <span>INFO</span>
                                    </div>
                                    <div class="myprofile-info">
                                        <i class="fas fa-quote-left"></i>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rem laudantium pariatur eveniet optio
                                    </div>
                                    <div class="tagl">
                                        <span>SOCIAL MEDIA</span>
                                    </div>
                                    <div class="myprofile-sosmed">
                                        <a href="#" class="sosmed mr-1" style="background-color: #4267B2"><i class="fab fa-facebook-f sosmed"></i></a>
                                        <a href="#" class="sosmed mr-1" style="background-color: #1DA1F2"><i class="fab fa-twitter sosmed"></i></a>
                                        <a href="#" class="sosmed mr-1" style="background-color: #DB4A39"><i class="fab fa-google-plus-g sosmed"></i></a>
                                        <a href="#" class="sosmed" style="background-color: #25D366"><i class="fab fa-whatsapp sosmed"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="col-12 mb-4">
                                        <div class="profile-header">
                                            <div class="myprofile-name text-dark mb-1">
                                                <?= ucwords(strtolower($user['salutation'] . ' ' . $user['first_name'] . ' ' . $user['last_name'])) ?>
                                            </div>
                                            <div class="myprofile-participation mb-3">
                                                <?php if ($user['participation'] == 'Presenter') : ?>
                                                    <span>Presenter </span>/ Non-Presenter
                                                <?php else : ?>
                                                    Presenter /<span> Non-Presenter</span>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <span class="tag">RESEARCH</span>
                                                <h3 class="text-dark"><?= $user['research']; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profile-about-tab" data-toggle="pill" href="#profile-about" role="tab" aria-controls="profile-about" aria-selected="true">
                                                    <i class="fas fa-user"></i> About
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-abstract-tab" data-toggle="pill" href="#profile-abstract" role="tab" aria-controls="profile-abstract" aria-selected="false">
                                                    <i class="fas fa-file-alt"></i> Abstract</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-files-tab" data-toggle="pill" href="#profile-files" role="tab" aria-controls="profile-files" aria-selected="false">
                                                    <i class="fas fa-folder-open"></i> My Files</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-settings-tab" data-toggle="pill" href="#profile-settings" role="tab" aria-controls="profile-settings" aria-selected="false">
                                                    <i class="fas fa-user-cog"></i> Settings</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="min-height: 250px;" id="custom-content-below-tabContent">
                                            <!-- TAB ABOUT -->
                                            <div class="tab-pane fade active show pl-2" id="profile-about" role="tabpanel" aria-labelledby="profile-about-tab">
                                                <div class="mt-4 mb-3"><span class="tag">CONTACT INFORMATION</span></div>
                                                <div class="row contact-information">
                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-4 col-md-2">
                                                                Phone:
                                                            </div>
                                                            <div class="col-8 col-md-10">
                                                                <?= $user['phone'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-4 col-md-2">
                                                                Email:
                                                            </div>
                                                            <div class="col-8 col-md-10">
                                                                <?= $user['email'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-4 col-md-2">
                                                                Fax:
                                                            </div>
                                                            <div class="col-8 col-md-10">
                                                                <?php if ($user['fax'] == "") : ?>
                                                                    --
                                                                <?php else : ?>
                                                                    <?= $user['fax']; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-4 col-md-2">
                                                                Postal Address:
                                                            </div>
                                                            <div class="col-8 col-md-10">
                                                                <div class="myprofile-postaddress">
                                                                    <?php echo $user['street'] . ', ' . $user['city'] . ', ' . $user['country'] ?>
                                                                </div>
                                                                <?= $user['zip_code']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 mb-3"><span class="tag">BASIC INFORMATION</span></div>
                                                <div class="row contact-information">
                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-4 col-md-2">
                                                                Birth of Date:
                                                            </div>
                                                            <div class="col-8 col-md-10">
                                                                <?= $user['birth'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-4 col-md-2">
                                                                Gender:
                                                            </div>
                                                            <div class="col-8 col-md-10">
                                                                <?= $user['gender'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- TAB ABSTRACT -->
                                            <div class="tab-pane fade" id="profile-abstract" role="tabpanel" aria-labelledby="profile-abstract-tab">
                                                <div class="col-12 mt-4">
                                                    <div class="card" style="background-color: #f4f6f9">
                                                        <div class="card-header text-center" style="border-bottom: none; padding: 1rem 0;">
                                                            <div class="col-12 font-weight-bold">
                                                                <div class="row">
                                                                    <div class="col-1">
                                                                        <i class="fas fa-expand"></i>
                                                                    </div>
                                                                    <div class="col-2 text-center">
                                                                        Abstract ID
                                                                    </div>
                                                                    <div class="col-2">
                                                                        Decision
                                                                    </div>
                                                                    <div class="col-2 text-center">
                                                                        Payment
                                                                    </div>
                                                                    <div class="col-2 text-center">
                                                                        Paper
                                                                    </div>
                                                                    <div class="col-3 text-center">
                                                                        Action
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php foreach ($abstract as $abs) : ?>
                                                        <div class="card collapsed-card">
                                                            <div class="card-header" style="padding-right: unset; padding-left: unset;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-1 text-center">
                                                                            <div class="card-tools">
                                                                                <button type="button" class="btn btn-tool" style="vertical-align: sub;" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2 text-center">
                                                                            <span style="vertical-align: sub;">ABS-<?= $abs['id']; ?></span>
                                                                        </div>
                                                                        <div class="col-2 text-center">
                                                                            <?php if ($abs['status'] == 0) : ?>
                                                                                <span class="badge bg-warning" style="vertical-align: sub;">Pending <i class="fas fa-clock"></i></span>
                                                                            <?php elseif ($abs['status'] == 1) : ?>
                                                                                <span class="badge bg-success" style="vertical-align: sub;">Accepted <i class="fas fa-check"></i></span>
                                                                            <?php elseif ($abs['status'] == 2) : ?>
                                                                                <span class="badge bg-danger" style="vertical-align: sub;">Rejected <i class="fas fa-times"></i></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-2 text-center">
                                                                            <?php if ($abs['payment'] < 1) : ?>
                                                                                <span class="badge bg-warning" style="vertical-align: sub;">Pending <i class="fas fa-clock"></i></span>
                                                                            <?php else : ?>
                                                                                <span class="badge bg-success" style="vertical-align: sub;">Confirm <i class="fas fa-check"></i></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-2 text-center">
                                                                            <a href="#" style="vertical-align: sub;">---</a>
                                                                        </div>
                                                                        <div class="col-3 text-center">
                                                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-role="edit_abstract" data-target="#edit_abstract" data-id="<?= $abs['id'] ?>">Edit</a>
                                                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="abstract">
                                                                    <div class="title"><?= $abs['title']; ?></div>
                                                                    <div class="authors"><?= $abs['author']; ?></div>
                                                                    <div class="institution"><?= $abs['institution']; ?></div>
                                                                    <div class="email"><?= $abs['email']; ?></div>
                                                                    <div class="text-center" style="font-size: 0.9rem; font-style:italic; font-weight: bold; margin-bottom: 1rem">Abstract</div>
                                                                    <div class="content"><?= $abs['content']; ?></div>
                                                                    <div class="keyword"><span class="text-bold">Keyword: </span><?= $abs['keyword']; ?></div>
                                                                </div>
                                                                <hr>
                                                                <div><span class="text-bold">Categorized: </span><?= $abs['topic']; ?></div>
                                                                <?php if ($abs['info'] == "") : ?>
                                                                    <div style="display: none"><span class="text-bold">Info:</span></div>
                                                                <?php else : ?>
                                                                    <div><span class="text-bold">Info:</span></div>
                                                                <?php endif; ?>
                                                                <div class="text-secondary mt-3 text-sm" style="font-style:italic;">Last Updated on <?= $abs['last_update']; ?> (Server Time)</div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <a href="#" class="col-12 add-new-abs btn"><i class="fas fa-plus" style="font-size: 2rem; vertical-align: middle;"></i></a>
                                                </div>
                                            </div>
                                            <!-- TAB FILE -->
                                            <div class="tab-pane fade pt-3" id="profile-files" role="tabpanel" aria-labelledby="profile-files-tab">
                                                <?php foreach ($absfprp as $row) : ?>
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h3 class="card-title">ABS-<?= $row['id']; ?> Associated Files</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <!-- /.card-tools -->
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="mb-3"><span class="tag">FULL PAPER</span></div>
                                                            <?php if ($row['fp_file'] == null) :  ?>
                                                                <a href="#" class="col-12 add-fp btn" data-toggle="modal" data-role="add_fp" data-target="#add_fp" data-user_id="<?= $user['id'] ?>" data-abs_id="<?= $row['id'] ?>"><i class="fas fa-plus" style="font-size: 2rem; vertical-align: middle;"></i></a>
                                                            <?php else : ?>
                                                                <a href="<?= base_url(); ?>user/downloadfp/<?= $row['fp_file']; ?>"><?= $row['fp_file']; ?></a>
                                                            <?php endif;  ?>
                                                            <hr>
                                                            <div class="mb-3"><span class="tag">REVISED PAPER</span></div>
                                                            <?php if ($row['rp_file'] == null) : ?>
                                                                <a href="#" class="col-12 add-rp btn" data-toggle="modal" data-role="add_rp" data-target="#add_rp" data-user_id="<?= $user['id'] ?>" data-abs_id="<?= $row['id'] ?>"><i class="fas fa-plus" style="font-size: 2rem; vertical-align: middle;"></i></a>
                                                            <?php else : ?>
                                                                <a href="<?= base_url(); ?>user/downloadfp/<?= $row['fp_file']; ?>">Download</a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <!-- TAB SETING -->
                                            <div class="tab-pane fade mt-4" id="profile-settings" role="tabpanel" aria-labelledby="profile-settings-tab">
                                                <!-- EDIT PROFILE -->
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Edit Profile</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <form action="<?= base_url('user/editProfile') ?>" enctype="multipart/form-data" method="post" id="userRegistration">
                                                            <!-- Name -->
                                                            <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="myprofile-img">
                                                                                <img src="<?= base_url() ?>upload/image/<?= $user['image'] ?>" id="img_preview" class="shadow-sm" alt="" style="margin-bottom: 1rem;">
                                                                                <div class="custom-file">
                                                                                    <input type="file" class="custom-file-input" id="imgInp" name="image">
                                                                                    <label class="custom-file-label" for="imgIn"><?= $user['image']; ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?= $user['first_name'] ?>">
                                                                                    <?= form_error('first_name', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?= $user['last_name'] ?>">
                                                                                    <?= form_error('last_name', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group clearfix">
                                                                                    <div class="align-middle" style="display: inline-flex;">
                                                                                        <label class="mr-3" style="margin-bottom: unset;">Gender: </label>
                                                                                        <div class="icheck-primary d-inline mr-1">
                                                                                            <input type="radio" id="male" name="gender" value="Male" <?= $user['gender'] == 'Male' ? 'checked=""' : ''; ?>>
                                                                                            <label for="male" style="margin-bottom: unset;">
                                                                                                Male
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="icheck-primary d-inline">
                                                                                            <input type="radio" id="female" name="gender" value="Female" <?= $user['gender'] == 'Female' ? 'checked=""' : ''; ?>>
                                                                                            <label for="female" style="margin-bottom: unset;">
                                                                                                Female
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="input-group date" id="date-birth" data-target-input="nearest">
                                                                                        <input type="text" class="form-control datetimepicker-input" data-target="#date-birth" name="birth" placeholder="Date of birth (yyyy-mm-dd)" value="<?= $user['birth'] ?>" />
                                                                                        <div class="input-group-append" data-target="#date-birth" data-toggle="datetimepicker">
                                                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?= form_error('birth', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="input-group">
                                                                                        <select class="form-control salutation" id="salutation" name="salutation">
                                                                                            <option value="Prof. Dr." <?= $user['salutation'] == 'Prof. Dr.' ? 'selected = "selected"' : ''; ?>>Prof. Dr.</option>
                                                                                            <option value="Prof. Dr. dr." <?= $user['salutation'] == 'Prof. Dr. dr.' ? 'selected = "selected"' : ''; ?>>Prof. Dr. dr.</option>
                                                                                            <option value="Prof. Dr. drg." <?= $user['salutation'] == 'Prof. Dr. drg.' ? 'selected = "selected"' : ''; ?>>Prof. Dr. drg.</option>
                                                                                            <option value="Prof." <?= $user['salutation'] == 'Prof.' ? 'selected = "selected"' : ''; ?>>Prof.</option>
                                                                                            <option value="Dr. dr" <?= $user['salutation'] == 'Dr. dr.' ? 'selected = "selected"' : ''; ?>>Dr. dr.</option>
                                                                                            <option value="Dr." <?= $user['salutation'] == 'Dr.' ? 'selected = "selected"' : ''; ?>>Dr.</option>
                                                                                            <option value="dr." <?= $user['salutation'] == 'dr.' ? 'selected = "selected"' : ''; ?>>dr.</option>
                                                                                            <option value="Mr." <?= $user['salutation'] == 'Mr.' ? 'selected = "selected"' : ''; ?>>Mr.</option>
                                                                                            <option Value="Ms." <?= $user['salutation'] == 'Ms.' ? 'selected = "selected"' : ''; ?>>Ms.</option>
                                                                                        </select>
                                                                                        <div class="input-group-append">
                                                                                            <div class="input-group-text">
                                                                                                <span class="fas fa-user-graduate"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?= form_error('salutation', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" id="institution" name="institution" placeholder="Institution" value="<?= $user['institution'] ?>">
                                                                                        <div class="input-group-append">
                                                                                            <div class="input-group-text">
                                                                                                <span class="fas fa-university"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?= form_error('institution', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Research -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="research" name="research" placeholder="Your research area or expertise" value="<?= $user['research'] ?>">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-search"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('research', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Email -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email'] ?>" disabled>
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-envelope"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal_change_password">
                                                                        Change Password
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- Phone -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= $user['phone'] ?>">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-mobile-alt"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax Number" value="<?= $user['fax'] ?>">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-fax"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Address -->
                                                                <div class="col-md-3 postal-address">
                                                                    <label>Postal Address: </label>
                                                                </div>
                                                                <div class="col-md col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="<?= $user['street'] ?>">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-road"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('street', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= $user['city'] ?>">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-city"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code" value="<?= $user['zip_code'] ?>">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-barcode"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('zip_code', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <select class="form-control countries" id="country" name="country">
                                                                                <?php foreach ($countries as $row) : ?>
                                                                                    <option value="<?= $row['country_name'] ?>" <?= $user['country'] == $row['country_name'] ? 'selected = "selected"' : ''; ?>><?= $row['country_name'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-globe-asia"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('country', '<small class="text-danger pl-1">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Other Information:</label>
                                                                </div>
                                                                <div class="col-md mb-3">
                                                                    <textarea rows="5" class="form-control" id="info" name="info" value="<?= $user['info'] ?>"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-12">
                                                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- MODAL -->
<!-- MODAL ADD FULL PAPER -->
<div class="modal fade" id="add_fp">
    <div class="modal-dialog abs-size">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Full Paper</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/addfullpaper') ?>" enctype="multipart/form-data" method="post" style="padding-left: 1rem; padding-right: 1rem;">
                    <input type="hidden" name="user_id" id="fp_user_id">
                    <input type="hidden" name="abs_id" id="fp_abs_id">
                    <div class="form-group row">
                        <label for="abs_author" class="col-2 col-form-label">Select File</label>
                        <div class="col-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fp_file" name="fp_file">
                                <label class="custom-file-label" for="abs_file">Choose file</label>
                            </div>
                            <?= form_error('author', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-2 col-form-label">Info</label>
                        <div class="col-10">
                            <textarea class="form-control" id="fp_info" name="info" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- MODAL ADD REVISED PAPER -->
<div class="modal fade" id="add_rp">
    <div class="modal-dialog abs-size">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Revised Paper</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/addpaper') ?>" enctype="multipart/form-data" method="post" style="padding-left: 1rem; padding-right: 1rem;">
                    <input type="hidden" name="user_id" id="rp_user_id">
                    <input type="hidden" name="abs_id" id="rp_abs_id">
                    <div class="form-group row">
                        <label for="abs_author" class="col-2 col-form-label">Select File</label>
                        <div class="col-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="rp_file" name="rp_file">
                                <label class="custom-file-label" for="abs_file">Choose file</label>
                            </div>
                            <?= form_error('author', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-2 col-form-label">Info</label>
                        <div class="col-10">
                            <textarea class="form-control" id="rp_info" name="info" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- MODAL EDIT ABSTRACT -->
<div class="modal fade" id="edit_abstract">
    <div class="modal-dialog abs-size">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Abstract</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/editabstract') ?>" method="post" style="padding-left: 1rem; padding-right: 1rem;">
                    <input type="hidden" name="id" id="abs_id">
                    <!-- TITLE -->
                    <div class="form-group row">
                        <label for="abs_title" class="col-2 col-form-label">Title</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="abs_title" name="title" placeholder="title">
                            <?= form_error('title', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- All Authors -->
                    <div class="form-group row">
                        <label for="abs_author" class="col-2 col-form-label">All Authors</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="abs_author" name="author" placeholder="All Authors">
                            <?= form_error('author', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- All Authors -->
                    <div class="form-group row">
                        <label for="abs_institution" class="col-2 col-form-label">Institution</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="abs_institution" name="institution" placeholder="Institution">
                            <?= form_error('institution', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abs_email" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="abs_email" name="email" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abs_content" class="col-2 col-form-label">Content of Abstract</label>
                        <div class="col-10">
                            <textarea class="form-control" name="content" id="abs_content" cols="30" rows="10"></textarea>
                            <?= form_error('content', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abs_keyword" class="col-2 col-form-label">Keyword</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="abs_keyword" name="keyword" placeholder="Keyword">
                            <?= form_error('keyword', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abs_topic" class="col-2 col-form-label">Topic</label>
                        <div class="col-10">
                            <select class="form-control" id="abs_topic" name="topic">
                                <option value="Disaster Management and Environmental Issues">Disaster Management and Environmental Issues</option>
                                <option value="Geology">Geology</option>
                                <option value="Geophysics, Geomatics and Geochemistry">Geophysics, Geomatics and Geochemistry</option>
                                <option value="Mining and Metallurgy Engineering">Mining and Metallurgy Engineering</option>
                            </select>
                            <?= form_error('topic', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abs_presenter" class="col-2 col-form-label">Presenter</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="abs_presenter" name="presenter" placeholder="Presenter">
                            <?= form_error('presenter', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abs_type" class="col-2 col-form-label">Abstract Type</label>
                        <div class="col-10">
                            <select class="form-control" id="abs_type" name="type">
                                <option value="Oral Presentation">Oral Presentation</option>
                                <option value="Poster Presentation">Poster Presentation</option>
                            </select>
                            <?= form_error('type', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-2 col-form-label">Info</label>
                        <div class="col-10">
                            <textarea class="form-control" id="abs_info" name="info" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_change_password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" placeholder="Enter current password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="repeat_password">Confirm Password</label>
                        <input type="password" class="form-control" id="repeat_password" placeholder="Confirm password">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.content-wrapper -->