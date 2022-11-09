<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<style>
    table {
        /*border-collapse: collapse;*/
        width: 50%;
        border: none !important;
    }

    th {
        height: 70px;
    }


</style>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice_onloadprint.js" type="text/javascript"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
    <section class="content">
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
                    <div id="printableArea" class="watermark" onload="printDiv('printableArea')">
                        <style type="text/css" scoped>
                            .panel-body:last-child {
                                page-break-after: auto;
                            }

                            html,
                            body {
                                height: auto;
                            }
                            .condition_tag {
                                margin-top: 80%;
                                margin-left: 5%;
                                top: 0;
                                left: 0;
                                position: fixed;
                                border: 1px dashed red;
                                color: red !important;
                                width: 300px;
                                /* Browsers not below */
                                transform: rotate(-40deg);
                                /* Safari */
                                -webkit-transform: rotate(-40deg);
                                /* Firefox */
                                -moz-transform: rotate(-40deg);
                                /* Opera */
                                -o-transform: rotate(-40deg);
                                /* IE */
                                -ms-transform: rotate(-40deg);


                            }

                            .condition_tag_green {
                                margin-top: 80%;
                                margin-left: 5%;
                                top: 0;
                                left: 0;
                                position: fixed;
                                border: 1px dashed green;
                                color: green !important;
                                width: 300px;
                                /* Browsers not below */
                                transform: rotate(-40deg);
                                /* Safari */
                                -webkit-transform: rotate(-40deg);
                                /* Firefox */
                                -moz-transform: rotate(-40deg);
                                /* Opera */
                                -o-transform: rotate(-40deg);
                                /* IE */
                                -ms-transform: rotate(-40deg);

                            }
                            @media print {



                                .inv-footer-l {
                                    float: left;
                                    width: 35%;
                                    font-size: 14px;
                                }

                                .inv-footer-r {
                                    width: 35%;
                                    font-size: 14px;
                                    float: right;
                                }

                                body {
                                    -webkit-print-color-adjust: exact !important;
                                }

                                html,
                                body {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;

                                    height: 99%;
                                    page-break-after: avoid;
                                    page-break-before: avoid;
                                    /*background-color: rgba(217, 236, 241, 0.9) !important;*/
                                }

                                h4 {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;
                                }

                                table,
                                td,
                                th {
                                    /*border: 1px solid black;*/
                                    border: none !important;
                                }


                                .table td {
                                    /*border: 1px solid black !important;*/
                                    background-color: #fff0 !important;
                                    font-size: 14px !important;
                                }

                                .table th {
                                    font-size: 16px !important;
                                    /*border: 1px solid black !important;*/
                                    background-color: #eceff4!important;
                                    /*color: white !important;*/
                                }

                                table, tr, td{
                                    border:none;
                                }
                            }
                        </style>

                        <div class="watermark" style="position:absolute; opacity: 0.8; width:100vw; height:100vh; z-index: -1; background-image: url('<?php echo base_url() ?>my-assets/image/logo/logo.jpg') !important; background-repeat: no-repeat !important; background-size: 7.45in auto !important;-webkit-print-color-adjust: exact ; background-position: 0.4in 5in !important;">
                        </div>

                        <div class="panel-body">

                            <div>
                                <table>

                                    <tr style="background: #eceff4!important;">
                                        <td>
                                            <img style="height: 80px;" src="<?php
                                            if (isset($Web_settings[0]['invoice_logo'])) {
                                                echo html_escape($Web_settings[0]['invoice_logo']);
                                            }
                                            ?>" class="img-bottom-m" alt="">
                                        </td>
                                        <td></td>
                                        <td align="right">
                                            <?php if ($is_pre == 2){?>
                                            <div class="invoice_name">

                                                Pre-Order

                                            </div>

                                            <?php }else{?>
                                                <div class="invoice_name">

                                                    INVOICE

                                                </div>
                                            <?php } ?>
                                        </td>

                                    </tr>

                                    <tr style="background:#fcfbfb !important;margin-top: 10px">

                                        <td align="left" width="450px">

                                            <div class="company-content">

                                                {company_info}
                                                <!--                                                <img style="height: 80px;" src="--><?php
                                                //                                                if (isset($Web_settings[0]['invoice_logo'])) {
                                                //                                                    echo html_escape($Web_settings[0]['invoice_logo']);
                                                //                                                }
                                                //                                                ?><!--" class="img-bottom-m" alt="">-->



                                                <address >
                                                    <nobr><strong class="company_name_p">{company_name}</strong></nobr><br>
                                                    <abbr>{address}</abbr><br>
                                                    <nobr><abbr><?php echo display('email') ?>
                                                            :</abbr>  {email}</nobr><br>
                                                    <nobr><abbr><nobr><?php echo display('mobile') ?>
                                                                :</abbr> {mobile}</nobr><br>

                                                    <abbr><b>
                                                            {/company_info}

                                                </address>



                                            </div></td>

                                        <td align="left"  width="300px">

                                            <div  class="company-content" style="margin-top: 0; text-align: justify;">

                                                <?php if ($sale_type == 3) { ?>
                                                    <address style=" text-align: justify;">
                                                        <u><h4><b>Shipped To:</b></h4></u>
                                                        <abbr><nobr>Aggregator Name: {agg_name} </nobr></abbr>

                                                    </address>

                                                <?php }else{ ?>

                                                    <address style=" text-align: justify;">
                                                    <u><h4><b>Shipped To:</b></h4></u>
                                                    <abbr><nobr>Name: {customer_name} </nobr></abbr><br>
                                                    <abbr><nobr>Shop Name: {shop_name} </nobr></abbr><br>
                                                    <abbr><nobr>Mobile: {customer_mobile}</nobr></abbr><br>
                                                    <abbr><nobr>Address: {customer_address}</nobr></abbr><br>
                                                </address>

                                             <?php   } ?>
                                            </div>

                                        </td>

                                        <td align="right"  width="300px">

                                            <div class=" text-right"  style="margin-top:0;">

                                                <address  >
                                                    <u><h4><b>Order Information:</b></h4></u>
                                                    <abbr><nobr>Order No: {invoice_no}</nobr></abbr><br>
                                                    <abbr><nobr>Date:{final_date}</nobr></abbr><br>
<!--                                                    <abbr><nobr>Payment Method: {pt}</nobr></abbr><br>-->
                                                    <abbr><nobr>Shipping Method: {dt}</nobr></abbr><br>
                                                     <abbr><b>Sale Type:{st}</b></abbr><br>


                                                </address>



                                            </div>

                                        </td>




                                    </tr>
                                </table>
                            </div>


                            <div class="">

                                <table class="table " style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sl. No.</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Item Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-center">Unit Price (BDT)</th>
                                            <th class="text-center">Total Price (BDT)</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sl = 1;
                                        $s_total = 0;
                                        foreach ($invoice_all_data as $invoice_data) { ?>
                                            <tr>
                                                <td align="center">
                                                <nobr><?php echo $sl; ?></nobr>
                                            </td>
                                                <td class="text-center"><img src="  <?php echo html_escape($invoice_data['image']); ?>" class="img img-responsive" height="50" width="50"></td>


                                                <td align="center" >
                                                    <?php if ($invoice_data['is_return'] == 0) { ?>
                                                        <?php echo html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')'; ?>

                                                    <?php }else{ ?>
                                                        <?php echo html_escape($invoice_data['product_name']) . '(' . html_escape($invoice_data['sku']) . ')(RET)'; ?>

                                                    <?php } ?>

                                                </td>




                                                <td align="center" class="td-style" width="10%" >
                                                    <?php echo html_escape(abs($invoice_data['quantity'])); ?>
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
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php
                                                        if ($position == 0) {
                                                            echo  $currency . ' ' . html_escape($invoice_data['rate']);
                                                        } else {
                                                            echo html_escape($invoice_data['rate']) . ' ' . $currency;
                                                        }
                                                        ?>
                                                    </nobr>
                                                    <nobr>  <s>Tk <?php echo html_escape($invoice_data['price']); ?></s></nobr>
                                                </td>
                                                <td align="right" class="td-style" style="width: 15mm !important;">

                                                    <?php
                                                    if ($position == 0) {
                                                        echo  $currency . ' ' . html_escape(abs($invoice_data['total_price_wd']));
                                                    } else {
                                                        echo html_escape($invoice_data['total_price_wd']) . ' ' . $currency;
                                                    }
                                                    //                                                $s_total += $invoice_data['total_price_wd'];
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php $sl++;
                                        } ?>


                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="4">
                                                <nobr>Sales Total</nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <?php if ($sub_total < 0) { ?>
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency 0.00" : "0.00 $currency")) ?>
                                                    </nobr>
                                                <?php }else{ ?>
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {sub_total}" : "{sub_total} $currency")) ?>
                                                    </nobr>
                                                <?php }?>
                                            </td>
                                        </tr>

                                        <?php if ($invoice_discount > 0) { ?>
                                            <tr hidden>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr><?php echo display('invoice_discount'); ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!--                                    --><?php //if ($total_discount > 0) { ?>
                                        <tr>
                                            <td align="left">
                                                <nobr></nobr>
                                            </td>
                                            <td align="right" colspan="4">
                                                <nobr><?php echo display('total_discount') ?></nobr>
                                            </td>
                                            <td align="right" class="td-style">
                                                <nobr>
                                                    <?php echo html_escape((($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency")) ?>
                                                </nobr>
                                            </td>
                                        </tr>
                                        <!--                                    --><?php //} ?>
                                        <?php if ($sales_return > 0) { ?>
                                            <tr>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr>Sales Return</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {sales_return}" : "{sales_return} $currency")) ?>

                                                    </nobr>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr>Rounding</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {rounding}" : "{rounding} $currency")) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="4">
                                                    <nobr>  <strong>Payable</strong></nobr>
                                                </td>
                                                <td align="right" >


                                                    <nobr><strong>(Including Vat)</strong></nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <strong>
                                                            <?php echo html_escape((($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency"))
                                                            ?>
                                                        </strong>
                                                    </nobr>
                                                </td>
                                                </td>
                                            </tr>
                                            <?php if ($previous_paid > 0) { ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <strong> <nobr>
                                                                Previous Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong> <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {previous_paid}" : "{previous_paid} $currency")) ?>
                                                            </nobr>   </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($courier_status != 5) { ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <strong> <nobr>
                                                                Total Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong> <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?>
                                                            </nobr>   </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr>
                                                        <?=  ($due_amount < 0) ? 'Refund'  : 'Due';?>
                                                    </nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($cash_refund > 0) { ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <nobr>Cash Refund</nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>
                                                            <?php echo html_escape((($position == 0) ? "$currency {cash_refund}" : "{cash_refund} $currency")) ?>

                                                        </nobr>
                                                    </td>
                                                </tr>

                                                <?php if ($customer_ac > 0) { ?>
                                                    <tr>
                                                        <td align="left">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right" colspan="4">
                                                            <nobr>Customer Receivable</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {customer_ac}" : "{customer_ac} $currency")) ?>

                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>



                                            <?php if ($due_amount == 0){
                                                ?>
                                            <?php
                                            foreach ($payment_info as $pay){?>

                                                <?php

                                                if ($pay->pay_type == 1){
                                                    $pay_type='In Cash';
                                                }
                                                if ($pay->pay_type == 2){
                                                    $pay_type='In Cheque';
                                                }
                                                if ($pay->pay_type == 3){
                                                    $pay_type='In Bkash';
                                                }

                                                if ($pay->pay_type == 4){
                                                    $pay_type='In Bank';
                                                }

                                                if ($pay->pay_type == 5){
                                                    $pay_type='In Nagad';
                                                }

                                                if ($pay->pay_type == 6){
                                                    $pay_type='In Card';
                                                }
                                                if ($pay->pay_type == 7){
                                                    $pay_type='In Rocket';
                                                }

                                                ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <nobr><?= $pay_type?></nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>
                                                            <?php echo html_escape((($position == 0) ? $currency ." ". number_format($pay->amount) :number_format($pay->amount)." ".$currency)) ?>
                                                        </nobr>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        <?php } ?>
                                        <?php } ?>


                                        <?php if ($shipping_cost > 0) { ?>
                                            <tr hidden>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr><?php echo display('shipping_cost') ?></nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>

                                                        <?php echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($sales_return == 0) { ?>

                                            <?php if ($previous > 0) { ?>
                                                <tr >
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <nobr><?php echo display('previous') ?></nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>

                                                            <?php echo html_escape((($position == 0) ? "$currency {previous}" : "{previous} $currency")) ?>
                                                        </nobr>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr>Rounding</nobr>
                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {rounding}" : "{rounding} $currency")) ?>

                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($sale_type == 1) { ?>

                                                <?php if ($shipping_cost > 0 ){ ?>
                                                    <tr>
                                                        <td align="left">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right" colspan="4">
                                                            <nobr>Delivery Charge</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?>

                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php  }?>

                                                <?php if ($total_commission > 0 ){ ?>
                                                    <tr>
                                                        <td align="left">
                                                            <nobr></nobr>
                                                        </td>
                                                        <td align="right" colspan="4">
                                                            <nobr>Total Commission</nobr>
                                                        </td>
                                                        <td align="right" class="td-style">
                                                            <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {total_commission}" : "{total_commission} $currency")) ?>

                                                            </nobr>
                                                        </td>
                                                    </tr>
                                                <?php  }?>

                                            <?php  }?>
                                            <tr>
                                                <td align="right" colspan="4">
                                                    <nobr>  <strong>Net Payable</strong></nobr>
                                                </td>
                                                <td align="right" >
                                                    <nobr><strong>(Including Vat)</strong></nobr>
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
                                            <?php if ($previous_paid > 0) { ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <strong> <nobr>
                                                                Previous Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong> <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {previous_paid}" : "{previous_paid} $currency")) ?>
                                                            </nobr>   </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <?php if ($due_amount == 0 && empty($payment_info)){
                                            ?>

                                            <?php foreach ($payment_info as $pay){?>

                                                <?php

                                                if ($pay->pay_type == 1){
                                                    $pay_type='In Cash';
                                                }
                                                if ($pay->pay_type == 2){
                                                    $pay_type='In Cheque';
                                                }
                                                if ($pay->pay_type == 3){
                                                    $pay_type='In Bkash';
                                                }

                                                if ($pay->pay_type == 4){
                                                    $pay_type='In Bank';
                                                }

                                                if ($pay->pay_type == 5){
                                                    $pay_type='In Nagad';
                                                }

                                                if ($pay->pay_type == 6){
                                                    $pay_type='In Card';
                                                }
                                                    if ($pay->pay_type == 7){
                                                        $pay_type='In Rocket';
                                                    }

                                                ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <nobr><?= $pay_type?></nobr>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>
                                                            <?php echo html_escape((($position == 0) ? $currency ." ". number_format($pay->amount) :number_format($pay->amount)." ".$currency)) ?>
                                                        </nobr>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                            <?php } ?>


                                            <?php if ($paid_amount > 0) { ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <strong> <nobr>
                                                                Total Paid
                                                            </nobr>
                                                        </strong>
                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <strong> <nobr>
                                                                <?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?>
                                                            </nobr>   </strong>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <tr>
                                                <td align="left">
                                                    <nobr></nobr>
                                                </td>
                                                <td align="right" colspan="4">
                                                    <nobr>
                                                        Due
                                                    </nobr>

                                                </td>
                                                <td align="right" class="td-style">
                                                    <nobr>
                                                        <?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?>
                                                    </nobr>
                                                </td>
                                            </tr>
                                            <?php if ($changeamount > 0) { ?>
                                                <tr>
                                                    <td align="left">
                                                        <nobr></nobr>
                                                    </td>
                                                    <td align="right" colspan="4">
                                                        <nobr>
                                                            Change
                                                        </nobr>

                                                    </td>
                                                    <td align="right" class="td-style">
                                                        <nobr>
                                                            <?php echo html_escape((($position == 0) ? "$currency {changeamount}" : "{changeamount} $currency")) ?>
                                                        </nobr>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (!empty($invoice_details)) { ?>
                                            <tr>

                                                <td align="left" colspan="4" >
                                                    <strong>Notes:</strong> {invoice_details}
                                                </td>

                                            </tr>

                                        <?php } ?>

                                        </td>
                                        </tr>
                                    </tbody>


                                </table>

                                <?php if($due_amount >0){ ?>
                                    <div class="condition_tag  text-center text-uppercase" >

                                        <h1 style="color: red !important;">Condition</h1>


                                        <h1 style="color: red !important;">TK <?=$due_amount ?></h1>


                                    </div>
                                <?php }else{ ?>

                                    <div class="condition_tag_green text-center text-uppercase " >

                                        <h1 style="color: green !important;">No Condition</h1>


                                    </div>
                                <?php } ?>
<!--                                --><?php //if($delivery_type == 2){ ?>
<!--                                <div class="condition_tag text-danger text-center text-uppercase" >-->
<!---->
<!--                                    <h1 style="color: red !important;">{con}</h1>-->
<!---->
<!--                                    --><?php //if($condition_cost >0){ ?>
<!--                                    <abbr style="color: red !important;">TK {condition_cost}</abbr>-->
<!--                                    --><?php //} ?>
<!---->
<!--                                </div>-->
<!--                                --><?php //} ?>
                            </div>

                            <?php  if (!empty($payment_info)){?>

                            <table class="table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="text-align: right">#</th>
                                    <th style="text-align: right">Payment Date</th>
                                    <th style="text-align: right">Payment Type</th>
                                    <th style="text-align: right">Notes</th>
                                    <th style="text-align: right">Amount</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $slp = 1;
                                foreach ($payment_info as $pay){?>

                                    <?php

                                    if ($pay->pay_type == 1){
                                        $pay_type='In Cash';
                                    }
                                    if ($pay->pay_type == 2){
                                        $pay_type='In Cheque';
                                    }
                                    if ($pay->pay_type == 3){
                                        $pay_type='In Bkash';
                                    }

                                    if ($pay->pay_type == 4){
                                        $pay_type='In Bank';
                                    }

                                    if ($pay->pay_type == 5){
                                        $pay_type='In Nagad';
                                    }

                                    if ($pay->pay_type == 6){
                                        $pay_type='In Card';
                                    }
                                    if ($pay->pay_type == 7){
                                        $pay_type='In Rocket';
                                    }

                                    ?>
                                    <tr>
                                        <td align="right"><?=$slp++ ?></td>
                                        <td align="right">
                                            <nobr> <?= $pay->pay_date?></nobr>
                                        </td>
                                        <td align="right" >
                                            <nobr><?= $pay_type?></nobr>
                                        </td>

                                        <td align="right" >
                                            <nobr><?= $pay->notes?></nobr>
                                        </td>
                                        <td align="right" class="">
                                            <nobr>
                                                <?php echo html_escape((($position == 0) ? $currency ." ". number_format($pay->amount) :number_format($pay->amount)." ".$currency)) ?>
                                            </nobr>
                                        </td>
                                    </tr>

                                <?php } ?>

                                </tbody>

                            </table>

                            <?php } ?>


<!--                            <div class="footer" style="padding: 0.5in;">-->
<!---->
<!--                                <div class="row">-->
<!--                                    <div class="col-sm-4">-->
<!---->
<!--                                        <div class="inv-footer-l">-->
<!--                                            <span style="display: block;">--><?php //echo display('authorised_by') ?><!--:<span>-->
<!--                                                    <span class="text-center" style="display: block;border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="col-sm-4">-->
<!---->
<!--                                        <div class="inv-footer-r">-->
<!--                                            <span style="display: block;">--><?php //echo display('received_by') ?><!--:</span>-->
<!--                                            <span class="text-center" style="display: block; border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!---->
<!--                                </div>-->
<!---->
<!---->
<!--                            </div>-->

                        </div>
                    </div>
                </div>

                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('Cinvoice/manage_invoice'); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Cinvoice/manage_invoice'); ?>"><?php echo display('cancel') ?></a>
                    <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                </div>
            </div>
        </div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->