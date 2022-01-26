<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Requsition</h1>
            <small>Outlet Requisition Report</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Requisition</a></li>
                <li class="active">Outlet Requisition Report</li>
            </ol>
        </div>
    </section>

    <section class="content">
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
        ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>
            </div>
        <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
        ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>
            </div>
        <?php
            $this->session->unset_userdata('error_message');
        }
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                Outlet Requsition Report
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Requsition ID</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {rqsn_list}
                                    <tr>
                                        <td>{sl}</td>
                                        <td>{rqsn_id}</td>
                                        <td>{date}</td>
                                        <td>{from}</td>
                                        <td>{to}</td>

                                        <td>
                                            <a href="<?= base_url('Crqsn/view_outlet_rqsn/') ?>{rqsn_id}">
                                                <button type="button" title="View Requisition" class="btn btn-sm"><i class="fa fa-pencil"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    {/rqsn_list}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>