<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice_onloadprint.js" type="text/javascript"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="border:0; margin:0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_details') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="">
        <!-- Alert Message -->
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
        <div class="row" style="border: 0 !important; margin: 0 !important;">
            <div class="col-sm-12" style="border: 0 !important; margin: 0 !important;">
                <div class="panel panel-bd" style="border: 0 !important; margin: 0 !important;">
                    <div id="printableArea" style="border: 0 !important; margin: 0 !important;">
                        <style type="text/css" scoped>
                            @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

                            @import url('https://fonts.googleapis.com/css2?family=Petrona:wght@300&display=swap');

                            @media print {

                                .subt {
                                    font-size: 11px !important;
                                    line-height: 1 !important;
                                }

                                html,
                                body {
                                    border: 0;
                                    margin: 0;
                                    box-sizing: border-box;

                                    /*width: 58mm;*/
                                    width: 70mm !important;
                                    /* padding-right: 5px !important; */
                                    /* letter-spacing: 1px; */
                                    font-family: 'Share Tech Mono', monospace !important;

                                }

                                .com-name {
                                    font-size: 11px !important;
                                }


                                /*table>thead>th.pr {*/
                                /*    width: 70%;*/
                                /*}*/
                                /*table>thead>th.ur {*/
                                /*    width:10%;*/
                                /*}*/



                                .invo {
                                    display: flex;
                                    justify-content: space-around;
                                }

                                .td-style {
                                    border-left: 1px solid black !important;
                                    /*border-bottom: 1px solid black !important;*/
                                }


                                table#tbl {
                                    width: 70mm !important;
                                    font-size: 11px !important;
                                    border-collapse: collapse !important;
                                    /* white-space: nowrap; */
                                    table-layout: auto;
                                    word-break: break-all !important;
                                }

                                table#tbl td {
                                    overflow-x: hidden !important;
                                    border-bottom: 1px solid black !important;
                                }

                                table#tbl th:nth-of-type(1) {
                                    width: 24mm !important;
                                }

                                table#tbl th:nth-of-type(2) {
                                    width: 18mm !important;
                                }

                                table#tbl th:nth-of-type(3) {
                                    width: 15mm !important;
                                }

                                /* table#tbl td:nth-of-type(1) {
                                    width: 25mm !important;
                                }

                                table#tbl td:nth-of-type(2) {
                                    width: 18mm !important;
                                }

                                table#tbl td:nth-of-type(3) {
                                    width: 15mm !important;
                                } */

                                table#tbl td {
                                    word-break: break-all !important;
                                }

                                /*Setting the width of column 3.*/

                                /* table.item-table>tr>td {
                                    font-size: 11px !important;
                                    word-break: break-word !important;
                                } */

                                th {
                                    border-bottom: 1px solid black !important;
                                }

                                /* th,
                                td {
                                    overflow: hidden;
                                } */
                            }
                        </style>
                        <div class="panel-body" style="border: 0 !important; margin-left: -3mm !important;">


                            <div style="width: 100%;" class="text-center">
                                <img src="<?= $inv_logo ?>" style="width: 20mm; height: auto;">
                            </div>
                            <div class="text-center">
                                <div align="" style="line-height: 1; border: 0; padding:0">
                                    {company_info}
                                    <span style="font-size: 11px !important;">
                                        <strong>{company_name}</strong>
                                    </span><br>
                                    <!--                                    <span class="subt">--><? //= $outlet_name
                                                                                                    ?>
                                    <!--</span><br>-->
                                    <span class="subt"><?= $outlet_address ?></span><br>
                                    <!--                                    <span class="subt">{address}</span><br>-->
                                    <!--                                    <span class="subt">{mobile}</span><br>-->
                                    {/company_info}
                                    <span class="subt">{tax_regno}</span>
                                </div>
                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0.2cm !important">

                                <div class="col-xs-6">
                                    <nobr>BIN: 002174765-0401</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr> Mushak-6.3</nobr>
                                </div>


                            </div>
                            <h5 class="text-center">Day Wise Total</h5>
                            <hr>
                            </hr>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Day</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr> Total</nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr><?php echo $from_date; ?></nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr> <?php echo $sales_report['total_amount'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Grand Total</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['total_amount'] ?>

                                    </nobr>
                                </div>


                            </div>
                            <hr style="font-size: 11px; margin-top: 0cm !important">
                            </hr>
                            <h5 style="font-size: 11px; margin-top: 0cm !important" class="text-center">Net Total</h5>
                            <hr>
                            </hr>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Total Sales</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['total_amount'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Discount</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['invoice_discount'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Net Sales</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['total_amount'] - $sales_report['invoice_discount'] ?></ </nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Return</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['sales_return'] ?>

                                    </nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Due</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['due_amount'] ?>

                                    </nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Total Received Amount</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['received_amount'] ?>

                                    </nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>VAT 7.5% Inclusive</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_cash'] ?>

                                    </nobr>
                                </div>


                            </div>


                            <hr>
                            </hr>

                            <h5 class="text-center">Incomes</h5>
                            <hr>
                            </hr>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Cash</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_cash'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Card</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_card'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Bkash</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_bkash'] ?>

                                    </nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Rocket</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_rocket'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Nagad</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_nagad'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Total Amount</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['payment_cash'] +
                                                $sales_report['payment_card'] + $sales_report['payment_card'] + $sales_report['payment_rocket'] + $sales_report['payment_nagad']; ?>

                                    </nobr>
                                </div>


                            </div>


                            <hr>
                            </hr>


                            <h5 class="text-center">Return</h5>
                            <hr>
                            </hr>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Cash</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['return_cash'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Card</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['return_card'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Bkash</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['return_card'] ?>

                                    </nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Rocket</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['return_rocket'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Nagad</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['return_nagad'] ?></nobr>
                                </div>


                            </div>
                            <div class="row" style="font-size: 11px; margin-top: 0cm !important">

                                <div class="col-xs-6">
                                    <nobr>Total Amount</nobr>
                                </div>

                                <div class="col-xs-6 text-right m-0">
                                    <nobr><?php echo $sales_report['return_cash'] +
                                                $sales_report['return_card'] + $sales_report['return_card'] + $sales_report['return_rocket'] + $sales_report['return_nagad']; ?>

                                    </nobr>
                                </div>


                            </div>








                            </td>
                            <hr>


                            <div style="text-align:center; margin-top: 0.2cm; font-size: 11px">
                                <td>Powered by <strong>Devenport</strong></a></td>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--  -->
            <div class="panel-footer text-left">
                <input type="hidden" name="" id="url" value="<?php echo base_url('Cinvoice/manage_invoice'); ?>">
                <a class="btn btn-danger" href="<?php echo base_url('Cinvoice/manage_invoice'); ?>"><?php echo display('cancel') ?></a>
                <a class="btn btn-info" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></a>
            </div>
        </div>
</div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->