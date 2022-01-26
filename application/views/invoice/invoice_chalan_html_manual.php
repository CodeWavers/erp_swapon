<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<style>



    table, td, th {
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
                    <div id="printableArea"  class="watermark"  onload="printDiv('printableArea')">

                        <div class="watermark" style=" background-image: url('<?php echo base_url() ?>assets/images/icons/watermark.png') !important;">

                            <div class="panel-body" >

                                <div class="row " >
                                    <div class="col-sm-8  invoice-address">
                                        <h2 class="m-t-0">Invoice</h2>
                                        <div><?php echo display('invoice_no') ?>: {invoice_no}</div>
                                        <div class="m-b-15">Date: {final_date}</div>

                                        <span class="label label-success-outline m-r-15">Buyer</span>

                                        <address class="customer_name_p">
                                            <strong class="c_name">{customer_name} </strong><br>
                                            <?php if ($customer_address) { ?>
                                                {customer_address}
                                            <?php } ?>
                                            <br>
                                            <abbr><b><?php echo display('mobile') ?>:</b></abbr>
                                            <?php if ($customer_mobile) { ?>
                                                {customer_mobile}
                                            <?php }if ($customer_email) {
                                                ?>
                                                <br>
                                                <abbr><b><?php echo display('email') ?>:</b></abbr>
                                                {customer_email}
                                            <?php } ?>
                                        </address>
                                    </div>

                                    <div class="col-sm-4  text-right company-content ">

                                        {company_info}
                                        <img style="height: 100px;" src="<?php
                                        if (isset($Web_settings[0]['invoice_logo'])) {
                                            echo html_escape($Web_settings[0]['invoice_logo']);
                                        }
                                        ?>" class="img-bottom-m" alt="">

                                        <br>
                                        <!--                                    <span class="label label-success-outline m-r-15 p-10" >--><?php //echo display('billing_from') ?><!--</span>-->
                                        <address class="">
                                            <strong class="company_name_p">{company_name}</strong><br>
                                            <address class="text-left" style="margin-left: 90px;margin-top: 1rem">
                                                {address}<br>
                                                <abbr>Service:</abbr> {mobile}
                                                <abbr>Order:</abbr>
                                                {mobile}<br>
                                                {email};{email}<br>
                                                {website}<br>
                                                {/company_info}
                                                <abbr>{tax_regno}</abbr>
                                            </address>
                                        </address>



                                    </div>
                                </div>

                                <div class="table-responsive table-bordered print_header_new "  >

                                    <table class="" style="width: 100%;" >
                                        <thead>
                                        <!--                                    <img class="watermark" src="--><?php
                                        //                                    if (isset($Web_settings[0]['invoice_logo'])) {
                                        //                                        echo html_escape($Web_settings[0]['invoice_logo']);
                                        //                                    }
                                        //                                    ?><!--"  alt="">-->
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center"><?php echo display('rate') ?></th>
                                            <th class="text-center"><?php echo display('quantity') ?></th>
                                            <!--                                            --><?php //if($is_discount > 0){ ?>
                                            <!--                                                --><?php //if ($discount_type == 1) { ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('discount_percentage') ?><!-- %</th>-->
                                            <!--                                                --><?php //} elseif ($discount_type == 2) { ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('discount') ?><!-- </th>-->
                                            <!--                                                --><?php //} elseif ($discount_type == 3) { ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('fixed_dis') ?><!-- </th>-->
                                            <!--                                                --><?php //} ?>
                                            <!--                                            --><?php //}else{ ?>
                                            <!--                                                <th class="text-right">--><?php //echo ''; ?><!-- </th>-->
                                            <!--                                            --><?php //}?>

                                            <th class="text-right"><?php echo display('ammount') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {invoice_all_data}
                                        <tr>
                                            <td class="text-center">{sl}</td>
                                            <td class="text-left"><div>{product_name} - ({product_model})</div></td>
                                            <td align="text-left">{sn}</td>
                                            <td class="text-center"><div>{unit}</div></td>
                                            <td align="right"><?php echo (($position == 0) ? "$currency {rate}" : "{rate} $currency") ?></td>
                                            <td align="right">{quantity}</td>

                                            <!--                                            --><?php //if ($discount_type == 1) { ?>
                                            <!--                                                <td align="right">{discount_per}</td>-->
                                            <!--                                            --><?php //} else { ?>
                                            <!--                                                <td align="right">--><?php //echo (($position == 0) ? "$currency {discount_per}" : "{discount_per} $currency") ?><!--</td>-->
                                            <!--                                            --><?php //} ?>
                                            <!--                                            <img class="watermark" src="--><?php
                                            //                                            if (isset($Web_settings[0]['invoice_logo'])) {
                                            //                                                echo html_escape($Web_settings[0]['invoice_logo']);
                                            //                                            }
                                            //                                            ?><!--" class="img-bottom-m" alt="">-->


                                            <td align="right"><?php echo (($position == 0) ? "$currency {total_price}" : "{total_price} $currency") ?></td>
                                        </tr>
                                        {/invoice_all_data}

                                        <!--                                        --><?php //if ($invoice_discount > 0) { ?>
                                        <!--                                            <tr >-->
                                        <!--                                                <td class="text-left" colspan="3"><b>Sale Discount:</b></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td align="right" >--><?php //echo (($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency") ?><!--</td>-->
                                        <!--                                            </tr>-->
                                        <!--                                        --><?php //} ?>
                                        <tr >
                                            <td class="text-left" colspan="3"><b><?php echo display('grand_total') ?>:</b></td>

                                            <td></td>
                                            <td></td>
                                            <td align="center" ><b>{subTotal_quantity}</b></td>
                                            <td align="right" ><b><?php echo (($position == 0) ? "$currency {total}" : "{total} $currency") ?></b></td>
                                        </tr>

                                        </tbody>

                                        <!--                                    <tfoot>-->
                                        <!--                                    <tr >-->
                                        <!--                                        <td class="text-left" colspan="5"><b>In Word:</b></td>-->
                                        <!--                                        <td align="right" ><b>--><?php //echo $am_inword ?><!--</b></td>-->
                                        <!--                                        <td></td>-->
                                        <!--                                        <td></td>-->
                                        <!---->
                                        <!--                                    </tr>-->
                                        <!--                                    </tfoot>-->

                                    </table>
                                </div>

                                <div class="row" >
                                    <div class="col-xs-4 invoicefooter-content" style="margin-top: 2rem;width: 100%">
                                        <p><b>In word: <?php echo $am_inword ?> Taka Only</b></p>

                                        <table class="table-responsive table-bordered" style="width: 50%">
                                            <!--                                           --><?php
                                            //                                           if ($invoice_all_data[0]['total_discount'] != 0) {
                                            //                                               ?>
                                            <!--                                               <tr>-->
                                            <!--                                                   <th class="border-bottom-top">--><?php //echo display('total_discount') ?><!-- : </th>-->
                                            <!--                                                   <td class="text-right border-bottom-top">--><?php //echo html_escape((($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency")) ?><!-- </td>-->
                                            <!--                                               </tr>-->
                                            <!--                                               --><?php
                                            //                                           }
                                            //                                           if ($invoice_all_data[0]['total_tax'] != 0) {
                                            //                                               ?>
                                            <!--                                               <tr>-->
                                            <!--                                                   <th class="text-left border-bottom-top">--><?php //echo display('tax') ?><!-- : </th>-->
                                            <!--                                                   <td  class="text-right border-bottom-top">--><?php //echo html_escape((($position == 0) ? "$currency {total_tax}" : "{total_tax} $currency")) ?><!-- </td>-->
                                            <!--                                               </tr>-->
                                            <!--                                           --><?php //} ?>
                                            <!--                                           --><?php //if ($invoice_all_data[0]['shipping_cost'] != 0) {
                                            //                                               ?>
                                            <!--                                               <tr>-->
                                            <!--                                                   <th class="text-left border-bottom-top">--><?php //echo 'Shipping Cost' ?><!-- : </th>-->
                                            <!--                                                   <td class="text-right border-bottom-top">--><?php //echo html_escape((($position == 0) ? "$currency {shipping_cost}" : "{shipping_cost} $currency")) ?><!-- </td>-->
                                            <!--                                               </tr>-->
                                            <!--                                           --><?php //} ?>
                                            <tr>
                                                <th class="text-left grand_total"> <?php echo display('previous'); ?> Due :</th>
                                                <td class="text-right grand_total"><?php echo html_escape((($position == 0) ? "$currency {previous}" : "{previous} $currency")) ?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-left grand_total">Current Sales :</th>
                                                <td class="text-right grand_total"><?php echo html_escape((($position == 0) ? "$currency {total}" : "{total} $currency")) ?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-left grand_total border-bottom-top">Paid : </th>
                                                <td class="text-right grand_total border-bottom-top"><?php echo html_escape((($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency")) ?></td>
                                            </tr>
                                            <?php
                                            if ($invoice_all_data[0]['due_amount'] != 0) {
                                                ?>
                                                <tr>
                                                    <th class="text-left grand_total">Current <?php echo display('due') ?> : </th>
                                                    <td  class="text-right grand_total"><?php echo html_escape((($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency")) ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>



                                    </div>

                                    <div class="col-xs-12 ">

                                        <p></p>
                                        <p></p>
                                        <p></p>
                                        <p style="margin-top: 40%;" ><strong>Customer satisfaction is our upmost priority. Looking forward to serving you again.</strong></p>
                                        <!--                                        <p><strong>{invoice_details}</strong></p>-->


                                    </div>


                                </div>

                            </div>
                            <div class="footer" >


                                <div class="row" >
                                    <div class="col-sm-4">
                                        <div class="inv-footer-left">
                                            Prepared By
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="inv-footer-center">
                                            <?php echo display('received_by') ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="inv-footer-right">
                                            <?php echo display('authorised_by') ?>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="watermark_chalan" style=" background-image: url('<?php echo base_url() ?>assets/images/icons/watermark.png') !important;">

                            <div class="panel-body" >


                                <div class="row">
                                    <div class="col-sm-8  invoice-address ">
                                        <h2 class="m-t-0">Chalan</h2>
                                        <div><?php echo display('invoice_no') ?>: {invoice_no}</div>
                                        <div class="m-b-15"><?php echo display('billing_date') ?>: {final_date}</div>

                                        <span class="label label-success-outline m-r-15"><?php echo display('billing_to') ?></span>

                                        <address class="customer_name_p">
                                            <strong class="c_name">{customer_name} </strong><br>
                                            <?php if ($customer_address) { ?>
                                                {customer_address}
                                            <?php } ?>
                                            <br>
                                            <abbr><b><?php echo display('mobile') ?>:</b></abbr>
                                            <?php if ($customer_mobile) { ?>
                                                {customer_mobile}
                                            <?php }if ($customer_email) {
                                                ?>
                                                <br>
                                                <abbr><b><?php echo display('email') ?>:</b></abbr>
                                                {customer_email}
                                            <?php } ?>
                                        </address>
                                    </div>
                                    <div class="col-sm-4  text-right company-content ">

                                        {company_info}
                                        <img style="height: 100px;" src="<?php
                                        if (isset($Web_settings[0]['invoice_logo'])) {
                                            echo html_escape($Web_settings[0]['invoice_logo']);
                                        }
                                        ?>" class="img-bottom-m" alt="">

                                        <br>
                                        <!--                                    <span class="label label-success-outline m-r-15 p-10" >--><?php //echo display('billing_from') ?><!--</span>-->
                                        <address class="">
                                            <strong class="company_name_p">{company_name}</strong><br>
                                            <address class="text-left" style="margin-left: 90px;margin-top: 1rem">
                                                {address}<br>
                                                <abbr>Service:</abbr> {mobile}
                                                <abbr>Order:</abbr>
                                                {mobile}<br>
                                                {email};{email}<br>
                                                {website}<br>
                                                {/company_info}
                                                <abbr>{tax_regno}</abbr>
                                            </address>
                                        </address>



                                    </div>



                                </div>

                                <div class="table-responsive table-bordered print_header_new "  >

                                    <table class="" style="width: 100%;" >
                                        <thead>
                                        <!--                                    <img class="watermark" src="--><?php
                                        //                                    if (isset($Web_settings[0]['invoice_logo'])) {
                                        //                                        echo html_escape($Web_settings[0]['invoice_logo']);
                                        //                                    }
                                        //                                    ?><!--"  alt="">-->
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                            <th class="text-center">SN</th>
                                            <th class="text-center">Unit</th>

                                            <th class="text-center"><?php echo display('quantity') ?></th>
                                            <!--                                            --><?php //if($is_discount > 0){ ?>
                                            <!--                                                --><?php //if ($discount_type == 1) { ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('discount_percentage') ?><!-- %</th>-->
                                            <!--                                                --><?php //} elseif ($discount_type == 2) { ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('discount') ?><!-- </th>-->
                                            <!--                                                --><?php //} elseif ($discount_type == 3) { ?>
                                            <!--                                                    <th class="text-right">--><?php //echo display('fixed_dis') ?><!-- </th>-->
                                            <!--                                                --><?php //} ?>
                                            <!--                                            --><?php //}else{ ?>
                                            <!--                                                <th class="text-right">--><?php //echo ''; ?><!-- </th>-->
                                            <!--                                            --><?php //}?>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        {invoice_all_data}
                                        <tr>
                                            <td class="text-center">{sl}</td>
                                            <td class="text-left"><div>{product_name} - ({product_model})</div></td>
                                            <td class="text-left">{sn}</td>
                                            <td class="text-center"><div>{unit}</div></td>

                                            <td align="center">{quantity}</td>

                                            <!--                                            --><?php //if ($discount_type == 1) { ?>
                                            <!--                                                <td align="right">{discount_per}</td>-->
                                            <!--                                            --><?php //} else { ?>
                                            <!--                                                <td align="right">--><?php //echo (($position == 0) ? "$currency {discount_per}" : "{discount_per} $currency") ?><!--</td>-->
                                            <!--                                            --><?php //} ?>
                                            <!--                                            <img class="watermark" src="--><?php
                                            //                                            if (isset($Web_settings[0]['invoice_logo'])) {
                                            //                                                echo html_escape($Web_settings[0]['invoice_logo']);
                                            //                                            }
                                            //                                            ?><!--" class="img-bottom-m" alt="">-->

                                        </tr>
                                        {/invoice_all_data}

                                        <!--                                        --><?php //if ($invoice_discount > 0) { ?>
                                        <!--                                            <tr >-->
                                        <!--                                                <td class="text-left" colspan="3"><b>Sale Discount:</b></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td></td>-->
                                        <!--                                                <td align="right" >--><?php //echo (($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency") ?><!--</td>-->
                                        <!--                                            </tr>-->
                                        <!--                                        --><?php //} ?>
                                        <tr >
                                            <td class="text-left" colspan="2"><b><?php echo display('grand_total') ?>:</b></td>

                                            <td></td>
                                            <td></td>
                                            <td align="center" ><b>{subTotal_quantity}</b></td>

                                        </tr>

                                        </tbody>

                                        <!--                                    <tfoot>-->
                                        <!--                                    <tr >-->
                                        <!--                                        <td class="text-left" colspan="5"><b>In Word:</b></td>-->
                                        <!--                                        <td align="right" ><b>--><?php //echo $am_inword ?><!--</b></td>-->
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
                                    <p style="margin-top: 60%"><strong>Customer satisfaction is our upmost priority. Looking forward to serving you again.</strong></p>
                                    <!--                                        <p><strong>{invoice_details}</strong></p>-->


                                </div>
                                </div>


                                <div class="footer" >


                                    <div class="row" >
                                        <div class="col-sm-4">
                                            <div class="inv-footer-left">
                                                Prepared By
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="inv-footer-center">
                                                <?php echo display('received_by') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="inv-footer-right">
                                                <?php echo display('authorised_by') ?>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        <div class="watermark_mr" style="border-style: double;background-image: url('<?php echo base_url() ?>assets/images/icons/watermark.png') !important;height: 50%;margin-top: 40%" >

                            <div class="panel-body" >



                                <div class="row print_header">


                                    <div class="col-xs-6 text-left">
                                        {company_info}
                                        <img style="height: 100px;" src="<?php
                                        if (isset($Web_settings[0]['invoice_logo'])) {
                                            echo html_escape($Web_settings[0]['invoice_logo']);
                                        }
                                        ?>" class="img-bottom-m" alt="">


                                    </div>



                                    <div class="col-xs-6 text-right " style="">

                                        <strong class="">{company_name}</strong><br>
                                        {address}<br>
                                        <abbr>{mobile},{email}</abbr>
                                        <abbr>{website}</abbr>
                                        {/company_info}



                                    </div>


                                </div>

                                <div class="row print_header">



                                    <div class="col-xs-6 text-left">
                                        <h2 class="m-t-0">PAYMENT RECEIPT</h2>

                                        <div style="margin-bottom: 5px"><b>Received From: </b>{customer_name} [{customer_address}]</div>

                                    </div>

                                    <div class="col-xs-6 text-right " style="">
                                        <div style="margin-bottom: 5px"><u><b>No &nbsp;&nbsp;&nbsp;&nbsp;:</b> {invoice_no}</u></div>
                                        <div style="margin-bottom: 5px"><u><b>Date &nbsp; :</b>{final_date}</u></div>

                                    </div>


                                </div>
                                <div class="row print_header">




                                    <div class="col-xs-8 text-left">


                                        <div style="margin-top:5px"><b>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>  <?php echo $am_inword ?>  TK Only</div>

                                    </div>

                                    <div class="col-xs-4 text-center " style="margin-bottom: 10px;">
                                        <div style="margin-top:10px;border-style: solid;padding: 5px;">
                                            <?php echo $currency?>&nbsp; {total}
                                        </div>


                                    </div>


                                </div>

                                <div class="row print_header">




                                    <div class="col-xs-12 text-left">


                                        <div style="margin-top:5px;margin-bottom:5px"><b>Payment For: </b><?php echo $mr_detail['data'][0]['remark']?></div>

                                    </div>


                                </div>


                                <div class="row ">




                                    <div class="col-xs-6 text-left ">


                                        <div style="margin-bottom: 5px;margin-top:5px"><b>Paid by: </b><ul style="list-style-type:none">
                                                <li><?php if( $pay_type==1){ echo '[✓]';} else echo '[]' ?> Cash in Hand</li>
                                                <li><?php if( $pay_type==2){ echo '[✓]';} else echo '[]' ?> Cash in Cheque</li>
                                                <li><?php if( $pay_type==4){ echo '[✓]';} else echo '[]' ?> Cash in Bank<</li>
                                                <li><?php if( $pay_type==3){ echo '[✓]';} else echo '[]' ?> Cash in Bkash</li>
                                                <li><?php if( $pay_type==5){ echo '[✓]';} else echo '[]' ?> Cash in Nagad<</li>



                                            </ul>
                                        </div>



                                    </div>

                                    <div class="col-xs-6 text-right" style="margin-bottom: 10px;">

                                        <table class="table table-responsive" style="margin-top:5px;border-style: solid;border-color: #333333">

                                            <tr style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                <th style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">Ac. Amount</th>
                                                <?php
                                                $total_ac=$balance+$total;

                                                ?>
                                                <td style="border-style: solid; border-color: #333333;background-color: rgba(242,240,245,0.3) !important;">
                                                    <?php echo $currency .'&nbsp'.number_format($total_ac,2)?></td>
                                            </tr>
                                            <tr style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                <th style="border-style: solid; border-color: #333333;background-color: rgba(242,240,245,0.3) !important;">This Payment</th>
                                                <td style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                    <?php echo $currency?>&nbsp;{total}</td>
                                            </tr>
                                            <tr style="border-style: solid; border-color: #333333;background-color: rgba(242,240,245,0.3) !important;">
                                                <?php

                                                $total=$mr_detail['total'][0]['total']


                                                ?>
                                                <th style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">Balance Due</th>
                                                <td style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                    <?php echo $currency .'&nbsp'.number_format($balance,2)?></td>
                                            </tr>




                                        </table>


                                    </div>




                                </div>




                                <div class="row print_header">
                                    <div class="col-sm-4">
                                        <div class="inv-footer-left">
                                            <?php echo display('received_by') ?>  <?php echo $mr_detail['user'][0]['first_name']?> <?php echo $mr_detail['user'][0]['last_name']?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"> <div class="mr-footer-center">
                                            Sign
                                        </div></div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 5px;height: 30px;background-color: red !important;">


                                </div>

                            </div>
                        </div>

                        </div>
                    </div>


                    <div class="panel-footer text-left">
                        <input type="hidden" name="" id="url" value="<?php echo base_url('Cinvoice');?>">
                        <a  class="btn btn-danger" href="<?php echo base_url('Cinvoice'); ?>"><?php echo display('cancel') ?></a>
                        <button  class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

