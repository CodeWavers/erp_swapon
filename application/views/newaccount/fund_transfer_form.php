<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('accounts') ?></h1>
            <small>Fund Transfer</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active">Fund Transfer</li>
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
                                Fund Transfer
                            </h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <?php echo  form_open_multipart('accounts/submit_fund_transfer', 'id="validate"') ?>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label"><?php echo display('date') ?></label>
                            <div class="col-sm-4">
                                <input type="text" name="date" id="date" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" required autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="transfer_to" class="col-sm-2 col-form-label">Transfer To</label>
                            <div class="col-sm-4">
                                <select name="transfer_to" id="transfer_to" class="form-control" onchange="outlet_changed(this.value)">
                                    <option value="">Select One</option>
                                    <?php if ($is_outlet) {
                                        foreach ($cw as $c) { ?>
                                            <option value="<?= $c['warehouse_id'] ?>"><?= $c['central_warehouse'] ?></option>
                                        <?php }
                                    } else {
                                        foreach ($outlet_list as $outlet) { ?>
                                            <option value="<?= $outlet['outlet_id'] ?>"><?= $outlet['outlet_name'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="from_pay_div" style="display: none;">
                            <label for="from_acc" class="col-sm-2 col-form-label">From (Ac.)</label>
                            <div class="col-sm-4">
                                <select name="from_acc" id="from_acc" class="form-control" onchange="bank_paymet(this.value, 1)" required>
                                    <option value="1">Cash</option>
                                    <option value="4">Bank</option>
                                    <option value="3">Bkash</option>
                                    <option value="5">Nagad</option>
                                    <option value="7">Rocket</option>
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

                        <div class="" id="bank_div_m_1" style="display:none;">
                            <div class="form-group row">
                                <label for="bank" class="col-sm-2 col-form-label"><?php
                                                                                    echo display('bank');
                                                                                    ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
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



                        <div class="" style="display: none" id="bkash_div_1">

                            <div class="form-group row">
                                <label for="bkash" class="col-sm-2 col-form-label">Bkash Number <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
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

                        <div class="" style="display: none" id="nagad_div_1">
                            <div class="form-group row">
                                <label for="nagad" class="col-sm-2 col-form-label">Nagad Number <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
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

                         <div class="" style="display: none" id="rocket_div_1">
                            <div class="form-group row">
                                <label for="rocket" class="col-sm-2 col-form-label">Rocket Number <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
                                    <select name="rocket_id_" class="form-control bankpayment" id="rocket_id_1">
                                        <option value="">Select One</option>
                                        <?php foreach ($rocket_list as $rocket) { ?>
                                            <option value="<?php echo html_escape($rocket['rocket_id']) ?>"><?php echo html_escape($rocket['rocket_no']); ?> (<?php echo html_escape($rocket['ac_name']); ?>)</option>
                                        <?php } ?>
                                    </select>

                                    <input type="hidden" id="nagad_list" value='<option value="">Select One</option>
                                            <?php foreach ($rocket_list as $rocket) { ?>
                                                <option value="<?php echo html_escape($rocket['rocket_id']) ?>"><?php echo html_escape($rocket['rocket_no']); ?> (<?php echo html_escape($rocket['ac_name']); ?>)</option>
                                            <?php } ?>'>

                                </div>
                            </div>
                         </div>

                        <div class="" style="display: none" id="card_div_1">
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

                        <div class="" id="transfer_acc_div">
                        </div>

                        <div class="form-group row" id="amount_div" style="display: none;">
                            <label for="amount" class="col-sm-2 col-form-label">Amount (&#2547;)</label>
                            <div class="col-sm-4">
                                <input type="text" name="amount" id="amount" class="form-control text-right" required autocomplete="off" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group row" id="submit_div" style="display: none;">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success" style="float:right">Submit</button>
                            </div>
                        </div>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function outlet_changed(outlet_id) {
        var acc_div = $("#transfer_acc_div");
        var csrf_test_name = $("[name=csrf_test_name]").val();

        $("#from_pay_div").css('display', 'block');

        $.ajax({
            url: '<?= base_url() ?>' + 'accounts/outlet_payments',
            type: 'POST',
            data: {
                outlet_id: outlet_id,
                csrf_test_name: csrf_test_name,
            },
            success: function(data) {
                acc_div.append(data);
                $("select.form-control:not(.dont-select-me)").select2({
                    placeholder: "Select option",
                    allowClear: true
                })
                $("#amount_div").css('display', 'block');
                $("#submit_div").css('display', 'block');
            }
        });

    }

    function bank_paymet_to(val, sl) {
        if (val == 2 || 3 || 4 || 5 || 6 || 7) {
            if (val == 2) {
                var style = "block";
                document.getElementById("bank_id_" + sl + "_to").setAttribute("required", true);
                //   document.getElementById("ammnt_" + sl).style.display = "none";
            } else {
                var style = "none";
                document.getElementById("bank_id_" + sl + "_to").removeAttribute("required");
                //   document.getElementById("ammnt_" + sl).style.display = "block";
            }

            document.getElementById("bank_div_" + sl + "_to").style.display = style;

            if (val == 3) {
                var style = "block";
                document.getElementById("bkash_id_" + sl + "_to").setAttribute("required", true);
            } else {
                var style = "none";
                document.getElementById("bkash_id_" + sl + "_to").removeAttribute("required");
            }

            document.getElementById("bkash_div_" + sl + "_to").style.display = style;

            if (val == 4) {
                var style = "block";
                document.getElementById("bank_id_m_" + sl + "_to").setAttribute("required", true);
            } else {
                var style = "none";
                document.getElementById("bank_id_m_" + sl + "_to").removeAttribute("required");
            }

            document.getElementById("bank_div_m_" + sl + "_to").style.display = style;

            if (val == 5) {
                var style = "block";
                document.getElementById("nagad_id_" + sl + "_to").setAttribute("required", true);
            } else {
                var style = "none";
                document.getElementById("nagad_id_" + sl + "_to").removeAttribute("required");
            }

            document.getElementById("nagad_div_" + sl + "_to").style.display = style;

            if (val == 7) {
                var style = "block";
                document.getElementById("rocket_id_" + sl + "_to").setAttribute("required", true);
            } else {
                var style = "none";
                document.getElementById("rocket_id_" + sl + "_to").removeAttribute("required");
            }

            document.getElementById("rocket_div_" + sl + "_to").style.display = style;

            // if (val == 6) {
            //     var style = "block";
            //     document.getElementById("card_id_" + sl + "_to").setAttribute("required", true);
            // } else {
            //     var style = "none";
            //     document.getElementById("card_id_" + sl + "_to").removeAttribute("required");
            // }

            // document.getElementById("card_div_" + sl + "_to").style.display = style;
        }
    }
</script>