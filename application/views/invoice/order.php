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
                                            <a href="#" style="font-size: 1.2rem" class="client-add-btn  btn btn-block btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Search Customer</a>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Executive Name</label>
                                        <div class="col-sm-6">
                                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                                <option value="1" selected>Select Executive</option>
                                                <option value="2">Test Executive</option>

                                            </select>
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
                                            <a href="#" style="font-size: 1.2rem" class="client-add-btn btn-block btn btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Search Item</a>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Order Type</label>
                                        <div class="col-sm-6">
                                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                                <option value="1" selected>Please Select</option>
                                                <option value="2">Pick Up</option>
                                                <option value="2">Courier</option>

                                            </select>
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
                                            <a href="#" style="font-size: 1.2rem" class="client-add-btn btn-block btn btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Search Quotation</a>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Cash & Carry</label>
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


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="date" class="col-sm-3 col-form-label"><nobr>Order No:</nobr></label>

                                    </div>



                                </div>




                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Particulars</th>
                                    <th>Rate</th>
                                    <th>Disc(%)</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>

                                </thead>

                            </table>


                            <div class="">
                                <a href="#" style="font-size: 1.2rem" class="client-add-btn btn btn-success" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info"> <i class="fa fa-plus"></i> Attachment...</a>
                            </div>
                        </div>

                        <br>
                        <div class="col-12">

                            <div class="row" >

                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label ">Delivery Date</label>

                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='Search Quotaion' id="customer_name" tabindex="1" readonly value="<?= date("d/m/y h:s") ?>" />

                                        </div>




                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Amount</label>
                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class="text-right form-control" placeholder='0.00' id="customer_name" tabindex="1" readonly value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >

                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label ">Notes</label>

                                        <div class="col-sm-6">
                                            <textarea name="inva_details" rows="1" class="form-control" placeholder="Notes..."></textarea>

                                        </div>




                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Total Taxable Amount</label>
                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" text-right form-control" placeholder='0.00' id="customer_name" tabindex="1" readonly value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="row" >

                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label ">P.O No.</label>

                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='' id="customer_name" tabindex="1"  value="" />

                                        </div>




                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label text-right"></label>

                                        <div class="col-sm-3 col-form-label">
                                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                                <option value="1" selected>Select Text</option>
                                                <option value="2">....</option>

                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='' id="customer_name" tabindex="1"  value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >

                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label ">Site Address</label>

                                        <div class="col-sm-6">
                                            <textarea name="inva_details" rows="1" class="form-control" placeholder="<?php echo display('invoice_details') ?>"></textarea>

                                        </div>




                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label text-right"></label>

                                        <div class="col-sm-3 col-form-label">
                                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                                <option value="1" selected>Select Text</option>
                                                <option value="2">....</option>

                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='' id="customer_name" tabindex="1"  value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >

                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label ">Delivery By W/H</label>

                                        <div class="col-sm-6">
                                            <input type="checkbox" value="">

                                        </div>




                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label text-right"></label>

                                        <div class="col-sm-3 col-form-label">
                                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                                <option value="1" selected>Select Text</option>
                                                <option value="2">....</option>

                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='' id="customer_name" tabindex="1"  value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >
                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label "></label>

                                        <div class="col-sm-6">


                                        </div>




                                    </div>
                                </div>
                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label text-right"></label>

                                        <div class="col-sm-3 col-form-label">
                                            <select class="form-select form-control form-select-sm" aria-label=".form-select-sm example">
                                                <option value="1" selected>Select Text</option>
                                                <option value="2">....</option>

                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='' id="customer_name" tabindex="1"  value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >
                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label "></label>

                                        <div class="col-sm-6">


                                        </div>




                                    </div>
                                </div>
                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Coupon Code</label>

                                        <div class="col-sm-3 col-form-label">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='Enter Coupon Code' id="customer_name" tabindex="1"  value="" />


                                        </div>
                                        <div class="col-sm-3">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class="text-right form-control" placeholder='0.00' id="customer_name" tabindex="1"  value="" />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >
                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label "></label>

                                        <div class="col-sm-6">


                                        </div>




                                    </div>
                                </div>
                                <div class="col-sm-6 " >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right">Payable</label>

                                        <div class="col-sm-6  ">
                                            <input autocomplete="off"  type="text" size="100" name="customer_name" class="text-right form-control" placeholder='0.00' id="customer_name" tabindex="1"  value="" readonly />

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row" >
                                <div class="col-sm-6  customer_div" id="payment_from_1" >
                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <a href="#" style="font-size: 1.2rem" class="client-add-btn btn btn-danger" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Cancel Quotation</a>


                                        </div>

                                        <div class="col-sm-3">
                                            <a href="#" style="font-size: 1.2rem" class="client-add-btn btn btn-block btn-info" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">New Quotation</a>

                                        </div>


                                    </div>
                                </div>


                                <div class="col-sm-6" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-6 col-form-label text-right"></label>

                                        <div class="col-sm-3 col-form-label">


                                        </div>
                                        <div class="col-sm-3">
                                            <a href="#" style="font-size: 1.2rem" class="client-add-btn btn-block btn btn-primary" id="add_customer"  aria-hidden="true" data-toggle="modal" data-target="#cust_info">Make Order</a>

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


