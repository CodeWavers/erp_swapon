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
                                            <div class="invoice_name">

                                               <nobr>Stock Taking</nobr>

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

                                        <td align="left"  width="300px">


                                        </td>

                                        <td align="right"  width="300px">

                                            <div class=" text-right"  style="margin-top:0;">

                                                <address >

                                                    <abbr><nobr>STID : {stid}</nobr></abbr><br>
                                                    <abbr><nobr>Date : {date}</nobr></abbr><br>

                                                </address>



                                            </div>

                                        </td>




                                    </tr>
                                </table>
                            </div>


                            <div class="">

                                <table id="st_table" class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>SKU </th>
                                        <th>Product Name </th>
                                        <th class="text-right ">System Stock </th>
                                        <th class="text-right ">Physical Count</th>
                                        <th class="text-right ">Difference</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {product_list}
                                    <tr>
                                        <td>{sl}</td>
                                        <td>{sku}</td>
                                        <td>
                                            {product_name}
                                            <input type="hidden" name="product_id[]" value={product_id}>
                                        </td>
                                        <td align="right">{current_stock}</td>
                                        <td align="right">{physical_stock}</td>
                                        <td align="right">{difference}</td>


                                    </tr>
                                    {/product_list}
                                    </tbody>

                                </table>



                            </div>




                        </div>
                    </div>
                </div>

                <div class="panel-footer text-left">
                    <input type="hidden" name="" id="url" value="<?php echo base_url('Creport/manage_stock_taking'); ?>">
                    <a class="btn btn-danger" href="<?php echo base_url('Creport/manage_stock_taking'); ?>"><?php echo display('cancel') ?></a>
                    <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                </div>
            </div>
        </div>
</div>
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->