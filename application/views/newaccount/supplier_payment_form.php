<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('accounts') ?></h1>
            <small><?php echo display('supplier_payment') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active"><?php echo display('supplier_payment') ?></li>
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
                                <?php echo display('supplier_payment') ?>
                            </h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <?php echo  form_open_multipart('accounts/create_supplier_payment', 'id="validate"') ?>
                        <div class="form-group row">
                            <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no') ?></label>
                            <div class="col-sm-4">
                                <input type="text" name="txtVNo" id="txtVNo" value="<?php if (!empty($voucher_no[0]['voucher'])) {
                                                                                        $vn = substr($voucher_no[0]['voucher'], 3) + 1;
                                                                                        echo $voucher_n = 'PM-' . $vn;
                                                                                    } else {
                                                                                        echo $voucher_n = 'PM-1';
                                                                                    } ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label"><?php echo display('date') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment_type" class="col-sm-2 col-form-label">Credit Account <i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <select name="paytype" class="form-control" required="" onchange="bank_paymet(this.value, 1)" tabindex="3">
                                    <option value="1"><?php echo display('cash_payment') ?></option>
                                    <!-- <option value="2">Cheque Payment</option> -->
                                    <option value="4"><?php echo display('bank_payment') ?></option>
                                    <option value="3">Bkash Payment</option>
                                    <option value="5">Nagad Payment</option>
                                    <!-- <option value="6">Card Payment</option> -->
                                </select>
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
                                        <select name="bank_id_m" class="form-control bankpayment" id="bank_id_m_1">
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
                                        <select name="bkash_id" class="form-control bankpayment" id="bkash_id_1">
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
                                        <select name="nagad_id" class="form-control bankpayment" id="nagad_id_1">
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
                                        <select name="card_id" class="form-control bankpayment" id="card_id_1" onchange="card_charge()">
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
                            </div>


                        </div>
                        <div class="form-group row">
                            <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo display('remark') ?></label>
                            <div class="col-sm-4">
                                <textarea name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="debtAccVoucher">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('supplier_name') ?><i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('code') ?></th>
                                        <th class="text-center"><?php echo display('amount') ?><i class="text-danger">*</i></th>

                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">

                                    <tr>
                                        <td class="" width="300">
                                            <select name="supplier_id" id="supplier_id_1" class="form-control" onchange="load_supplier_code(this.value,1)" required>
                                                <<option value="">Select Supplier</option>}
                                                    option
                                                    <?php foreach ($supplier_list as $suplier) { ?>
                                                        <option value="<?php echo html_escape($suplier->supplier_id); ?>"><?php echo html_escape($suplier->supplier_name); ?></option>
                                                    <?php } ?>
                                            </select>

                                        </td>
                                        <td><input type="text" name="txtCode" value="" class="form-control " id="txtCode_1" readonly=""></td>
                                        <td><input type="number" name="txtAmount" value="" class="form-control total_price text-right" id="txtAmount_1" onkeyup="supplierRcvcalculation(1)" required>
                                        </td>

                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>

                                        </td>
                                        <td colspan="1" class="text-right"><label for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                        </td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="" readonly="readonly" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9" />

                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>