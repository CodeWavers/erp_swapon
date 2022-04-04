<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');
$currency = $currency_details[0]['currency'];
$position = $currency_details[0]['currency_position'];
?>
<link href="<?php echo base_url('assets/custom/quotation.css') ?>" rel="stylesheet" type="text/css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('quotation') ?></h1>
            <small><?php echo display('quotation_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('quotation') ?></a></li>
                <li class="active"><?php echo display('quotation_details') ?></li>
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
                    <div id="printableArea">
                        <style type="text/css" scoped>
                            @media print {

                                @page {
                                    margin-top: 1.5in;
                                    margin-bottom: 0.5in;
                                }

                                .logo-content,
                                #logo-white-space {
                                    display: none;
                                }
                            }
                        </style>
                        <div class="panel-body">
                            <div class="row marginleft5">
                                <div class="fl-left">
                                    <div class="logo-content">
                                        <img style="width: 150px; height:auto;" src="<?php
                                        if (isset($Web_settings[0]['invoice_logo'])) {
                                            echo $Web_settings[0]['invoice_logo'];
                                        }
                                        ?>" class="" alt="">
                                        {company_info}
                                        <address>
                                            <strong class="c_name">{company_name}</strong><br>
                                            {address}<br>
                                            <abbr><b><?php echo display('mobile') ?>:</b></abbr> {mobile}<br>
                                            <abbr><b><?php echo display('email') ?>:</b></abbr>
                                            {email}<br>
                                            <abbr><b><?php echo display('website') ?>:</b></abbr>
                                            {website}<br>
                                            {/company_info}
                                    </div>
                                    <div class="com-content" id="logo-white-space">

                                    </div>
                                    <div class="com-content">
                                        <h2><?php echo display('quotation'); ?></h2>
                                        <address>
                                            <strong class="c_name"><?php echo $customer_info[0]['customer_name']; ?> </strong><br>
                                            <?php echo $customer_info[0]['customer_address']; ?>
                                            <br>
                                            <?php if ($customer_info[0]['customer_mobile']) { ?>
                                                <abbr><b><?php echo display('mobile') ?>:</b></abbr>
                                                <?php
                                                echo $customer_info[0]['customer_mobile'];
                                            }
                                            ?>
                                            <br>
                                            <?php if ($customer_info[0]['customer_email']) { ?>
                                                <abbr><b><?php echo display('email') ?>:</b></abbr>
                                                <?php echo $customer_info[0]['customer_email']; ?>
                                            <?php } ?><br>

                                            <abbr>
                                                <b><?php echo display('quotation_date'); ?> : </b> <?php echo $quot_main[0]['quotdate'] ?><br>
                                                <b><?php echo "Delivery Date"; ?> : </b> <?php echo $quot_main[0]['expire_date'] ?><br>
                                                <b><?php echo display('quotation_no'); ?> : </b> <?php echo $quot_main[0]['quot_no'] ?>
                                            </abbr>

                                        </address>
                                    </div>
                                </div>
                            </div>


                            <?php
                            $amount = 0;
                            if (!empty($quot_product[0]['product_name'])) {
                                ?>
                                <div class="table-responsive m-b-20">
                                    <table class="table table-striped">

                                        <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th class="text-left"><?php echo display('item') ?></th>
                                            <th class="text-center"><?php echo display('qty') ?></th>
                                            <th class="text-right"><?php echo display('price') ?></th>
                                            <?php if ($discount_type == 1) { ?>
                                                <th class="text-right"><?php echo display('discount_percentage') ?> %</th>
                                            <?php } elseif ($discount_type == 2) { ?>
                                                <th class="text-right"><?php echo display('discount') ?> </th>
                                            <?php } elseif ($discount_type == 3) { ?>
                                                <th class="text-right"><?php echo display('fixed_dis') ?> </th>
                                            <?php } ?>
                                            <th class="text-right"><?php echo display('total') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sl = 1;
                                        $amount = 0;
                                        foreach ($quot_product as $item) {

                                            ?>
                                            <tr>
                                                <td><?php echo $sl ?></td>
                                                <td class="text-left"><?php echo $item['product_name'] . ' (' . $item['product_model'] . ')' . ' (' . $item['color_name'] . ')' . ' (' . $item['size_name'] . ')'; ?></td>
                                                <td class="text-center"><?php echo $item['used_qty']; ?></td>
                                                <td class="text-right">
                                                    <?php
                                                    $rate = $item['rate'];
                                                    echo (($position == 0) ? "$currency $rate" : "$rate $currency");
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    $itemdiscountper = $item['discount_per'];
                                                    echo (!empty($itemdiscountper) ? $itemdiscountper : '');
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    $amount += $item['total_price'];
                                                    $rate_total = $item['total_price'];
                                                    echo (($position == 0) ? "$currency $rate_total" : "$rate_total $currency");
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $sl++;
                                        }
                                        ?>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right"><b><?php echo display('sub_total'); ?></b></td>
                                            <td class="text-right"><b>
                                                    <?php $amount = number_format($amount, 2);
                                                    echo (($position == 0) ? "$currency $amount" : "$amount $currency");
                                                    ?>
                                                </b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right"><b>Discount</b></td>
                                            <td class="text-right"><b>
                                                    <?php
                                                    $ttldiscountamount = $quot_main[0]['item_total_dicount'];
                                                    echo (($position == 0) ? "$currency $ttldiscountamount" : "$ttldiscountamount $currency");
                                                    ?>
                                                </b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right"><b>Grand Total</b></td>
                                            <td class="text-right"><b>
                                                    <?php
                                                    $ttlamount = number_format($quot_main[0]['item_total_amount'], 2);
                                                    echo (($position == 0) ? "$currency $ttlamount" : "$ttlamount $currency");
                                                    ?>
                                                </b>
                                                <input type="hidden" name="" id="quotation_id" value="<?php echo $quot_main[0]['quotation_id'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right"><b>Advance Paid</b></td>
                                            <td class="text-right"><b>
                                                    <?php
                                                    $adv_paid = number_format($quot_main[0]['advance_paid'], 2);
                                                    echo (($position == 0) ? "$currency $adv_paid" : "$adv_paid $currency");
                                                    ?>
                                                </b>
                                                <input type="hidden" name="" id="quotation_id" value="<?php echo $quot_main[0]['quotation_id'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right"><b>Due</b></td>
                                            <td class="text-right"><b>
                                                    <?php
                                                    $due = number_format($quot_main[0]['due_amount'], 2);
                                                    echo (($position == 0) ? "$currency $due" : "$due $currency");
                                                    ?>
                                                </b>
                                                <input type="hidden" name="" id="quotation_id" value="<?php echo $quot_main[0]['quotation_id'] ?>">
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="row">

                        <div class="panel-footer text-left">
                            <a class="btn btn-danger" href="<?php echo base_url('Cquotation/manage_quotation'); ?>"><?php echo display('cancel') ?></a>
                            <button class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>

                        </div>
                    </div>


                </div>
            </div>
    </section> <!-- /.content -->

</div> <!-- /.content-wrapper -->