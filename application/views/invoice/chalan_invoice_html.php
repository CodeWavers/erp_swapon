<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 50%;
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
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div id="printableArea" onload="printDiv('printableArea')">

                        <style type="text/css" scoped>
                            body {
                                font-size: 16px;
                            }

                            td {
                                padding: 3px;
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

                            .cus-name {
                                font-size: 18px;
                                font-weight: bold;
                            }
                        </style>

                        <div class="panel-body" style="margin-top: 1in; margin-bottom: 1in;">


                            <div class="row">
                                <div class="col-sm-8 invoice-address ">
                                    <h2 class="m-t-0">Chalan</h2>
                                    <div><?php echo display('invoice_no') ?>: {invoice_no}</div>
                                    <div class="m-b-15"><?php echo display('billing_date') ?>: {final_date}</div>


                                    <address class="customer_name_p">
                                        <strong class="cus_name">{customer_name} </strong><br>
                                        <?php if ($customer_address) { ?>
                                            {customer_address}
                                        <?php } ?>
                                        <br>
                                        <abbr><b><?php echo display('mobile') ?>:</b></abbr>
                                        <?php if ($customer_mobile) { ?>
                                            {customer_mobile}
                                        <?php }
                                        if ($customer_email) {
                                        ?>
                                            <br>
                                            <abbr><b><?php echo display('email') ?>:</b></abbr>
                                            {customer_email}
                                        <?php } ?>
                                    </address>
                                </div>



                            </div>

                            <div class="table-responsive table-bordered">

                                <table class="" style="width: 100%;">
                                    <thead>
                                        <!--                                    <img class="watermark" src="--><?php
                                                                                                                //                                    if (isset($Web_settings[0]['invoice_logo'])) {
                                                                                                                //                                        echo html_escape($Web_settings[0]['invoice_logo']);
                                                                                                                //                                    }
                                                                                                                //
                                                                                                                ?>
                                        <!--"  alt="">-->
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                            <!-- <th class="text-center">SN</th> -->
                                            <th class="text-center">Unit</th>

                                            <th class="text-center"><?php echo display('quantity') ?></th>
                                            <!--                                            --><?php //if($is_discount > 0){
                                                                                                ?>
                                            <!--                                                --><?php //if ($discount_type == 1) {
                                                                                                    ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('discount_percentage')
                                                                                                                                ?>
                                            <!-- %</th>-->
                                            <!--                                                --><?php //} elseif ($discount_type == 2) {
                                                                                                    ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('discount')
                                                                                                                                ?>
                                            <!-- </th>-->
                                            <!--                                                --><?php //} elseif ($discount_type == 3) {
                                                                                                    ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('fixed_dis')
                                                                                                                                ?>
                                            <!-- </th>-->
                                            <!--                                                --><?php //}
                                                                                                    ?>
                                            <!--                                            --><?php //}else{
                                                                                                ?>
                                            <!--                                                <th class="text-right">--><?php //echo '';
                                                                                                                            ?>
                                            <!-- </th>-->
                                            <!--                                            --><?php //}
                                                                                                ?>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        {invoice_all_data}
                                        <tr>
                                            <td class="text-center">{sl}</td>
                                            <td class="text-left">
                                                <div>{product_name} {extra}</div>
                                            </td>
                                            <td class="text-center">
                                                <div>{unit}</div>
                                            </td>

                                            <td align="center">{quantity}</td>

                                            <!--                                            --><?php //if ($discount_type == 1) {
                                                                                                ?>
                                            <!--                                                <td align="right">{discount_per}</td>-->
                                            <!--                                            --><?php //} else {
                                                                                                ?>
                                            <!--                                                <td align="right">--><?php //echo (($position == 0) ? "$currency {discount_per}" : "{discount_per} $currency")
                                                                                                                        ?>
                                            <!--</td>-->
                                            <!--                                            --><?php //}
                                                                                                ?>
                                            <!--                                            <img class="watermark" src="--><?php
                                                                                                                            //                                            if (isset($Web_settings[0]['invoice_logo'])) {
                                                                                                                            //                                                echo html_escape($Web_settings[0]['invoice_logo']);
                                                                                                                            //                                            }
                                                                                                                            //
                                                                                                                            ?>
                                            <!--" class="img-bottom-m" alt="">-->

                                        </tr>
                                        {/invoice_all_data}

                                        <!--                                        --><?php //if ($invoice_discount > 0) {
                                                                                        ?>
                                        <!--                                            <tr >-->
                                        <!--                                                <td class="text-left" colspan="3"><b>Sale Discount:</b></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td align="right" >--><?php //echo (($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency")
                                                                                                                    ?>
                                        <!--</td>-->
                                        <!--                                            </tr>-->
                                        <!--                                        --><?php //}
                                                                                        ?>
                                        <tr>
                                            <td class="text-right" colspan="2"><b><?php echo display('grand_total') ?>:</b></td>

                                            <td></td>
                                            <td align="center"><b>{subTotal_quantity}</b></td>

                                        </tr>

                                    </tbody>

                                    <!--                                    <tfoot>-->
                                    <!--                                    <tr >-->
                                    <!--                                        <td class="text-left" colspan="5"><b>In Word:</b></td>-->
                                    <!--                                        <td align="right" ><b>--><?php //echo $am_inword
                                                                                                            ?>
                                    <!--</b></td>-->
                                    <!--                                        <td></td>-->
                                    <!--                                        <td></td>-->
                                    <!---->
                                    <!--                                    </tr>-->
                                    <!--                                    </tfoot>-->

                                </table>
                            </div>
                            <div class="col-xs-12 ">

                                <p></p>
                                <p></p>
                                <p></p>
                                <!--                                        <p><strong>{invoice_details}</strong></p>-->


                            </div>
                        </div>




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
                        <?php if ($invoice_all_data[0]['delivery_type'] == 2) { ?>
                            <div style="max-width:60%; margin: 0 auto; margin-top:0.5in; padding:10px; border: 1px solid black; border-radius: 3px">
                                <span>
                                    <strong>BOOKING PARTICULAR: </strong><br>
                                    Courier Receiver: <?= $invoice_all_data[0]['receiver_name'] ?><br>
                                    <?= $invoice_all_data[0]['rec_num'] ?><br>
                                    <?= $invoice_all_data[0]['courier_name'] ?>, <?= $invoice_all_data[0]['branch_name'] ?><br>
                                </span>
                            </div>
                        <?php } ?>
                        <div class="footer">
                            <center><span style="font-size: 14px;">Powered by <strong>Webcoders</strong></span></center>
                        </div>

                    </div>
                </div>

                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('Cinvoice'); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Cinvoice'); ?>"><?php echo display('cancel') ?></a>
                    <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                </div>
            </div>
        </div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->