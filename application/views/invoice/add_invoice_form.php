<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js.php" type="text/javascript"></script>
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
            <h1><?php echo display('new_invoice') ?></h1>
            <small><?php echo display('add_new_invoice') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('new_invoice') ?></li>
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

        <div class="modal fade modal-warning" id="add_receiver_modal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                        <h3 class="modal-title">Add New Receiver</h3>
                    </div>

                    <?php echo form_open('Cinvoice/add_receiver', array('class' => 'form-vertical', 'id' => 'add_receiver_form')) ?>
                    <div class="modal-body">
                        <div id="customeMessage_rec" class="alert hide"></div>
                        <div class="panel-body">
                            <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="form-group row">
                                <label for="receiver_name" class="col-sm-4 col-form-label">Receiver Name<i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="receiver_name" id="" type="text" placeholder="Receiver Name" required="" tabindex="1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="receiver_number" class="col-sm-4 col-form-label">Receiver Mobile No.<i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="receiver_number" id="receiver_number" type="text" placeholder="Mobile No." required="" tabindex="1">
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="modal-footer">

                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                    <?php echo form_close() ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!--Add Invoice -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('new_invoice');
                                $_SESSION['redirect_uri'] = 'Cinvoice';
                                ?></h4>

                        </div>
                    </div>



                    <div class="panel-body">
                        <?php echo form_open_multipart('Cinvoice/manual_sales_insert', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="outlet_name" class="col-sm-3 col-form-label">Outlet Name
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="outlet_name" id="outlet_name" class="form-control">
                                            <?php if ($outlet_list) { ?>
                                                {outlet_list}
                                                <option value="{outlet_id}">{outlet_name}</option>
                                                {/outlet_list}
                                            <?php } else { ?>
                                                {cw}
                                                <option value="{warehouse_id}">{central_warehouse}</option>
                                                {/cw}
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="outlet_name" class="col-sm-3 col-form-label">Sale Type
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6" style="margin-bottom: 10px;">

                                        <select name="sel_type" id="sel_type" class="form-control sel_type" onchange="sale_type(this.value)" tabindex="3">
                                            <option value="">Select One</option>
                                            <?php if ($this->permission1->method('whole_sale', 'create')->access() ) { ?>
                                            <option value="1">Whole Sale</option>
                                            <?php } ?>
                                            <?php if ($this->permission1->method('retail_sale', 'create')->access() ) { ?>
                                            <option value="2">Retail</option>
                                            <?php } ?>
                                            <?php if ($this->permission1->method('aggregator_sale', 'create')->access() ) { ?>
                                            <option value="3">Aggregators</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="aggregator" style="display: none">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="outlet_name" class="col-sm-3 col-form-label">Select Aggregators
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6" style="margin-bottom: 10px;">

                                        <select name="agg_id" id="aggregator" class="form-control"  >

                                            <?php if (!empty($aggre_list)){?>
                                                <option value="">Select One</option>
                                            {aggre_list}
                                            <option value="{id}">{aggre_name}</option>
                                            {/aggre_list}

                                           <?php }else { ?>
                                                <option value="" selected>No Aggregator Found</option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" >

                            <div id="whole_sale" class="whole_sale" style="display: none">

                            <div class="col-sm-8  customer_div" id="payment_from_1" >
                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">Customer Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input autocomplete="off"  type="text" size="100" name="customer_name" class=" form-control" placeholder='Customer Name' id="customer_name" tabindex="1" onkeyup="customer_autocomplete()" value="" />

                                        <input autocomplete="off" id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id" value="">
                                    </div>
                                    <?php if ($this->permission1->method('add_customer', 'create')->access()) { ?>
                                        <div class=" col-sm-3">
                                            <a href="#" class="client-add-btn btn btn-success" id="add_customer" onclick="add_customer()" aria-hidden="true" data-toggle="modal" data-target="#cust_info"><i class="ti-plus m-r-2"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>






                            </div>
                            <div class="col-sm-8" id="delivery_from">
                                <div class="form-group row">
                                    <label for="deliver_type" class="col-sm-3 col-form-label">Delivery Type <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="deliver_type" class="form-control" onchange="delivery_type(this.value)" tabindex="3">
                                            <option value="1">Pick Up</option>
                                            <option value="2">Courier</option>


                                        </select>

                                    </div>

                                </div>
                            </div>


                            <div class="col-sm-8" style="display:none;" id="courier_div">

                                <div class="form-group row">
                                    <label for="bank" class="col-sm-3 col-form-label">Courier Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">

                                        <select name="courier_id" class="form-control bankpayment" id="">
                                            <option value="">Select Location</option>
                                            <?php foreach ($courier_list as $courier) { ?>
                                                <option value="<?php echo html_escape($courier['courier_id']) ?>"><?php echo html_escape($courier['courier_name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="bank" class="col-sm-3 col-form-label">Branch<i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="branch_id" class="form-control bankpayment" id="">
                                            <option value="">Select Location</option>
                                            <?php foreach ($branch_list as $b) { ?>
                                                <option value="<?php echo html_escape($b['branch_id']) ?>"><?php echo html_escape($b['branch_name']); ?>(<?php echo html_escape($courier['courier_name']); ?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="bank" class="col-sm-3 col-form-label">Condition<i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="courier_condtion" class="form-control bankpayment" id="" onchange="condition_charge(this.value)">
                                            <option value="">Select Condition</option>
                                            <option value="1">Conditional</option>
                                            <option value="2">Partial</option>
                                            <option value="3">Unconditional</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="deli_receiver" class="col-sm-3 col-form-label">Receiver</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="deli_reciever" id="deli_receiver" placeholder="Select option" onchange="receiver_changed(this)">
                                            <option value="">Select Receiver</option>
                                            {receiver_list}
                                            <option value="{id}">{receiver_name}</option>
                                            {/receiver_list}
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-sm btn-success" id="add_rec_btn" aria-hidden="true" data-toggle="modal" data-target="#add_receiver_modal">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row" id="receiver_num_div" style="display: none;">
                                    <label for="del_rec_num" class="col-sm-3 col-form-label">Receiver Number</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="del_rec_num" name="del_rec_num">
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <?php

                                        $date = date('Y-m-d');
                                        ?>
                                        <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 commission_check d-none" id="commission_check" >
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label">Commission<i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="commission_type" class="form-control bankpayment" id="commission_type" onchange="commision_add(this.value)">
                                            <option value="">Select Commission</option>
                                            <option value="1">Product Wise</option>
                                            <option value="2">Overall</option>
                                        </select>

                                    </div>

                                </div>
                            </div>


                        </div>


                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center " width="9%"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>
                                        <th>Stock</th>
                                        <!-- <th class="text-center">Warehouse</th> -->
                                        <!-- <th class="text-center"><?php echo display('available_qnty') ?></th> -->
                                        <th class="text-center"><?php echo display('unit') ?></th>
                                        <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center">Warrenty Date </th>
                                        <th class="text-center">Expiry Date </th>

                                        <th class="text-center"><?php echo display('rate') ?> <i class="text-danger">*</i></th>
<!--                                        <th  class="text-center comm_th  d-none" >Commission</th>-->

                                        <?php if ($discount_type == 1) { ?>
                                            <th class="text-center invoice_fields"><?php echo display('discount_percentage') ?> % <span class="comm_th d-none">|Commission %</span></th>
                                        <?php } elseif ($discount_type == 2) { ?>
                                            <th class="text-center invoice_fields"><?php echo display('discount') ?> <span class="">|Commission %</span> </th>
                                        <?php } elseif ($discount_type == 3) { ?>
                                            <th class="text-center invoice_fields"><?php echo display('fixed_dis') ?> </th>
                                        <?php } ?>

                                        <th class="text-center invoice_fields"><?php echo display('total') ?>
                                        </th>
                                        <th class="text-center"><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                    <tr>
                                        <td class="product_field" >
                                            <input type="text" required name="product_name" onkeypress="invoice_productList(1)" id="product_name_1" class="form-control productSelection" placeholder="<?php echo display('product_name') ?>" tabindex="5">

                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId" />

                                            <input type="hidden" class="baseUrl" value="<?php echo base_url(); ?>" />
                                        </td>

                                        <td  width="100">
                                            <input type="text" id="stock_1" class="form-control" value="" readonly>
                                        </td>
                                        <!-- <td class="invoice_fields">
                                        <select name="warehouse[]" id="warehouse_1" class="form-control text-right" required="" tabindex="1">
                                            <option></option>
                                        </select>
                                    </td> -->

                                        <!-- <td>
                                        <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_1" value="0" readonly="" />
                                    </td> -->
                                        <td  width="100">
                                            <input type="hidden" name="available_quantity[]" class="form-control text-right available_quantity_1" value="0" readonly="" />
                                            <input name="" id="" class="form-control text-right unit_1 valid" value="None" readonly="" aria-invalid="false" type="text">
                                        </td>
                                        <td  width="100">
                                            <input type="text" name="product_quantity[]" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="total_qntt_1 form-control text-right" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8" value="1" />
                                        </td>
                                        <td class="invoice_fields"  width="100">
                                            <?php $date = date('Y-m-d'); ?>
                                            <input type="date" style="width: 110px" id="warrenty_date" class="form-control warrenty_date_1" name="warrenty_date[]" value="" />
                                        </td>
                                        <td class="invoice_fields"  width="100">
                                            <?php $date = date('Y-m-d'); ?>
                                            <input type="date" style="width: 110px" id="expiry_date" class="form-control expiry_date_1" name="expiry_date[]" value="" />
                                        </td>
                                        <td class="text-center"  width="200">
                                            <input style="width: 120px; display:inline-block" type="text" name="product_rate[]" id="price_item_1" class="price_item1 price_item form-control text-right" tabindex="9" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" min="0"  />
                                            <s id="purchase_price_1" class="purchase_price1 text-right" style="width: 100px ;"><?php echo '৳0.00'?></s>
                                        </td>
                                        <!-- Discount -->
                                        <td  width="200" class="text-center">

                                                    <input type="text" style="width: 120px; display:inline-block" name="discount[]" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="discount_1" class="form-control text-right" min="0" tabindex="10" placeholder="0.00" />
                                                    <input class="comm_th form-control text-right d-none p-5" style="width: 120px ;" type="text" name="comm[]" id="comm_1" value="0" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);"  />



                                        </td>


                                        <td class="invoice_fields"  width="100">
                                            <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                            <input type="hidden" value="" name="discount_type" id="discount_type_1">
                                        </td>

<!--                                        <td class="invoice_fields comm_th">-->
<!--                                        </td>-->

                                        <td  width="100">
                                            <!-- Tax calculate start-->
                                            <?php $x = 0;
                                            foreach ($taxes as $taxfldt) { ?>
                                                <input id="total_tax<?php echo $x; ?>_1" class="total_tax<?php echo $x; ?>_1" type="hidden">
                                                <input id="all_tax<?php echo $x; ?>_1" class="total_tax<?php echo $x; ?>" type="hidden" name="tax[]">

                                                <!-- Tax calculate end-->

                                                <!-- Discount calculate start-->

                                            <?php $x++;
                                            } ?>
                                            <!-- Tax calculate end-->

                                            <!-- Discount calculate start-->
                                            <input type="hidden" id="total_discount_1" class="total_discount" name="total_discount[]"/>
                                            <input type="hidden" id="all_discount_1" class="total_discount dppr" name="discount_amount[]" />
                                            <!-- Discount calculate end -->

                                            <button class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="6" rowspan="2">
                                            <center><label for="details" class="  col-form-label text-center"><?php echo display('invoice_details') ?></label></center>
                                            <textarea name="inva_details" id="details" class="form-control" placeholder="<?php echo display('invoice_details') ?>" tabindex="12"></textarea>
                                        </td>
                                        <td class="text-right" colspan="2"><b><?php echo display('invoice_discount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="invoice_discount" class="form-control text-right total_discount" name="invoice_discount" placeholder="0.00" tabindex="13" />
                                            <input type="hidden" id="txfieldnum">
                                        </td>
                                        <td><a id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onClick="addInputField('addinvoiceItem');" tabindex="11"><i class="fa fa-plus"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="2"><b>Sale Discount(%):</b></td>
                                        <td class="text-right">
                                            <input type="number" id="perc_discount" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="form-control text-right" name="perc_discount" value="0.00" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="8"><b><?php echo display('total_discount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="0.00" readonly="readonly" />
                                        </td>
                                    </tr>

                                    <?php $x = 0;
                                    foreach ($taxes as $taxfldt) { ?>
                                        <tr class="hideableRow hiddenRow">

                                            <td class="text-right" colspan="8"><b><?php echo html_escape($taxfldt['tax_name']) ?></b></td>
                                            <td class="text-right">
                                                <input id="total_tax_ammount<?php echo $x; ?>" tabindex="-1" class="form-control text-right valid totalTax" name="total_tax<?php echo $x; ?>" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                            </td>



                                        </tr>
                                    <?php $x++;
                                    } ?>

                                    <tr>
                                    <tr hidden>
                                        <td class="text-right" colspan="8"><b><?php echo display('total_tax') ?>:</b></td>
                                        <td class="text-right">
                                            <input id="total_tax_amount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                        </td>
                                        <td><button type="button" class="toggle btn-warning">
                                                <i class="fa fa-angle-double-down"></i>
                                            </button></td>
                                    </tr>

                                    <tr>
                                        <td class="text-right" colspan="8"><b>Delivery Charge:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="shipping_cost" class="form-control text-right" name="shipping_cost" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" value="0.00" tabindex="14" />
                                        </td>
                                    </tr>

                                    <tr id="condition_tr" class=" d-none" hidden>
                                        <td class="text-right" colspan="8"><b>Condition Charge:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="condition_cost" class="form-control text-right" name="condition_cost" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" value="0.00" tabindex="14" />
                                        </td>
                                    </tr>

                                    <tr id="commission_tr" class=" d-none">
                                        <td class="text-right" colspan="8"><b>Commission:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="commission" class="form-control text-right" name="commission" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);"  value="0.00"  />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="8" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="text-right"><b><?php echo display('previous'); ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="previous" class="form-control text-right" name="previous" value="0.00" readonly="readonly" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="text-right"><b><?php echo display('net_total'); ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="n_total" class="form-control text-right" name="n_total" value="0" readonly="readonly" placeholder="" />
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="8"><b><?php echo display('paid_ammount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                            <input type="text" id="paidAmount" onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" placeholder="0.00" tabindex="15" value="" readonly />
                                        </td>
                                    </tr>
                                    <tr>


                                        <td class="text-right" colspan="8"><b><?php echo display('due') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly" />

                                        </td>
                                    </tr>
                                    <tr>

                                        <td colspan="8" class="text-right"><b><?php echo display('change'); ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="change" class="form-control text-right" name="change" value="0" readonly="readonly" placeholder="" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row " >
                            <div class="col-sm-12" id="payment_div">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h3>Payment</h3>
                                            <input type="hidden" id="count" value="2">
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div id="pay_div" style="margin: 10px 3px; padding:10px 0">
                                            <div class="row margin-top10">
                                                <div class="col-sm-4">
                                                    <label for="payment_type" class="col-sm-5 col-form-label"><?php
                                                                                                                echo display('payment_type');
                                                                                                                ?> <i class="text-danger">*</i></label>
                                                    <div class="col-sm-7">
                                                        <select name="paytype[]" class="form-control pay_type" required="" onchange="bank_paymet(this.value, 1)" tabindex="3">
                                                            <option value="1"><?php echo display('cash_payment') ?></option>
<!--                                                            <option value="2"><span class="d-none">Cheque Payment</span></option>-->
<!--                                                            <option value="4">--><?php //echo display('bank_payment') ?><!--</option>-->
                                                            <option value="3">Bkash Payment</option>
                                                            <option value="5">Nagad Payment</option>
                                                            <option value="6">Card Payment</option>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-sm-4" id="bank_div_1" style="display:none;">
                                                    <div class="form-group row">
                                                        <label for="bank" class="col-sm-3 col-form-label"><?php
                                                                                                            echo display('bank');
                                                                                                            ?> <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">

                                                            <input type="text" name="bank_id" class="form-control" id="bank_id_1" placeholder="Bank">

                                                        </div>

                                                        <div class="col-sm-1">
                                                            <a href="#" class="client-add-btn btn btn-sm btn-info" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="fa fa-file m-r-2"></i></a>
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="col-sm-4" id="bank_div_m_1" style="display:none;">
                                                    <div class="form-group row">
                                                        <label for="bank" class="col-sm-5 col-form-label"><?php
                                                                                                            echo display('bank');
                                                                                                            ?> <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="bank_id_m[]" class="form-control bankpayment" id="bank_id_m_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($bank_list as $bank) { ?>
                                                                    <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="bank_list" value='<option value="">Select One</option>
                                            <?php foreach ($bank_list as $bank) { ?>
                                                <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                            <?php } ?>'>


                                                        </div>


                                                    </div>
                                                </div>



                                                <div class="col-sm-4" style="display: none" id="bkash_div_1">

                                                    <div class="form-group row">
                                                        <label for="bkash" class="col-sm-5 col-form-label">Bkash Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="bkash_id[]" class="form-control bankpayment" id="bkash_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($bkash_list as $bkash) { ?>
                                                                    <option value="<?php echo html_escape($bkash['bkash_id']) ?>"><?php echo html_escape($bkash['bkash_no']); ?> (<?php echo html_escape($bkash['ac_name']); ?>)</option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" id="bkash_list" value='<option value="">Select One</option>
                                            <?php foreach ($bkash_list as $bkash) { ?>
                                                <option value="<?php echo html_escape($bkash['bkash_id']) ?>"><?php echo html_escape($bkash['bkash_no']); ?> (<?php echo html_escape($bkash['ac_name']); ?>)</option>
                                            <?php } ?>'>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-sm-4" style="display: none" id="nagad_div_1">
                                                    <div class="form-group row">
                                                        <label for="nagad" class="col-sm-5 col-form-label">Nagad Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="nagad_id[]" class="form-control bankpayment" id="nagad_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($nagad_list as $nagad) { ?>
                                                                    <option value="<?php echo html_escape($nagad['nagad_id']) ?>"><?php echo html_escape($nagad['nagad_no']); ?> (<?php echo html_escape($nagad['ac_name']); ?>)</option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="nagad_list" value='<option value="">Select One</option>
                                            <?php foreach ($nagad_list as $nagad) { ?>
                                                <option value="<?php echo html_escape($nagad['nagad_id']) ?>"><?php echo html_escape($nagad['nagad_no']); ?> (<?php echo html_escape($nagad['ac_name']); ?>)</option>
                                            <?php } ?>'>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-sm-4" style="display: none" id="card_div_1">
                                                    <div class="form-group row">
                                                        <label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="card_id[]" class="form-control bankpayment" id="card_id_1" onchange="">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($card_list as $card) { ?>
                                                                    <option value="<?php echo html_escape($card['card_no_id']) ?>"><?php echo html_escape($card['card_no'] . ' (' . $card['card_name'] . ')'); ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="card_list" value='<option value="">Select One</option>
                                                            <?php foreach ($card_list as $card) { ?>
                                                                <option value="<?php echo html_escape($card['card_no_id']) ?>"><?php echo html_escape($card['card_no'] . ' (' . $card['card_name'] . ')'); ?></option>
                                                            <?php } ?>'>

                                                        </div>


                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="cus_card" class="col-sm-5 col-form-label">Customer Card No.</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="cus_card" name="cus_card">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3" id="ammnt_1">
                                                    <label for="p_amount" class="col-sm-5 col-form-label"> Amount <i class="text-danger">*</i></label>
                                                    <div class="col-sm-7">
                                                        <input class="form-control p_amount" type="text" name="p_amount[]" onchange="calc_paid()" onkeyup="calc_paid()">
                                                    </div>


                                                </div>
                                                <div class="col-sm-1">
                                                    <a id="add_pt_btn" onclick="add_pay_row(1)" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="<?php echo display('submit') ?>" tabindex="17" />
                                    <!-- <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another" > -->
                                </div>
                            </div>

                            <div class="modal fade modal-success" id="cheque_info" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                                            <h3 class="modal-title">Add Cheque</h3>
                                        </div>

                                        <div class="modal-body">
                                            <div id="customeMessage" class="alert hide"></div>

                                            <div class="panel-body">
                                                <div class="addCheque">
                                                    <div id="cheque" class="cheque">
                                                        <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                        <label for="bank" class="col-sm-4 col-form-label">Cheque type:
                                                            <i class="text-danger">*</i></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="cheque_type[]" class=" form-control" placeholder="" autocomplete="off" />
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>

                                                        <label for="bank" class="col-sm-4 col-form-label">Cheque NO:
                                                            <i class="text-danger">*</i></label>
                                                        <div class="col-sm-6">
                                                            <input type="number" name="cheque_no[]" class=" form-control" placeholder="" autocomplete="off" />
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>


                                                        <label for="date" class="col-sm-4 col-form-label">Due Date <i class="text-danger">*</i></label>
                                                        <div class="col-sm-6">

                                                            <input class="form-control" type="date" size="50" name="cheque_date[]" id="" value="" tabindex="4" autocomplete="off" placeholder="mm/dd/yyyy" />
                                                        </div>

                                                        <label for="bank" class="col-sm-4 col-form-label">Amount:
                                                            <i class="text-danger">*</i></label>

                                                        <div class="col-sm-6">
                                                            <input type="number" name="amount[]" class=" form-control" placeholder="" autocomplete="off" />
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>

                                                        <label for="bank" class="col-sm-4 col-form-label">Image:
                                                            <i class="text-danger">*</i></label>

                                                        <div class="col-sm-6" style="padding-bottom:10px ">
                                                            <input type="file" name="image[]" class="form-control" id="image" tabindex="4">
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>




                                                        <div class=" col-sm-1">
                                                            <a href="javascript:" id="Add_cheque" class="client-add-btn btn btn-primary add_cheque"><i class="fa fa-plus-circle m-r-2"></i></a>
                                                        </div>


                                                    </div>
                                                </div>

                                                <!---->

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>


                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


                        </div>


                        <?php echo form_close() ?>
                    </div>
                </div>
                <div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal" aria-hidden="true" >
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <h4 class="modal-tit le" id="myModalLabel"><?php echo display('print') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('Cinvoice/invoice_inserted_data_manual', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>
                                <div id="outputs" class="hide alert alert-danger"></div>
                                <h3> <?php echo display('successfully_inserted') ?></h3>
                                <h4><?php echo display('do_you_want_to_print') ?> ??</h4>
                                <!-- <label class="ab">With Chalan </label>
                                <input type="checkbox" name="chalan_value" value=''> -->


                                <input type="hidden" name="invoice_id" id="inv_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="cancelprint()" class="btn btn-default" data-dismiss="modal"><?php echo display('no') ?></button>
                                <button type="submit" class="btn btn-primary" id="yes"><?php echo display('yes') ?></button>

                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>


                <div class="modal fade modal-success" id="cust_info" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <a href="#" class="close" data-dismiss="modal">&times;</a>
                                <h3 class="modal-title"><?php echo display('add_new_customer') ?></h3>
                            </div>

                            <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => '')) ?>
                            <div class="modal-body">
                                <div id="customeMessage" class="alert hide"></div>
                                <div class="panel-body">
                                    <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">
<!--                                    <div class="form-group row">-->
<!--                                        <label for="customer_id_two" class="col-sm-3 col-form-label">Customer ID <i class="text-danger">*</i></label>-->
<!--                                        <div class="col-sm-6">-->
<!--                                            <input class="form-control" name="customer_id_two" id="" type="text" placeholder="Customer ID" required="" tabindex="1">-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="form-group row">
                                        <label for="customer_name" class="col-sm-3 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="customer_name" id="m_customer_name" type="text" placeholder="<?php echo display('customer_name') ?>" required="" tabindex="1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label"><?php echo display('customer_email') ?></label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="<?php echo display('customer_email') ?>" tabindex="2">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label"><?php echo display('customer_mobile') ?></label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="mobile" id="mobile" type="number" placeholder="<?php echo display('customer_mobile') ?>" min="0" tabindex="3">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="customer_id_two" class="col-sm-3 col-form-label">Contact Person</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="contact_person" id="" type="text" placeholder="Contact Person" tabindex="1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="customer_id_two" class="col-sm-3 col-form-label">Contact Mobile</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="contact" id="" type="number" placeholder="Contact Mobile" tabindex="1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address " class="col-sm-3 col-form-label"><?php echo display('customer_address') ?></label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="address" id="address " rows="3" placeholder="<?php echo display('customer_address') ?>" tabindex="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="website" class="col-sm-3 col-form-label">Customer Type</label>
                                        <div class="col-sm-6">

                                            <select name="cus_type" class="form-control" tabindex="3">
                                                <option value="1">WholeSale Customer</option>
                                                <option value="2">Retail Customer</option>

                                            </select>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">

                                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                            <?php echo form_close() ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- Receiver add Modal start-->

                <!-- Receiver add Modal end-->

            </div>
    </section>
</div>
<!-- Invoice Report End -->

<script type="text/javascript">
    $(document).ready(function() {

        $(".add_cheque").click(function() {
            $(".addCheque").append(" <div id=\"cheque\" class=\"cheque\">\n" +
                "                                            <input type =\"hidden\" name=\"csrf_test_name\" id=\"\" value=\"<?php echo $this->security->get_csrf_hash(); ?>\">\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Cheque type:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "                                                <input type=\"text\"   name=\"cheque_type[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();
                                                                                                                                                                    ?>//\" autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Cheque NO:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "                                                <input type=\"number\"   name=\"cheque_no[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();
                                                                                                                                                                    ?>//\" autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +

                "\n" +
                "\n" +
                "                                            <label for=\"date\" class=\"col-sm-4 col-form-label\">Due Date <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "\n" +
                "                                                <input class=\"datepicker form-control\" type=\"date\" size=\"50\" name=\"cheque_date[]\" id=\"\"  value=\"\" tabindex=\"4\" autocomplete=\"off\" />\n" +
                "                                            </div>\n" +
                "\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Amount:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\"  >\n" +
                "                                                <input type=\"number\"   name=\"amount[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Image:\n" +
                "                                                </label>\n" +
                "                                            <div class=\"col-sm-6\" style=\"padding-bottom:10px \" >\n" +
                "                                                <input type=\"file\"   name=\"image[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "\n" +
                "\n" +
                "                                            <div  class=\" col-sm-1\">\n" +
                "                                                <a href=\"javascript:\" id=\"Remove_Cheque\"  class=\"client-add-btn btn btn-danger remove_cheque\" ><i class=\"fa fa-minus-circle m-r-2\"></i></a>\n" +
                "                                            </div>\n" +
                "                                            </div>");
        });


    });



    $("body").on("click", ".remove_cheque", function(e) {
        $(this).parents('.cheque').remove();
        //the above method will remove the user_data div
    });


</script>
