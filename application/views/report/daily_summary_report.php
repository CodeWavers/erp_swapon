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
            <h1><?php echo "Daily Summary Report"; ?></h1>
            <small><?php echo "Daily Summary Report"; ?></small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo "Daily Summary Report"; ?></li>
            </ol>
        </div>
    </section>

    <section class="content">




        <!-- Sales report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/daily_summary_report', array('class' => 'form-inline', 'method' => 'get')) ?>
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
                            <label class="" for="from_date"><?php echo "Enter Date" ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="">
                        </div>



                        <input type="submit" value="Search" name="search" class="btn btn-success">
                        <input type="submit" value="Print" name="print" class="btn btn-success">
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
                            <h4 class="text-center"><?php echo "Daily Summary Report"; ?> </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="purchase_div" class="table-responsive">
                            <?php if ($sales_report) { ?>
                                <table class="print-table" width="100%">

                                    <tr>

                                        <td class="text-center" class="print-cominfo">

                                            <h3 class="text-center">Day Wise Summary Report<br>
                                                <?php echo $from_date; ?>
                                            </h3>

                                            <span class="text-center">
                                                <img src="https://swaponsworld.com/public/uploads/logo/q4knLqxu0rwWRvDeZeZR6Ljsbe75EC3dOq2IhN38.png" alt="logo"><br>

                                                <!-- <?php echo $company[0]['company_name']; ?> -->

                                            </span><br>
                                            <?php echo $company[0]['address']; ?>


                                        </td>

                                        <td align="right" class="print-table-tr">
                                            <date>
                                                <?php echo display('date') ?>: <?php
                                                                                echo date($from_date);
                                                                                ?>
                                            </date>
                                        </td>
                                    </tr>

                                </table>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="shippingCostReportTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center"><?php echo "Day Wise Total" ?></th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td></td>
                                                <td><b>Day</b>
                                                    <p class="text-right"><b>Total</b></p>
                                                    <b><?php echo $from_date ?></b>
                                                    <p class="text-right"><b><?php echo $sales_report['total_amount'] ?></b></p>
                                                    <b>Grand Total</b>
                                                    <p class="text-right"><b><?php echo $sales_report['total_amount'] ?></b></p>

                                                </td>

                                                <td></td>

                                            </tr>



                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-striped table-hover" id="shippingCostReportTable">



                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center"><?php echo "Net Total" ?></th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td></td>
                                                <td><b>Total Sales</b>
                                                    <p class="text-right"><b><?php echo $sales_report['total_amount'] ?></b></p>
                                                    <b>Discount</b>
                                                    <p class="text-right"><b><?php echo $sales_report['invoice_discount'] ?></b></p>
                                                    <b>Net Sales</b>
                                                    <p class="text-right"><b><?php echo $sales_report['total_amount'] - $sales_report['invoice_discount'] ?></b></p>
                                                    <b>Return</b>
                                                    <p class="text-right"><b><?php echo $sales_report['sales_return'] ?></b></p>
                                                    <b>Due</b>
                                                    <p class="text-right"><b><?php echo $sales_report['due_amount'] ?></b></p>
                                                    <b>Total Received Amount</b>
                                                    <p class="text-right"><b><?php echo $sales_report['received_amount'] ?></b></p>
                                                    <b>VAT 7.5% Inclusive </b>
                                                    <p class="text-right"><b><?php echo "0" ?></b></p>
                                                </td>

                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-striped table-hover" id="shippingCostReportTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center"><?php echo "Incomes" ?></th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td></td>
                                                <td><b>Cash</b>
                                                    <p class="text-right"><b><?php echo $sales_report['payment_cash'] ?></b></p>
                                                    <b>Card</b>
                                                    <p class="text-right"><b><?php echo $sales_report['payment_card'] ?></b></p>
                                                    <b>Bkash</b>
                                                    <p class="text-right"><b><?php echo $sales_report['payment_bkash'] ?></b></p>
                                                    <b>Rocket</b>
                                                    <p class="text-right"><b><?php echo $sales_report['payment_rocket'] ?></b></p>
                                                    <b>Nagad</b>
                                                    <p class="text-right"><b><?php echo $sales_report['payment_nagad'] ?></b></p>
                                                    <b>Total Amount</b>
                                                    <p class="text-right"><b><?php echo $sales_report['payment_cash'] +
                                                                                    $sales_report['payment_card'] + $sales_report['payment_card'] + $sales_report['payment_rocket'] + $sales_report['payment_nagad']; ?></b></p>
                                                </td>

                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-striped table-hover" id="shippingCostReportTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center"><?php echo "Return" ?></th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td></td>
                                                <td><b>Cash</b>
                                                    <p class="text-right"><b><?php echo $sales_report['return_cash'] ?></b></p>
                                                    <b>Card</b>
                                                    <p class="text-right"><b><?php echo $sales_report['return_card'] ?></b></p>
                                                    <b>Bkash</b>
                                                    <p class="text-right"><b><?php echo $sales_report['return_card'] ?></b></p>
                                                    <b>Rocket</b>
                                                    <p class="text-right"><b><?php echo $sales_report['return_rocket'] ?></b></p>
                                                    <b>Nagad</b>
                                                    <p class="text-right"><b><?php echo $sales_report['return_nagad'] ?></b></p>
                                                    <b>Total Amount</b>
                                                    <p class="text-right"><b><?php echo $sales_report['return_cash'] +
                                                                                    $sales_report['return_card'] + $sales_report['return_card'] + $sales_report['return_rocket'] + $sales_report['return_nagad']; ?></b></p>
                                                </td>

                                                <td></td>
                                            </tr>
                                        </tbody>


                                    </table>
                                    <h5 class="text-center">Powered by Devenport</h5>
                                </div>
                            <?php } else { ?>
                                <h5 class="text-center"><?php echo display('not_found'); ?></h5>
                            <?php } ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Sales Report End -->

<script type="text/javascript">
    function setDate(){
        var x = document.getElementById('from_date').value; //"Pulling" the value entered 
        $("#from_date1").val(x)
    }
    // $(document).ready(() => {
    //     setTimeout(() => {
    //         $('#shippingCostReportTable').DataTable({
    //             dom: "Bfrltip",
    //             select: true,
    //             responsive: true,
    //             // processing: true,
    //             // serverside: true,
    //             lengthMenu: [
    //                 [5, 10, 25, 50, 100, -1],
    //                 [5, 10, 25, 50, 100, "All"]
    //             ],
    //             pageLength: 10,
    //             buttons: [
    //                 // 'pageLength',
    //                 {
    //                     extend: 'copyHtml5',
    //                     footer: true,
    //                     className: "btn-sm prints",
    //                 },
    //                 {
    //                     extend: 'excelHtml5',
    //                     footer: true,
    //                     className: "btn-sm prints",
    //                 },
    //                 {
    //                     extend: 'csvHtml5',
    //                     footer: true,
    //                     className: "btn-sm prints",
    //                 },
    //                 {
    //                     extend: 'pdfHtml5',
    //                     footer: true,
    //                     className: "btn-sm prints",
    //                 },
    //                 {
    //                     extend: 'print',
    //                     footer: true,
    //                     className: "btn-sm prints",
    //                 }
    //             ],
    //             // stateSave: true,
    //             // "bDestroy": true,
    //         });
    //     }, 100);
    // });
</script>