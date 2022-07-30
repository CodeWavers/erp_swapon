<style type="text/css">
    .column1 {
        float: left;
        width: 50%;
    }
</style>
<!-- Product Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Sales Cheque Report</h1>
            <small>Sales Cheque Report</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Sales Cheque Report</li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">


                <?php if ($this->permission1->method('todays_sales_report', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('todays_purchase_report', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('purchase_report') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('product_sales_reports_date_wise', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report_product_wise') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('todays_sales_report', 'read')->access() && $this->permission1->method('todays_purchase_report', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('profit_report') ?> </a>
                <?php } ?>
                <a href="<?php echo base_url('accounts/credit_voucher') ?>" class="btn btn-info" style=""><i class="glyphicon glyphicon-share"> </i> <b>Credit Voucher</b> </a>


                <a href="#" class="client-add-btn btn btn-danger" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="fa fa-plus-circle m-r-2"></i><b>Add Cheque</b></a>
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
                        <?php echo form_open_multipart('Cinvoice/add_cheque', 'post') ?>
                        <div class="panel-body">
                            <div class="addCheque">
                                <div id="cheque" class="cheque">
                                    <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                    <label for="bank" class="col-sm-4 col-form-label">Invoice ID:
                                        <i class="text-danger">*</i></label>
                                    <div class="col-sm-6" style="padding-bottom:10px ">
                                        <input type="number" name="invoice_id" class=" form-control" placeholder="" autocomplete="off" />
                                        <!--                                                <input type="number"   name="cheque_id[]" class=" form-control" placeholder="" value="--><?php //echo rand()
                                                                                                                                                                                        ?>
                                        <!--" autocomplete="off"/>-->
                                    </div>

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
                                        <input type="file" name="image[]" class="form-control" multiple="multiple" id="image" tabindex="4">
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

                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                    <?php echo form_close() ?>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Product report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('', 'class="form-inline"') ?>

                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label"><?php echo display('customer') ?></label>
                            <div class="col-sm-8">
                                <select name="customer_id" id="customer_id" class="form-control" required="">
                                    <option value=""></option>
                                    <?php foreach ($customer as $customers) { ?>
                                        <option value="<?php echo html_escape($customers['customer_id']) ?>" <?php if ($customers['customer_id'] == $customer_id) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>><?php echo html_escape($customers['customer_name']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="" placeholder="<?php echo display('start_date') ?>" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date">Due Date</label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" value="" placeholder="<?php echo display('end_date') ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-filter" class="btn btn-success"><?php echo display('search') ?></button>
                            <a class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>

                        </div>





                        <?php echo form_close() ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade modal-success updateModal" id="updateProjectModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                        <h3 class="modal-title">Manage Cheque</h3>
                    </div>

                    <div class="modal-body">
                        <div id="customeMessage" class="alert hide"></div>
                        <form method="post" id="ProjectEditForm" action="<?php echo base_url() ?>Admin_dashboard/cheque_date_editted">
                            <div class="panel-body">
                                <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <input type="hidden" id="cheque_id" value="{cheque_id}" name="cheque_id">
                                    <input type="hidden" id="invoice_id" value="{invoice_id}" name="invoice_id">
                                    <input type="hidden" id="customer_id" value="{customer_id}" name="customer_id">
                                    <!--                                    <input type="text" id="due_amount" value="{due_amount}" name="due_amount">-->
                                    <input type="hidden" id="paid_amount" value="{paid_amount}" name="paid_amount">
                                    <input type="hidden" id="invoice" value="{invoice}" name="invoice">
                                    <div class="column1">
                                        <label for="cheque_date" class="col-sm-3 col-form-label">Due Date</label>

                                        <input style="width: auto;" type="text" id="cheque_date" class="form-control datepicker" name="cheque_date" value="{cheque_date}" />
                                    </div>
                                    <div class="column1">
                                        <label for="payment_date" class="col-sm-3 col-form-label m-r">Payment Date</label>

                                        <input style="width: auto;" type="text" id="payment_date" class="form-control datepicker" name="payment_date" value="" autocomplete="off" />
                                    </div>
                                    <div class="column1">
                                        <label for="cheque_no" class="col-md-3 col-form-label">Cheque No.</label>

                                        <input style="width: auto;" type="text" id="cheque_no" class="form-control " name="cheque_no" value="{cheque_no}" />
                                    </div>

                                    <div class="column1">
                                        <label for="credit_amount" class="col-md-3 col-form-label">Credit Amount</label>

                                        <input style="width: auto;" type="text" id="credit_amount" class="form-control" name="credit_amount" value="" />
                                    </div>
                                    <div class="column1">
                                        <label for="due_amount" class="col-md-3 col-form-label">Due Amount</label>

                                        <input style="width: auto;" type="text" id="due_amount" class="form-control" name="due_amount" value="{due_amount}" readonly />
                                    </div>

                                    <!--                                    <div class="column1">-->
                                    <!--                                        <label for="due_amount" class="col-md-3 col-form-label">With Cash</label>-->
                                    <!---->
                                    <!--                                        <input type="checkbox"  name="with_cash" value=''>-->
                                    <!--                                    </div>-->


                                    <div class="col-sm-6" id="payment_from_1">
                                        <div class="form-group row">
                                            <label for="payment_type" class="col-sm-4 col-form-label">
                                                Receive By <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <select name="paytype" id="paytype" class="form-control" required="" onchange="bank_paymet(this.value)">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Bank</option>
                                                    <option value="3">Bkash</option>
                                                    <option value="4">Nagad</option>

                                                </select>



                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6" id="bank_div">
                                        <div class="form-group row">
                                            <label for="bank" class="col-sm-3 col-form-label"><?php
                                                                                                echo display('bank');
                                                                                                ?></label>
                                            <div class="col-sm-8">
                                                <select name="bank_id" class="form-control bankpayment" id="bank_id">
                                                    <option value="">Select Location</option>
                                                    <?php foreach ($bank_list as $bank) { ?>
                                                        <option value="<?php echo $bank['bank_id'] ?>"><?php echo $bank['bank_name']; ?> (<?php echo $bank['ac_number']; ?>)</option>
                                                    <?php } ?>
                                                </select>

                                            </div>




                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="bkash_div">
                                        <div class="form-group row">
                                            <label for="bank" class="col-sm-3 col-form-label">Bkash</label>
                                            <div class="col-sm-8">
                                                <select name="bkash_id" class="form-control bankpayment" id="bkash_id">
                                                    <option value="">Select Location</option>
                                                    <?php foreach ($bkash_list as $bkash) { ?>
                                                        <option value="<?php echo $bkash['bkash_id'] ?>"><?php echo $bkash['bkash_no']; ?> (<?php echo $bkash['ac_name']; ?>)</option>
                                                    <?php } ?>
                                                </select>

                                            </div>




                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="nagad_div">
                                        <div class="form-group row">
                                            <label for="bank" class="col-sm-3 col-form-label">Nagad</label>
                                            <div class="col-sm-8">
                                                <select name="nagad_id" class="form-control bankpayment" id="nagad_id">
                                                    <option value="">Select Location</option>
                                                    <?php foreach ($nagad_list as $nagad) { ?>
                                                        <option value="<?php echo $nagad['nagad_id'] ?>"><?php echo $nagad['nagad_no']; ?> (<?php echo $nagad['ac_name']; ?>)</option>
                                                    <?php } ?>
                                                </select>

                                            </div>




                                        </div>
                                    </div>




                                </div>



                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label">Change Status:</label>
                                    <div class="col-sm-6">
                                        <input style="" type="checkbox" name="status" class="status" checked />
                                        <input type="hidden" name="hidden_status" id="hidden_status" value="{st}" />
                                    </div>


                                </div>


                            </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" id="ProjectUpdateConfirmBtn" class="btn btn-success">Update</button>
                    </div>
                    <!--                    <div class="modal-footer">-->
                    <!---->
                    <!--                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>-->
                    <!---->
                    <!--                        <input type="submit" id="ProjectUpdateConfirmBtn" class="btn btn-success" value="Submit">-->
                    <!--                    </div>-->
                    <?php echo form_close() ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Sales Cheque Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="purchase_div" class="table-responsive">
                            <table class="print-table" width="100%">

                                <tr>
                                    <td align="left" class="print-table-tr">
                                        <img src="<?php echo $software_info[0]['logo']; ?>" alt="logo">
                                    </td>
                                    <td align="center" class="print-cominfo">
                                        <span class="company-txt">
                                            <?php echo $company[0]['company_name']; ?>

                                        </span><br>
                                        <?php echo $company[0]['address']; ?>
                                        <br>
                                        <?php echo $company[0]['email']; ?>
                                        <br>
                                        <?php echo $company[0]['mobile']; ?>

                                    </td>

                                    <td align="right" class="print-table-tr">
                                        <date>
                                            <?php echo display('date') ?>: <?php
                                                                            echo date('d-M-Y');
                                                                            ?>
                                        </date>
                                    </td>
                                </tr>

                            </table>
                            <form id="editForm" method="post">
                                <div class="table-responsive">

                                    <table id="editable_table" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice ID</th>

                                                <th><?php echo display('customer_name') ?></th>
                                                <th>Bank Name</th>
                                                <th>Cheque Type</th>
                                                <th>Cheque No:</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>Cheque Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <!--                                    <tfoot>-->
                                        <!--                                    <tr>-->
                                        <!--                                        <td colspan="4" align="right">&nbsp; <b>--><?php //echo display('total_ammount')
                                                                                                                                ?>
                                        <!--</b></td>-->
                                        <!--                                        <td class="text-right"><b>--><?php //echo (($position == 0) ? "$currency {sub_total}" : "{sub_total} $currency")
                                                                                                                    ?>
                                        <!--</b></td>-->
                                        <!--                                    </tr>-->
                                        <!--                                    </tfoot>-->
                                    </table>
                                </div>

                            </form>
                        </div>
                        <!--  <button type="button" onclick="get_cheque_report()">JS</button> -->
                        <div class="text-right"><?php echo $links ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Product Report End -->

<script type="text/javascript">
    $(document).ready(function() {

        $(".add_cheque").click(function() {
            $(".addCheque").append(" <div id=\"cheque\" class=\"cheque\">\n" +
                "                                            <input type =\"hidden\" name=\"csrf_test_name\" id=\"\" value=\"<?php echo $this->security->get_csrf_hash(); ?>\">\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Cheque type:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "                                                <input type=\"text\"   name=\"cheque_type[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();
                                                                                                                                                                    ?>//\" autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Cheque NO:\n" +
                "                                                <i class=\"text-danger\">*</i></label>\n" +
                "                                            <div class=\"col-sm-6\">\n" +
                "                                                <input type=\"number\"   name=\"cheque_no[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                //"                                                <input type=\"number\"   name=\"cheque_id[]\" class=\" form-control\" placeholder=\"\"  value=\"<?php //echo rand();
                                                                                                                                                                    ?>//\" autocomplete=\"off\"/>\n" +
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
                "                                            <div class=\"col-sm-6\"  >\n" +
                "                                                <input type=\"number\"   name=\"amount[]\" class=\" form-control\" placeholder=\"\"   autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "                                            <label for=\"bank\" class=\"col-sm-4 col-form-label\">Image:\n" +
                "                                                </label>\n" +
                "                                            <div class=\"col-sm-6\" style=\"padding-bottom:10px \" >\n" +
                "                                                <input type=\"file\"   name=\"image[]\" class=\" form-control\" placeholder=\"\"  multiple=\"multiple\" autocomplete=\"off\"/>\n" +
                "                                            </div>\n" +
                "\n" +
                "\n" +
                "                                            <div  class=\" col-sm-1\">\n" +
                "                                                <a href=\"#\" id=\"Remove_Cheque\"  class=\"client-add-btn btn btn-danger remove_cheque\" ><i class=\"fa fa-minus-circle m-r-2\"></i></a>\n" +
                "                                            </div>\n" +
                "                                            </div>");
        });


    });



    $("body").on("click", ".remove_cheque", function(e) {
        $(this).parents('.cheque').remove();
        //the above method will remove the user_data div
    });
</script>
<script>
    $(document).ready(function() {
        var csrf_test_name = $('[name="csrf_test_name"]').val();

        $('.status').bootstrapToggle({
            on: 'Due',
            off: 'Paid',
            onstyle: 'danger',
            offstyle: 'success'
        });

        $('.status').change(function() {
            if ($(this).prop('checked')) {
                $('#hidden_status').val('2');
            } else {
                $('#hidden_status').val('1');
            }
        });

        var table = $('#editable_table').DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "Paginate": true,
            "serverSide": true,
            'serverMethod': 'post',
            "ajax": {
                url: "<?php echo base_url() ?>Admin_dashboard/get_items",
                "data": function(data) {
                    data.fromdate = $('#from_date').val();
                    data.todate = $('#to_date').val();
                    data.customer_id = $('#customer_id').val();
                    data.csrf_test_name = csrf_test_name;
                    console.log(data);

                }
            },

            "columns": [
                {
                    data: "sl"
                },
                {
                    data: "invoice_id"
                },
                {
                    data: "customer_name"
                },
                {
                    data: "bank_id"
                },
                {
                    data: "cheque_type"
                },
                {
                    data: "cheque_no"
                },
                {
                    data: "status"
                },
                {
                    data: "cheque_date"
                },
                {
                    data: "amount"
                },
                {
                    data: "image"
                },
                {
                    data: "action",
                    "searchable": false,
                    "orderable": false
                }
            ],
        });




        $('#editable_table').on('click', '.date-edit', function() {
            var cheque_id = $(this).attr('data');
            $('#updateProjectModal').modal('show');
            console.log(cheque_id);

            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>Admin_dashboard/cheque_date_update',
                data: {
                    cheque_id: cheque_id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=invoice_id]').val(data.invoice_id);
                    $('input[name=cheque_id]').val(data.cheque_id);
                    $('input[name=cheque_date]').val(data.cheque_date);
                    $('input[name=payment_date]').val(data.payment_date);
                    $('input[name=cheque_no]').val(data.cheque_no);
                    $('input[name=customer_id]').val(data.customer_id);
                    $('input[name=credit_amount]').val(data.amount);
                    $('input[name=paid_amount]').val(data.total_paid);
                    var due = data.due_amount;
                    var paid = data.paid_amount;
                    $('input[name=due_amount]').val(due)
                    $('input[name=invoice]').val(data.invoice);
                    $('input[name=hidden_status]').val(data.st);

                    console.log(due);
                },
                error: function() {
                    alert('Could not displaying data');
                }
            });
        });

        $("#ProjectEditForm").on('submit', function(event) {
            event.preventDefault();
            // var form= $("#ProjectEditForm");

            var hidden_status = $('#hidden_status').val();
            var payment_date = $('#payment_date').val();
            var cheque_date = $('#cheque_date').val();
            var invoice_id = $('#invoice_id').val();
            var cheque_id = $('#cheque_id').val();
            // var customer_id= $('#customer_id').val();
            var customer_id = $('input[name=customer_id]').val();
            var with_cash = $('input[name=with_cash]').val();

            var bank_id = $('#bank_id').val();
            var bkash_id = $('#bkash_id').val();
            var nagad_id = $('#nagad_id').val();
            var cheque_no = $('#cheque_no').val();
            var paytype = $('#paytype').val();
            var due_amount = $('#due_amount').val();
            var paid_amount = $('#paid_amount').val();
            var credit_amount = $('#credit_amount').val();
            var invoice = $('#invoice').val();
            var csrf_test_name = $('[name="csrf_test_name"]').val();
            console.log(cheque_date);
            console.log(invoice_id);
            //$('#ProjectEditForm').modal('hide');
            $.ajax({
                method: 'POST',
                url: "<?php echo base_url() ?>Admin_dashboard/cheque_date_editted",
                dataType: 'json',
                async: false,
                data: {
                    invoice_id: invoice_id,
                    paytype: paytype,
                    bkash_id: bkash_id,
                    nagad_id: nagad_id,
                    bank_id: bank_id,
                    cheque_id: cheque_id,
                    csrf_test_name: csrf_test_name,
                    cheque_date: cheque_date,
                    payment_date: payment_date,
                    with_cash: with_cash,
                    hidden_status: hidden_status,
                    cheque_no: cheque_no,
                    customer_id: customer_id,
                    due_amount: due_amount,
                    paid_amount: paid_amount,
                    credit_amount: credit_amount,
                    invoice: invoice
                },
                success: function(data) {

                    console.log(data);
                    table.ajax.reload(null, true);
                    $('[name="invoice_id"]').val("");
                    $('[name="cheque_id"]').val("");
                    $('[name="payment_date"]').val("");
                    $('[name="cheque_date"]').val("");
                    $('[name="customer_id"]').val("");
                    $('[name="cheque_no"]').val("");
                    $('[name="credit_amount"]').val("");
                    $('[name="due_amount"]').val("");
                    $('[name="paid_amount"]').val("");
                    $('[name="invoice"]').val("");
                    $('[name="hidden_status"]').val("");
                    $('[name="with_cash"]').val("");
                    $('[name="paytype"]').val("");
                    $('[name="bank_id"]').val("");

                    // $('[name="price_edit"]').val("");
                    $('.updateModal').modal('hide');
                    //toastr[data.type](data.message);
                    table.ajax.reload();
                    location.reload();
                },


            });

        });
        $('#btn-filter').click(function() {
            table.ajax.reload();
        });
    });

    "use strict";

    function bank_paymet(val) {
        if (val == 2) {
            var style = 'block';
            document.getElementById('bank_id').setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('bank_id').removeAttribute("required");
        }

        document.getElementById('bank_div').style.display = style;
        if (val == 3) {
            var style = 'block';
            document.getElementById('bkash_id').setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('bkash_id').removeAttribute("required");
        }

        document.getElementById('bkash_div').style.display = style;
        if (val == 4) {
            var style = 'block';
            document.getElementById('nagad_id').setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('nagad_id').removeAttribute("required");
        }

        document.getElementById('nagad_div').style.display = style;
    }


    $(document).ready(function() {
        var paytype = $("#editpayment_type").val();
        if (paytype == 2) {
            $("#bank_div").css("display", "block");
        } else {
            $("#bank_div").css("display", "none");
        }

        if (paytype == 3) {
            $("#bkash_div").css("display", "block");
        } else {
            $("#bkash_div").css("display", "none");
        }

        if (paytype == 4) {
            $("#nagad_div").css("display", "block");
        } else {
            $("#nagad_div").css("display", "none");
        }

        $(".bankpayment").css("width", "100%");
    });
</script>