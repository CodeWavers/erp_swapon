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
                                margin: 60px;
                                border: 1px dashed red;
                                color: red !important;
                                width: 150px;
                                /* Browsers not below */
                                transform: rotate(-45deg);
                                /* Safari */
                                -webkit-transform: rotate(-45deg);
                                /* Firefox */
                                -moz-transform: rotate(-45deg);
                                /* Opera */
                                -o-transform: rotate(-45deg);
                                /* IE */
                                -ms-transform: rotate(-45deg);

                            }
                            .condition_tag_green {
                                margin: 60px;
                                border: 1px dashed green;
                                color: green !important;
                                width: 150px;
                                /* Browsers not below */
                                transform: rotate(-45deg);
                                /* Safari */
                                -webkit-transform: rotate(-45deg);
                                /* Firefox */
                                -moz-transform: rotate(-45deg);
                                /* Opera */
                                -o-transform: rotate(-45deg);
                                /* IE */
                                -ms-transform: rotate(-45deg);

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

                        <?php foreach ($order as $or) {?>
                        <div class="panel-body" style="margin-bottom:4in ">

                            <div>

                                <?php


                                $sid=$or[0]->shipping_method;
                                $url = api_url()."order/shipping_method/$sid";

                                $curl = curl_init($url);
                                curl_setopt($curl, CURLOPT_URL, $url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                                //for debug only!
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                                $resp = curl_exec($curl);
                                curl_close($curl);

//                                $shipping_method=json_decode($resp);
                                ?>



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
                                            <div class="invoice_name">

                                                INVOICE

                                            </div>
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

                                        <td align="left" width="300px">

                                            <div  class="company-content" style="margin-top: 0">

                                                <?php
                                                $shipping_address=json_decode($or[0]->shipping_address)
                                                ?>
                                                <address >
                                                    <h4><b>Shipped To:</b></h4>
                                                    <abbr><nobr>Name: <?php echo $shipping_address->name?></nobr></nobr></abbr><br>
                                                    <abbr><nobr>Mobile: <?php echo $shipping_address->phone?></nobr></abbr><br>
                                                    <abbr>Address: <?php echo $shipping_address->address?></abbr><br>
                                                </address>
                                            </div>

                                        </td>

                                        <td align="right" width="300px">

                                            <div class=" text-right"  style="margin-top:0;">

                                                <address  >
                                                    <h4><b>Order Information:</b></h4>
                                                    <abbr<nobr>Order No: <?php echo $or[0]->code?></nobr></abbr><br>
                                                    <abbr<nobr>Date: <?php echo  date('m/d/Y',$or[0]->date)?></nobr></abbr><br>
                                                    <abbr<nobr>Payment Method: <?php echo $or[0]->payment_type ?></nobr></abbr><br>
                                                    <abbr<nobr>Shipping Method: <?php echo $resp?></nobr></abbr><br>
                                                    <!--                                                    <abbr><b>Sale Type:{st}</b></abbr><br>-->


                                                </address>



                                            </div>

                                        </td>




                                    </tr>
                                </table>
                            </div>

                            <div class="">

                                <table class="table" style="width: 100%;">
                                    <thead>
                                    <tr class="bg-trans-dark">
                                        <th class="min-col">#</th>
                                        <th width="10%">
                                            Photo
                                        </th>
                                        <th class="text-uppercase">
                                            Description
                                        </th>
                                        <th class="min-col text-center text-uppercase">
                                            Qty
                                        </th>
                                        <th class="min-col text-center text-uppercase">
                                            Price
                                        </th>
                                        <th class="min-col text-right text-uppercase">
                                            Total
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $sl=1 ?>
                                    <?php foreach ($or as $od) {?>
                                        <tr>
                                            <td class="text-center"> <?php echo $sl++ ?></td>
                                            <td class="text-center"><img height="50" src="<?php echo ecom_url()?>/public/<?php echo $od->thumbnail_img?>"></td>

                                            <td>
                                                <strong><?php echo $od->name?></strong>
                                                <small><?php echo $od->variation?></small>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $od->quantity?>
                                            </td>

                                            <td align="right">

                                                <?php echo $currency.' '.$od->price/$od->quantity?>
                                                <s style="font-size:11px"><?php echo $currency.' '.$od->unit_price?></s>
                                            </td>

                                            <td align="right">  <?php echo $currency.' '.$od->price?></td>

                                        </tr>
                                    <?php } ?>

                                    <tr >

                                        <td colspan="5"  class="text-right" colspan="3"><b>Sub-Total:</b></td>

                                        <td  align="right"><b><?php echo array_sum(array_column($or,'price'))?></b></td>
                                    </tr>
                                    <tr>
                                        <td  align="right" hidden><b>


                                                <?php if (substr($or[0]->payment_details,0,1=='{')) {

                                                    $data = json_decode($or[0]->payment_details);
                                                    if($data){
                                                        (int) $paidtotal= $data->amount;
                                                    }
                                                    else {
                                                        (int) $paidtotal= 0;
                                                    }

                                                }else {

                                                    $paidtotal=0;
//                                                    (int) $paidtotal= array_sum(array_column($offline_payment,'amount'));


                                                }

                                                echo $paidtotal;
                                                ?>
                                            </b></td>
                                        <td colspan="3" rowspan="7" >
<!--                                            <strong>Notes:</strong>-->

                                            <?php if($or[0]->grand_total-$paidtotal>0){ ?>
                                                <div class="condition_tag text-danger text-center text-uppercase" >

                                                    <h3>Condition</h3>


                                                        <abbr>TK <?=$or[0]->grand_total-$paidtotal ?></abbr>


                                                </div>
                                            <?php }else{ ?>

                                                <div class="condition_tag_green text-success text-center text-uppercase " >

                                                    <h3>No Condition</h3>


                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td colspan="2" class="text-right"><b>Discount:</b></td>

                                        <td align="right"><b><?php echo $or[0]->flat_discount?></b></td>
                                    </tr>
                                    <tr>

                                        <td  colspan="2" class="text-right"><b>Shipping Cost:</b></td>

                                        <td  align="right"><b><?php echo $or[0]->shipping_cost?></b></td>
                                    </tr>
                                    <tr>

                                        <td  colspan="2" class="text-right"><b>Total Tax:</b></td>

                                        <td  align="right"><b> <?php echo $currency.' '.$or[0]->tax?></b></td>
                                    </tr>
                                    <tr>

                                        <td  colspan="2" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>

                                        <td  align="right"><b>   <?php echo $currency.' '.$or[0]->grand_total?></b></td>
                                    </tr>
                                    <tr>

                                        <td  colspan="2" class="text-right"><b>Paid Amount:</b></td>

                                        <td  align="right"><b>


                                                <?php if (substr($or[0]->payment_details,0,1=='{')) {

                                                    $data = json_decode($or[0]->payment_details);
                                                    if($data){
                                                        (int) $paidtotal= $data->amount;
                                                    }
                                                    else {
                                                        (int) $paidtotal= 0;
                                                    }

                                                }else {

                                                    $paidtotal=0;
//                                                    (int) $paidtotal= array_sum(array_column($offline_payment,'amount'));


                                                }

                                                echo $paidtotal;
                                                ?>
                                            </b></td>
                                    </tr>
                                    <tr>

                                        <td  colspan="2" class="text-right"><b>Due Amount:</b></td>

                                        <td  align="right"><b> <?php echo $currency.' '.($or[0]->grand_total-$paidtotal)?></b></td>
                                    </tr>
                                    </tbody>


                                </table>

                            </div>



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
                        <?php } ?>
                    </div>

                </div>

                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('Corder'); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Corder'); ?>"><?php echo display('cancel') ?></a>
                    <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                </div>
            </div>
        </div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->