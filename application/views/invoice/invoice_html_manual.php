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
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div id="printableArea" style="height: 100vh">
                        <style type="text/css" scoped>
                            @media print {

                                @page {
                                    margin-top: 1.5in;
                                    margin-bottom: 0.5in;
                                }

                                .subt {
                                    /* font-size: 16px !important; */
                                    line-height: 1 !important;
                                }

                                html,
                                body {
                                    /* border: 0;
                                    margin: 0; */
                                    box-sizing: border-box;

                                    width: 100%;
                                    font-size: 16px !important;
                                    /* width: 70mm !important; */
                                    /* padding-right: 5px !important; */
                                    /* letter-spacing: 1px; */
                                    /* font-family: 'Share Tech Mono', monospace !important; */

                                }

                                .com-name {
                                    /* font-size: 16px !important; */
                                }

                                /*
                                table>thead>th.pr {
                                    min-width: 50%;
                                } */



                                .invo {
                                    display: flex;
                                    justify-content: space-around;
                                }



                                table#tbl {
                                    width: 99% !important;
                                    font-size: 16px !important;
                                    /* border: 1px solid #000; */
                                    border-collapse: collapse !important;
                                    /*white-space: nowrap;
                                    table-layout: auto;
                                    word-break: break-all !important; */
                                }

                                /* table#tbl td {
                                    overflow-x: hidden !important;
                                } */


                                /* table#tbl td:nth-of-type(1) {
                                    width: 25mm !important;
                                }

                                table#tbl td:nth-of-type(2) {
                                    width: 18mm !important;
                                }

                                table#tbl td:nth-of-type(3) {
                                    width: 15mm !important;
                                } */
                                /*
                                table#tbl td {
                                    word-break: break-all !important;
                                } */

                                /*Setting the width of column 3.*/

                                /* table.item-table>tr>td {
                                    font-size: 8px !important;
                                    word-break: break-word !important;
                                } */



                                th,
                                td {
                                    border: 1px solid black;
                                }

                                td {
                                    padding: 3px !important;
                                }

                                .panel-body {
                                    /* border: 1px solid black; */
                                    width: 100%;
                                    height: 99%;
                                    height: calc(100% - 1.2in) !important;
                                    height: -moz-calc(100% - 1.2in);
                                    height: -webkit-calc(100% - 1.2in);
                                    /* margin-top: 1in; */
                                    /* padding-bottom: 1.5cm; */
                                }

                                .cus-sign {
                                    margin-top: 2cm !important;
                                    display: flex !important;
                                    justify-content: space-around !important;

                                }

                                .cus {
                                    padding: 5px;
                                    border-top: 1px solid black;
                                }
                            }
                        </style>
                        <div class="panel-body">

                            <?php
                            $sale_text= ($sale_type == 1) ?'Whole Sale':(($sale_type == 2) ?'Retail Sale' :'Aggregators Sale');
                            ?>




                            <h1 class="text-left"><?php echo $sale_text?></h1>
                            <div style="width: 50%;">
                                <div><b>{customer_name}</b><br>
                                    <?php if ($customer_address) { ?>
                                        {customer_address}<br>
                                    <?php } ?>
                                    <?php if ($customer_mobile) { ?>
                                        {customer_mobile}
                                    <?php } ?>
                                    <?php if ($customer_email) {
                                    ?>
                                        <br>
                                        {customer_email}
                                    <?php } ?>
                                </div>
                            </div>
                            <div>
                                <div style="margin-top: 0.3cm !important;">

                                    <date>
                                        Date: <?php
                                                echo $inv_date;
                                                ?>
                                    </date>

                                </div>

                                <div>
                                    <div>

                                        <strong><?php echo display('invoice_no'); ?> : {invoice_no}</strong>

                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl">
                                    <thead>
                                        <th><?php echo display('sl'); ?></th>
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
                                            <td align="center">
                                                <?php echo $sl; ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                $extra = (($invoice_data['product_model']) ? ' - ' . html_escape($invoice_data['product_model']) : '') . (($invoice_data['color_name']) ? ' - ' . html_escape($invoice_data['color_name']) : '') . (($invoice_data['size_name']) ? ' - ' . html_escape($invoice_data['size_name']) : '');
                                                echo html_escape($invoice_data['product_name']) . $extra; ?>
                                            </td>
                                            <!-- <td align="center" class="td-style">
                                                <?php echo html_escape($invoice_data['unit']); ?>
                                            </td> -->
                                            <td align="center" class="td-style">
                                                <?php echo html_escape($invoice_data['quantity']); ?>
                                            </td>
                                            <!-- <td align="right" class="td-style">

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

                                            </td> -->
                                            <!-- <td align="right" class="td-style">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' . html_escape($invoice_data['rate']);
                                                    } else {
                                                        echo html_escape($invoice_data['rate']) . ' ' . $currency;
                                                    }
                                                    ?>

                                            </td> -->
                                            <td align="right" class="td-style">

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

                                        <td align="right" colspan="3">
                                            <?php echo display('total') ?>
                                        </td>
                                        <td align="right" class="td-style">

                                            <?php if ($position == 0) {
                                                echo  $currency . ' ' . html_escape(number_format($s_total, 2, '.', ','));
                                            } else {
                                                echo html_escape(number_format($s_total, 2, '.', ',')) . ' ' . $currency;
                                            } ?>

                                        </td>
                                    </tr>

                                    <?php if ($invoice_discount > 0) { ?>
                                        <tr>

                                            <td align="right" colspan="3">
                                                <?php echo display('invoice_discount'); ?>
                                            </td>
                                            <td align="right" class="td-style">

                                                <?php echo html_escape((($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency")) ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($total_discount > 0) { ?>
                                        <tr>

                                            <td align="right" colspan="3">
                                                <?php echo display('total_discount') ?>
                                            </td>
                                            <td align="right" class="td-style">

                                                <?php echo html_escape((($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency")) ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($shipping_cost > 0) { ?>
                                        <tr>

                                            <td align="right" colspan="3">
                                                <?php echo display('shipping_cost') ?>
                                            </td>
                                            <td align="right" class="td-style">


                                                <?php echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($previous > 0) { ?>
                                        <tr>

                                            <td align="right" colspan="3">
                                                <?php echo display('previous') ?>
                                            </td>
                                            <td align="right" class="td-style">


                                                <?php echo html_escape((($position == 0) ? "$currency {previous}" : "{prevous_due} $currency")) ?>

                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>

                                        <td align="right" colspan="3">
                                            <strong><?php echo display('grand_total') ?></strong>
                                        </td>
                                        <td align="right" class="td-style">

                                            <strong>
                                                <?php echo html_escape((($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency"))
                                                ?>
                                            </strong>

                                        </td>
                                    </tr>


                                    <?php if ($paid_amount > 0) { ?>
                                        <tr>

                                            <td align="right" colspan="3">

                                                <?php echo display('paid_ammount') ?>

                                            </td>
                                            <td align="right" class="td-style">

                                                <?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?>

                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($due_amount > 0) { ?>
                                        <tr>

                                            <td align="right" colspan="3">
                                                <?php echo display('due') ?>
                                            </td>
                                            <td align="right" class="td-style">

                                                <?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?>

                                            </td>
                                        </tr>
                                    <?php } ?>


                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="font-size: 16px; text-align: center;">
                                            Amount in words: <strong>
                                                <?= $inwords ?>
                                            </strong>
                                        </td>
                                    </tr>

                                </table>

                                <div class="cus-sign">
                                    <div class="cus">
                                        <span style="font-size:18px">
                                            Customer
                                        </span>
                                    </div>

                                    <div class="cus">
                                        <span style="font-size:18px">
                                            {company_info}
                                            For <strong>{company_name}</strong>
                                            {/company_info}

                                        </span>
                                    </div>
                                </div>


                            </div>

                            <center style="margin-top: 0.4in;">
                                <h3><?= $invoice_all_data[0]['invoice_details'] ?></h3>
                            </center>


                            <div style="position:fixed; text-align:center; margin-top: 0.5cm; font-size: 12px; bottom:0 !important; width:99vw">
                                <td>Powered by <strong>Webcoders</strong></a></td>
                            </div>
                        </div>

                    </div>
                </div>
                <!--  -->
                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?= base_url($red_url); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Cinvoice'); ?>"><?php echo display('cancel') ?></a>
                    <a class="btn btn-info" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></a>
                </div>
            </div>
        </div>


</div>


</section> <!-- /.content -->