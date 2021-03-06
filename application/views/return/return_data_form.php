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

                         <div class="row">
                             <div class="col-sm-6" id="payment_from_1">
                                 <div class="form-group row">
                                     <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger"></i></label>
                                     <div class="col-sm-8">
                                         <input type="text" name="customer_name" value="{customer_name}" class="form-control customerSelection" placeholder='<?php echo display('customer_name') ?>' required id="customer_name" tabindex="1" readonly="">

                                         <input type="hidden" class="customer_hidden_value" name="customer_id" value="{customer_id}" id="SchoolHiddenId" />
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
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
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group row">
                                     <label for="product_name" class="col-sm-4 col-form-label">Courier Branch <i class="text-danger"></i></label>
                                     <div class="col-sm-8">
                                         <input type="text" tabindex="2" class="form-control" name="branch_name" value="{branch_name}" required readonly="" />
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
                             <div class="col-sm-6">
                                 <div class="form-group row">
                                     <label for="product_name" class="col-sm-4 col-form-label">Receiver Name <i class="text-danger"></i></label>
                                     <div class="col-sm-8">
                                         <input type="text" tabindex="2" class="form-control" name="receiver_name" value="{receiver_name}" required readonly="" />
                                     </div>
                                 </div>
                             </div>

                             <div class="col-sm-6">
                                 <div class="form-group row">
                                     <label for="product_name" class="col-sm-4 col-form-label">Receiver Mobile  <i class="text-danger"></i></label>
                                     <div class="col-sm-8">
                                         <input type="text" tabindex="2" class="form-control" name="receiver_number" value="{receiver_number}" required readonly="" />
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <?php } ?>

                         <input type="hidden" name="outlet_id" id="outlet_name" value="{outlet_id}">

                         <div class="panel-body">

                             <div class="row">
                                 <div class="table-responsive">
                                     <table class="table table-bordered table-hover" id="normalinvoice">
                                         <thead>
                                             <tr>
                                                 <th class="text-center"><?php echo display('item_information') ?> <i class="text-danger"></i></th>
                                                 <th class="text-center"><?php echo display('sold_qty') ?></th>
                                                 <th class="text-center"><?php echo display('ret_quantity') ?> <i class="text-danger">*</i></th>
                                                 <th class="text-center"><?php echo display('rate') ?> <i class="text-danger"></i></th>
                                                 <th class="text-center"><?php echo display('deduction') ?> %</th>
                                                 <th class="text-center"><?php echo display('total') ?></th>
                                                 <th class="text-center"><?php echo display('check_return') ?> <i class="text-danger">*</i></th>
                                             </tr>
                                         </thead>
                                         <tbody id="addinvoiceItem">
                                             {invoice_all_data}
                                             <tr>
                                                 <td class="product_field">
                                                     <input type="text"   name="product_name" onclick="invoice_productList({sl});" value="{sku}-{product_name}" class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>' id="product_names" tabindex="3" readonly="">

                                                     <input type="hidden" class="product_id_{sl} autocomplete_hidden_value" value="{product_id}" id="product_id_{sl}" />
                                                 </td>
                                                 <td >
                                                     <input type="text" name="sold_qty[]" id="sold_qty_{sl}" class="form-control text-right available_quantity_1" value="{sum_quantity}" readonly="" />
                                                 </td>
                                                 <td>
                                                     <input type="text" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" class="total_qntt_{sl} form-control text-right" id="total_qntt_{sl}" min="0" placeholder="0.00" tabindex="4" />
                                                 </td>

                                                 <td>
                                                     <input type="text" name="product_rate[]" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" value="{rate}" id="price_item_{sl}" class="price_item{sl} form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly="" />
                                                 </td>
                                                 <!-- Discount -->
                                                 <td>
                                                     <input type="text" onkeyup="quantity_calculate({sl});" onchange="quantity_calculate({sl});" id="discount_{sl}" class="form-control text-right" placeholder="0.00" value="" min="0" tabindex="6" />
                                                     <input type="hidden" value="<?php echo $discount_type ?>" name="discount_type" id="discount_type_{sl}">
                                                 </td>

                                                 <td>
                                                     <input class="total_price form-control text-right" type="text" id="total_price_{sl}" value="" readonly="readonly" />

                                                     <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value="{invoice_details_id}" />
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
                                                 <td colspan="4" rowspan="3">
                                                     <center><label for="details" class="  col-form-label text-center"><?php echo display('reason') ?></label></center>
                                                     <textarea class="form-control" name="details" id="details" placeholder="<?php echo display('reason') ?>"></textarea> <br>
                                                     <!-- <span class="usablity"><?php echo display('usablilties') ?> </span><br> -->

                                                     <div class="form-group row">
                                                         <input type="hidden" name="base_total" id="base_total" value="0">
                                                         <label class="text-right col-form-label col-sm-4">Return:
                                                         </label>
                                                         <div class="col-sm-2 ">
                                                             <input id="cash_return" type="checkbox" name="cash_return" value="cash_ret" onclick="quantity_calculate(1)" onchange="quantity_calculate(1)">
                                                         </div>


                                                     </div>
                                                     <div class="form-group row">
                                                         <label class="text-right col-form-label col-sm-4">Replace:
                                                         </label>
                                                         <div class="col-sm-2 ">
                                                             <input id="rep_toggle" type="checkbox" name="rep_or_no" onchange="quantity_calculate(1)">
                                                         </div>


                                                     </div>

<!--                                                     <div class="form-group row">-->
<!--                                                         <label class="text-right col-form-label col-sm-4">Wastage:-->
<!--                                                         </label>-->
<!--                                                         <div class="col-sm-2 ">-->
<!--                                                             <input id="rep_toggle" type="checkbox" name="wastage" onchange="quantity_calculate(1)">-->
<!--                                                         </div>-->
<!---->
<!---->
<!--                                                     </div>-->




                                                     <!-- <label class="ab"><?php echo display('wastage') ?>
                                                                 <input type="radio" name="radio" value="3">
                                                                 <span class="checkmark"></span>
                                                             </label>  -->

                                                 </td>
                                                 <td class="text-right" colspan="1"><b><?php echo display('to_deduction') ?>:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="" readonly="readonly" />
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-right" colspan="1"><b>Additional Cost:</b></td>
                                                 <td class="text-right">
                                                     <input id="total_tax_ammount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" aria-invalid="false" type="text">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td colspan="1" class="text-right"><b>Total Cost:</b></td>
                                                 <td class="text-right">
                                                     <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="" readonly="readonly" />
                                                 </td>
                                                 <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
                                                 <input type="hidden" name="invoice_id" id="invoice_id" value="{invoice_id}" />
                                             </tr>


                                         </tfoot>
                                     </table>
                                 </div>
                                 <!-- <button type="button" class="btn btn-info" id="rep_toggle">Replace <i class="fa fa-arrow-circle-down"></i></button> -->
                                 <input type="hidden" name="is_replace" id="is_replace" value="0">
                                 <div id="replace_table" style="display: none;">
                                     <center>
                                         <h4>Product Replacement</h4>
                                     </center>
                                     <div class="table-responsive">
                                         <table class="table table-bordered table-hover" id="replaceT">
                                             <input type="hidden" id="inc_id" value="2">
                                             <thead>
                                                 <tr>
                                                     <th class="text-center"><?php echo display('item_information') ?> <i class="text-danger"></i></th>
                                                     <th class="text-center"><?php echo display('stock') ?></th>
                                                     <th class="text-center"><?php echo display('qty') ?> <i class="text-danger">*</i></th>
                                                     <th class="text-center"><?php echo display('rate') ?> <i class="text-danger"></i></th>
                                                     <!-- <th class="text-center"><?php echo display('deduction') ?> %</th> -->
                                                     <th class="text-center"><?php echo display('total') ?></th>
                                                     <th class="text-center">Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr>
                                                     <td class="product_field">
                                                         <input type="text" name="rep_product_name" onclick="invoice_productList(1);" value="" class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>' id="pr_name_1" tabindex="3">

                                                         <input type="hidden" name="rep_pr_id[]" class="product_id_1 autocomplete_hidden_value" value="" id="rep_product_id_1" />
                                                     </td>
                                                     <td>
                                                         <input type="text" id="stock_1" class="form-control text-right available_quantity_1" readonly="" />
                                                     </td>
                                                     <td>
                                                         <input type="text" name="rep_qty[]" onkeyup="replace_calculate(1);" onchange="replace_calculate(1);" class="total_qntt_1 form-control text-right" id="replace_qty_1" min="0" placeholder="0.00" tabindex="4" />
                                                     </td>

                                                     <td>
                                                         <input type="text" name="replace_rate[]" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" value="" id="replace_price_1" class="form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly="" />
                                                     </td>
                                                     <!-- Discount -->
                                                     <!-- <td>
                                                             <input type="text" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="discount_1" class="form-control text-right" placeholder="0.00" value="" min="0" tabindex="6" />

                                                             <input type="hidden" value="<?php echo $discount_type ?>" name="discount_type" id="discount_type_1">
                                                         </td> -->

                                                     <td>
                                                         <input name="rep_item_total[]" class="rep_total form-control text-right" type="text" id="replace_total_1" value="" readonly="readonly" />
                                                     </td>
                                                     <td>

                                                         <button type="button" class="btn btn-sm btn-success" onclick="add_replace_row()"><i class="fa fa-plus"></i></button>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                             <tfoot>
                                                 <tr>
                                                     <td colspan="4" class="text-right">
                                                         <strong>Net Total: </strong>
                                                     </td>
                                                     <td>
                                                         <input type="hidden" name="rep_base_total" id="rep_base_total" value="0">
                                                         <input class="form-control text-right" type="text" name="rep_total" id="rep_total" readonly>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="4" class="text-right">
                                                         <strong>Customer Return: </strong>
                                                     </td>
                                                     <td>
                                                         <input class="form-control text-right" type="text" name="rep_grand" id="rep_grand" readonly>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="4" class="text-right">
                                                         <strong>Additional Cost: </strong>
                                                     </td>
                                                     <td>
                                                         <input class="form-control text-right" type="text" name="rep_deduction" id="rep_deduction" readonly>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="4" class="text-right">
                                                         <strong>Total Cost: </strong>
                                                     </td>
                                                     <td>
                                                         <input class="form-control text-right" type="text" name="rep_total_cost" id="rep_total_cost" readonly>
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

     </section>
 </div>