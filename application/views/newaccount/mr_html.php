<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<style>

    table tr td, table tr th{
        background-color: rgba(210,130,240, 0.3) !important;
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

                        <div class="watermark_mr" style="border-style: double;background-image: url('<?php echo base_url() ?>assets/images/icons/watermark.png') !important;height: 50%">

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

                                        <div style="margin-bottom: 5px"><b>Received From: </b><?php echo $mr_detail['data'][0]['customer_name']?> [ <?php echo $mr_detail['data'][0]['customer_address']?>]</div>

                                    </div>

                                    <div class="col-xs-6 text-right " style="">
                                        <div style="margin-bottom: 5px"><u><b>No &nbsp;&nbsp;&nbsp;&nbsp;:</b><?php echo $mr_detail['data'][0]['VNo']?></u></div>
                                        <div style="margin-bottom: 5px"><u><b>Date &nbsp; :</b><?php echo $mr_detail['data'][0]['date']?></u></div>

                                    </div>


                                </div>
                                <div class="row print_header">




                                    <div class="col-xs-8 text-left">


                                        <div style="margin-top:5px"><b>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $credit_inword?> TK Only</div>

                                    </div>

                                    <div class="col-xs-4 text-center " style="margin-bottom: 10px;">
                                        <div style="margin-top:10px;border-style: solid;padding: 5px;">
                                            <?php echo $currency .'&nbsp'. $mr_detail['data'][0]['Credit']?>
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
                                                <li><?php if( $pay_type==1){ echo '[✓]';} else echo '[]' ?> Cash &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php if( $pay_type==1){ echo '<u>Cash in Hand</u>';} else echo '________________' ?></li>
                                                <li><?php if( $pay_type==2){ echo '[✓]';} else echo '[]' ?> Cheque No&nbsp;:<?php if($pay_type ==2){ echo '<u>'.$cheque_no.'</u>';} else echo '________________' ?></li>
                                                <li><?php if( $pay_type == 3){ echo '[✓]';} else echo '[]' ?> Bkash No &nbsp;&nbsp; :<?php if($pay_type ==3  ){ echo '<u>'.$bkash_no.'</u>';} else echo '________________' ?></li>
                                                <li><?php if( $pay_type == 4){ echo '[✓]';} else echo '[]' ?> Nagad No &nbsp;&nbsp;:<?php if($pay_type ==4  ){ echo '<u>'.$nagad_no.'</u>';} else echo '________________' ?></li>


                                            </ul>
                                        </div>



                                    </div>

                                    <div class="col-xs-6 text-right" style="margin-bottom: 10px;">

                                        <table class="table table-responsive" style="margin-top:5px;border-style: solid;border-color: #333333">

                                            <tr style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                <th style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">Ac. Amount</th>
                                                <?php
                                                $total_ac=$mr_detail['total'][0]['total']+$mr_detail['data'][0]['Credit']

                                                ?>
                                                <td style="border-style: solid; border-color: #333333;background-color: rgba(242,240,245,0.3) !important;">
                                                    <?php echo $currency .'&nbsp'.number_format($total_ac,2)?></td>
                                            </tr>
                                            <tr style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                <th style="border-style: solid; border-color: #333333;background-color: rgba(242,240,245,0.3) !important;">This Payment</th>
                                                <td style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                    <?php echo $currency .'&nbsp'.number_format($mr_detail['data'][0]['Credit'],2)?></td>
                                            </tr>
                                            <tr style="border-style: solid; border-color: #333333;background-color: rgba(242,240,245,0.3) !important;">
                                                <?php
                                                $total=$mr_detail['total'][0]['total']

                                                ?>
                                                <th style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">Balance Due</th>
                                                <td style="border-style: solid;border-color: #333333; background-color: rgba(242,240,245,0.3) !important;">
                                                    <?php  echo $currency .'&nbsp'.number_format($total,2)  ?></td>
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

                    <div class="panel-footer text-left">
                        <input type="hidden" name="" id="url" value="<?php echo base_url('Accounts/money_reciept');?>">
                        <a  class="btn btn-danger" href="<?php echo base_url('Accounts/money_reciept'); ?>"><?php echo display('cancel') ?></a>
                        <button  class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

