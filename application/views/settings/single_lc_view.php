<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Letter of Credit</h1>
            <small>LC Details</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Letter of Credit</a></li>
                <li class="active">LC Details</li>
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
                                LC Details
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">
                        <?php echo form_open('Csettings/update_lc', array('name' => 'update_lc_form', 'id' => 'update_lc_form')) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="supp_id" class="col-form-label col-sm-4">
                                    Supplier Name
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="supp_name" value="<?= $lc_details[0]['supplier_name'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="supp_id" class="col-form-label col-sm-4">
                                    Date
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                    $date = date('m/d/Y');
                                    ?>
                                    <input type="text" class="form-control" name="date" value="<?php echo $date ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top10">
                            <div class="col-sm-6">
                                <label for="supp_id" class="col-form-label col-sm-4">
                                    LC Number
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="lc_no" value="<?= $lc_details[0]['lc_no'] ?>" readonly>
                                    <input type="hidden" value="<?= $lc_details[0]['lc_id'] ?>" name="lc_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="supp_id" class="col-form-label col-sm-4">LC Value</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="lc_amount" id="lc_val" value="<?= $lc_details[0]['lc_amount'] ?>" readonly>
                                    <input type="hidden" name="purchase_id" id="pur_id" value="<?= $lc_details[0]['pur_id'] ?>">
                                    <input type="hidden" name="lc_id" value="<?= $lc_details[0]['lc_id'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 50px;">
                            <h4 style="margin-left: 30px;">Purchased Products</h4>
                            <div class="col-sm-5 product_div">
                                <div class="table-responsive margin-top10">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                        </thead>
                                        <tbody>
                                            {pr_details}
                                            <tr>
                                                <td>{sl}</td>
                                                <td>{product_name}</td>
                                                <td>{p_qty}</td>
                                            </tr>
                                            {/pr_details}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" class="text-right"><strong>Total</strong></td>
                                                <td>{total_qty}</td>
                                                <input type="hidden" name="total_qty" id="total_qty" value="{total_qty}">
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right"><strong>Per Item Additional Cost</strong></td>
                                                <td><input class="form-control" type="text" name="per_item_add_cost" id="add_cost_item" readonly></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <label for="margin" class="col-sm-4 col-form-label">
                                        Margin (%)
                                    </label>
                                    <div class="col-sm-6">
                                        <input onchange="cal()" onkeyup="calc()" class="form-control" type="text" placeholder="%" name="margin" id="margin" value="<?= $lc_details[0]['margin'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 10px;">
                                    <label for="new_value" class="col-sm-4 col-form-label">
                                        Value
                                    </label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="new_value" id="new_value" value="<?= $lc_details[0]['margin_value'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 10px;">
                                    <label class="col-sm-4 col-form-label" for="lc_balance">Due</label>
                                    <div class="col-sm-6">
                                        <input id="lc_balance" class="form-control" type="text" name="lc_balance" value="<?= $lc_details[0]['due_amount'] ?>" readonly>
                                    </div>
                                </div>

                                <input type="hidden" name="" id="bank_select" value="<?php
                                                                                        foreach ($bank_list as $bank) {
                                                                                            echo "<option value='" . $bank['bank_id'] . "'>" . $bank['bank_name'] . "</option>";
                                                                                        }
                                                                                        ?>">

                                <div class="col-sm-12" style=" margin-top: 20px;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="margin_pay_table">
                                            <thead>
                                                <tr>
                                                    <th>Pay Type</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="pay_td_1">
                                                        <select id="pay_type_1" class="form-control" name="pay_type[]" onchange="pay_changed(1)">
                                                            <option value="1">Cash</option>
                                                            <option value="2">Bank</option>
                                                            <option value="3">TT</option>
                                                        </select>
                                                        <div id="bank_div_1" class="margin-top10" style="display: none;">
                                                            <label for="banks_1" class="col-form-label">Bank: </label>
                                                            <select id="banks_1" class="form-control" name="bank_id[]">
                                                                {bank_list}
                                                                <option value="{bank_id}">{bank_name}</option>
                                                                {/bank_list}
                                                            </select>

                                                        </div>

                                                        <div id="tt_div_1" class="margin-top10" style="display: none;">
                                                            <label for="tt_1" class="col-form-label">Type: </label>
                                                            <select id="tt_1" class="form-control" name="tt_pay[]" onchange="tt_changed(1)">
                                                                <option value="1">Cash</option>
                                                                <option value="2">Bank</option>
                                                            </select>
                                                        </div>
                                                        <div id="tt_bank_div_1" class="margin-top10" style="display: none;">
                                                            <label for="tt_banks_1" class="col-form-label">Bank: </label>
                                                            <select id="tt_banks_1" class="form-control" name="tt_bank_id[]">
                                                                {bank_list}
                                                                <option value="{bank_id}">{bank_name}</option>
                                                                {/bank_list}
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <input class="form-control text-right" type="text" id="supp_amount_1" name="supp_amount[]">
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <input type="hidden" id="sl" value="2">
                                                        <button class="btn btn-sm btn-success" type="button" onclick="add_row()">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                                <?php if ($lc_payments) { ?>
                                    <h4 class="col-sm-12">Payment History</h4>
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th>SL</th>
                                                    <th>Pay Type</th>
                                                    <th>Account</th>
                                                    <th>Amount</th>
                                                </thead>
                                                <tbody>
                                                    {lc_payments}
                                                    <tr>
                                                        <td>{sl}</td>
                                                        <td>{pay_name}</td>
                                                        <td>{account}</td>
                                                        <td>{amount}</td>
                                                    </tr>
                                                    {/lc_payments}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($exp_history) { ?>
                            <h4 class="col-sm-12 margin-top10">Expense History</h4>
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>SL</th>
                                            <th>Expenditure</th>
                                            <th>Amount</th>
                                        </thead>
                                        <tbody>

                                            <?php $sl = 1;
                                            foreach ($exp_history as $exp) {

                                            ?><tr>
                                                    <td><?= $sl ?></td>
                                                    <td><?= $exp['HeadName'] ?></td>
                                                    <td><?= $exp['Debit'] ?></td>
                                                </tr>
                                            <?php $sl++;
                                            } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-sm-12 margin-top10">
                            <center>
                                <h4>Expenses</h4>
                            </center>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="exp_table">
                                    <thead>
                                        <th>SL</th>
                                        <th>Expenditure</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </thead>
                                    <input type="hidden" id="exp_list" value="<?php
                                                                                foreach ($lc_expenses as $exp) {
                                                                                    echo "<option value='" . $exp['HeadCode'] . "'>" . $exp['HeadName'] . "</option>";
                                                                                }
                                                                                ?>">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select class="form-control" name="expense_head[]" id="expense_head_1">
                                                    <?php foreach ($lc_expenses as $exp) { ?>
                                                        <option value="<?= $exp['HeadCode'] ?>"><?= $exp['HeadName'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control expense" name="exp_amount[]" onkeyup="exp_amount_calc(this)" onchange="exp_amount_calc()"></td>
                                            <td>
                                                <select name="exp_payment[]" onchange="exp_pay_changed(this, 1)" class="form-control">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Bank</option>
                                                    <option value="3">TT (Cash)</option>
                                                    <option value="4">TT (Bank)</option>
                                                </select>

                                                <div id="exp_bank_div_1" class="margin-top10" style="display: none;">
                                                    <label for="exp_banks_1" class="col-form-label">Bank: </label>
                                                    <select id="exp_banks_1" class="form-control" name="exp_bank_id[]">
                                                        {bank_list}
                                                        <option value="{bank_id}">{bank_name}</option>
                                                        {/bank_list}
                                                    </select>

                                                </div>
                                            </td>
                                            <td>
                                                <input type="hidden" id="exp_sl" value="2">
                                                <button type="button" class="btn btn-sm btn-success" id="add_btn_1" onclick="add_exp_row()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="text-right">
                                                <strong>Total</strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="total_expense" id="total_expense" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <button class="btn btn-success right" type="submit">Update</button>
                            <?php echo form_close() ?>
                        </div>
                        <!-- </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function calc() {
        var margin = $("#margin").val();
        var lc_val = $("#lc_val").val();

        var new_val = lc_val * (margin / 100);

        $("#new_value").val((parseFloat(new_val)).toFixed(2, 2));

        var lc_bal = lc_val - new_val;

        $("#lc_balance").val((parseFloat(lc_bal)).toFixed(2, 2))

    }

    function add_row() {
        var sl = $("#sl").val();
        var banks = $("#bank_select").val();

        var html = "";
        html = '<tr>' +
            '<td id="pay_td_' + sl + '">' +
            '<select id="pay_type_' + sl + '" class="form-control" name="pay_type[]" onchange="pay_changed(' + sl + ')">' +
            '<option value="1">Cash</option>' +
            '<option value="2">Bank</option>' +
            '<option value="3">TT</option>' +
            '</select> ' +
            '<div id="bank_div_' + sl + '" class="margin-top10" style="display: none;">' +
            ' <label for="banks_' + sl + '" class="col-form-label">Bank: </label>' +
            ' <select id="banks_' + sl + '" class="form-control" name="bank_id[]">' +
            banks +
            ' </select>' +

            ' </div> ' +

            '<div id="tt_div_' + sl + '" class="margin-top10" style="display: none;">' +
            '<label for="tt_' + sl + '" class="col-form-label">Type: </label>' +
            '<select id="tt_' + sl + '" class="form-control" name="tt_pay[]">' +
            '<option value="1">Cash</option>' +
            '<option value="2">Bank</option>' +
            '</select>' +
            '</div>' +
            '<div id="tt_bank_div" class="margin-top10" style="display: none;">' +
            '<label for="tt_banks_' + sl + '" class="col-form-label">Bank: </label>' +
            '<select id="tt_banks_' + sl + '" class="form-control" name="tt_bank_id[]">' +
            banks +
            '</select>' +
            '</div>' +
            '</td>' +
            '<td style="vertical-align: middle;">' +
            '<input class="form-control text-right" type="text" id="supp_amount_' + sl + '" name="supp_amount[]">' +
            '</td>' +
            '<td style="vertical-align: middle;">' +

            '<button class="btn btn-sm btn-danger" type="button" onclick="delete_row(this)"><i class="fa fa-trash"></i></button>' +
            '</td>' +
            '</tr>';


        $("#margin_pay_table > tbody").append(html);

        $("select.form-control:not(.dont-select-me)").select2({
            placeholder: "Select option",
            allowClear: true
        })
        sl++;

        $("#sl").val(sl);

    }

    function delete_row(e) {
        e.closest('tr').remove();
    }

    function pay_changed(sl) {
        val = $("#pay_type_" + sl).val();

        if (val == 2 || 3) {
            if (val == 2) {
                $("#bank_div_" + sl).css('display', 'block');
            } else {
                $("#bank_div_" + sl).css('display', 'none');
            }

            if (val == 3) {
                $("#tt_div_" + sl).css('display', 'block');
            } else {
                $("#tt_div_" + sl).css('display', 'none');
            }
        }
    }

    function tt_changed(sl) {
        val = $("#tt_" + sl).val();
        if (val == 2) {
            $("#tt_bank_div_" + sl).css('display', 'block');
        } else {
            $("#tt_bank_div_" + sl).css('display', 'none');
        }
    }

    function exp_amount_calc() {
        var tot = 0;
        var total_qty = parseFloat($("#total_qty").val());

        $('.expense').each(function() {
            isNaN(this.value) || 0 == this.value.length || (tot += parseFloat(this.value))
        });

        $("#total_expense").val(tot.toFixed(2, 2));

        var per_item_add = tot / total_qty;

        $("#add_cost_item").val(per_item_add.toFixed(2, 2))
    }

    function exp_pay_changed(e) {
        var val = e.value;
        var banks = $("#bank_select").val();
        var html = "";
        html += "";
        e.closest('td').append(html);
    }

    function add_exp_row(e) {
        var sl = $("#exp_sl").val();
        var exp_list = $("#exp_list").val();
        var banks = $("#bank_select").val();

        var html = "";

        html += '<tr>' +
            ' <td>1</td>' +
            ' <td>' +
            '    <select class="form-control" name="expense_head[]" id="expense_head_' + sl + '">' +
            exp_list +

            '   </select>' +
            ' </td>' +
            ' <td><input type="text" class="form-control expense" name="exp_amount[]" onkeyup="exp_amount_calc(this)" onchange="exp_amount_calc()"></td>' +
            '  <td>' +
            '     <select name="exp_payment[]" onchange="exp_pay_changed(this, ' + sl + ')" class="form-control">' +
            '         <option value="1">Cash</option>' +
            '         <option value="2">Bank</option>' +
            '         <option value="3">TT (Cash)</option>' +
            '         <option value="4">TT (Bank)</option>' +
            '     </select>' +
            '<div id="exp_bank_div_' + sl + '" class="margin-top10" style="display: none;">' +
            ' <label for="exp_banks_' + sl + '" class="col-form-label">Bank: </label>' +
            ' <select id="exp_banks_' + sl + '" class="form-control" name="exp_bank_id[]">' +
            banks +
            ' </select>' +

            ' </div> ' +
            '  </td>' +
            '  <td>' +
            '     <button type="button" class="btn btn-sm btn-danger" id="delete_btn_' + sl + '" onclick="delete_exp_row(this)">' +
            '         <i class="fa fa-trash"></i>' +
            '     </button>' +
            '  </td>' +
            '</tr>';

        $("#exp_table > tbody").append(html);

        sl++;

        $("#exp_sl").val(sl);

    }

    function delete_exp_row(e) {
        e.closest('tr').remove();
    }

    function exp_pay_changed(e, sl) {
        // console.log(sl);
        var val = e.value;

        if (val == 2 || val == 4) {
            $("#exp_bank_div_" + sl).css('display', 'block');
        } else {
            $("#exp_bank_div_" + sl).css('display', 'none');
        }
    }
</script>