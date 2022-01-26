<!-- Manage Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('report') ?></h1>
            <small><?php echo display('invoice_return') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('invoice_return') ?></li>
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
                        <?php echo form_open('Admin_dashboard/sales_return', array('class' => 'form-inline')) ?>
                        <?php
                        $today = date('Y-m-d');
                        ?>

                        <?php if ($outlet_list) { ?>


                            <div class="form-group">

                                <input type="hidden" name="outlet_id" class="form-control " id="outlet_id" value="<?php echo $outlet_list[0]['outlet_id']; ?>">
                            </div>

                        <?php } elseif ($cw) { ?>
                            <label class="" for="category">Outlet:</label>
                            <div class="form-group">

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
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="{from_date}" placeholder="<?php echo display('start_date') ?>">
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date"><?php echo display('end_date') ?></label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="{to_date}">
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <a class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>

                        <?php echo form_close() ?>
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
                                <?php echo display('invoice_return') ?>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea">
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
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th><?php echo display('invoice_id') ?></th>
                                            <th><?php echo display('customer_name') ?></th>
                                            <th><?php echo display('date') ?></th>
                                            <th><?php echo display('total_amount') ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($return_list) {
                                        ?>
                                            {return_list}
                                            <tr>
                                                <td>{sl}</td>
                                                <td>

                                                    <a href="<?= base_url('Cinvoice/invoice_inserted_data/') ?>{invoice_id}">{invoice_id}</a>

                                                </td>
                                                <td>
                                                    {customer_name}
                                                </td>

                                                <td>{final_date}</td>
                                                <td class="text-right"><?php echo (($position == 0) ? "$currency {net_total_amount}" : "{net_total_amount} $currency") ?></td>

                                            </tr>
                                            {/return_list}
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="text-right"><?php echo $links ?></div> -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Manage Invoice End -->
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(() => {
            $('#dataTableExample2').DataTable({
                dom: "Bfrltip",
                select: true,
                responsive: true,
                // processing: true,
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                pageLength: 10,
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
        }, 100);

    });
</script>