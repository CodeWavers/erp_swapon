<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/service_quotation.js.php"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/productquotation.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('quotation') ?></h1>
            <small><?php echo display('add_to_invoice'); ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('quotation') ?></a></li>
                <li class="active"><?php echo display('add_to_invoice') ?></li>
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
        $user_type = $this->session->userdata('user_type');
        $user_id = $this->session->userdata('user_id');
        ?>


        <!-- New category -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('add_to_invoice') ?> </h4>
                        </div>
                    </div>
                    <?php echo form_open('Cquotation/add_quotation_to_invoice', array('class' => 'form-vertical', 'id' => 'insert_quotation')) ?>
                    <div class="panel-body">
                        <div class="form-group row">
                            <input type="hidden" name="outlet_name" value="<?php echo $quot_main[0]['outlet_id'] ?>">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label"><?php echo display('customer') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-8">

                                    <input type="hidden" name="customer_id" value="<?php echo $customer_info[0]['customer_id'] ?>">
                                    <?php
                                    foreach ($customers as $customer) {
                                        ?>
                                        <?php if ($customer_info[0]['customer_id'] == $customer['customer_id']) { ?>
                                            <input class="form-control" type="text" value="<?= $customer['customer_name'] ?>" readonly>
                                        <?php  }
                                    } ?>


                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="quotation_no" class="col-sm-4 col-form-label"><?php echo display('quotation_no') ?> </label>
                                <div class="col-sm-8">
                                    <input type="text" name="quotation_no" id="quotation_no" class="form-control" placeholder="<?php echo display('quotation_no') ?>" value="<?php echo $quot_main[0]['quot_no']; ?>" readonly>
                                    <input type="hidden" name="quotation_id" id="quotation_id" class="form-control" value="<?php echo $quot_main[0]['quotation_id']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="address" class="col-sm-4 col-form-label"><?php echo display('address') ?> <i class="text-danger"></i></label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="form-control" value="<?php echo $customer_info[0]['customer_address']; ?>" id="address" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="qdate" class="col-sm-4 col-form-label"><?php echo display('quotation_date') ?> </label>
                                <div class="col-sm-8">
                                    <input type="text" name="qdate" class="form-control" id="qdate" value="<?php echo $quot_main[0]['quotdate']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('mobile') ?> <i class="text-danger"></i></label>
                                <div class="col-sm-8">
                                    <input type="text" name="mobile" class="form-control" value="<?php echo  $customer_info[0]['customer_mobile'] ?>" id="mobile" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="expiry_date" class="col-sm-4 col-form-label"><?php echo "Delivery Date" ?> </label>
                                <div class="col-sm-8">
                                    <input type="text" name="expiry_date" class="form-control" id="expiry_date" value="<?php echo $quot_main[0]['expire_date']; ?>" readonly>
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
                                        <option value="3">dell'Arte Logistics</option>

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
                                        <?php foreach ($branch_list as $courier) { ?>
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
                                        <?php foreach ($branch_list as $courier) { ?>
                                            <option value="<?php echo html_escape($courier['branch_id']) ?>"><?php echo html_escape($courier['branch_name']); ?>(<?php echo html_escape($courier['courier_name']); ?>)</option>
                                        <?php } ?>
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

                            </div>

                            <div class="form-group row" id="receiver_num_div" style="display: none;">
                                <label for="del_rec_num" class="col-sm-3 col-form-label">Receiver Number</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="del_rec_num" name="del_rec_num">
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="details" class="col-sm-2 col-form-label"><?php echo display('details') ?> <i class="text-danger"></i></label>
                                <div class="col-sm-10">
                                    <textarea name="details" class="form-control" id="details"><?php echo $quot_main[0]['quot_description']; ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                $amount = 0;
                                if (!empty($quot_product[0]['product_name'])) {
                                    ?>
                                    <div class="table-responsive margin-top10">
                                        <table class="table table-bordered table-hover" id="normalinvoice">
                                            <thead>
                                            <tr>
                                                <th class="text-center product_field"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>
                                                <!-- <th class="text-center"><?php echo display('item_description') ?></th> -->
                                                <!-- <th class="text-center"><?php echo display('serial_no') ?></th> -->
                                                <th class="text-center"><?php echo display('available_qnty') ?></th>
                                                <th class="text-center"><?php echo display('unit') ?></th>
                                                <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                                <th class="text-center"><?php echo display('rate') ?> <i class="text-danger">*</i></th>

                                                <?php if ($discount_type == 1) { ?>
                                                    <th class="text-center invoice_fields"><?php echo display('discount_percentage') ?> %</th>
                                                <?php } elseif ($discount_type == 2) { ?>
                                                    <th class="text-center invoice_fields"><?php echo display('discount') ?> </th>
                                                <?php } elseif ($discount_type == 3) { ?>
                                                    <th class="text-center invoice_fields"><?php echo display('fixed_dis') ?> </th>
                                                <?php } ?>

                                                <th class="text-center invoice_fields"><?php echo display('total') ?>
                                                </th>
                                                <th class="text-center"><?php echo display('action') ?></th>
                                            </tr>
                                            </thead>
                                            <tbody id="addinvoiceItem">
                                            <?php
                                            $sl = 1;
                                            $amount = 0;
                                            foreach ($quot_product as $item) {
                                                $available_quantity = $this->Rqsn->outlet_stock(null, $item['product_id'])['outlet_stock'];

                                                ?>
                                                <tr>
                                                    <td class="product_field">
                                                        <input type="text" name="product_name" onkeypress="invoice_productList(<?php echo $sl; ?>);" class="form-control productSelection" placeholder='<?php echo display('product_name') ?>' value="<?php echo $item['product_name'] . ' (' . $item['product_model'] . ')' . ' (' . $item['size_name'] . ')' . ' (' . $item['color_name'] . ')'; ?>" id="product_name_<?php echo $sl; ?>" tabindex="5">

                                                        <input type="hidden" class="autocomplete_hidden_value product_id_<?php echo $sl; ?>" value="<?php echo $item['product_id']; ?>" name="product_id[]" id="SchoolHiddenId" />

                                                        <input type="hidden" class="baseUrl" value="<?php echo base_url(); ?>" />
                                                    </td>

                                                    <td>
                                                        <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_<?php echo $sl; ?>" value="<?php echo $available_quantity; ?>" readonly="" />
                                                    </td>
                                                    <td>
                                                        <input name="" id="" class="form-control text-right unit_<?php echo $sl; ?> valid" value="<?php echo $item['unit']; ?>" readonly="" aria-invalid="false" type="text">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="product_quantity[]" onkeyup="quantity_calculate(<?php echo $sl; ?>);" onchange="quantity_calculate(<?php echo $sl; ?>);" class="total_qntt_1 form-control text-right" id="total_qntt_<?php echo $sl; ?>" placeholder="0.00" min="0" tabindex="8" value="<?php echo $item['used_qty']; ?>" />
                                                    </td>
                                                    <td class="invoice_fields">
                                                        <input type="text" name="product_rate[]" id="price_item_<?php echo $sl; ?>" class="price_item<?php echo $sl; ?> price_item form-control text-right" tabindex="9" onkeyup="quantity_calculate(<?php echo $sl; ?>);" onchange="quantity_calculate(<?php echo $sl; ?>);" value="<?php echo $item['rate']; ?>" placeholder="0.00" min="0" />
                                                        <input type="hidden" name="supplier_price[]" id="supplier_price_<?php echo $sl; ?>" value="<?php echo $item['supplier_rate']; ?>">
                                                    </td>
                                                    <!-- Discount -->
                                                    <td>
                                                        <input type="text" name="discount[]" onkeyup="quantity_calculate(<?php echo $sl; ?>);" onchange="quantity_calculate(<?php echo $sl; ?>);" id="discount_<?php echo $sl; ?>" class="form-control text-right" min="0" tabindex="10" placeholder="0.00" value="<?php echo $item['discount_per']; ?>" />
                                                        <input type="hidden" value="<?php echo $discount_type; ?>" name="discount_type" id="discount_type_<?php echo $sl; ?>">

                                                    </td>


                                                    <td class="invoice_fields">
                                                        <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_<?php echo $sl; ?>" value="<?php echo $item['total_price']; ?>" readonly="readonly" />
                                                    </td>

                                                    <td>
                                                        <button class='btn btn-danger' type='button' onclick='deleteRow(this)'><i class='fa fa-close'></i></button>
                                                        <!-- Tax calculate start-->
                                                        <?php $x = 0;
                                                        foreach ($taxes as $taxfldt) {
                                                            $tfield = 'tax' . $x;
                                                            ?>

                                                            <input id="total_tax<?php echo $x; ?>_<?php echo $sl; ?>" class="total_tax<?php echo $x; ?>_<?php echo $sl; ?>" type="hidden" value="<?php echo $item[$tfield]; ?>">
                                                            <input id="all_tax<?php echo $x; ?>_<?php echo $sl; ?>" class="total_tax<?php echo $x; ?>" value="<?php echo $itemtaxin[0][$tfield]; ?>" type="hidden" name="tax[]">

                                                            <!-- Tax calculate end-->

                                                            <!-- Discount calculate start-->

                                                            <?php $x++;
                                                        } ?>
                                                        <!-- Tax calculate end-->

                                                        <!-- Discount calculate start-->
                                                        <input type="hidden" id="total_discount_<?php echo $sl; ?>" class="" value="<?php echo $item['discount']; ?>" />
                                                        <input type="hidden" id="all_discount_<?php echo $sl; ?>" class="total_discount dppr" name="discount_amount[]" value="<?php echo $item['discount']; ?>" />
                                                        <!-- Discount calculate end -->


                                                    </td>
                                                </tr>
                                                <?php $sl++;
                                            } ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>

                                                <td class="text-right" colspan="6"><b><?php echo display('invoice_discount') ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="invoice_discount" class="form-control text-right total_discount" name="invoice_discount" placeholder="0.00" value="<?php echo $quot_main[0]['quot_dis_item']; ?>" tabindex="13" />
                                                    <input type="hidden" id="txfieldnum" value="<?php echo $taxnumber; ?>">
                                                </td>
                                                <td><a id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onClick="addInputField('addinvoiceItem');" tabindex="11"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="6"><b><?php echo display('total_discount') ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="<?php echo $quot_main[0]['item_total_dicount']; ?>" readonly="readonly" />
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-right" colspan="6"><b><?php echo display('shipping_cost') ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="shipping_cost" class="form-control text-right" name="shipping_cost" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" tabindex="14" />
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="6" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="<?php echo $quot_main[0]['item_total_amount']; ?>" readonly="readonly" />
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="6" class="text-right"><b><?php echo display('previous'); ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="previous" class="form-control text-right" name="previous" value="<?= $previous ?>" readonly="readonly" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right"><b><?php echo display('net_total'); ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="n_total" class="form-control text-right" name="n_total" value="0" readonly="readonly" placeholder="" />
                                                </td>
                                            </tr>
                                            <tr>

                                                <td class="text-right" colspan="6"><b><?php echo display('paid_ammount') ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                                    <input type="text" id="paidAmount" onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" placeholder="0.00" tabindex="15" value="" readonly />
                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="text-right" colspan="6"><b><?php echo display('due') ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly" />

                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="6" class="text-right"><b><?php echo display('change'); ?>:</b></td>
                                                <td class="text-right">
                                                    <input type="text" id="change" class="form-control text-right" name="change" value="0" readonly="readonly" placeholder="" />
                                                </td>
                                            </tr>





                                            </tfoot>
                                        </table>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h3>Advanced Payment</h3>
                                            <input type="hidden" id="count" value="2">
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <h3>Saved Payments</h3>
                                        <div class="row" style="margin: 10px 3px; padding:10px 0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Payment Type</th>
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
                                                                <input type="text" class="form-control text-right" name="pay_amount[]" id="amount_<?= $pay['amount'] ?>" value="<?php echo $pay['amount'] ?>" readonly>
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
                                                                <?php
                                                                foreach ($nagad_list as $nagad) { ?>
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

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">

                                <input type="submit" id="add-quotation" class="btn btn-success btn-large" name="add-quotation" value="<?php echo 'Add To Invoice'; ?>" />

                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/quotation.js"></script>