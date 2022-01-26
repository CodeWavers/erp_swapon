
<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/production.js.php" type="text/javascript"></script>
<style type="text/css">
    .form-control{
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
            <h1>Production</h1>
            <small>Production Mix </small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Production</a></li>
                <li class="active">Production Mix </li>
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
        <!--        <div class="row">-->
        <!--            <div class="col-sm-12">-->
        <!---->
        <!--                --><?php //if($this->permission1->method('manage_invoice','read')->access()){ ?>
        <!--                    <a href="--><?php //echo base_url('Cinvoice/manage_invoice') ?><!--" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> --><?php //echo display('manage_invoice') ?><!-- </a>-->
        <!--                --><?php //}?>
        <!--                --><?php //if($this->permission1->method('pos_invoice','create')->access()){ ?>
        <!--                    <a href="--><?php //echo base_url('Cinvoice/pos_invoice') ?><!--" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  --><?php //echo display('pos_invoice') ?><!-- </a>-->
        <!--                --><?php //}?>
        <!---->
        <!---->
        <!--            </div>-->
        <!--        </div>-->


        <!--Add Invoice -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Production Mix </h4>

                        </div>
                    </div>



                    <div class="rqsn_panel" >
                        <?php echo form_open_multipart('Cproduction/insert_mix',array('class' => 'form-vertical', 'id' => 'insert_rqsn'))?>
                        <div class="row">

                    <!--         <div class="col-sm-8" id="payment_from_2">
                                <div class="form-group row">
                                    <label for="customer_name_others" class="col-sm-3 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input  autofill="off" type="text"  size="100" name="customer_name_others" placeholder='<?php echo display('customer_name') ?>' id="customer_name_others" class="form-control" />
                                        <input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div  class="col-sm-3">
                                        <input  onClick="active_customer('payment_from_2')" type="button" id="myRadioButton_2" class="checkbox_account btn btn-success" name="customer_confirm_others" value="<?php echo display('old_customer') ?>">
                                    </div>
                                </div>



                            </div> -->
                            <div class="col-sm-8" id="payment_from">

                                <div class="form-group row">
                                    <label for="payment_type" class="col-sm-3 col-form-label">Products Name<i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input type="text" required name="product_name" onkeypress="invoice_productList(1)" id="product_name_1" class="form-control productSelection" placeholder="<?php echo display('product_name') ?>"   tabindex="5" value="{product_name}" >
<!-- 
                                        <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id" id="SchoolHiddenId"/> -->
                                        <input type="hidden" name="production_id" value="{production_id}">
                                    </div>

                                </div>


                            </div>

                            <!--                            <div class="col-sm-8" id="payment_from">-->
                            <!---->
                            <!--                                <div class="form-group row">-->
                            <!--                                    <label for="payment_type" class="col-sm-3 col-form-label">To<i class="text-danger">*</i></label>-->
                            <!--                                    <div class="col-sm-6">-->
                            <!--                                        <select name="to_id" class="form-control" required=""  tabindex="3">-->
                            <!---->
                            <!---->
                            <!--                                        </select>-->
                            <!---->
                            <!--                                     </div>-->
                            <!---->
                            <!--                                </div>-->
                            <!---->
                            <!---->
                            <!--                            </div>-->

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('date') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <?php

                                        $date = date('Y-m-d');
                                        ?>
                                        <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                                    </div>
                                </div>
                            </div>




                        </div>
                        <br>
                        <div class="table-responsive center">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                <tr>
                                    <th class="text-center " width="25%"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>

                                    <th class="text-center">Stock</th>
                                    <th class="text-center"><?php echo display('unit') ?></th>
                                    <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                    <!-- <th class="text-center"><?php echo "Rate" ?></th> -->
                                    <!-- <th class="text-center"><?php echo "Multiplier" ?></th> -->
                                    <!-- <th class="text-center"><?php echo "Price" ?></th> -->
                                    <th class="text-center"><?php echo "Total" ?></th>
                                    <th class="text-center"><?php echo display('action') ?></th>

                                </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                <tr>
                                    <td class="product_field">
                                        <input type="text" required name="item_name" onkeypress="invoice_itemList(1)" id="item_name_1" class="form-control itemSelection" placeholder="Item Name"   tabindex="5" value="{item_name}">

                                        <input type="hidden" class="autocomplete_item_value item_id_1" name="item_id[]" id="SchoolHiddenId"/>

                                        <input type="hidden" class="baseUrl" value="<?php echo base_url(); ?>" />
                                    </td>
                                    <td>
                                        <input name="stock[]" id="" class="form-control text-right stock_1 valid"  readonly="" aria-invalid="false" type="text" value="{available_quantity}">
                                    </td>

                                    <!-- <input name="multiplier[]" id="" class="form-control text-right multiplier_1 valid" value="0.00" readonly="" aria-invalid="false" type="hidden"> -->

                                    <td>
                                        <input name="unit[]" id="" class="form-control text-right unit_1 valid" value="{unit}" readonly="" aria-invalid="false" type="text">
                                    </td>
                                    <td>
                                        <input type="text" name="product_quantity[]" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="total_qntt_1 form-control text-right" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8"  value="{quantity}" />
                                    </td>

                                    <input type="hidden" name="multiplier[]" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="multiplier_1 form-control text-right" id="multiplier_1" placeholder="0.00" min="0" tabindex="8"  value="{multiplier}" />

                                    <input type="hidden" name="price[]" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="price_1 form-control text-right" id="price_1" placeholder="0.00" min="0" tabindex="8"  value="{price}" />
                                    <td>
                                        <input type="text" name="qty_price[]" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="qty_price form-control text-right" id="qty_price_1" placeholder="0.00" min="0" tabindex="8"  value="{qty_price}" />
                                    </td>


                                    <td>


                                        <button  class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-minus-circle'></i></button>

                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="text-right" colspan="4"><b><?php echo display('total') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="Total" class="text-right form-control" name="total" value="{total}" readonly="readonly" />
                                    </td>
                                    <td> <a id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');"  tabindex="11"><i class="fa fa-plus-circle"></i></a>
                                        <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b><?php echo "Additional Charge" ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="ad_charge" class="text-right form-control charge" onkeyup="quantity_calculate(1)" name="charge" placeholder="0.00" value="0.00" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b><?php echo "Labour Charge" ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="labour_charge" class="text-right form-control labor" onkeyup="quantity_calculate(1)" name="labor" placeholder="0.00" value="0.00" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b><?php echo display('grand_total') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="grandTotal" class="text-right form-control" name="grand_total" value="{grand_total}" readonly="readonly" />
                                    </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td colspan="4" rowspan="1">
                                        <center><label  for="details" class="  col-form-label text-center">Remark</label></center>
                                        <textarea name="inva_details" id="details" class="form-control" placeholder="Remark" ></textarea>
                                    </td>
                                    <td><a style="margin-top: 30%"  id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');"  tabindex="11"><i class="fa fa-plus-circle"></i></a></td>

                                </tr>


                                <tr>

                                </tfoot>
                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="insert_rqsn" class="btn btn-success" name="" value="<?php echo display('submit') ?>" tabindex="17"/>
                                <!-- <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another" > -->
                            </div>
                        </div>



                        <?php echo form_close()?>
                    </div>

                </div>
            </div>
            <!--            <div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal" aria-hidden="true">-->
            <!--                <div class="modal-dialog modal-sm">-->
            <!--                    <div class="modal-content">-->
            <!--                        <div class="modal-header">-->
            <!---->
            <!--                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            <!---->
            <!--                            <h4 class="modal-tit le" id="myModalLabel">--><?php //echo display('print') ?><!--</h4>-->
            <!--                        </div>-->
            <!--                        <div class="modal-body">-->
            <!--                            --><?php //echo form_open('Cinvoice/invoice_inserted_data_manual', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>
            <!--                            <div id="outputs" class="hide alert alert-danger"></div>-->
            <!--                            <h3> --><?php //echo display('successfully_inserted') ?><!--</h3>-->
            <!--                            <h4>--><?php //echo display('do_you_want_to_print') ?><!-- ??</h4>-->
            <!--                            <label class="ab">With Chalan </label>-->
            <!--                            <input type="checkbox"  name="chalan_value" value=''>-->
            <!---->
            <!---->
            <!--                            <input type="hidden" name="invoice_id" id="inv_id">-->
            <!--                        </div>-->
            <!--                        <div class="modal-footer">-->
            <!--                            <button type="button" onclick="cancelprint()" class="btn btn-default" data-dismiss="modal">--><?php //echo display('no') ?><!--</button>-->
            <!--                            <button type="submit" class="btn btn-primary" id="yes">--><?php //echo display('yes') ?><!--</button>-->
            <!--                            --><?php //echo form_close() ?>
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->


            <div class="modal fade modal-success" id="cust_info" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                            <h3 class="modal-title"><?php echo display('add_new_customer') ?></h3>
                        </div>

                        <div class="modal-body">
                            <div id="customeMessage" class="alert hide"></div>
                            <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>
                            <div class="panel-body">
                                <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                                <div class="form-group row">
                                    <label for="customer_id_two" class="col-sm-3 col-form-label">Customer ID <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name ="customer_id_two" id="" type="text" placeholder="Customer ID"  required="" tabindex="1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name ="customer_name" id="" type="text" placeholder="<?php echo display('customer_name') ?>"  required="" tabindex="1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label"><?php echo display('customer_email') ?></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name ="email" id="email" type="email" placeholder="<?php echo display('customer_email') ?>" tabindex="2">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-3 col-form-label"><?php echo display('customer_mobile') ?></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name ="mobile" id="mobile" type="number" placeholder="<?php echo display('customer_mobile') ?>" min="0" tabindex="3">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_id_two" class="col-sm-3 col-form-label">Contact Person</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name ="contact_person" id="" type="text" placeholder="Contact Person"  required="" tabindex="1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_id_two" class="col-sm-3 col-form-label">Contact Mobile</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name ="contact" id="" type="number" placeholder="Contact Mobile"  required="" tabindex="1">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address " class="col-sm-3 col-form-label"><?php echo display('customer_address') ?></label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="address" id="address " rows="3" placeholder="<?php echo display('customer_address') ?>" tabindex="4"></textarea>
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

        </div>
    </section>
</div>
<!-- Invoice Report End -->

<script type="text/javascript">
    $(document).ready(function(){




    });



    $("body").on("click",".remove_cheque",function(e){
        $(this).parents('.cheque').remove();
        //the above method will remove the user_data div
    });
</script>




</script>




