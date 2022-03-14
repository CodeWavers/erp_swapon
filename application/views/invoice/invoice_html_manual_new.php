<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<style>
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
                                color: red;
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
                                    background-color: rgba(217, 236, 241, 0.9) !important;
                                }

                                h4 {
                                    font-family: 'Times New Roman', Times, serif;
                                    font-size: 18px;
                                }

                                table,
                                td,
                                th {
                                    border: 1px solid black;
                                }


                                .table td {
                                    border: 1px solid black !important;
                                    background-color: #fff0 !important;
                                    font-size: 14px !important;
                                }

                                .table th {
                                    font-size: 16px !important;
                                    border: 1px solid black !important;
                                    background-color: #365f91 !important;
                                    color: white !important;
                                }

                                table, tr, td{
                                    border:none;
                                }
                            }
                        </style>

                        <div class="watermark" style="position:absolute; opacity: 0.8; width:100vw; height:100vh; z-index: -1; background-image: url('<?php echo base_url() ?>my-assets/image/logo/logo.jpg') !important; background-repeat: no-repeat !important; background-size: 7.45in auto !important;-webkit-print-color-adjust: exact ; background-position: 0.4in 5in !important;">
                        </div>

                        <div class="panel-body" style="margin: 0 0.2in">

                            <div>
                                <table cellspacing="0" cellpadding="0">

                                    <tr>




                                <td><div class="col-sm-3 company-content " style="margin-top: 0.2in">

                                    {company_info}
                                    <img style="height: 80px;" src="<?php
                                                                    if (isset($Web_settings[0]['invoice_logo'])) {
                                                                        echo html_escape($Web_settings[0]['invoice_logo']);
                                                                    }
                                                                    ?>" class="img-bottom-m" alt="">



                                    <address style="margin-top: 0;">
                                      <strong class="company_name_p">{company_name}</strong><br>
                                        <abbr>{address}</abbr><br>
                                        <abbr><?php echo display('email') ?>
                                                :</abbr>  {email}<br>
                                        <abbr><?php echo display('mobile') ?>
                                        :</abbr> {mobile}<br>

                                        <abbr><b>
                                        {/company_info}
                                        <abbr>{tax_regno}</abbr>
                                    </address>



                                </div></td>

                                <td>

                                    <div class="col-sm-3 " style="margin-bottom: 20px;">


<!--                                        <abbr>Name:{customer_name}</abbr>-->
<!--                                        <div style="display: flex; justify-content: space-between; margin-top: -0.1cm">-->
<!--                                            <h4><b>Contact No.:</b> {contact_no}</h4>-->
<!--                                        </div>-->


                                        <address style="margin-top: 0;">
                                            <h4><b>Shipped To:</b></h4>
                                            <abbr>Name:{customer_name}</abbr><br>
                                            <abbr>Mobile:{customer_mobile}</abbr><br>
                                            <abbr>Address:{customer_address}</abbr><br>
                                        </address>
                                    </div>

                                </td>

                                        <td><div class="col-sm-3  text-right" style="margin-top: 0" >


                                                <div style="margin-bottom: 0.5in">
                                                    <strong  class="company_name_p text-right">INVOICE</strong><br>

                                               </div>




                                                <address style="margin-top:0;" >
                                                    <h4><b>Order Information:</b></h4>
                                                    <abbr>Order No:{invoice_no}</abbr><br>
                                                    <abbr>Date:{final_date}</abbr><br>
                                                    <abbr>Payment Method:{pt}</abbr><br>
                                                    <abbr>Shipping Method:{dt}</abbr><br>
                                                    <abbr><b>Sale Type:{st}</b></abbr><br>


                                                </address>



                                            </div></td>




                                    </tr>
                                </table>
                            </div>


                            <div class="">

                                <table class="table table-bordered" style="width: 100%;">
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
                                        {invoice_all_data}
                                        <tr>
                                            <td class="text-center">{sl}</td>
                                            <td class="text-center"><img src="{image}" class="img img-responsive" height="50" width="50"></td>
                                            <td class="text-center">
                                                <div>{product_name} - ({product_model})</div>
                                            </td>

                                            <td align="right">{quantity}</td>

                                            <td align="right"><?php echo (($position == 0) ? "$currency {rate}" : "{rate} $currency") ?></td>
                                            <td align="right"><?php echo (($position == 0) ? "$currency {total_price}" : "{total_price} $currency") ?></td>
                                        </tr>
                                        {/invoice_all_data}

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style="background-color: #cad1dba1 !important;" class="text-right" colspan="3"><b>Sub-Total:</b></td>

                                            <td style="background-color: #cad1dba1 !important;" align="right"><b><?php echo (($position == 0) ? "$currency {subTotal_ammount}" : "{subTotal_ammount} $currency") ?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" rowspan="2" style="background-color: #cad1dba1 !important;">
                                                <strong>Notes:</strong>
                                            </td>
                                            <td colspan="2" class="text-right"><b>Discount:</b></td>

                                            <td align="right"><b><?php echo (($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency") ?></b></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #cad1dba1 !important;" colspan="2" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>

                                            <td style="background-color: #cad1dba1 !important;" align="right"><b><?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?></b></td>
                                        </tr>
                                    </tbody>


                                </table>
                                <div class="condition_tag text-danger text-center text-uppercase" >

                                    <h3>{con}</h3>

                                    <?php if($condition_cost >0){ ?>
                                    <abbr>TK {condition_cost}</abbr>
                                    <?php } ?>

                                </div>

                            </div>


                            <div class="footer" style="padding: 0.5in;">

                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="inv-footer-l">
                                            <span style="display: block;"><?php echo display('authorised_by') ?>:<span>
                                                    <span class="text-center" style="display: block;border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div class="inv-footer-r">
                                            <span style="display: block;"><?php echo display('received_by') ?>:</span>
                                            <span class="text-center" style="display: block; border-top: 1px solid black; margin-top:0.5in">(Sign with Date)</span>
                                        </div>
                                    </div>


                                </div>


                            </div>

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