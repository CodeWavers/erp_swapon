<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js.php" type="text/javascript"></script>




<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('accounts') ?></h1>
            <small>Money Reciept</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active">Money Reciept</li>
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
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        Money Reciept
                    </h4>
                </div>
            </div>
            <div class="panel-body">
                 
                         <?php echo  form_open_multipart('accounts/create_money_receipt','id="validate"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no[0]['voucher'])){
                               $vn = substr($voucher_no[0]['voucher'],3)+1;
                              echo $voucher_n = 'MR-'.$vn;
                             }else{
                               echo $voucher_n = 'MR-1';
                             } ?>" class="form-control" readonly>
                        </div>
                    </div>
<!--                <div class="form-group row">-->
<!--                    <label for="customer_name" class="col-sm-2 col-form-label">--><?php //echo display('customer') ?><!--<i class="text-danger">*</i></label>-->
<!--                    <div class="col-sm-4">-->
<!--                        <select name="customer_id" id="customer_id" class="form-control" required="">-->
<!--                            <option value=""></option>-->
<!--                            --><?php //foreach($customer as $customers){?>
<!--                                <option value="--><?php //echo html_escape($customers['customer_id'])?><!--"  --><?php //if($customers['customer_id'] == $customer_id){echo 'selected';}?><!--<?php //echo html_escape($customers['customer_id_two'])?><!--</option>-->
<!--                            --><?php //}?>
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->

                     <div class="form-group row">
                        <label for="ac" class="col-sm-2 col-form-label">Payment Type<i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                          <select name="paytype" id="cmbDebit" class="form-control" required="" onchange="bank_paymet(this.value)">
                              <option value="1"><?php echo display('cash_payment') ?></option>
                              <option value="2"><?php echo display('bank_payment') ?></option>
                              <option value="3">Bkash</option>
                              <option value="4">Nagad</option>

                          </select>
                        </div>
                         <div class="col-sm-6" id="bank_div">
                             <div class="form-group row">
                                 <label for="bank" class="col-sm-4 col-form-label"><?php
                                     echo display('bank');
                                     ?> <i class="text-danger">*</i></label>
                                 <div class="col-sm-6">
                                     <!--                                   <select name="bank_id" class="form-control bankpayment"  id="bank_id">
                                        <option value="">Select Location</option>
                                        <?php foreach($bank_list as $bank){?>
                                            <option value="<?php echo html_escape($bank['bank_id'])?>"><?php echo html_escape($bank['bank_name']);?></option>
                                        <?php }?>
                                    </select> -->
                                     <input type="text" name="bank_id" class="form-control" id="bank_id" placeholder="Bank">

                                 </div>
                                 <label for="bank" class="col-sm-4 col-form-label">Cheque type:
                                     <i class="text-danger">*</i></label>
                                 <div class="col-sm-6">
                                     <input type="text"   name="cheque_type" class=" form-control" placeholder=""  autocomplete="off"/>
                                 </div>
                                                                     <label for="bank" class="col-sm-4 col-form-label">Cheque NO:
                                                                         <i class="text-danger">*</i></label>
                                                                     <div class="col-sm-6">
                                                                         <input type="number"   name="cheque_no" class=" form-control" placeholder=""  autocomplete="off"/>
                                                                     </div>


                                                                     <label for="date" class="col-sm-4 col-form-label">Due Date <i class="text-danger">*</i></label>
                                                                     <div class="col-sm-6">

                                                                         <input class="datepicker form-control" type="text" size="50" name="cheque_date" id=""  value="" tabindex="4" autocomplete="off" />
                                                                     </div>


                             </div>
                         </div>
                         <div class="col-sm-6" id="bkash_div">
                             <div class="form-group row">
                                 <label for="bank" class="col-sm-3 col-form-label">Bkash</label>
                                 <div class="col-sm-8">
                                     <select name="bkash_id" class="form-control bankpayment"  id="bkash_id">
                                         <option value="">Select Location</option>
                                         <?php foreach($bkash_list as $bkash){?>
                                             <option value="<?php echo $bkash['bkash_id']?>"><?php echo $bkash['bkash_no'];?> (<?php echo $bkash['ac_name'];?>)</option>
                                         <?php }?>
                                     </select>

                                 </div>




                             </div>
                         </div>
                         <div class="col-sm-6" id="nagad_div">
                             <div class="form-group row">
                                 <label for="bank" class="col-sm-3 col-form-label">Nagad</label>
                                 <div class="col-sm-8">
                                     <select name="nagad_id" class="form-control bankpayment"  id="nagad_id">
                                         <option value="">Select Location</option>
                                         <?php foreach($nagad_list as $nagad){?>
                                             <option value="<?php echo $nagad['nagad_id']?>"><?php echo $nagad['nagad_no'];?> (<?php echo $nagad['ac_name'];?>)</option>
                                         <?php }?>
                                     </select>

                                 </div>




                             </div>
                         </div>

                    </div>


                <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo display('date')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php echo  date('Y-m-d')?>" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo display('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                        </div>
                    </div> 
                       <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('account_name')?><i class="text-danger">*</i></th>
                                         <th class="text-center"><?php echo display('code')?></th>
                                         <th class="text-center">Due Amount</th>
                                          <th class="text-center"><?php echo display('amount')?><i class="text-danger">*</i></th>
<!--                                           <th class="text-center">--><?php //echo display('action')?><!--</th>  -->
                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                   
                                    <tr>
                                        <td class="" width="200p">  
       <select name="cmbCode[]" id="cmbCode_1" class="form-control" onchange="load_dbtvouchercode(this.value,1)" required="">
          <option value="">Please select One</option>
         <?php foreach ($acc as $acc1) {?>
   <option value="<?php echo html_escape($acc1->HeadCode);?>"><?php echo html_escape($acc1->HeadName);?></option>
         <?php }?>
       </select>

                                         </td>
                                        <td><input type="text" name="txtCode" value="" class="form-control "  id="txtCode_1" readonly=""></td>
                                        <td>
                                            <input type="text" name="balance" value="" class="form-control "  id="balance_1" readonly="">
                                            <input type="hidden" name="customer_id" value="" class="form-control "  id="customer_id_1" readonly="">
                                        </td>


                                        <td><input type="number" name="txtAmount" value="" class="form-control total_price text-right"  id="txtAmount_1" onkeyup="dbtvouchercalculation(1)" required="">
                                           </td>
<!--                                       <td>-->
<!--                                                <button class="btn btn-danger red" type="button" value="--><?php //echo display('delete')?><!--" onclick="deleteRowdbtvoucher(this)"><i class="fa fa-trash-o"></i></button>-->
<!--                                            </td>-->

                                    </tr>                              
                              
                                </tbody>                               
                             <tfoot>
                                    <tr>
                                      <td >
                                           
                                        </td>
                                        <td colspan="2" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                           </td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="" readonly="readonly" />
                                        </td>
<!--                                         <td><a id="add_more" class="btn btn-info" name="add_more"  onClick="addaccountdbt('debitvoucher')"><i class="fa fa-plus"></i></a></td>-->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>


                  <?php echo form_close() ?>
            </div>  
        </div>
    </div>
    <input type="hidden" id="headoption" value="<option value=''>Select One</option><?php foreach ($acc as $acc2) {?><option value='<?php echo html_escape($acc2->HeadCode);?>'><?php echo html_escape($acc2->HeadName);?></option><?php }?>" name="">
</div>
</section>
</div>

<script type="text/javascript">


    "use strict";
    function bank_paymet(val){
        if(val==2){
            var style = 'block';
            document.getElementById('bank_id').setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('bank_id').removeAttribute("required");
        }

        document.getElementById('bank_div').style.display = style;
        if(val==3){
            var style = 'block';
            document.getElementById('bkash_id').setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('bkash_id').removeAttribute("required");
        }

        document.getElementById('bkash_div').style.display = style;
        if(val==4){
            var style = 'block';
            document.getElementById('nagad_id').setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('nagad_id').removeAttribute("required");
        }

        document.getElementById('nagad_div').style.display = style;
    }


    $( document ).ready(function() {
        var paytype = $("#editpayment_type").val();
        if(paytype == 2){
            $("#bank_div").css("display", "block");
        }else{
            $("#bank_div").css("display", "none");
        }

        if(paytype == 3){
            $("#bkash_div").css("display", "block");
        }else{
            $("#bkash_div").css("display", "none");
        }

        if(paytype == 4){
            $("#nagad_div").css("display", "block");
        }else{
            $("#nagad_div").css("display", "none");
        }

        $(".bankpayment").css("width", "100%");
    });

</script>

