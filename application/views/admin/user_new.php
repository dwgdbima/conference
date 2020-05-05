<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Active User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Active User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card" style="border-radius: unset;">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="card-body">
                            <blockquote class="new1">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card-body">
                            <blockquote class="new1 brd-success">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card-body">
                            <blockquote class="new1 brd-warning">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 user_active">
                                    <table id="user_new" class="table dataTable stripe row-border order-column" style="width:100%">
                                        <thead>
                                            <tr role="row">
                                                <th>Name</th>
                                                <th>Institution</th>
                                                <th>Country</th>
                                                <th>Email</th>
                                                <th>Participation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- MODAL ACCEPT -->
<div class="modal fade" id="modal-accept">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header" style="border-bottom: 1px solid #208c39; padding-top: 0.5rem;
            padding-bottom: 0.5rem;">
                <h4 class="modal-title"><i class="icon fas fa-check mr-3"></i>Alert!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p style="display: inline">Is this user safe?</p>
                <button type="button" id="buttonaccept" class="btn btn-outline-light float-right">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DECLINE -->
<div class="modal fade" id="modal-decline">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header" style="border-bottom: 1px solid #bf2534; padding-top: 0.5rem;
            padding-bottom: 0.5rem;">
                <h4 class="modal-title"><i class="icon fas fa-ban mr-3"></i>Alert!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p style="display: inline">Do you want to decline the request?</p>
                <button type="button" id="buttondecline" class="btn btn-outline-light float-right">Save changes</button>
            </div>
        </div>
    </div>
</div>