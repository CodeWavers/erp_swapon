<!-- Manage Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('manage_invoice') ?></h1>
            <small><?php echo display('manage_your_invoice') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('manage_invoice') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
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
            <div class="col-sm-12">

                <?php if ($this->permission1->method('new_invoice', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cinvoice') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('new_invoice') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('pos_invoice', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cinvoice/pos_invoice') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('pos_invoice') ?> </a>
                <?php } ?>


            </div>
        </div>

        <!-- date between search -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-10">
                            <?php echo form_open('', array('class' => 'form-inline', 'method' => 'get')) ?>
                            <?php

                            $today = date('Y-m-d');
                            ?>
                            <div class="form-group">
                                <label class="" for="from_date"><?php echo display('start_date') ?></label>
                                <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="" placeholder="<?php echo display('start_date') ?>">
                            </div>

                            <div class="form-group">
                                <label class="" for="to_date"><?php echo display('end_date') ?></label>
                                <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="">
                            </div>

                            <button type="button" id="btn-filter" class="btn btn-success"><?php echo display('find') ?></button>

                            <?php echo form_close();
                            $_SESSION['redirect_uri'] = 'Cinvoice/manage_invoice';
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        <!-- Manage Invoice report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th>Pay Date</th>
                                        <th><?php echo display('total_amount') ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;

                                    ?>
                                    <?php foreach ($details as $d) { ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td style="text-align:left"><?php echo $d['pay_date'] ?></td>
                                            <td> <?php echo $d['amount'] ?></td>
                                            <?php $i++; ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <th><?php echo display('sl') ?></th>
                                    <th>Pay Date</th>
                                    <th><?php echo display('total_amount') ?></th>
                                </tfoot>
                            </table>

                        </div>


                    </div>
                </div>
                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice; ?>" name="">
                <input type="hidden" id="currency" value="{currency}" name="">
            </div>
        </div>
    </section>
</div>
<!-- Manage Invoice End -->