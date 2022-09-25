<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
<style type="text/css">
    .form-control {
        padding: 6px 5px;
    }
</style>
<!-- Customer type change by javascript end -->

<!-- Add New Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Order</h1>
            <small>Order</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active">Order></li>
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

                <?php if ($this->permission1->method('manage_invoice', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Cinvoice/manage_invoice') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('pos_invoice', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cinvoice/pos_invoice') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('pos_invoice') ?> </a>
                <?php } ?>


            </div>
        </div>


        <!--Add Invoice -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Order</h4>

                        </div>
                    </div>



                    <div class="panel-body">
                        <?php echo form_open_multipart('', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>


<div class="col-12">
    <div class="row" >

        <div class="col-sm-6  customer_div" id="payment_from_1" >
            <div class="form-group row">
                <div class="col-sm-6">
                    <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='Search Customer' id="customer_name" tabindex="1" onkeyup="customer_autocomplete()" value="" />

                    <input autocomplete="off" id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id" value="">
                </div>

                    <div class=" col-sm-3">
                        <a href="#" class="client-add-btn btn btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Search Customer</a>
                    </div>

            </div>
        </div>



        <div class="col-sm-6">
            <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label">Executive Name</label>
                <div class="col-sm-6">
                    <?php

                    $date = date('Y-m-d');
                    ?>
                    <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                </div>
            </div>
        </div>



    </div>
    <div class="row" >

        <div class="col-sm-6  customer_div" id="payment_from_1" >
            <div class="form-group row">
                <div class="col-sm-6">
                    <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='Search Item' id="customer_name" tabindex="1" onkeyup="customer_autocomplete()" value="" />

                    <input autocomplete="off" id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id" value="">
                </div>

                    <div class=" col-sm-3">
                        <a href="#" class="client-add-btn btn btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Search Item</a>
                    </div>

            </div>
        </div>



        <div class="col-sm-6">
            <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label">Order Type</label>
                <div class="col-sm-6">
                    <?php

                    $date = date('Y-m-d');
                    ?>
                    <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                </div>
            </div>
        </div>



    </div>
    <div class="row" >

        <div class="col-sm-6  customer_div" id="payment_from_1" >
            <div class="form-group row">
                <div class="col-sm-6">
                    <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='Search Quotaion' id="customer_name" tabindex="1" onkeyup="customer_autocomplete()" value="KMSQ-202208290139" />

                    <input autocomplete="off" id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id" value="">
                </div>

                    <div class=" col-sm-3">
                        <a href="#" class="client-add-btn btn btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Search Quotation</a>
                    </div>

            </div>
        </div>

        <div class="col-sm-6" style="align-content: last">
            <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label">Cash & Carry</label>
                <div class="col-sm-6">
                    <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                        <option value="1">No</option>
                        <option value="2">Yes</option>

                    </select>
                </div>
            </div>
        </div>



    </div>
    <div class="row" >

        <div class="col-sm-6  customer_div" id="payment_from_1" >
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="date" class="col-sm-3 col-form-label"><nobr>Order No:</nobr></label>

                </div>



            </div>
        </div>



    </div>
</div>






                        <?php echo form_close() ?>
                    </div>
                </div>


                <!-- Receiver add Modal start-->

                <!-- Receiver add Modal end-->

            </div>
    </section>
</div>
<!-- Invoice Report End -->


