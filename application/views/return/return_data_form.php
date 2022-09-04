 <link href="<?php echo base_url('assets/css/return.css') ?>" rel="stylesheet" type="text/css" />
 <script src="<?php echo base_url() ?>my-assets/js/admin_js/return.js" type="text/javascript"></script>
 <!-- Edit Invoice Start -->
 <div class="content-wrapper">
     <section class="content-header">
         <div class="header-icon">
             <i class="pe-7s-note2"></i>
         </div>
         <div class="header-title">
             <h1><?php echo display('return_invoice') ?> </h1>
             <small><?php echo display('return_invoice') ?></small>
             <ol class="breadcrumb">
                 <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                 <li><a href="#"><?php echo display('return') ?></a></li>
                 <li class="active"><?php echo display('return_invoice') ?></li>
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
                             <h4><?php echo display('return_invoice') ?></h4>
                         </div>
                     </div>
                     <?php echo form_open('Cretrun_m/return_invoice', array('class' => 'form-vertical', 'id' => 'invoice_update')) ?>
                     <div class="panel-body">
                         <input type="hidden" size="100" name="sel_type" class=" form-control" id="sel_type" tabindex="1" value="<?= $sel_type=$invoice_all_data[0]['sale_type']?>" readonly="">
                         <div class="row">
                             <div class="col-sm-6">


                                 <div class="form-group row">
                                     <label for="customer_name" class="col-sm-4 col-form-label">Sale Type <i class="text-danger">*</i></label>
                                     <div class="col-sm-8">
                                         <input type="text" size="100" name="" class=" form-control"  id="" tabindex="1"  value="<?php if($invoice_all_data[0]['sale_type']==1){echo 'Whole Sale';}elseif($invoice_all_data[0]['sale_type']==2){echo 'Retail';}elseif($invoice_all_data[0]['sale_type']==3){echo 'Aggregators';} ?>"  readonly/>



                                         <!--                                        <input type="hidden" size="100" name="deliver_type" class=" form-control"  id="deliver_type" tabindex="1"  value="--><!--"  readonly/>-->
                                         <!--                                        <input type="hidden" size="100" name="courier_condtion" class=" form-control"  id="courier_condtion" tabindex="1"  value="--><!--"  readonly/>-->
                                     </div>
                                 </div>


                             </div>

                             <?php  if ($invoice_all_data[0]['sale_type']==1){?>
                                 <div class="col-sm-6 commission_check " id="commission_check" >
                                     <div class="form-group row">
                                         <label for="date" class="col-sm-4 col-form-label">Commission<i class="text-danger">*</i></label>
                                         <div class="col-sm-8">
                                             <select name="commission_type" class="form-control bankpayment" id="commission_type" onchange="commision_add(this.value)">
                                                 <?php  if ($comm_type==1){?>
                                                     <option value="1">Product Wise</option>
                                                 <?php } ?>
                                                 <?php  if ($comm_type==2){?>
                                                     <option value="2">Overall</option>
                                                 <?php } ?>
                                                 <option value="1">Product Wise</option>
                                                 <option value="2">Overall</option>
                                             </select>

                                         </div>

                                     </div>
                                 </div>

                             <?php } ?>

                         </div>
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group row">
                                     <label for="product_name" class="col-sm-4 col-form-label">Invoice No<i class="text-danger"></i></label>
                                     <div class="col-sm-8">
                                         <input type="text" tabindex="2" class="form-control" name="invoice" value="{invoice}" required readonly="" />

                                     </div>
                                 </div>
                             </div>

                             <div class="col-sm-6">
                                 <div class="form-group row">
                                     <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('date') ?> <i class="text-danger"></i></label>
                                     <div class="col-sm-8">
                                         <input type="text" tabindex="2" class="form-control" name="invoice_date" value="{date}" required readonly="" />
                                     </div>
                                 </div>
                             </div>
                         </div>


                         <?php if($delivery_type==2){?>

                             <div class="row">

                                 <div class="col-sm-6">
                                     <div class="form-group row">
                                         <label for="product_name" class="col-sm-4 col-form-label">Courier Name <i class="text-danger"></i></label>
                                         <div class="col-sm-8">
                                             <input type="text" tabindex="2" class="form-control" name="courier_name" value="{courier_name}" required readonly="" />
                                             <input type="hidden" tabindex="2" class="form-control" name="courier_id" value="{courier_id}" required readonly="" />
                                             <input type="hidden" tabindex="2" class="form-control" name="courier_status" value="{courier_status}" required readonly="" />
                                             <input type="hidden" tabindex="2" class="form-control" name="courier_condtion" value="{courier_condtion}" required readonly="" />
                                             <input type="hidden" tabindex="2" class="form-control" name="sale_type" value="{sale_type}" required readonly="" />
                                             <!--                                         <input type="text" tabindex="2" class="form-control" name="delivery_type" value="--><?//= $delivery_type?><!--" required readonly="" />-->
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-group row">
                                         <label for="product_name" class="col-sm-4 col-form-label">Courier Branch <i class="text-danger"></i></label>
                                         <div class="col-sm-8">
                                             <input type="text" tabindex="2" class="form-control" name="branch_name" value="{branch_name}"  readonly="" />
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="form-group row">
                                         <label for="product_name" class="col-sm-4 col-form-label">Courier Condition<i class="text-danger"></i></label>
                                         <div class="col-sm-8">
                                             <input type="text" size="100" name="" class=" form-control"  id="" tabindex="1"  value="<?php if($invoice_all_data[0]['courier_condtion']==1){echo 'Conditional ';}elseif($invoice_all_data[0]['courier_condtion']==2){echo 'Partial';}elseif($invoice_all_data[0]['courier_condtion']==3){echo 'Unconditional';} ?>"  readonly/>

                                         </div>
                                     </div>
                                 </div>

                             </div>
                         <?php } ?>
                         <?php if ($sel_type == 3) { ?>
                         <div class="row">
                             <div class="col-sm-6" id="payment_from_1">
                             <div class="form-group row">
                                 <label for="customer_name" class="col-sm-4 col-form-label">Aggregator Name <i class="text-danger">*</i></label>
                                 <div class="col-sm-8">
                                     <input type="text" size="100" name="" class=" form-control" placeholder='' id="" tabindex="1"  readonly value="<?= $agg_name?>" />

                                     <input id="agg_id" class=" " type="hidden" name="agg_id" value="{agg_id}">
                                 </div>
                             </div>
                             </div>
                         </div>

                         <?php }else{ ?>
                             <div class="row">
                                 <div class="col-sm-6" id="payment_from_1">
                                     <div class="form-group row">
                                         <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger"></i></label>
                                         <div class="col-sm-8">
                                             <input type="text" name="customer_name" value="{customer_name}" class="form-control customerSelection" placeholder='<?php echo display('customer_name') ?>' required id="customer_name" tabindex="1" readonly="">
                                             <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                             <input type="hidden" class="customer_hidden_value" name="customer_id" value="{customer_id}" id="SchoolHiddenId" />
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-sm-6" id="payment_from_1">
                                     <div class="form-group row">
                                         <label for="customer_mobile_two" class="col-sm-4 col-form-label">Customer Mobile </label>
                                         <div class="col-sm-8">
                                             <input type="text" size="100" name="customer_mobile_two" class=" form-control" placeholder='Customer Mobile' id="customer_mobile_two" value="{customer_mobile}" readonly/>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                         <?php   } ?>

                         <div class="row">
                             <div class="col-sm-6  " id="" >
                                 <div class="form-group row">
                                     <label for="date" class="col-sm-4 col-form-label">Delivery Type<i class="text-danger">*</i></label>
                                     <div class="col-sm-8">

                                         <select name="deliver_type" class="form-control" onchange="delivery_type(this.value)">

                                             <?php  if ($delivery_type == 1){?>
                                                 <option value="1">Pick Up</option>
                                             <?php } ?>

                                             <?php  if ($delivery_type == 2){?>
                                                 <option value="2">Courier</option>
                                             <?php } ?>
                                             <option value="1">Pick Up</option>
                                             <option value="2">Courier</option>


                                         </select>



                                     </div>

                                 </div>
                             </div>


                             <div class="col-sm-12"  id="courier_div">

                                 <div class="form-group row">
                                     <label for="bank" class="col-sm-2 col-form-label">Courier Name <i class="text-danger">*</i></label>
                                     <div class="col-sm-4">

                                         <select name="courier_id" class="form-control bankpayment" id="" onchange="get_branch(this.value)">
                                             <option value="<?php echo $courier_id?>" selected><?php echo $courier_name?></option>
                                             <?php foreach ($courier_list as $courier) { ?>
                                                 <option value="<?php echo html_escape($courier['courier_id']) ?>"><?php echo html_escape($courier['courier_name']); ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>

                                 </div>
                                 <div class="form-group row branch_div" id="branch_div">
                                     <label for="bank" class="col-sm-2 col-form-label">Branch<i class="text-danger">*</i></label>
                                     <div class="col-sm-4" >
                                         <select name="branch_id" id="branch_id" class="branch_id form-control text-right" tabindex="1" onchange="get_charge(this.value)">
                                             <option value="<?php echo $branch_id?>" selected><?php echo $branch_name?></option>
                                         </select>
                                     </div>
                                 </div>

                                 <div class="form-group row branch_div" id="branch_div" style="display: none;">
                                     <label for="bank" class="col-sm-2 col-form-label">Location<i class="text-danger">*</i></label>
                                     <div class="col-sm-4 " >
                                           <input type="radio" id="inside" name="charge" value="" onchange="put_value(this.value)">
                                           <label for="outside">Inside</label><br>
                                           <input type="radio" id="outside" name="charge" value="" onchange="put_value(this.value)">
                                           <label for="outside">Outside</label><br>
                                           <input type="radio" id="sub" name="charge" value="" onchange="put_value(this.value)">
                                           <label for="sub">Sub</label>
                                     </div>
                                 </div>




                                 <div class="form-group row">
                                     <label for="bank" class="col-sm-2 col-form-label">Condition<i class="text-danger">*</i></label>
                                     <div class="col-sm-4">
                                         <select name="courier_condtion" class="form-control bankpayment" id="" onchange="condition_charge(this.value)">
                                             <option value="<?php echo $courier_condtion?>" selected><?php echo $con?></option>
                                             <option value="1">Conditional</option>
                                             <option value="2">Partial</option>
                                             <option value="3">Unconditional</option>

                                         </select>
                                     </div>

                                 </div>

                                 <div class="form-group row">
                                     <label for="deli_receiver" class="col-sm-2 col-form-label">Receiver</label>
                                     <div class="col-sm-4">
                                         <select class="form-control" name="deli_reciever" id="deli_receiver"  onchange="receiver_changed(this)">
                                             <option value="{rid}">{receiver_name}</option>
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

                                 <div class="form-group row" id="receiver_num_div" >
                                     <label for="del_rec_num" class="col-sm-2 col-form-label">Receiver Number</label>
                                     <div class="col-sm-4">
                                         <input type="text" class="form-control" id="del_rec_num" name="del_rec_num" value="{receiver_number}">
                                     </div>
                                 </div>

                             </div>

                         </div>




                         <input type="hidden" name="outlet_id" id="outlet_name" value="{outlet_id}">

                         <div class="panel-body">

                             <div class="row">
                                 <div class="table-responsive">
                                     <table class="table table-bordered table-hover" id="">
                                         <thead>
                                             <tr>
                                                 <th class="text-center" width="20%"><?php echo display('item_information') ?> <i class="text-danger"></i></th>
                                                 <th class="text-center">Unit</i></th>
                                                 <th class="text-center"><?php echo display('sold_qty') ?></th>

                                                 <th class="text-center"><?php echo display('ret_quantity') ?> <i class="text-danger">*</i></th>
                                                 <th class="text-center"><?php echo display('rate') ?> <i class="text-danger"></i></th>
                                                 <th class="text-center">Discount %  <?php  if ($sel_type == 1 && $comm_type==1){?> <span class="comm_th">| Commission % </span><?php } ?></th>
                                                 <th class="text-center">Return Amount</th>
                                                 <th class="text-center">Payable</th>
                                                 <th class="text-center"><?php echo display('check_return') ?> <i class="text-danger">*</i></th>
                                             </tr>
                                         </thead>
                                         <tbody id="">
                                             {invoice_all_data}

                                             <tr>
                                                 <td class="product_field">
                                                     <input type="text"   name="product_name" onclick="invoice_productList({sl});" value="{sku}-{product_name}" class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>' id="product_names" tabindex="3" readonly="">

                                                     <input type="hidden" class="product_id_{sl} " value="{product_id}" id="product_id_{sl}" />
                                                 </td>
                                                 <td >
                                                     <input type="text" name="unit[]" id="unit_{sl}" class="form-control text-right unit_1" value="{unit}" readonly="" />
                                                 </td>
                                                 <td >
                                                     <input type="text" name="sold_qty[]" id="sold_qty_{sl}" class="form-control text-right available_quantity_1" value="{sum_quantity}" readonly="" />
                                                 </td>
                                                 <td>
                                                     <input type="text" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" onkeypress="quantity_calculate({sl});" class="total_qntt_{sl} form-control text-right" id="total_qntt_{sl}" min="0" placeholder="0.00" tabindex="4" />
                                                 </td>

                                                 <td>
                                                     <input type="text" name="product_rate[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{rate}" id="price_item_{sl}" class="price_item{sl} form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly="" />
                                                 </td>
                                                 <!-- Discount -->

                                                 <td>
                                                     <input type="text" readonly style="width: 120px; display:inline-block" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" id="dis_{sl}" class="form-control text-right" placeholder="0.00" value="{discount_per}" min="0" tabindex="6" />
                                                     <?php  if ($sel_type == 1 && $comm_type==1){?>
                                                     <input class="comm_th form-control text-right  p-5" readonly style="width: 120px ;" type="text" name="comm[]" id="comm_1" value="{commission_per}" onkeyup="quantity_calculate(1);" placeholder="0.00" onchange="quantity_calculate(1);"  />
                                                        <?php } ?>
                                                 </td>



                                                 <td hidden>
                                                 <td hidden>
                                                     <input type="hidden" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" id="discount_{sl}" class="form-control text-right" placeholder="0.00" value="" min="0" tabindex="6" />
                                                     <input type="hidden" value="<?php echo $discount_type ?>" name="discount_type" id="discount_type_{sl}">
                                                 </td>

                                                 <td>
                                                     <input class="total_price form-control text-right" type="text" id="total_price_{sl}" value="" readonly="readonly" placeholder="0.00" />

                                                     <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value="{invoice_details_id}" />
                                                 </td>

                                                 <td>
                                                     <input class=" form-control text-right payable" type="text" id="payable_{sl}" value="" placeholder="0.00" readonly="readonly" />
                                                     <input class=" form-control text-right paya_total" type="hidden" id="pa_total_price_{sl}" value="{total_price}" placeholder="0.00" readonly="readonly" />
                                                     <input class=" form-control text-right dis_amount" type="hidden" id="dis_amount_{sl}" value="0" placeholder="0.00" readonly="readonly" />

                                                 </td>
                                                 <td>

                                                     <!-- Tax calculate start-->
                                                     <input id="total_tax_{sl}" class="total_tax_{sl}" type="hidden" value="{tax}">
                                                     <input id="all_tax_{sl}" class="total_tax" type="hidden" value="0" name="tax[]">
                                                     <!-- Tax calculate end-->

                                                     <!-- Discount calculate start-->
                                                     <input type="hidden" id="total_discount_{sl}" class="" value="" />

                                                     <input type="hidden" id="all_discount_{sl}" class="total_discount" value="" />
                                                     <!-- Discount calculate end -->



                                                     <input type="checkbox" name='rtn[]' onclick="checkboxcheck({sl})" id="check_id_{sl}" value="{sl}" class="chk">


                                                 </td>
                                             </tr>


                                             {/invoice_all_data}
                                         </tbody>

                                         <tfoot>

                                             <tr>
                                                 <td colspan="6" rowspan="13">
                                                     <center><label for="details" class="  col-form-label text-center"><?php echo display('reason') ?></label></center>
                                                     <textarea class="form-control" name="details" id="details" placeholder="<?php echo display('reason') ?>"></textarea> <br>
                                                     <!-- <span class="usablity"><?php echo display('usablilties') ?> </span><br> -->

                                                     <div class="form-group row">
                                                         <input type="hidden" name="base_total" id="base_total" value="0">
                                                         <input type="hidden" name="total_amount" id="total_amount" value="{total_amount}">
                                                         <input type="hidden" name="old_paid" id="old_paid" value="{paid_amount}">
                                                         <label class="text-right col-form-label col-sm-4">Return:
                                                         </label>
                                                         <div class="col-sm-2 ">
                                                             <input id="cash_return" type="checkbox" name="cash_return" value="cash_ret" onclick="validation(1)" onchange="quantity_calculate(1)" >
                                                         </div>


                                                     </div>
                                                     <div class="form-group row">
                                                         <label class="text-right col-form-label col-sm-4">Replace:
                                                         </label>
                                                         <div class="col-sm-2 ">
                                                             <input id="rep_toggle" type="checkbox" name="rep_or_no" onchange="quantity_calculate(1)" onclick="validation(1)">
                                                         </div>


                                                     </div>


                                                 </td>
                                                 <td class="text-right" colspan="1" hidden><b><?php echo display('to_deduction') ?>:</b></td>
                                                 <td class="text-right" hidden>
                                                     <input type="text" id="total_d" class="form-control text-right" name="total_d" value="" readonly="readonly" />
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-right" colspan="1"><b>Sale Discount:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="invoice_discount" readonly onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="form-control text-right" name="invoice_discount" value="{invoice_discount}" placeholder="0.00" />
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-right" colspan="1"><b>Sale Discount(%):</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="perc_discount" readonly onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="form-control text-right" name="perc_discount" value="{perc_discount}" placeholder="0.00" />
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-right" colspan="1"><b><?php echo display('total_discount') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="{total_discount}" readonly="readonly" />
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td class="text-right" colspan="1"><b>Discount:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="sku_discount" readonly onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" class="form-control text-right" name="" value="" placeholder="0.00" />

                                                 </td>
                                             </tr>

                                             <?php if ($sel_type == 1 && $comm_type == 2) {?>
                                                 <tr id="commission_tr" class="">
                                                     <td class="text-right" colspan="1"><b>Commission:</b></td>
                                                     <td class="text-right">
                                                         <input type="text" id="commission" class="form-control text-right" name="commission" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);"  value="{commission}"  />
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                             <?php  if ($sel_type == 1 && $comm_type==1){?>
                                                 <tr id="t_comm_tr" >
                                                     <td class="text-right" colspan="1"><b>Total Commission:</b></td>
                                                     <td class="text-right">
                                                         <input type="text" id="total_commission" class="form-control text-right" name="total_commission" value="{total_commission}"  readonly="readonly" />
                                                     </td>
                                                 </tr>
                                             <?php } ?>


                                             <tr id="" >
                                                 <td class="text-right" colspan="1"><b>Total Sales Return:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="sales_return" class="form-control text-right" name="sales_return" value="" placeholder="0.00" readonly="readonly" />
                                                 </td>
                                             </tr>
                                             <tr class="hidden_tr">
                                                 <td class="text-right" colspan="1"><b>Delivery Charge:</b></td>
                                                 <td class="text-right">
                                                     <input id="total_tax_ammount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" aria-invalid="false" type="text">
                                                     <input id="shipping_cost" tabindex="-1" class="form-control text-right valid" name="total_amount" value="{total_amount}" aria-invalid="false" type="hidden">
                                                     <input id="condition_cost" tabindex="-1" class="form-control text-right valid" name="condition_cost" value="{condition_cost}" aria-invalid="false" type="hidden">
                                                     <input id="condition_cost" tabindex="-1" class="form-control text-right valid" name="condition_cost" value="{condition_cost}" aria-invalid="false" type="hidden">

                                                 </td>
                                                 <td class="">
                                                     <input id="pay_person" type="checkbox" onchange="quantity_calculate(1);" name="pay_person" value="pay_person" >
                                                     <label class=" col-form-label text-right">Customer Pay
                                                     </label>

                                                 </td>
                                             </tr>


                                             <tr class="hidden_tr ">
                                                 <td class="text-right" colspan="1"><b>ADC:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="delivery_ac" class="form-control text-right" name="delivery_ac" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" value="{delivery_ac}" tabindex="14"  />
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td colspan="1" class="text-right"><b>Net Payable:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="net_pay" class="form-control text-right" name="net_pay" value="" placeholder="0.00" readonly="readonly" />
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td colspan="1" class="text-right"><b> Paid Amount:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="paid_amount" class="form-control text-right" name="paid_amount" value="{paid_amount}" readonly="readonly" />
                                                 </td>
                                             </tr>


                                             <tr>
                                                 <td colspan="1" class="text-right"><b class="due_cus"> Customer Receivable:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="due_amount" class="form-control  font-bold  text-right" name="due_amount" value="{due_amount}" readonly="readonly" />
                                                 </td>
                                                 <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                                 <input type="hidden" name="invoice_id" id="invoice_id" value="{invoice_id}" />
                                             </tr>


                                         </tfoot>
                                     </table>
                                 </div>
                                 <!-- <button type="button" class="btn btn-info" id="rep_toggle">Replace <i class="fa fa-arrow-circle-down"></i></button> -->
                                 <input type="hidden" name="is_replace" id="is_replace" class="" value="0">


                                 <div id="replace_table" style="display: none;">
                                     <center>
                                         <h2>Product Replacement</h2>
                                     </center>
                                     <br>



                                     <div class="table-responsive">
                                         <table class="table table-bordered table-hover" id="normalinvoice">
                                             <thead>
                                             <tr>
                                                 <th class="text-center " width="8%"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>
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
                                                 <th class="text-center" width="2%"><?php echo display('action') ?></th>
                                             </tr>
                                             </thead>
                                             <tbody id="addinvoiceItem">
                                             <tr>
                                                 <td class="product_field" >
                                                     <input type="text" required name="product_name" onkeypress="invoice_productList(1)" id="product_name_1" class="form-control productSelection" placeholder="<?php echo display('product_name') ?>" tabindex="5">

                                                     <input type="hidden" class="autocomplete_hidden_value product_id_1" name="re_product_id[]" id="SchoolHiddenId" />

                                                     <input type="hidden" class="baseUrl" value="<?php echo base_url(); ?>" />
                                                 </td>

                                                 <td  width="100">
                                                     <input type="text" id="" class="form-control text-right re_available_quantity_1" value="" readonly>
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
                                                     <input type="hidden" name="re_available_quantity[]" class="form-control text-right re_available_quantity_1" value="0" readonly="" />
                                                     <input name="" id="" class="form-control text-right re_unit_1 valid" value="None" readonly="" aria-invalid="false" type="text">
                                                 </td>
                                                 <td  width="100">
                                                     <input type="text" name="re_product_quantity[]" required="" onkeyup="quantity_calculate_re(1);" onkeypress="quantity_calculate_re(1);" class="re_total_qntt_1 form-control text-right" id="re_total_qntt_1" placeholder="0.00" min="0" tabindex="8" value="1" />
                                                 </td>
                                                 <td class="invoice_fields"  width="100">
                                                     <?php $date = date('Y-m-d'); ?>
                                                     <input type="date" style="width: 110px" id="re_warrenty_date" class="form-control re_warrenty_date_1" name="re_warrenty_date[]" value="" />
                                                 </td>
                                                 <td class="invoice_fields"  width="100">
                                                     <?php $date = date('Y-m-d'); ?>
                                                     <input type="date" style="width: 110px" id="re_expiry_date" class="form-control re_expiry_date_1" name="re_expiry_date[]" value="" />
                                                 </td>
                                                 <td class="text-center"  width="200">
                                                     <input style="width: 120px; display:inline-block" type="text" name="re_product_rate[]" id="re_price_item_1" class="re_price_item1 re_price_item form-control text-right" tabindex="9" required="" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);" placeholder="0.00" min="0"  />
                                                     <s id="re_purchase_price_1" class="re_purchase_price1 text-right" style="width: 100px ;"><?php echo '৳0.00'?></s>
                                                 </td>
                                                 <!-- Discount -->
                                                 <td  width="200" class="text-center">

                                                     <input type="text" style="width: 120px; display:inline-block" name="re_discount[]" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);" id="re_discount_1" class="form-control text-right" min="0" tabindex="10" placeholder="0.00" />
                                                     <input class="comm_th form-control text-right d-none p-5" style="width: 120px ;" type="text" name="re_comm[]" id="re_comm_1" value="0" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);"  />

                                                 </td>


                                                 <td class="invoice_fields"  width="100">
                                                     <input class="re_total_price form-control text-right" type="text" name="re_total_price[]" id="re_total_price_1" value="0.00" readonly="readonly" />
                                                     <input class="re_total_price_wd form-control text-right" type="hidden" name="re_total_price_wd[]" id="re_total_price_wd_1" value="0.00" readonly="readonly" />
                                                     <input type="hidden" value="" name="re_discount_type" id="re_discount_type_1">
                                                 </td>


                                                    <td>
                                                     <!-- Discount calculate start-->
                                                     <input type="hidden" id="re_total_comm_1" class="re_total_comm" name="re_total_comm[]"/>
                                                     <input type="hidden" id="re_total_discount_1" class="re_total_discount" name="re_total_discount[]"/>
                                                     <input type="hidden" id="re_all_discount_1" class="re_total_discount dppr" name="re_discount_amount[]" />
                                                     <!-- Discount calculate end -->

                                                     <button class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button>
                                                 </td>
                                             </tr>
                                             </tbody>
                                             <tfoot>

                                             <tr>
                                                 <td colspan="6" rowspan="2">
                                                     <center><label for="re_details" class="  col-form-label text-center"><?php echo display('invoice_details') ?></label></center>
                                                     <textarea name="re_inva_details" id="re_details" class="form-control" placeholder="<?php echo display('invoice_details') ?>" tabindex="12"></textarea>
                                                 </td>
                                                 <td class="text-right" colspan="2"><b><?php echo display('invoice_discount') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);" id="re_invoice_discount" class="form-control text-right re_total_discount" name="re_invoice_discount" placeholder="0.00" tabindex="13" />
                                                     <input type="hidden" id="txfieldnum">
                                                 </td>
                                                 <td><a id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onClick="addInputField('addinvoiceItem');" tabindex="11"><i class="fa fa-plus"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td class="text-right" colspan="2"><b>Sale Discount(%):</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_perc_discount" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);" class="form-control text-right" name="re_perc_discount" value="" placeholder="0.00" />
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-right" colspan="8"><b><?php echo display('total_discount') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_total_discount_ammount" class="form-control text-right" name="re_total_discount" value="0.00" readonly="readonly" />
                                                 </td>
                                             </tr>

                                             <?php if ($sel_type == 1 && $comm_type == 1) {?>
                                             <tr id="t_comm_tr" >
                                                 <td class="text-right" colspan="8"><b>Total Commission:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_total_commission" class="form-control text-right" name="re_total_commission" value="0.00" readonly="readonly" />
                                                 </td>
                                             </tr>
                                             <?php } ?>

                                             <?php $x = 0;
                                             foreach ($taxes as $taxfldt) { ?>
                                                 <tr class="hideableRow hiddenRow">

                                                     <td class="text-right" colspan="8"><b><?php echo html_escape($taxfldt['tax_name']) ?></b></td>
                                                     <td class="text-right">
                                                         <input id="re_total_tax_ammount<?php echo $x; ?>" tabindex="-1" class="form-control text-right valid re_totalTax" name="total_tax<?php echo $x; ?>" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                                     </td>



                                                 </tr>
                                                 <?php $x++;
                                             } ?>

                                             <tr>
                                             <tr hidden>
                                                 <td class="text-right" colspan="8"><b><?php echo display('total_tax') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input id="re_total_tax_amount" tabindex="-1" class="form-control text-right valid" name="re_total_tax" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                                 </td>
                                                 <td><button type="button" class="toggle btn-warning">
                                                         <i class="fa fa-angle-double-down"></i>
                                                     </button></td>
                                             </tr>
                                             <tr class="hidden_tr d-none">
                                                 <td class="text-right " colspan="8"><b>Delivery Charge:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_shipping_cost" class="form-control text-right" name="re_shipping_cost" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);" placeholder="0.00" value="0.00" tabindex="14" />
                                                 </td>
                                             </tr>
                                             <tr class="hidden_tr d-none">
                                                 <td class="text-right " colspan="8"><b>ADC:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_delivery_ac" class="form-control text-right" name="re_delivery_ac" onkeyup="quantity_calculate_re(1);" onchange="quantity_calculate_re(1);" placeholder="0.00" value="0.00" tabindex="14"  />
                                                 </td>
                                             </tr>

                                             <tr id="condition_tr" class=" d-none" hidden>
                                                 <td class="text-right" colspan="8"><b>Condition Charge:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_condition_cost" class="form-control text-right" name="re_condition_cost" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" value="0.00" tabindex="14" />
                                                 </td>
                                             </tr>

                                             <tr id="commission_tr" class=" d-none">
                                                 <td class="text-right" colspan="8"><b>Commission:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_commission" class="form-control text-right" name="re_commission" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);"  value="0.00"  />
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td colspan="8" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_grandTotal" class="form-control text-right" name="re_grandTotal" value="0.00" readonly="readonly" />
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
                                                     <input type="text" id="re_n_total" class="form-control text-right" name="re_n_total" value="0" readonly="readonly" placeholder="" />
                                                 </td>
                                             </tr>
                                             <tr>

                                                 <td class="text-right" colspan="8"><b><?php echo display('paid_ammount') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                                     <input type="text" id="re_paidAmount" onkeyup="invoice_paidamount();" class="form-control text-right" name="re_paid_amount" placeholder="0.00" tabindex="15" value="" readonly />
                                                 </td>
                                             </tr>
                                             <tr>


                                                 <td class="text-right" colspan="8"><b><?php echo display('due') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_dueAmmount" class="form-control text-right" name="re_due_amount" value="0.00" readonly="readonly" />

                                                 </td>
                                             </tr>
                                             <tr>

                                                 <td colspan="8" class="text-right"><b><?php echo display('change'); ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="re_change" class="form-control text-right" name="change" value="0" readonly="readonly" placeholder="" />
                                                 </td>
                                             </tr>
                                             </tfoot>
                                         </table>
                                     </div>

                                 </div>
                                 <div class="form-group row">
                                     <label for="example-text-input" class=" col-form-label"></label>
                                     <div class="col-sm-12 text-right">


                                         <input type="submit" id="add_invoice" class="btn btn-success btn-large" name="add-invoice" value="<?php echo display('return') ?>" tabindex="9" />

                                     </div>
                                 </div>
                             </div>





                         </div>
                     </div>
                     <?php echo form_close() ?>
                 </div>
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
     </section>
 </div>


 <script type="text/javascript">

     $(document).ready(function() {

         var del_type='<?= $delivery_type ?>'




         if (del_type == 2) {
             var style = 'block';
              $('.hidden_tr').removeClass('d-none');

         } else {
             var style = 'none';
              $('.hidden_tr').addClass('d-none');


         }


         document.getElementById('courier_div').style.display = style;


     })

     "use strict";
     function get_branch(courier_id) {

         var base_url = "<?= base_url() ?>";
         var csrf_test_name = $('[name="csrf_test_name"]').val();



         $.ajax( {
             url: base_url + "Ccourier/branch_by_courier",
             method: 'post',
             data: {
                 courier_id:courier_id,
                 csrf_test_name:csrf_test_name
             },
             cache: false,
             success: function( data ) {
                 var obj = jQuery.parseJSON(data);
                 $('.branch_id').html(obj.branch);


                 $(".branch_div").css("display", "block");
                 // if(courier_id == obj.courier_id ){
                 //     $("#subCat_div").css("display", "block");
                 // }else{
                 //     $("#subCat_div").css("display", "none");
                 // }
             }
         })

     }

     function  delivery_type(val){

      //   alert(val)
         if (val == 2) {
             var style = 'block';
              $('.hidden_tr').removeClass('d-none');

         } else {
             var style = 'none';
              $('.hidden_tr').addClass('d-none');

         }



         document.getElementById('courier_div').style.display = style;



     }

     "use strict";


     function get_charge(branch_id) {

         var base_url = "<?= base_url() ?>";
         var csrf_test_name = $('[name="csrf_test_name"]').val();



         $.ajax( {
             url: base_url + "Ccourier/charge_by_branch",
             method: 'post',
             data: {
                 branch_id:branch_id,
                 csrf_test_name:csrf_test_name
             },
             cache: false,
             success: function( data ) {
                 var obj = jQuery.parseJSON(data);
                 //   console.log(obj[0].inside)

                 $('#inside').val(obj[0].inside);
                 $('#outside').val(obj[0].outside);
                 $('#sub').val(obj[0].sub);

             }
         })

     }

     function put_value(val){

         $('#delivery_ac').val(val);
     }

 </script>