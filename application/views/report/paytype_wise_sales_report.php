<!-- Manage Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('report') ?></h1>
            <small>Payment Type Wise Sales Report</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Payment Type Wise Sales Report</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12">


                <?php if ($this->permission1->method('all_report', 'read')->access()) { ?>
                    <a class="btn btn-success m-b-5 m-r-2" href="<?php echo base_url('Admin_dashboard/all_report') ?>"><?php echo display('todays_report') ?></a>
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


            </div>
        </div>



        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <?php echo form_open('Admin_dashboard/sale_report_paytype_wise', array('class' => 'form-inline')) ?>
                            <?php if (!$outlet_list) { ?>
                                <?php if ($outlet_list) { ?>
                                    <div class="form-group">
                                        <input type="hidden" name="outlet_id" class="form-control " id="outlet_id" value="<?php echo $outlet_list[0]['outlet_id']; ?>">
                                    </div>
                                <?php } elseif ($cw) { ?>
                                    <label class="col-sm-2 col-form-label" for="category">Outlet :</label>
                                    <div class="form-group col-sm-5">
                                        <select name="outlet_id" class="form-control" id="outlet">
                                            <option value="">--select one -- </option>
                                            <option value="1">Consolidated</option>
                                            <?php
                                            foreach ($cw as $cw) {
                                            ?>
                                                <option value="<?php echo $cw['outlet_id']; ?>"><?php echo $cw['outlet_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-sm-12 row margin-top10">
                                <label for="" class="col-form-label col-sm-2">From :</label>
                                <div class="col-sm-3">
                                    <input class="form-control datepicker" type="text" name="from_date" autocomplete="off">
                                </div>

                                <label for="" class="col-form-label col-sm-1">To :</label>
                                <div class="col-sm-3">
                                    <input class="form-control datepicker" type="text" name="to_date" autocomplete="off">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                                    <a class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                                </div>
                            </div>

                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Invoice report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <span class="text-center">
                            </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea">
                            <style type="text/css" scoped>
                                @media print {

                                    td,
                                    th {
                                        border: 1px solid black !important;
                                        padding: 10px;
                                    }

                                    table {
                                        border-collapse: collapse;
                                    }
                                }
                            </style>
                            <center>
                                <h3>Sales Report (Payment Type Wise)</h3>
                            </center>
                            <div class="table-responsive">
                                <table id="pywiseSaleReportTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th>Date</th>
                                            <?php if (!$outlet_list) { ?>
                                                <th>Outlet Name</th>
                                            <?php } ?>
                                            <th>Due Amount</th>
                                            <th>Cash</th>
                                            <th>bKash</th>
                                            <th>Nagad</th>
                                            <th>Rocket</th>
                                            <th>Bank</th>
                                            <th>Card</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sl = 0;
                                        foreach ($sales_data as $k => $v) {
                                            $sl++; ?>
                                            <tr>

                                                <td>
                                                    <?= $sl ?>
                                                </td>

                                                <td>
                                                    <?= $k ?>
                                                </td>
                                                <?php if (!$outlet_list) { ?>

                                                    <td>
                                                        <?= $v['outlet_name']; ?>
                                                    </td>

                                                <?php } ?>

                                                <td class="text-right">
                                                    <?= number_format($v['total_due'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?= number_format($v['pay_type_cash'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?= number_format($v['pay_type_bkash'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?= number_format($v['pay_type_nagad'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?= number_format($v['pay_type_rocket'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?= number_format($v['pay_type_bank'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?= number_format($v['pay_type_card'], 2); ?>
                                                </td>

                                                <td class="text-right">
                                                    <?php 
                                                            $total_amount = $v['total_due'] + $v['pay_type_cash'] + $v['pay_type_bkash'] + $v['pay_type_nagad']
                                                            + $v['pay_type_rocket'] + $v['pay_type_bank'] + $v['pay_type_card'];
                                                            
                                                    ?>
                                                    <?= number_format($total_amount, 2); ?>
                                                </td>

                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="<?= (!$outlet_list ? 3 : 2)  ?>" class="text-right">
                                                <strong>Total : </strong>
                                            </td>
                                            <td class="text-right">
                                                <?= number_format($day_total_due, 2); ?>
                                            </td>

                                            <td class="text-right">
                                                <?= number_format($day_total_cash, 2); ?>
                                            </td>

                                            <td class="text-right">
                                                <?= number_format($day_total_bkash, 2); ?>
                                            </td>

                                            <td class="text-right">
                                                <?= number_format($day_total_nagad, 2); ?>
                                            </td>

                                            <td class="text-right">
                                                <?= number_format($day_total_rocket, 2); ?>
                                            </td>

                                            <td class="text-right">
                                                <?= number_format($day_total_bank, 2); ?>
                                            </td>

                                            <td class="text-right">
                                                <?= number_format($day_total_card, 2); ?>
                                            </td>
                                            <td class="text-right">
                                                <?= number_format($total, 2); ?>
                                            </td>

                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Manage Invoice End -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#pywiseSaleReportTable').DataTable({
            dom: "Bflrtip",//Bfrltip
            select: true,
            responsive: true,
            // processing: true,
            lengthMenu: [
                [50, 100, -1],//[5, 10, 25, 50, 100, -1],
                [50, 100, "All"]// [5, 10, 25, 50, 100, "All"]
            ],
            "order": [],
            pageLength: 10000,
            buttons: [
                // 'pageLength',
                {
                    extend: 'copyHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'csvHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'print',
                    footer: true,
                    className: "btn-sm prints",
                }
            ]
        });
    });
</script>