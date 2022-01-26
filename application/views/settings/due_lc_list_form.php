<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Letter Of Credit</h1>
            <small>LC Details</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Letter Of Credit</a></li>
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
                        <?php echo form_open(base_url('Csettings/lc_payment'));
                        if ($due_list) { ?>
                            <div class="table-responsive">
                                <table class="table datatable table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>LC No.</th>
                                            <th>Supplier Name</th>
                                            <th>Due Amount</th>
                                            <th>Payment Type</th>
                                            <th>Action</th>
                                            <input type="hidden" id="pur_id" value="<?= $due_list[0]['purchase_id'] ?>">
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {due_list}
                                        <tr>
                                            <input type="hidden" value="{sl2}" id="pay_sl_{lc_id}">
                                            <td>{sl}</td>
                                            <td>{lc_no}
                                                <input type="hidden" name="" id="lc_no_{lc_id}" value="{lc_no}">
                                            </td>
                                            <td>{supplier_name}</td>
                                            <td>{due_amount}
                                                <input type="hidden" id="lc_value" value="{amount}">
                                            </td>
                                            <td>
                                                <select id="pay_{lc_id}_{sl}" class="form-control" name="pay_{lc_id}[]" onchange="pay_changed({lc_id},{sl})">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Bank</option>
                                                    <option value="3">TT (Cash)</option>
                                                    <option value="4">TT (Bank)</option>
                                                </select>
                                                <input class="form-control margin-top10" style="width: 100%;" type="text" name="amount_{lc_id}[]" id="amount_{lc_id}_{sl}" placeholder="Amount">
                                                <div id="bank_div_{lc_id}_{sl}" class="margin-top10" style="display: none;">
                                                    <label for="banks_{lc_id}_{sl}" class="col-form-label">Bank: </label>
                                                    <select id="banks_{lc_id}_{sl}" class="form-control" name="bank_id_{lc_id}[]">
                                                        <?php foreach ($bank_list as $banks) { ?>
                                                            <option value="<?= $banks['bank_id'] ?>"><?= $banks['bank_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" onclick="supplier_paid(this, {lc_id})">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-success btn-sm" onclick="add_pay_row(this, {lc_id})">
                                                    <i class="fa fa-plus"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        {/due_list}
                                    </tbody>
                                    <input type="hidden" name="" id="bank_select" value="<?php
                                                                                            foreach ($bank_list as $bank) {
                                                                                                echo "<option value='" . $bank['bank_id'] . "'>" . $bank['bank_name'] . "</option>";
                                                                                            }
                                                                                            ?>">
                                </table>
                            </div>
                        <?php } else { ?>
                            <center>
                                <h3>No Pending Payment</h3>
                            <?php }
                        echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function supplier_paid(e, lc_id) {
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var lc_value = $("#lc_value").val();
        var pur_id = $("#pur_id").val();
        var lc_no = $("#lc_no_" + lc_id).val();

        var pay_type = $("select[name='pay_" + lc_id + "[]']").map(function() {
            return $(this).val();
        }).get();

        var amount = $("input[name='amount_" + lc_id + "[]']").map(function() {
            return $(this).val();
        }).get();

        var bank_id = $("select[name='bank_id_" + lc_id + "[]']").map(function() {
            return $(this).val();
        }).get();

        // console.log(pay_type);
        // console.log(amount);
        // console.log(JSON.stringify(bank_id));
        // return;
        $.ajax({
            url: '<?= base_url('Csettings/update_lc_payment') ?>',
            type: 'POST',
            data: {
                csrf_test_name: csrf_test_name,
                pur_id: pur_id,
                lc_id: lc_id,
                lc_value: lc_value,
                lc_no: lc_no,
                pay_type: JSON.stringify(pay_type),
                amount: JSON.stringify(amount),
                bank_id: JSON.stringify(bank_id),
            },
            success: () => {
                e.closest('tr').remove();
                toastr.success('Payment Updated');
            },
            error: () => {
                toastr.error('Something went wrong.');
            }

        })
    }

    // function undo_margin(e, lc_id) {
    //     var csrf_test_name = $('[name="csrf_test_name"]').val();
    //     $.ajax({
    //         url: '<?= base_url('Csettings/undo_lc_margin') ?>',
    //         type: 'POST',
    //         data: {
    //             csrf_test_name: csrf_test_name,
    //             lc_id: lc_id
    //         },
    //         success: () => {
    //             e.closest('tr').remove();
    //             toastr.success('LC removed from list');
    //         },
    //         error: () => {
    //             toastr.error('Something went wrong.');
    //         }

    //     })
    // }

    function pay_changed(lc_id, sl) {
        val = $("#pay_" + lc_id + "_" + sl).val();
        console.log(val);

        if (val == 2 || val == 4) {
            $("#bank_div_" + lc_id + "_" + sl).css('display', 'block');
        } else {
            $("#bank_div_" + lc_id + "_" + sl).css('display', 'none');
        }

    }

    function add_pay_row(e, lc_id) {

        var html = "";
        var sl = $('#pay_sl_' + lc_id).val();
        var banks = $("#bank_select").val();
        console.log(sl);

        html += '<tr>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            ' <td></td>' +
            ' <td>' +
            ' <select id="pay_' + lc_id + '_' + sl + '" class="form-control wd-100" name="pay_' + lc_id + '[]" onchange="pay_changed(' + lc_id + ',' + sl + ')">' +
            '       <option value="1">Cash</option>' +
            '       <option value="2">Bank</option>' +
            '       <option value="3">TT (Cash)</option>' +
            '       <option value="4">TT (Bank)</option>' +
            '   </select>' +
            '   <input class="form-control wd-100 margin-top10" type="text" name="amount_' + lc_id + '[]" id="amount_' + lc_id + '_' + sl + '" placeholder="Amount">' +
            '   <div id="bank_div_' + lc_id + '_' + sl + '" class="margin-top10" style="display: none;">' +
            '       <label for="banks_' + lc_id + '_' + sl + '" class="col-form-label wd-100">Bank: </label>' +
            '       <select id="banks_' + lc_id + '_' + sl + '" class="form-control wd-100" name="bank_id_' + lc_id + '[]">' +
            banks +
            '       </select>' +
            '   </div>' +
            '</td>' +
            ' <td>' +
            '<button type="button" class="btn btn-danger btn-sm" onclick="delete_row(this)">' +
            '                <i class="fa fa-trash"></i>' +
            '            </button>' +
            '</td>' +
            '</tr>';




        $(e).closest('tr').after(html);
        sl++;
        $('#pay_sl_' + lc_id).val(sl);

    }

    function delete_row(e) {
        e.closest('tr').remove();
    }
</script>