<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js.php" type="text/javascript"></script>

<!-- Edit Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_edit') ?></h1>
            <small><?php echo display('invoice_edit') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_edit') ?></li>
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
        <!-- Invoice report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('invoice_edit') ?></h4>
                        </div>
                    </div>
                    <?php echo form_open('Cinvoice/invoice_update', array('class' => 'form-vertical', 'id' => 'invoice_update')) ?>
                    <div class="panel-body">


                        <div class="row">
                            <div class="col-sm-6">
                                <?php if ($sale_type == 3) { ?>

                                    <div class="form-group row">
                                        <label for="customer_name" class="col-sm-4 col-form-label">Aggregator Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" size="100" name="" class=" form-control" placeholder='' id="" tabindex="1"  readonly value="<?= $agg_name?>" />

                                            <input id="agg_id" class=" " type="hidden" name="agg_id" value="{agg_id}">
                                        </div>
                                    </div>

                                <?php }else{ ?>
                                    <div class="form-group row">
                                        <label for="customer_name" class="col-sm-4 col-form-label">Customer Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" size="100" name="customer_name" class=" form-control" placeholder='Organization ID' id="customer_name" tabindex="1" onkeyup="customer_autocomplete()" value="{customer_name}" />

                                            <input id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id" value="{customer_id}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="customer_mobile_two" class="col-sm-4 col-form-label">Customer Mobile </label>
                                        <div class="col-sm-8">
                                            <input type="text" size="100" name="customer_mobile_two" class=" form-control" placeholder='Customer Mobile' id="customer_mobile_two" value="{customer_mobile_two}" />
                                        </div>
                                    </div>

                                <?php   } ?>

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-4 col-form-label">Sale Type <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" size="100" name="" class=" form-control"  id="" tabindex="1"  value="<?php if($invoice_all_data[0]['sale_type']==1){echo 'Whole Sale';}elseif($invoice_all_data[0]['sale_type']==2){echo 'Retail';}elseif($invoice_all_data[0]['sale_type']==3){echo 'Aggregators';} ?>"  readonly/>
                                        <input type="hidden" size="100" name="sel_type" class=" form-control"  id="sel_type" tabindex="1"  value="<?php echo $invoice_all_data[0]['sale_type']?>"  readonly/>
                                        <input type="hidden" size="100" name="deliver_type" class=" form-control"  id="deliver_type" tabindex="1"  value="<?php echo $deliver_type=$invoice_all_data[0]['delivery_type']?>"  readonly/>
                                        <input type="hidden" size="100" name="courier_condtion" class=" form-control"  id="courier_condtion" tabindex="1"  value="<?php echo $condition=$invoice_all_data[0]['courier_condtion']?>"  readonly/>
                                    </div>
                                </div>


                            </div>

                            <?php  if ($invoice_all_data[0]['sale_type']==1){?>
                                <div class="col-sm-6 commission_check " id="commission_check" >
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Commission<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <select name="commission_type" class="form-control bankpayment" id="commission_type" onchange="commision_add(this.value)">
                                                <option value="">Select Commission</option>
                                                <option value="1">Product Wise</option>
                                                <option value="2">Overall</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>

                            <?php } ?>

                            <?php  if ($deliver_type == 2){?>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="customer_name" class="col-sm-4 col-form-label">Courier Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <select name="courier_id" id="" class="form-control"  tabindex="3">
                                                <option value="<?php echo $courier_id?>" selected><?php echo $courier_name?></option>

                                                <?php foreach ($courier_list as $courier) { ?>
                                                    <option value="<?php echo html_escape($courier['id']) ?>"><?php echo html_escape($courier['courier_name']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="customer_name" class="col-sm-4 col-form-label">Branch Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <select name="branch_id" id="sel_type" class="form-control" onchange="sale_type(this.value)" tabindex="3">
                                                <option value="<?php echo $branch_id?>" selected><?php echo $branch_name?></option>
                                                <?php foreach ($branch_list as $b) { ?>
                                                    <option value="<?php echo html_escape($b['branch_id']) ?>"><?php echo html_escape($b['branch_name']); ?>(<?php echo html_escape($courier['courier_name']); ?>)</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label">Date<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="2" class="form-control datepicker" name="invoice_date" value="{date}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="bank_div">
                                <div class="form-group row">
                                    <label for="bank" class="col-sm-4 col-form-label"><?php
                                        echo display('bank');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">

                                        <input type="text" name="bank_id" class="form-control" id="bank_id" value="<?php echo html_escape($bank) ?>" placeholder="Bank">

                                    </div>
                                    <!--                                    <label for="bank" class="col-sm-4 col-form-label">Cheque NO:-->
                                    <!--                                        <i class="text-danger">*</i></label>-->
                                    <!--                                    <div class="col-sm-6">-->
                                    <!--                                        <input type="number"   name="cheque_no[]" class=" form-control" placeholder=""  autocomplete="off"/>-->
                                    <!--                                    </div>-->
                                    <!---->
                                    <!---->
                                    <!--                                    <label for="date" class="col-sm-4 col-form-label">Due Date <i class="text-danger">*</i></label>-->
                                    <!--                                    <div class="col-sm-6">-->
                                    <!---->
                                    <!--                                        <input class="datepicker form-control" type="text" size="50" name="cheque_date[]" id=""  value="" tabindex="4" autocomplete="off" />-->
                                    <!--                                    </div>-->
                                    <!--                                    <div  class=" col-sm-1">-->
                                    <!--                                        <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="ti-plus m-r-2"></i></a>-->
                                    <!--                                    </div>-->

                                </div>
                            </div>

                            <div class="col-sm-6" style="display: none" id="courier_div">
                                <div class="form-group row">
                                    <label for="bank" class="col-sm-4 col-form-label">Courier Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">

                                        <select name="courier_id" class="form-control bankpayment" id="">
                                            <option value="">Select Location</option>
                                            <?php foreach ($branch_list as $courier) { ?>
                                                <option value="<?php echo html_escape($courier['courier_id']) ?>" <?php if ($courier['courier_id'] == $courier_id) {echo 'selected'; } ?>><?php echo html_escape($courier['courier_name']); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <input type="hidden" id="editpayment_type" value="<?php echo $delivery_type; ?>" name="">

                                </div>

                            </div>



                            <div class="col-sm-6" style="display: none" id="bkash_div">
                                <div class="form-group row">
                                    <label for="bkash" class="col-sm-4 col-form-label">Bkash
                                        <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                        <select name="bkash_id" class="form-control bankpayment" id="bkash_id">
                                            <option value=""></option>
                                            <?php foreach ($bkash_list as $bkash) { ?>
                                                <option value="<?php echo html_escape($bkash['bkash_id']) ?>" <?php if ($bkash['bkash_id'] == $bkash_id) {
                                                    echo 'selected';
                                                } ?>>
                                                    <?php echo html_escape($bkash['bkash_no']) . ' (' . html_escape($bkash['ac_name']) . ')'; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" id="editpayment_type" value="<?php echo $paytype; ?>" name="">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                <tr>
                                    <th class="text-center " width="9%"><?php echo display('item_information ') ?> <i class="text-danger">*</i></th>
                                    <!-- <th class="text-center" width="9%">Warehouse</th>
                                        <th class="text-center"><?php echo display('available_qnty') ?></th> -->
                                    <th class="text-center"><?php echo display('unit') ?></th>
                                    <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                    <th class="text-center">Warrenty Date</th>
                                    <th class="text-center">Expiry Date</th>

                                    <th class="text-center"><?php echo display('rate') ?> <i class="text-danger">*</i></th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center"><?php echo display('total') ?></th>
                                    <th class="text-center"><?php echo display('action') ?></th>
                                </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                {invoice_all_data}
                                <tr>
                                    <td class="product_field">
                                        <input type="text" name="product_name" onkeypress="invoice_productList({sl});" value="{product_name}-({product_model})" class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>' id="product_name_{sl}" tabindex="3">

                                        <input type="hidden" class="product_id_{sl} autocomplete_hidden_value" name="product_id[]" value="{product_id}" id="SchoolHiddenId" />
                                    </td>


                                    <!-- <td class="invoice_fields">
                                    <select name="warehouse[]" style="width: 110px" id="warehouse_1" class="form-control text-right" required="" tabindex="1">
                                        <option value="{warehouse}">{warehouse}</option>
                                    </select>
                                </td> -->

                                    <!--                                         <td>-->
                                    <!--                                         <select class="form-control invoice_fields" id="serial_no_{sl}" name="serial_no[]" >-->
                                    <!---->
                                    <!--                                        <option value="{serial_no}">{serial_no}</option>-->
                                    <!--                                            </select>-->
                                    <!--                                        </td>-->
                                    <!-- <td>
                                     <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_{sl}" value="{stock_qty}" readonly="" />
                                 </td> -->
                                    <td>
                                        <input type="hidden" name="available_quantity[]" class="form-control text-right available_quantity_{sl}" value="{stock_qty}" readonly="" />
                                        <input type="text" name="unit[]" class="form-control text-right " readonly="" value="{unit}" />
                                    </td>
                                    <td>
                                        <input type="text" name="product_quantity[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{sum_quantity}" class="total_qntt_{sl} form-control text-right" id="total_qntt_{sl}" min="0" placeholder="0.00" tabindex="4" required="required" />
                                    </td>
                                    <td class="invoice_fields">

                                        <input type="date" style="width: 110px" id="warrenty_date" class="form-control warrenty_date_1" name="warrenty_date[]" value="{warrenty_date}" id="date" />
                                    </td>
                                    <?php
                                    $date = date('Y-m-d');

//                                    $total_amount='{rate}' * '{sum_quantity}';




                                    ?>
                                    <td class="invoice_fields">

                                        <input type="date" style="width: 110px" id="expiry_date" class="form-control  expiry_date_1" name="expiry_date[]" value="{expiry_date}" />
                                    </td>

                                    <td>
                                        <input type="text" name="product_rate[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{rate}" id="price_item_{sl}" class="price_item{sl} form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly />
                                    </td>
                                    <!-- Discount -->
                                    <td width="200" class="text-center">
                                        <input type="text" style="width: 120px; display:inline-block" name="discount[]" onkeyup="quantity_calculate({sl});" onchange="({sl});" id="discount_{sl}" class="form-control text-right " placeholder="0.00" value="{discount_per}" min="0" tabindex="6" />

                                        <input type="hidden" value="<?php echo $discount_type ?>" name="discount_type" id="discount_type_{sl}">
                                        <input class="comm_th form-control text-right d-none p-5" style="width: 120px ;" type="text" name="comm[]" id="comm_1" value="0" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);"  />

                                    </td>

                                    <td>
                                        <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_{sl}" value="{sum_amount}" readonly="readonly" />

                                        <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value="{invoice_details_id}" />
                                    </td>
                                    <td>

                                        <!-- Tax calculate start-->
                                        <?php $x = 0;
                                        foreach ($taxes as $taxfldt) { ?>
                                            <input id="total_tax<?php echo $x; ?>_{sl}" class="total_tax<?php echo $x; ?>_{sl}" value="{tax<?php echo $x; ?>}" type="hidden">
                                            <input id="all_tax<?php echo $x; ?>_{sl}" class="total_tax<?php echo $x; ?>" type="hidden" name="tax[]">
                                            <?php $x++;
                                        } ?>
                                        <!-- Tax calculate end-->
                                        <!-- Discount calculate start-->
                                        <input type="hidden" id="total_discount_{sl}" class="total_discount" value="{discount}" />

                                        <input type="hidden" id="all_discount_{sl}" class="" value="{discount}" name="discount_amount[]" />
                                        <!-- Discount calculate end -->

                                    </td>
                                </tr>
                                {/invoice_all_data}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" rowspan="2">
                                        <center><label sclass="text-center" for="details" class="  col-form-label"><?php echo display('invoice_details') ?></label></center>
                                        <textarea name="inva_details" class="form-control" placeholder="<?php echo display('invoice_details') ?>">{invoice_details}</textarea>
                                    </td>
                                    <td class="text-right" colspan="1"><b><?php echo display('invoice_discount') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="invoice_discount" class="form-control text-right total_discount" name="invoice_discount" placeholder="0.00" value="{invoice_discount}" />
                                        <input type="hidden" id="txfieldnum" value="<?php echo count($taxes); ?>">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="1"><b><?php echo display('total_discount') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="{total_discount}" readonly="readonly" />
                                    </td>
                                </tr>
                                <?php $x = 0;
                                foreach ($taxes as $taxfldt) { ?>
                                    <tr class="hideableRow hiddenRow">

                                        <td class="text-right" colspan="9"><b><?php echo html_escape($taxfldt['tax_name']) ?></b></td>
                                        <td class="text-right">
                                            <input id="total_tax_ammount<?php echo $x; ?>" tabindex="-1" class="form-control text-right valid totalTax" name="total_tax<?php echo $x; ?>" value="<?php $txval = 'tax' . $x;
                                            echo html_escape($taxvalu[0][$txval]) ?>" readonly="readonly" aria-invalid="false" type="text">
                                        </td>
                                    </tr>
                                    <?php $x++;
                                } ?>

                                <tr>
                                <tr hidden>
                                    <td class="text-right" colspan="7"><b><?php echo display('total_tax') ?>:</b></td>
                                    <td class="text-right">
                                        <input id="total_tax_amount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="{total_tax}" readonly="readonly" aria-invalid="false" type="text">
                                    </td>
                                    <td><button type="button" class="toggle btn-warning">
                                            <i class="fa fa-angle-double-down"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php  if ($deliver_type == 2){?>
                                    <tr>
                                        <td class="text-right" colspan="7"><b>Delivery Charge:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="shipping_cost" class="form-control text-right" name="shipping_cost" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" value="{shipping_cost}" />
                                        </td>
                                    </tr>
                                    <?php  if ($condition == 1 || 2){?>
                                        <tr id="condition_tr" class=" " >
                                            <td class="text-right" colspan="7"><b>Condition Charge:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="condition_cost" class="form-control text-right" name="condition_cost" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" value="{condition_cost}" tabindex="14" />
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                                <tr id="commission_tr" class=" ">
                                    <td class="text-right" colspan="7"><b>Commission:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="commission" class="form-control text-right" name="commission" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);"  value="{commission}"  />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="{total_amount}" readonly="readonly" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-right"><b><?php echo display('previous'); ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="previous" class="form-control text-right" name="previous" value="{prev_due}" readonly="readonly" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-right"><b><?php echo display('net_total'); ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="n_total" class="form-control text-right" name="n_total" value="{net_total}" readonly="readonly" placeholder="" />
                                    </td>
                                </tr>
                                <tr>

                                    <td class="text-right" colspan="7"><b><?php echo display('paid_ammount') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="paidAmount" onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" placeholder="0.00" tabindex="13" value="{paid_amount}" />
                                    </td>
                                </tr>
                                <tr>


                                    <td class="text-right" colspan="7">
                                        <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                        <input type="hidden" name="invoice_id" id="invoice_id" value="{invoice_id}" />
                                        <input type="hidden" name="invoice" id="invoice" value="{invoice}" />
                                        <b><?php echo display('due') ?>:</b>
                                    </td>
                                    <td class="text-right">
                                        <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="{due_amount}" readonly="readonly" />
                                    </td>
                                </tr>
                                <tr>


                                    <td class="text-right" colspan="7"><b><?php echo display('change') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="change" class="form-control text-right" name="change" value="0" readonly="readonly" />
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h3>Payment</h3>

                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <h3>Previous Payments</h3>
                                        <div class="row" style="margin: 10px 3px; padding:10px 0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Payment Type </th>
                                                        <th class="text-center">Account</th>
                                                        <th width="15%" class="text-center">Amount</th>
                                                        <!-- <th class="text-center">Action</th> -->
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($payment_info as $pay) { ?>
                                                        <tr>
                                                            <?php if ($pay['pay_type'] == 1) { ?>
                                                                <td class="text-center"><?php echo display('cash_payment') ?></td>
                                                            <?php } else if ($pay['pay_type'] == 2) { ?>
                                                                <td class="text-center">Cheque Payment</td>
                                                            <?php } else if ($pay['pay_type'] == 3) { ?>
                                                                <td class="text-center">Bkash Payment</td>
                                                            <?php } else if ($pay['pay_type'] == 4) { ?>
                                                                <td class="text-center"><?php echo display('bank_payment') ?></td>
                                                            <?php } else if ($pay['pay_type'] == 5) { ?>
                                                                <td class="text-center">Nagad Payment</td>
                                                            <?php } else if ($pay['pay_type'] == 6) { ?>
                                                                <td class="text-center">Card Payment</td>
                                                            <?php } ?>

                                                            <td class="text-center">
                                                                <?php echo $pay['account'] ?>
                                                                <input type="hidden" name="row_id[]" value="<?= $pay['id'] ?>">
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" class="form-control text-right" name="pay_amount[]" id=" amount_<?= $pay['amount'] ?>" value="<?= $pay['amount'] ?>" readonly>
                                                            </td>
                                                            <!-- <td class="text-center">
                                                                    <button type="button" onclick="delete_payment(this, <?php echo $pay['id'] ?>)" class="btn btn-danger btn-sm">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td> -->
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="alert alert-warning" style="background-color: #ffc75120; border-color:#ffc75120; color:black"><span><strong>Note:</strong> You have to add new payment every time you update.</span></div>



                                        <div id="pay_div" style="margin: 10px 3px; padding:10px 0">
                                            <div class="row margin-top10">
                                                <div class="col-sm-4">
                                                    <label for="payment_type" class="col-sm-5 col-form-label"><?php
                                                        echo display('payment_type');
                                                        ?> <i class="text-danger">*</i></label>
                                                    <div class="col-sm-7">
                                                        <select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, 1)" tabindex="3">
                                                            <option value="1"><?php echo display('cash_payment') ?></option>
                                                            <option value="2">Cheque Payment</option>
                                                            <option value="4"><?php echo display('bank_payment') ?></option>
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

                                                            <input type="text" name="bank_id[]" class="form-control" id="bank_id_1" placeholder="Bank">

                                                        </div>

                                                        <div class="col-sm-1">
                                                            <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="ti-plus m-r-2"></i></a>
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
                                                            <select name="card_id[]" class="form-control bankpayment" id="card_id_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($card_list as $card) { ?>
                                                                    <option value="<?php echo html_escape($card['card_id']) ?>"><?php echo html_escape($card['card_name']); ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="card_list" value='<option value="">Select One</option>
                                                            <?php foreach ($card_list as $card) { ?>
                                                                <option value="<?php echo html_escape($card['card_id']) ?>"><?php echo html_escape($card['card_name']); ?></option>
                                                            <?php } ?>'>

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
                                <div class="form-group row right">
                                    <div class="col-sm-6">
                                        <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="Save Changes" tabindex="17" />
                                        <!-- <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another" > -->
                                    </div>
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
                                                            <input type="file" name="image" class="form-control" id="image" tabindex="4">
                                                            <!-- <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                            ?>
                                                            <!--" autocomplete="off"/>-->
                                                        </div>


                                                        <div class=" col-sm-1">
                                                            <a href="#" id="Add_cheque" class="client-add-btn btn btn-primary add_cheque"><i class="fa fa-plus-circle m-r-2"></i></a>
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
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function delete_payment(e, id) {
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var base_url = '<?= base_url() ?>';
        $.ajax({
            url: base_url + 'Cinvoice/delete_payment_row',
            type: 'post',
            data: {
                id: id,
                csrf_test_name: csrf_test_name
            },
            success: function() {
                toastr.error('Payment removed.')
                e.closest('tr').remove();
            }
        });
    }
</script>
