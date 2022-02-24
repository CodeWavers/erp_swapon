
<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/rqsn.js.php" type="text/javascript"></script>
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
            <h1>Order Details</h1>
            <small>Order Details</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Order Details</a></li>
                <li class="active">Order Details</li>
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
                            <h4>Order Details</h4>

                        </div>
                    </div>



                    <div class="panel">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-offset-3 col-lg-3">
                                    <label for="update_payment_status&quot;&quot;">Payment Status</label>
                                    <select class="form-control demo-select2 select2-hidden-accessible" data-minimum-results-for-search="Infinity" id="update_payment_status" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $order[0]->payment_status?>" selected ><?php echo $order[0]->payment_status?></option>
                                        <option value="paid" >Paid</option>
                                        <option value="partial">Partial</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
<!--                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 370.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-update_payment_status-container"><span class="select2-selection__rendered" id="select2-update_payment_status-container" title="Paid">Paid</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                                </div>
                                <div class="col-lg-3">
                                    <label for="update_delivery_status&quot;&quot;">Delivery Status</label>
                                    <select class="form-control demo-select2 select2-hidden-accessible" data-minimum-results-for-search="Infinity" id="update_delivery_status" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $order[0]->delivery_status?>" selected ><?php echo $order[0]->delivery_status?></option>

                                        <option value="pending">pending</option>
                                        <option value="Order Confirmed">Order Confirmed</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Delivered" >Delivered</option>
                                        <option value="Returned">Returned</option>
                                        <option value="Hold">Hold</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
<!--                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 370.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-update_delivery_status-container"><span class="select2-selection__rendered" id="select2-update_delivery_status-container" title="Delivered">Delivered</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                                </div>
                                <div class="col-lg-3 pt-3">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#paymentForm">Make Payment</a>
                                </div>
                            </div>
                            <hr>
                            <div class="invoice-bill row">
                                <div class="col-sm-6 text-xs-center">
                                    <address>

                                        <strong class="text-main"><?php echo $customer_name?></strong><br>
                                        <?php echo $email?><br>
                                        <?php echo $phone?><br>
                                        <?php echo $address.','.$thana.','.$division.','.$district.','.$country?><br>

                                    </address>
                                    <button class="btn btn-danger" onclick="update_address()">Edit Address</button>
                                </div>
                                <div class="col-sm-6 text-xs-center">
                                    <table class="invoice-details">
                                        <tbody>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Order #
                                            </td>
                                            <td class="text-right text-info text-bold">
                                               <?php echo $order[0]->code?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Order Status
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-info"><?php echo $order[0]->delivery_status?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Order Date
                                            </td>
                                            <td class="text-right">
                                                <?php echo  date('m/d/Y H:i:s',$order[0]->date)?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Total amount
                                            </td>
                                            <td class="text-right">
                                                <?php echo $currency.' '.$order[0]->grand_total?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Payment method
                                            </td>
                                            <td class="text-right">
                                                <?php echo $order[0]->payment_type ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Shipping method
                                            </td>
                                            <td class="text-right">

                                                <?php echo $order[0]->shipping_method?> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="new-section-sm bord-no">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered invoice-summary">
                                        <thead>
                                        <tr class="bg-trans-dark">
                                            <th class="min-col">#</th>
                                            <th width="10%">
                                                Photo
                                            </th>
                                            <th class="text-uppercase">
                                                Description
                                            </th>
                                            <th class="text-uppercase">
                                                Delivery Type
                                            </th>
                                            <th class="min-col text-center text-uppercase">
                                                Qty
                                            </th>
                                            <th class="min-col text-center text-uppercase">
                                                Price
                                            </th>
                                            <th class="min-col text-right text-uppercase">
                                                Total
                                            </th>
                                            <th class="min-col text-right text-uppercase">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <?php foreach ($order as $od) {?>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <a href="https://dev.swaponsworld.com/product/<?php echo $od->slug?>" target="_blank"><img height="50" src="https://dev.swaponsworld.com/public/<?php echo $od->thumbnail_img?>"></a>
                                            </td>
                                            <td>
                                                <strong><a href="https://dev.swaponsworld.com/product/<?php echo $od->slug?>" target="_blank"><?php echo $od->name?></a></strong>
                                                <small><?php echo $od->variation?></small>
                                            </td>
                                            <td>
                                            </td>
                                            <td class="text-center">
                                                <input type="number" value="<?php echo $od->quantity?>" onchange="qtyUpdate(<?php echo $od->id?>)" id="order434">

                                            </td>
                                            <td class="text-center">
                                                <?php echo $currency.' '.$od->price/$od->quantity?>
                                                <s style="font-size:11px"><?php echo $currency.' '.$od->unit_price?></s>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $currency.' '.$od->price?>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-danger item_remove" data-id="<?php echo $od->id?>">Remove</button>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>

                                    <center><button class="btn btn-primary add_item" data-toggle="modal" data-target="#add_product">Add Item+</button></center>


                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="https://dev.swaponsworld.com/admin/amount-update/359" method="post">
                                        <input type="hidden" name="_token" value="Hk9jJQWcjdJHasykJ1FfsoFUksB5LLRY9YNhcGGU">                                <div class="form-group">
                                            <label for="sc">Shipping Cost</label>
                                            <input type="number" class="form-control" step="0.1" name="shipping_cost" placeholder="Add Shipping Charge" value="<?php echo $order[0]->shipping_cost?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="sc">Coupon</label>
                                            <input type="text" class="form-control" name="coupon" placeholder="Add Coupon Code" value="<?php echo $order[0]->admin_coupon?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="sc">Discount Amount</label>
                                            <input type="number" class="form-control" step="0.1" name="discount_charge" placeholder="Add Discount Amount" value="<?php echo $order[0]->flat_discount?>">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <table class="table invoice-total">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Sub Total :</strong>
                                                </td>
                                                <td>
                                                    <?php echo array_sum(array_column($order,'price'))?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Cost</th>

                                                <td class="currency"> <?php echo $currency.' '.$order[0]->shipping_cost?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Tax :</strong>
                                                </td>
                                                <td>
                                                    <?php echo $currency.' '.$order[0]->tax?>
                                                </td>
                                            </tr>




                                            <tr>
                                                <th>Coupon Discount</th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->coupon_discount?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Admin Coupon Discount </th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->admin_coupon_discount?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Flat Discount</th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->flat_discount?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Grand Total</th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->grand_total?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <strong>Paid Total :</strong>
                                                </td>
                                                <td>

                                                        <?php if (substr($order[0]->payment_details,0,1=='{')) {

                                                            $data = json_decode($order[0]->payment_details);
                                                            if($data){
                                                                (int) $paidtotal= $data->amount;
                                                            }
                                                            else {
                                                                (int) $paidtotal= 0;
                                                            }

                                                        }else {

                                                            //API likte hobe
                                                            (int) $paidtotal= 0;


                                                         }

                                                         echo $paidtotal;
                                                         ?>






                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>TOTAL DUE :</strong>
                                                </td>
                                                <td class="text-bold h4">
                                                    <?php echo $currency.' '.($order[0]->grand_total-$paidtotal)?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right no-print">
                                <a href="https://dev.swaponsworld.com/admin/invoice/admin/359" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></a>
                            </div>
                            <div class="col-12">
                                <h3>All Transactions</h3>
                                <table class="table table-bordered table-hover">
                                    <tbody><tr>
                                        <th>Id</th>
                                        <th>Payment From</th>
                                        <th>Amount</th>
                                        <th>Charge</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                    </tbody></table>
                            </div>

                            <div class="col-12">
                                <h3>Change Logs</h3>

                                <table class="table table-bordered table-hover">
                                    <tbody><tr>

                                        <th>Status</th>
                                        <th>User</th>
                                        <th>Note</th>
                                        <th>Date</th>

                                    </tr>
                                    <tr>
                                        <td>Delivered</td>
                                        <td>Swapons World</td>
                                        <td>Delivered</td>
                                        <td>2022-02-23 03:00:50</td>


                                    </tr>
                                    </tbody></table>
                            </div>


                        </div>
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

        $(".add_cheque").click(function(){
            $(".addCheque").append(" <div id=\"cheque\" class=\"cheque\">\n" +
                "                                            <input type =\"hidden\" name=\"csrf_test_name\" id=\"\" value=\"<?php echo $this->security->get_csrf_hash();?>\">\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Cheque type:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "                                                <input type=\"text\"   name=\"cheque_type[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();?>//\" autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Cheque NO:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "                                                <input type=\"number\"   name=\"cheque_no[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();?>//\" autocomplete=\"off\"/>\n" +
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
                "                                            <div class=\"col-sm-6\" style=\"padding-bottom:10px \" >\n" +
                "                                                <input type=\"number\"   name=\"amount[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();?>//\" autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "\n" +
                "\n" +
                "                                            <div  class=\" col-sm-1\">\n" +
                "                                                <a href=\"#\" id=\"Remove_Cheque\"  class=\"client-add-btn btn btn-danger remove_cheque\" ><i class=\"fa fa-minus-circle m-r-2\"></i></a>\n" +
                "                                            </div>\n" +
                "                                            </div>");
        });


    });



    $("body").on("click",".remove_cheque",function(e){
        $(this).parents('.cheque').remove();
        //the above method will remove the user_data div
    });
</script>




</script>




