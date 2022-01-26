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
                    <div id="printableArea" style="height: 99vh">
                        <style type="text/css" scoped>
                            body {
                                overflow: hidden;
                            }

                            h1 {
                                font-size: 0.5in;
                            }

                            .company-div {
                                display: flex;
                                justify-content: space-around;
                            }

                            .company-info {
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                            }



                            .vtype {
                                font-size: 0.5cm;
                                font-weight: bold;
                            }


                            @media print {

                                td,
                                th {
                                    border: 1px solid black !important;
                                }

                                table {
                                    border-collapse: collapse;
                                }
                            }
                        </style>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="5">
                                                {company_info}
                                                <div class="company-div">
                                                    <div class="company-image">
                                                        <img src="<?= $currency_det[0]['logo'] ?>" style="width:3cm; height:auto">
                                                    </div>
                                                    <div class="company-info">
                                                        <h1>{company_name}</h1>
                                                        <span>{address}</span>
                                                    </div>
                                                </div>
                                                {/company_info}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td rowspan="2"></td>
                                            <td colspan="2" rowspan="2" class="text-right vtype-td" style="background-color: #999 !important; vertical-align: middle;">
                                                <span class="vtype"><?= ($v_type == "DV") ? 'Debit' : 'Credit' ?><br>Voucher</span>

                                            </td>
                                            <td class="text-right">
                                                <strong>Date:</strong>
                                            </td>
                                            <td>

                                                <?php
                                                echo date('d-M-Y');
                                                ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Voucher No. :</strong></td>
                                            <td><?= $v_no ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <strong>Name</strong> : <?= $pay_to; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-center"><strong>Date</strong></td>
                                            <td class="text-center" colspan="3"><strong>Particular</strong></td>
                                            <td class="text-center"><strong>Amount</strong> (TK.)</td>
                                        </tr>

                                        <tr>
                                            <td class="text-center" rowspan="<?= $num_rows ?>" style="vertical-align:middle;">
                                                <?= $v_date ?>
                                            </td>
                                        </tr>

                                        <?php if ($v_type == 'DV') {
                                            foreach ($v_details as $v) {
                                                if ($v['Debit'] > 0) { ?>

                                                    <tr>
                                                        <td class="text-center" colspan="3">
                                                            <?= $v['HeadName'] ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $v['Debit'] ?> TK
                                                        </td>
                                                    </tr>
                                        <?php }
                                            }
                                        } ?>

                                        <?php if ($v_type == 'CV') {
                                            foreach ($v_details as $v) {
                                                if ($v['Credit'] > 0) { ?>

                                                    <tr>
                                                        <td class="text-center" colspan="3">
                                                            <?= $v['HeadName'] ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $v['Credit'] ?> TK
                                                        </td>
                                                    </tr>
                                        <?php }
                                            }
                                        } ?>

                                        <tr>
                                            <td colspan="4" class="text-right">
                                                <strong>Total: </strong>
                                            </td>
                                            <td class="text-right">
                                                <?= $total_amnt ?> TK
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <strong>Amount (In Word): </strong>
                                                {inwords} Taka
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-center" style="vertical-align: bottom; padding-top: 2cm;">
                                                <span style="border-top: 1px solid black;">
                                                    Prepared by
                                                </span>
                                            </td>
                                            <td class="text-center" style="vertical-align: bottom; padding-top: 1.5cm;" colspan="3">
                                                <span style="border-top: 1px solid black;">
                                                    Received by
                                                </span>
                                            </td>
                                            <td class="text-center" style="vertical-align: bottom; padding-top: 2cm;">
                                                <span style="border-top: 1px solid black;">
                                                    Approved by
                                                </span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>






                            <!-- <div style="position:fixed; text-align:center; margin-top: 0.5cm; font-size: 12px; bottom:0 !important; width:99vw">
                                <td>Powered by <strong>Webcoders</strong></a></td>
                            </div> -->
                        </div>

                    </div>
                </div>
                <!--  -->
                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('accounts/' . $link . ''); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Cinvoice'); ?>"><?php echo display('cancel') ?></a>
                    <a class="btn btn-info" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></a>
                </div>
            </div>
        </div>


</div>


</section> <!-- /.content -->