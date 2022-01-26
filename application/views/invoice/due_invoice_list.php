<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Sale</h1>
            <small>Invoices with Dues</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Requisition</a></li>
                <li class="active">Invoices with Dues</li>
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
                                Invoices with Dues
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Invoice No.</th>
                                        <th>Customer Information</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;
                                    foreach ($due_invoices as $inv) {
                                        $sl++;
                                    ?>
                                        <tr>
                                            <td><?= $sl ?></td>
                                            <td><?= $inv['invoice'] ?></td>
                                            <td><?= $inv['cus_details'] ?></td>
                                            <td><?= $inv['date'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('Cinvoice/due_invoice_view/' . $inv['invoice_id']) ?>">
                                                    <button class="btn btn-info btn-sm" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>