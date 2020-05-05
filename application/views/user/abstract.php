<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Abstract</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Abstract</li>
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
                            <div class="abstract-form mr-auto ml-auto" style="width: 70%;">
                                <?= $this->session->flashdata('message'); ?>
                                <H2 class="text-center mb-5">Submit Abstract</H2>
                                <form action="<?= base_url('user/abstract') ?>" method="post">
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
                                        <button type="submit" name="submit" class="btn btn-primary btn-block w-25 ml-auto">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->