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

                                    width: 58mm;
                                    /* width: 70mm !important; */
                                    /* padding-right: 5px !important; */
                                    /* letter-spacing: 1px; */
                                    font-family: 'Share Tech Mono', monospace !important;

                                }

                                .com-name {
                                    font-size: 11px !important;
                                }

                                /*
                                table>thead>th.pr {
                                    min-width: 50%;
                                } */



                                .invo {
                                    display: flex;
                                    justify-content: space-around;
                                }

                                .td-style {
                                    border-left: 1px solid black !important;
                                }


                                table#tbl {
                                    width: 58mm !important;
                                    font-size: 11px !important;
                                    border-collapse: collapse !important;
                                    /* white-space: nowrap; */
                                    table-layout: auto;
                                    word-break: break-all !important;
                                }

                                table#tbl td {
                                    overflow-x: hidden !important;
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
                            <div  class="text-center">
                                <div align=""  style="line-height: 1; border: 0; padding:0">
                                    {company_info}
                                    <span style="font-size: 11px !important;">
                                        <strong>{company_name}</strong>
                                    </span><br>
                                    <span class="subt">{address}</span><br>
                                    <span class="subt">{mobile}</span><br>
                                    {/company_info}
                                    <span class="subt">{tax_regno}</span>
                                </div>
                            </div>


                            <div  class="text-center" align="" style="font-size: 11px; margin-top: 0.2cm !important">
                                <div><b>{customer_name}</b><br>
                                    <?php if ($customer_address) { ?>
                                        {customer_address}<br>
                                    <?php } ?>
                                    <?php if ($customer_mobile) { ?>
                                        {customer_mobile}
                                    <?php } ?>
                                </div>
                            </div>
                            <div  class="text-center">
                                <div style="margin-top: 0.3cm !important; font-size: 11px !important">
                                    <nobr>
                                        <date>
                                            Date: <?php
                                                    echo date('d-M-Y');
                                                    ?>
                                        </date>
                                    </nobr>
                                </div>

                                <div>
                                    <div>
                                        <nobr style="font-size: 11px;">
                                            <strong><?php echo display('invoice_no'); ?> : {invoice_no}</strong>
                                        </nobr>
                                    </div>
                                </div>
                            </div>
                            ============================
                            <div style="margin: 0; padding:0">
                                <table class="item_table" id="tbl">
                                    <thead>
                                        <!-- <th width="5mm"><?php echo display('sl'); ?></th> -->
                                        <th class="text-center pr"><?php echo display('product'); ?></th>
                                        <!-- <th class="pprint-unit td-style"><?php if ($is_unit != 0) {
                                                                                    echo display('unit');
                                                                                } ?></th> -->
                                        <th class="text-center td-style"><?php echo display('quantity'); ?></th>
                                        <!-- <th class="text-center td-style">Disc.%</th> -->
                                        <!-- <th class="text-center td-style"><?php echo display('rate'); ?></th> -->
                                        <th class="text-center td-style"><?php echo display('ammount'); ?></th>
                                    </thead>

                                    <?php
                                    $sl = 1;
                                    $s_total = 0;
                                    foreach ($invoice_all_data as $invoice_data) { ?>
                                        <tr>
                                            <!-- <td align="center">
                                                <nobr><?php echo $sl; ?></nobr>
                                            </td> -->
                                            <td align="center">
                                                <?php echo html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')'; ?>
                                            </td>
                                            <!-- <td align="center" class="td-style">
                                                <nobr><?php echo html_escape($invoice_data['unit']); ?></nobr>
                                            </td> -->
                                            <td align="center" class="td-style">
                                                <?php echo html_escape($invoice_data['quantity']); ?>
                                            </td>
                                            <!-- <td align="right" class="td-style">
                                                <nobr>
                                                    <?php
                                                    if (!empty($invoice_data['discount_per'])) {
                                                        $curicon = $currency;
                                                    } else {
                                                        $curicon = '';
                                                    }
                                                    if ($position == 0) {
                                                        echo  $curicon . ' ' . html_escape($invoice_data['discount_per']);
                                                    } else {
                                                        echo html_escape($invoice_data['discount_per']) . ' ' . $curicon;
                                                    }
                                                    ?>
                                                </nobr>
                                            </td> -->
                                            <!-- <td align="right" class="td-style">
                                                <nobr>
                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' . html_escape($invoice_data['rate']);
                                                    } else {
                                                        echo html_escape($invoice_data['rate']) . ' ' . $currency;
                                                    }
                                                    ?>
                                                </nobr>
                                            </td> -->
                                            <td align="right" class="td-style" style="width: 15mm !important;">

                                                <?php
                                                if ($position == 0) {
                                                    echo  $currency . ' ' . html_escape($invoice_data['total_price']);
                                                } else {
                                                    echo html_escape($invoice_data['total_price']) . ' ' . $currency;
                                                }
                                                $s_total += $invoice_data['total_price'];
                                                ?>

                                            </td>
                                        </tr>
                                    <?php $sl++;
                                    } ?>

                                    <tr>
                                        <td colspan="5" class="minpos-bordertop">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="minpos-bordertop">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="right" colspan="1">
                                            <nobr><?php echo display('total') ?></nobr>
                                        </td>
                                        <td align="right" class="td-style">
                                            <nobr>
                                                <?php if ($position == 0) {
                                                    echo  $currency . ' ' . html_escape(number_format($s_total, 2, '.', ','));
                                                } else {
                                                    echo html_escape(number_format($s_total, 2, '.', ',')) . ' ' . $currency;
                                                } ?>
                                            </nobr>
                                        </td>
                                    </tr>

                                    <?php if ($invoice_discount > 0) { ?>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="1">
                                                <nobr><?php echo display('invoice_discount'); ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($total_discount > 0) { ?>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="1">
                                                <nobr><?php echo display('total_discount') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($shipping_cost > 0) { ?>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="1">
                                                <nobr><?php echo display('shipping_cost') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>

                                                    <?php echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($previous > 0) { ?>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="1">
                                                <nobr><?php echo display('previous') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>

                                                    <?php echo html_escape((($position == 0) ? "$currency {previous}" : "{prevous_due} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="7" class="minpos-bordertop">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="right" colspan="1">
                                            <nobr><strong><?php echo display('grand_total') ?></strong></nobr>
                                        </td>
                                        <td align="right" class="td-style">
                                            <nobr>
                                                <strong>
                                                    <?php echo html_escape((($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency"))
                                                    ?>
                                                </strong>
                                            </nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="7" class="minpos-bordertop">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <?php if ($paid_amount > 0) { ?>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="1">
                                                <nobr>
                                                    <?php echo display('paid_ammount') ?>
                                                </nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($due_amount > 0) { ?>
                                        <tr>
                                            <td colspan="7" class="minpos-bordertop">
                                                <nobr></nobr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="1">
                                                <nobr><?php echo display('due') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                    <?php } ?>


                                    </td>
                                    </tr>

                                </table>

                                <div style="text-align:center; margin-top: 0.5cm; font-size: 11px">
                                    <td>Powered by <strong>Webcoders</strong></a></td>

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