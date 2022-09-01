<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('quotation') ?></h1>
            <small><?php echo display('manage_quotation') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('quotation') ?></a></li>
                <li class="active"><?php echo display('manage_quotation') ?></li>
            </ol>
        </div>
    </section>

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
        $currency = $currency_details[0]['currency'];
        $position = $currency_details[0]['currency_position'];
        ?>


        <!-- New category -->
        <div class="row">

            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('manage_quotation') ?> </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" id="results">
                            <table class="table table-striped table- datatable" cellspacing="0" width="100%" id="">

                                <thead>
                                <tr>
                                    <th class="text-center"><?php echo display('sl') ?></th>
                                    <th class="">Invoice ID</th>
                                    <th class="">Invoice No</th>
                                    <th class="">Date</th>
                                    <th class="">Outlet Name</th>
                                    <th class=""><?php echo display('customer_name') ?></th>
                                    <th class=""><?php echo display('customer_mobile') ?></th>
                                    <th class="">Delivery Type</th>
                                    <th class="">Sale Type</th>
                                    <th class="">Payment Status</th>
                                    <th class="">Due Amount</th>
                                    <th class="text-right">Total Amount</th>
                                    <th class="text-center"><?php echo display('status') ?></th>
                                    <th class="text-center"><?php echo display('action') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($quotation_list) {
                                    $sl = 0;
                                    $CI = &get_instance();
                                    $CI->load->model('Warehouse');
                                    $cw_name = $CI->Warehouse->central_warehouse()[0]['central_warehouse'];

                                    foreach ($quotation_list as $quotation) {
                                        $sl++;




                                       $out = (($quotation->outlet_id == 'HK7TGDT69VFMXB7') ? $cw_name : $quotation->outlet_name);


                                        $agg_id = $quotation->agg_id;



                                        if (!empty($agg_id)){
                                            $agg_name=$CI->db->select('aggre_name')->from('aggre_list')->where('id',$agg_id)->get()->row()->aggre_name;

                                        }

                                        if ( $quotation->agg_id == 3){
                                            $customer_name=$agg_name;
                                        }else{
                                            $customer_name=$quotation->customer_name;
                                        }
                                        if ( $quotation->due_amount > 0){
                                            $payment_status='<span class="label label-danger ">Due</span>';
                                        } else{
                                            $payment_status='<span class="label label-success ">Paid</span>';
                                        }
                                        // $outlet = ($this->Warehouse->branch_search_item($quotation->outlet_id)) ? $this->Warehouse->branch_search_item($quotation->outlet_id)[0]['outlet_name'] : '';
                                        if ( $quotation->sale_type == 1){
                                            $st='Whole Sale';
                                        }
                                        if ($quotation->sale_type== 2){
                                            $st='Retail';
                                        }
                                        if ($quotation->sale_type == 3){
                                            $st='Aggregators Sale';
                                        }

                                        if ($quotation->sale_type  == null){

                                            $st='';
                                        }
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>

                                            <td>
                                                <?php echo html_escape($quotation->invoice_id); ?>

<!--                                                <a href="--><?//=base_url().'/Cinvoice/invoice_inserted_data/'.$quotation->invoice_id?><!--" class="" >--><?//=$quotation->invoice_id?><!--</a>-->

                                            </td>
                                            <td>

                                                <?php echo html_escape($quotation->invoice); ?>

                                            </td>
                                            <td>
                                                <?php

                                                echo date('m-d-Y', strtotime(html_escape($quotation->date)));

                                                ?>
                                            </td>
                                            <td>

                                                <?php echo html_escape($out); ?>

                                            </td>
                                            <td>

                                                <?php echo $customer_name; ?>

                                            </td>
                                            <td>

                                                <?php echo html_escape($quotation->customer_mobile); ?>

                                            </td>
                                            <td>

                                                <?php echo  ($quotation->delivery_type == '1') ? 'Pick Up' : (($quotation->delivery_type == '2') ? 'Courier' : 'Nothing Selected'); ?>

                                            </td>
                                            <td>

                                                <?php echo html_escape($st); ?>

                                            </td>

                                            <td>

                                                <?php echo $payment_status ?>

                                            </td>

                                            <td class="text-right">
                                                <?php echo html_escape((($position == 0) ? "$currency $quotation->due_amount" : "$quotation->due_amount $currency")); ?>
                                            </td>

                                            <td class="text-right">
                                                <?php echo html_escape((($position == 0) ? "$currency $quotation->total_amount" : "$quotation->total_amount $currency")); ?>
                                            </td>
                                            <td class="text-center"><?php
                                                if ($quotation->is_pre == 2) { ?>
                                                    <?php if ($this->permission1->method('add_to_invoice', 'create')->access()) { ?>
                                                        <a href="<?php echo base_url() . 'Cquotation/invoice_update_form/' . $quotation->invoice_id; ?>" class="btn btn-success btn-sm" title="" data-original-title="<?php echo display('add_to_invoice') ?> "><?php echo display('add_to_invoice') ?></a>
                                                    <?php } ?>
                                                <?php }
                                                if ($quotation->is_pre == 1) {
                                                    echo display('added_to_invoice');
                                                }

                                                ?>

                                            </td>

                                            <td>

<!--                                                <a href="--><?php //echo base_url() . 'Cquotation/quotation_details_data/' . $quotation->invoice_id; ?><!--" class="btn btn-info btn-sm" title="--><?php //echo display('details') ?><!--" data-original-title="--><?php //echo display('details') ?><!-- "><i class="fa fa-eye" aria-hidden="true"></i></a>-->
<!--                                                --><?php
//                                                if ($quotation->status == 1) { ?>
<!--                                                    --><?php //if ($this->permission1->method('manage_quotation', 'update')->access()) { ?>
<!--                                                        <a href="--><?php //echo base_url() . 'Cinvoice/invoice_update_form/' . $quotation->invoice_id; ?><!--" class="btn btn-primary btn-sm" title="--><?php //echo display('update') ?><!--" data-original-title="--><?php //echo display('update') ?><!-- "><i class="fa fa-edit" aria-hidden="true"></i></a>-->
<!--                                                    --><?php //} ?>
<!--                                                --><?php //} ?>

                                                <?php if ($this->permission1->method('manage_quotation', 'delete')->access()) { ?>
                                                    <a href="<?php echo base_url() . 'Cquotation/delete_quotation/' . $quotation->invoice_id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Want to Delete ??')" title="<?php echo display('delete') ?>" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <?php } ?>
                                                <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/' . $quotation->invoice_id; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="' . display('invoice') . '"><i class="fa fa-window-restore" aria-hidden="true"></i></a>

<!--                                                <a href="--><?php //echo base_url('Cquotation/quotation_download/' . $quotation->invoice_id); ?><!--" class="btn btn-primary btn-sm" title="--><?php //echo display('download') ?><!--" data-original-title="--><?php //echo display('download') ?><!-- "><i class="fa fa-download" aria-hidden="true"></i></a>-->
                                            </td>
                                        </tr>
                                        <?php

                                    }
                                }
                                ?>
                                </tbody>
                                <?php if (empty($quotation_list)) { ?>
                                    <tfoot>
                                    <tr>
                                        <th colspan="10" class="text-danger text-center"><?php echo display('no_result_found'); ?></th>
                                    </tr>
                                    </tfoot>
                                <?php } ?>
                            </table>
                            <!-- <?php echo $links; ?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" id="quotationkeyupsearch" value="<?php echo base_url('Cquotation/quotaionnkeyup_search'); ?>">
</div>