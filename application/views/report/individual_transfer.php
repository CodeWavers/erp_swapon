<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Transfer Report</h1>
            <small>View Transfer Report</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Transfer Report</a></li>
                <li class="active">View Transfer Report</li>
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
                                View Transfer Report
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div id="printDiv">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Date">Date: </label>
                                        <input id="Date" class="form-control" type="text" readonly value="<?= $rqsn_list[0]['date'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rqsn_id">Requisition ID: </label>
                                        <input id="rqsn_id" class="form-control" type="text" readonly value="<?= $rqsn_list[0]['rqsn_id'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="from">Transferred from :</label>
                                        <input id="from" class="form-control" type="text" value="<?= $rqsn_list[0]['to_outlet'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="to">Transferred to :</label>
                                        <input id="to" class="form-control" type="text" value="<?= $rqsn_list[0]['from_outlet'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Product Name</th>
                                            <th>Requested Quantity</th>
                                            <th>Transferred Quantity</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {rqsn_list}
                                        <tr>
                                            <td>{sl}</td>
                                            <td>{product_name} - {product_model} - {size_name} - {color_name}</td>
                                            <td>{quantity}</td>
                                            <td>{a_qty}</td>
                                            <td>{balance}</td>
                                        </tr>
                                        {/rqsn_list}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= base_url('Creport/transfer_report') ?>">
                                <button class="btn btn-black">Back</button>
                            </a>
                        </div>
                        <div class="col-sm-2 right">
                            <a class="btn btn-warning" href="#" onclick="printDiv('printDiv')"><?php echo display('print') ?></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>