<!-- Product Report Start -->

<?php
// $currentURL = $this->uri->uri_string();
// $params   = $_SERVER['QUERY_STRING'];
// $fullURL = $currentURL . '?' . $params;
// $_SESSION['redirect_uri'] = $fullURL;

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Production Report Product Wise</h1>
            <small>Production Report Product Wise</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Production Report Product Wise</li>
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


            </div>
        </div>

        <!-- Product report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/product_produce_search_reports', array('class' => 'form-inline', 'method' => 'get')) ?>
                        <?php
                        $today = date('Y-m-d'); ?>

                        <div class="col-sm-12">

<!--                            --><?php //if ($outlet_list) { ?>
<!---->
<!---->
<!--                                <div class="form-group">-->
<!---->
<!--                                    <input type="hidden" name="outlet_id" class="form-control " id="outlet_id" value="--><?php //echo $outlet_list[0]['outlet_id']; ?><!--">-->
<!--                                </div>-->
<!---->
<!--                            --><?php //} elseif ($cw) { ?>
<!--                                <label class="" for="category">Outlet:</label>-->
<!--                                <div class="form-group">-->
<!---->
<!--                                    <select name="outlet_id" class="form-control" id="outlet">-->
<!--                                        <option value="">--select one -- </option>-->
<!--                                        <option value="1">Consolidated</option>-->
<!--                                        --><?php
//                                        foreach ($cw as $cw) {
//                                        ?>
<!--                                            <option value="--><?php //echo $cw['outlet_id']; ?><!--">--><?php //echo $cw['outlet_name']; ?><!--</option>-->
<!--                                        --><?php //} ?>
<!--                                    </select>-->
<!--                                </div>-->
<!--                            --><?php //} ?>

                        </div>

                        <div style="margin-top: 20px;">
                            <div class="form-group">
                                <label class="" for="from_date"><?php echo display('product_name') ?></label>
                                <select name="product_id" class="form-control">
                                    <option value=""></option>
                                    <?php foreach ($product_list as $productss) { ?>
                                        <option value="<?php echo  $productss['product_id'] ?>" <?php if ($productss['product_id'] == $product_id) {
                                            echo 'selected';
                                        } ?>><?php echo  $productss['product_name'] . ' - ' . $productss['sku']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="from_date"><?php echo display('start_date') ?></label>
                                <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo (!empty($from_date) ? $from_date : $today) ?>" placeholder="<?php echo display('start_date') ?>">
                            </div>
                            <div class="form-group">
                                <label class="" for="to_date"><?php echo display('end_date') ?></label>
                                <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo (!empty($to_date) ? $to_date : $today) ?>">
                            </div>


                            <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                            <a class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                        </div>
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
                            <h4>Production Report Product Wise</h4>
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
                                <table class="table table-bordered table-striped table-hover" id="productWiseSalesReportTable">
                                    <thead>
                                        <tr>
                                            <th>Production Date</th>
                                            <th><?php echo display('product_name') ?></th>
                                            <th>SKU</th>
                                            <th>Quantity</th>
                                            <th>Base Number</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($product_report) {
                                        ?>
                                            {product_report}
                                            <tr>
                                                <td>{date}</td>
                                                <td>{product_name}</td>
                                                <td>{sku}</td>
                                                <td>{quantity}</td>
                                                <td>{base_number}</td>
<!--                                                <td class="text-right">--><?php //echo (($position == 0) ? "$currency {rate}" : "{rate} $currency") ?><!--</td>-->
<!--                                                <td class="text-right">--><?php //echo (($position == 0) ? "$currency {price}" : "{price} $currency") ?><!--</td>-->
                                            </tr>
                                            {/product_report}
                                        <?php
                                        }
                                        ?>
                                    </tbody>
<!--                                    <tfoot>-->
<!--                                        <tr>-->
<!--                                            <td colspan="7" align="right">&nbsp; <b>--><?php //echo display('total_ammount') ?><!--</b></td>-->
<!--                                            <td class="text-right"><b>--><?php //echo (($position == 0) ? "$currency {sub_total}" : "{sub_total} $currency") ?><!--</b></td>-->
<!--                                        </tr>-->
<!--                                    </tfoot>-->
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
<!-- Product Report End -->


<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(() => {
            $('#productWiseSalesReportTable').DataTable({
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
                        className: "btn-sm prints text-center",
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        className: "btn-sm prints text-center",
                    },
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        className: "btn-sm prints text-center",
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true,
                        className: "btn-sm prints text-center",
                    },
                    {
                        extend: 'print',
                        footer: true,
                        className: "btn-sm prints text-center",
                    }
                ]
            });
        }, 100);

    });
</script>