
<!-- Purchase Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Purchase Warrenty Report</h1>
            <small>Purchase Warrenty Report</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i>Purchase Warrenty Report</a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Purchase Warrenty Report</li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">


                <?php if($this->permission1->method('todays_sales_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
                <?php }?>
                <?php if($this->permission1->method('product_sales_reports_date_wise','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('sales_report_product_wise') ?> </a>
                <?php }?>
                <?php if($this->permission1->method('todays_sales_report','read')->access() && $this->permission1->method('todays_purchase_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('profit_report') ?> </a>
                <?php }?>


            </div>
        </div>

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/retrieve_warrenty_dateWise_PurchaseReports', array('class' => 'form-inline', 'method' => 'get')) ?>
                        <?php date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
                        ?>
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo $today ?>" placeholder="<?php echo display('start_date') ?>" >
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date">Warrenty End Date</label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <a  class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
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
                            <h4>Purchase Warrenty Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="purchase_div" class="table-responsive">
                            <table class="print-table" width="100%">

                                <tr>
                                    <td align="left" class="print-table-tr">
                                        <img src="<?php echo $software_info[0]['logo'];?>" alt="logo">
                                    </td>
                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo $company[0]['company_name'];?>

                                                        </span><br>
                                        <?php echo $company[0]['address'];?>
                                        <br>
                                        <?php echo $company[0]['email'];?>
                                        <br>
                                        <?php echo $company[0]['mobile'];?>

                                    </td>

                                    <td align="right" class="print-table-tr">
                                        <date>
                                            <?php echo display('date')?>: <?php
                                            echo date('d-M-Y');
                                            ?>
                                        </date>
                                    </td>
                                </tr>

                            </table>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th>Purchase ID</th>
                                        <th>Vendor Name</th>
                                        <th>Product Name</th>
                                        <th>Warrenty End Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if ($purchase_report) {
                                        $sl = 0;

                                        foreach ($purchase_report as $row) {
                                            $sl++;

                                            ?>

                                            <tr>
                                                <td> <?php echo $sl; ?></td>
                                                <td><?php echo html_escape($row['purchase_id']) ?></td>
                                                <td><?php echo html_escape($row['supplier_name']) ?></td>
                                                <td>

                                                    <?php echo html_escape($row['product_name']) ?>

                                                </td>
                                                <td><?php echo html_escape($row['warrenty_date']) ?></td>
                                                <td class="text-right"><?php echo (($position == 0) ? "$currency " .number_format($row['grand_total_amount'],2) : number_format($row['grand_total_amount'],2)." $currency") ?></td>
                                            </tr>

                                        <?php }?>
                                    <?php } else {
                                        ?>
                                        <tr>
                                            <th class="text-center" colspan="6"><?php echo display('not_found'); ?></th>
                                        </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5" align="right">&nbsp; <b>Total Amount</b></td>
                                        <td class="text-right"><b><?php echo (($position == 0) ? "$currency ".$purchase_amount : $purchase_amount ." $currency") ?></b></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="text-right"><?php echo $links ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->