<!-- Sales Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Varience_report') ?></h1>
            <small><?php echo display('Varience_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('Varience_report') ?></li>
            </ol>
        </div>
    </section>

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

        <!-- Sales report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/variance_report', array('class' => 'form-inline', 'method' => 'post')) ?>
                        <?php
                        $today = date('Y-m-d');
                        ?>

                        <label class="" for="category"><?php echo display('category') ?></label>
                        <div class="form-group">
                            <select name="category" class="form-control" id="category">
                                <?php if (!empty($category_id)){ ?>
                                    <option value="<?= $category_id?>" selected><?= $category_name?> </option>

                                <?php }else{ ?>
                                    <option value="">--select one -- </option>

                                <?php } ?>
                                <?php
                                foreach ($category_list as $category) {
                                ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <label class="" for="product_id">SKU</label>
                        <div class="form-group ">
                            <select name="product_id" class="form-control" id="product_id">
                                <?php if (!empty($product_id)){ ?>
                                    <option value="<?= $product_id?>" selected><?= $product_id?> </option>

                                <?php }else{ ?>
                                    <option value="">--select one -- </option>

                                <?php } ?>
                                <?php

                                foreach ($product_list as $product) {
                                    ?>
                                    <option value="<?php echo $product['product_id']; ?>"><?php echo $product['sku']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input autocomplete="off" type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="<?=(!empty($from_date)) ? "{from_date}" : '' ?>">
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date"><?php echo display('end_date') ?></label>
                            <input autocomplete="off" type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?=(!empty($to_date)) ? "{to_date}" : '' ?>">
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <a class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('Varience_report') ?> </h4>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover datatable" id="">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th>Date</th>
                                            <th>SKU</th>
                                            <th><?php echo display('product_name') ?></th>
                                            <th>System Stock</th>
                                            <th>Actual Stock</th>
                                            <th>Variance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        $sl=1;
                                        if ($response) {
                                            foreach ($response as $single) {
                                        ?>
                                                <tr>
                                                    <td><?php echo html_escape($sl++); ?></td>
                                                    <td><?php echo html_escape($single->create_date); ?></td>
                                                    <td><?php echo html_escape($single->sku); ?></td>
                                                    <td><?php echo html_escape($single->product_name); ?></td>
                                                    <td><?php echo html_escape($single->current_stock); ?></td>
                                                    <td><?php echo html_escape($single->physical_stock); ?></td>
                                                    <td><?php echo html_escape($single->difference); ?></td>

                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <th class="text-center" colspan="7"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="text-right"><?php echo $links ?></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Sales Report End -->

<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(() => {
            $('#catWiseSalesReportTable').DataTable({
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