<!-- Product Purchase js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product_purchase.js.php"></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php"></script>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/purchase_po.js.php" type="text/javascript"></script>

<!-- Product Purchase js -->
<!-- <script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product_purchase.js.php" ></script> -->
<!-- Supplier Js -->
<!-- <script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script> -->

<!-- <script src="<?php echo base_url() ?>my-assets/js/admin_js/purchase.js.php" type="text/javascript"></script> -->
<style type="text/css">
    .form-control {
        padding: 6px 5px;
    }
</style>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Purchase</h1>
            <small>Add Purchase</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('purchase') ?></a></li>
                <li class="active">Add Purchase</li>
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
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('add_purchase') ?></h4>
                        </div>
                    </div>

                    <div class="panel-body">
                        <?php echo form_open_multipart('Cpurchase/save_purchase', array('class' => 'form-vertical', 'id' => 'insert_purchase', 'name' => 'insert_purchase')) ?>


                        <!-- <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('supplier') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                  <?php if ($this->permission1->method('add_supplier', 'create')->access()) { ?>
                                    <div class="col-sm-2" style="padding: 0px;">
                                        <a class="btn btn-success" style="margin: 0;" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('purchase_date') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="purchase_date" value="<?php echo $date; ?>" id="date" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('supplier') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Purchase Order No.</label>
                                    <div class="col-sm-8">
                                        <?php if ($po_list) { ?>
                                            <select class="form-control" id="pur_order_no" name="pur_order_no" onchange="get_purchase_details()">
                                                <option value="">Select PO</option>
                                                {po_list}
                                                <option value={rqsn_id}>{purchase_order_no}</option>
                                                {/po_list}
                                            </select>
                                        <?php } else { ?>
                                            <input class="form-control" type="text" value="No purchase to show" readonly>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <br>
                        <div id="cart_dt">
                            <h3 align="center">Select PO No. from dropdown to get order details.</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
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
                                                        <select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, 1)" tabindex="3">
                                                            <option value="1"><?php echo display('cash_payment') ?></option>
                                                            <!-- <option value="2">Cheque Payment</option> -->
                                                            <option value="4"><?php echo display('bank_payment') ?></option>
                                                            <option value="3">Bkash Payment</option>
                                                            <option value="5">Nagad Payment</option>
                                                            <option value="6">TT</option>
                                                            <option value="7">LC</option>

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

                                                <!-- <div class="col-sm-4" style="display: none" id="card_div_1">
                                                    <div class="form-group row">
                                                        <label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="card_id" class="form-control bankpayment" id="card_id_1">
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
                                                </div> -->

                                                <div class="col-sm-4" style="display: none" id="tt_div_1">
                                                    <div class="form-group row">
                                                        <label for="tt" class="col-sm-5 col-form-label">Bank/Cash <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="tt_id[]" class="form-control bankpayment" id="tt_id_1" onchange="change_tt(this.value, 1)">
                                                                <option value="">Select One</option>
                                                                <option value="1">Bank</option>
                                                                <option value="2">Cash</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="tt_bank_div_1" style="display: none">
                                                        <label for="tt_bank" class="col-sm-5 col-form-label"><?php
                                                                                                                echo display('bank');
                                                                                                                ?> <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <select name="tt_bank[]" class="form-control bankpayment" id="tt_bank_1">
                                                                <option value="">Select One</option>
                                                                <?php foreach ($bank_list as $bank) { ?>
                                                                    <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                            <input type="hidden" id="bank_list" value='<option value="">Select One</option>
                                                                            <?php foreach ($bank_list as $bank) { ?>
                                                                                <option value="<?php echo html_escape($bank['bank_id']) ?>"><?php echo html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')'; ?></option>
                                                                            <?php } ?>' />


                                                        </div>


                                                    </div>



                                                </div>

                                                <div class="col-sm-4" style="display:none" id="lc_div_1">
                                                    <div class="form-group row">
                                                        <label for="lc_1" class="col-sm-5 col-form-label">LC Number <i class="text-danger">*</i></label>
                                                        <div class="col-sm-7">
                                                            <input type="text" pattern="[a-zA-Z'-'\s]*" name="lc[]" class="form-control" id="lc_1">

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
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
                                                            <input type="file" name="image" class="form-control" id="image" tabindex="4">
                                                            <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
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

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="save" class="btn btn-success btn-large" name="save" value="Submit" />
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->

<script type="text/javascript">
    $(document).ready(function() {

        $(".add_row").click(function() {
            $(".addBill").append(" <div class='bill_div'><div class=\"col-sm-6\">\n" +
                "                                <div class=\"form-group row\">\n" +
                "                                    <label for=\"extra_pr\" class=\"col-sm-4 col-form-label\">Chalan/Bill No:</label>\n" +
                "                                    <div class=\"col-sm-8\">\n" +
                "                                        <input type=\"text\" autocomplete=\"off\" name=\"bill_no[]\"  id=\"product_name_1\" class=\"form-control productSelection\" placeholder=\"Bill No\" tabindex=\"5\">\n" +
                "\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"col-sm-4\">\n" +
                "                                <div class=\"form-group row\">\n" +
                "                                    <label for=\"extra_pr\" class=\"col-sm-4 col-form-label\">Bill Image:</label>\n" +
                "                                    <div class=\"col-sm-7\">\n" +
                "                                        <input type=\"file\" autocomplete=\"off\" name=\"c_b_img[]\"  id=\"c_b_img\" class=\"form-control\" ptabindex=\"5\">\n" +
                "\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "\n" +
                "\n" +
                "                            <div  class=\" col-sm-1\">\n" +
                "                                <a href=\"#\" id=\"remove_row\" class=\"client-add-btn btn btn-danger remove_row\" ><i class=\"fa fa-minus-circle m-r-2\"></i></a>\n" +
                "                            </div></div>");
        });


    });



    $("body").on("click", ".remove_row", function(e) {
        $(this).parents('.bill_div').remove();
        //the above method will remove the user_data div
    });


    function get_purchase_details() {

        var supp_val = $("#supplier_id");
        var po_id = $("#pur_order_no");
        if (supp_val.val() == ' ') {
            toastr.warning('Please select a supplier first.');
            return;
        }


        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var supp_id = $('#supplier_id').val();
        $.ajax({
            url: "<?php echo base_url(); ?>Cpurchase/get_purchase_details",
            method: 'POST',
            data: {
                po_id: po_id.val(),
                csrf_test_name: csrf_test_name,
                'supp_id': supp_id
            },
            success: function(data) {
                $('#cart_dt').html(data);
                calculate_store(1);
            }
        })

    }

    function add_pur_calc_store(sl) {

        var gr_tot = 0;
        var dis = 0;
        var discount = $("#discount_" + sl).val()
        var item_ctn_qty = $("#order_quantity_" + sl).val();
        var vendor_rate = $("#product_rate_" + sl).val();
        var currency_value = $("#currency_value_" + sl).val();

        var additional_cost = parseFloat($("#additional_cost_" + sl).val());

        if (!additional_cost) {
            additional_cost = 0;
        }

        if (!discount) {
            discount = 0;
        }

        // var bdt_price=currency_value*vendor_rate;
        //   $("#bdt_price_" + sl).val(bdt_price.toFixed(2));

        //console.log(currency_value);
        //console.log(bdt_price);

        var total_price = ((item_ctn_qty * vendor_rate) - ((item_ctn_qty * vendor_rate) * (discount / 100))) + additional_cost;
        $("#row_total_" + sl).val(total_price.toFixed(2));


        //Total Price
        $(".row_total").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });
        // $(".discount").each(function() {
        //    isNaN(this.value) || 0 == this.value.length || (dis += parseFloat(this.value))
        //});

        $("#grand_total").val(gr_tot.toFixed(2, 2));
        //var grandtotal = gr_tot;
        //$("#Total").val(grandtotal.toFixed(2,2));
        //invoice_paidamount();

        var supp_id = $("#supplier_drop_" + sl).val();
        var warr_date = $("#warrenty_date_" + sl).val();
        // var add_cost = $("#additional_cost_" + sl).val();
        var cb_no = $("#c_b_no" + sl).val();
        var id = $("#sl_id_" + sl).val();
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        // var data = {
        //     'id': id,
        //     'order_qty': item_ctn_qty,
        //     'rate': vendor_rate,
        //     'discount': discount,
        //     'add_cost': additional_cost,
        //     'supp_id': supp_id,
        //     'warr_date': warr_date,
        //     'cb_no': cb_no,
        //     'total' : total,
        //     'csrf_test_name':csrf_test_name
        // }

        // console.log(data);


    }

    $(document).on('click', '.remove_inventory', function() {
        var sl = $(this).attr("id");
        var row_id = $("#sl_id_" + sl).val();

        var csrf_test_name = $('[name="csrf_test_name"]').val();
        if (confirm("Are you sure you want to remove this?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>Cpurchase/remove_from_list",
                method: "POST",
                data: {
                    csrf_test_name: csrf_test_name,
                    row_id: row_id,
                },
                success: function(data) {
                    toastr.warning("Product removed from Purchase!");
                    get_purchase_details();
                }
            });
        } else {
            return false;
        }
    });

    function productList_with_cat_subcat(sl) {

        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var base_url = $("#base_url").val();


        var po_id = $("#pur_order_no").val();

        // Auto complete
        var options = {
            minLength: 0,
            source: function(request, response) {
                var product_name = $('#product_name_' + sl).val();
                $.ajax({
                    url: base_url + "Crqsn/autosearch",
                    method: 'post',
                    dataType: "json",
                    data: {
                        term: request.term,
                        product_name: product_name,
                        // cat_id: cat_id,
                        // subcat_id: subcat_id,
                        // brand_id: brand_id,
                        // mdoel_id: model_id,
                        csrf_test_name: csrf_test_name,

                    },
                    success: function(data) {
                        response(data);

                    }
                });
            },
            focus: function(event, ui) {
                $(this).val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value);
                $(this).val(ui.item.label);
                var id = ui.item.value;
                var base_url = $('.baseUrl').val();

                $.ajax({
                    type: "POST",
                    url: base_url + "Cpurchase/add_product",
                    data: {
                        product_id: id,
                        po_id: po_id,
                        csrf_test_name: csrf_test_name
                    },
                    cache: false,
                    success: function() {
                        toastr.success('Product Added.');
                        get_purchase_details();
                        $("#product_name_1").val('');
                    }
                });

                $(this).unbind("change");
                return false;
            }
        }

        $('body').on('keypress.autocomplete', '.productSelection', function() {
            $(this).autocomplete(options);
        });
    }
</script>