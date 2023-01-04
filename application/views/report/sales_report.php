<!-- Sales Report Start -->

<?php
$currentURL = $this->uri->uri_string();
$params   = $_SERVER['QUERY_STRING'];
$fullURL = $currentURL . '?' . $params;
$_SESSION['redirect_uri'] = $fullURL;

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('sales_report') ?></h1>
            <small><?php echo display('total_sales_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('sales_report') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">


        <div class="row">
            <div class="col-sm-12">


                <?php if ($this->permission1->method('all_report', 'read')->access()) { ?>
                    <a class="btn btn-primary m-b-5 m-r-2" href="<?php echo base_url('Admin_dashboard/all_report') ?>"><?php echo display('todays_report') ?></a>
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
                        <?php echo form_open('Admin_dashboard/retrieve_dateWise_SalesReports', array('class' => 'form-inline', 'method' => 'get')) ?>
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
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="<?php echo $today ?>">
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date"><?php echo display('end_date') ?></label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
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
                            <h4><?php echo display('sales_report') ?> </h4>
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
                            <div class="table-responsive" style="overflow: scroll">
                                <table class="table table-bordered table-striped table-hover" id="salesReportTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th><?php echo display('sales_date') ?></th>
                                            <th><?php echo display('invoice_no') ?></th>
                                            <th><?php echo display('customer_name') ?></th>
                                            <th><?php echo "Sku" ?></th>
                                            <th><?php echo "Quantity" ?></th>
                                            <th><?php echo "Total Sales" ?></th>
                                            <th><?php echo "Discount" ?></th>
                                            <th><?php echo "Net Sales" ?></th>
                                            <th><?php echo "Return" ?></th>
                                            <th><?php echo "Due" ?></th>
                                            <th><?php echo "Cash" ?></th>
                                            <th><?php echo "Card" ?></th>
                                            <th><?php echo "Bkash" ?></th>
                                            <th><?php echo "Rocket" ?></th>
                                            <th><?php echo "Nagad" ?></th>
                                            <th><?php echo "Total Amount" ?></th>
                                           

                                            <th><?php echo display('total_amount') ?><?php echo form_open('Admin_dashboard/retrieve_dateWise_SalesReports', array('class' => 'form-inline', 'method' => 'get')) ?>
                                                <input type="hidden" value="<?php echo (!empty($from_date) ? $from_date : date('Y-m-d')) ?>" name="from_date">
                                                <input type="hidden" value="<?php echo (!empty($to_date) ? $to_date : date('Y-m-d')) ?>" name="to_date">
                                                <input type="hidden" name="all" value="all">
                                                <!-- <button type="submit" class="btn btn-success"><?php echo display('all') ?></button> -->
                                                <?php echo form_close();
                                                // $_SESSION['redirect_uri'] = 'Admin_dashboard/todays_sales_report';
                                                ?>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $subtotal = 0;
                                        $CI = &get_instance();
                                        $CI->load->library('occational');
                                         
                                        if ($sales_report) {
                                        ?>

                                            <?php
                                            $subtotal = 0;
                                            $sl = 0;
                                            foreach ($sales_report as $sales) {
                                                $sl++;
                                               
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $CI->occational->dateConvert($sales['sales_date']); ?></td>
                                                    <td>
                                                        <a href="<?= base_url('Cinvoice/invoice_inserted_data/') . $sales['invoice'] ?>">
                                                            <?php echo $sales['invoice'] ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $sales['customer_name'] ?></td>
                                                    <td><?php
                                                    $test_array = array();
                                                    $final_array = "";
                                                    $final_array = ltrim($sales['sku'],",");
                                                    $test_array= explode(" ",$final_array); 
                                                     $test = array_unique($test_array);
                                                    echo implode(",",$test);
                                                     ?>
                                                    </td>
                                                   

                                                    <td><?php echo $sales['qnty'] ?></td>
                                                    <td><?php echo $sales['total_amount'] + $sales['invoice_discount']?></td>
                                                    <td><?php echo $sales['invoice_discount'] ?></td>
                                                    <td><?php echo (int)($sales['total_amount']) ?></td>
                                                    <td><?php echo $sales['sales_return'] ?></td>
                                                    <td><?php echo $sales['due_amount'] ?></td>
                                                    
                                                    <td><?php echo $sales['cash'] ? $sales['cash'] : 0.00 ?></td>
                                                    <td><?php echo $sales['card'] ? $sales['card'] : 0.00 ?></td>
                                                    <td><?php echo $sales['bkash'] ? $sales['bkash'] : 0.00 ?></td>
                                                    <td><?php echo $sales['nagad'] ? $sales['nagad'] : 0.00 ?></td>
                                                    <td><?php echo $sales['rocket'] ? $sales['rocket'] : 0.00 ?></td>
                                                    <td><?php echo ($sales['cash'] + $sales['card'] + $sales['bkash'] + $sales['nagad'] + $sales['rocket']); ?></td>

                                                    <td class="text-right">
                                                        <?php
                                                        if ($position == 0) {
                                                            echo $currency . ' ' . number_format((int)$sales['total_amount'], 2);
                                                        } else {
                                                            echo number_format((int)$sales['total_amount'], 2) . ' ' . $currency;
                                                        }
                                                        $subtotal += $sales['total_amount']; ?>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php } ?>
                                        <?php } else {
                                        ?>

                                            <tr>
                                                <th class="text-center" colspan="18"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        

                                            <td colspan="" class="text-right"><b><?php echo display('total_seles') ?></b></td>
                                            <td class="text-right"><b><?php echo (($position == 0) ? "$currency " . number_format($subtotal) : number_format($subtotal) . " $currency") ?></b></td>
                                        </tr>
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
        $('#salesReportTable').DataTable({
            dom: "Bfrltip",
            //  select: true,
            // responsive: true,
            processing: true,
            "order": [],
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
    });
</script>