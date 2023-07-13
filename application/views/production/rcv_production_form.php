<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/production.js.php" type="text/javascript"></script>
<style type="text/css">
    .form-control {
        padding: 6px 5px;
    }
</style>
<!-- Customer type change by javascript end -->

<!-- Add New Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Receive Production</h1>
            <small>Receive Production </small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Receive Production</a></li>
                <li class="active">Receive Production </li>
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
        ?>


        <!--Add Invoice -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Receive Production </h4>

                        </div>
                    </div>



                    <div class="rqsn_panel">
                        <?php if (isset($isedit)) { ?>
                        <?php echo form_open_multipart('Cproduction/production_update', array('class' => 'form-vertical', 'id' => 'insert_rqsn'));
                        } else {
                        ?>
                        <?php echo form_open_multipart('Cproduction/rcv_goods', array('class' => 'form-vertical', 'id' => 'insert_rqsn'));
                        } ?>
                        <div class="row">
                            <input type="hidden" name="pro_id" value="<?php echo (isset($isedit) ? $pro_id : ''); ?>">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Base Number:
                                    </label>
                                    <div class="col-sm-8">

                                        <input type="text" required tabindex="2" class="form-control " name="base_number" placeholder="Base Number" value="" id=""  />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Date:
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="date" value="<?php echo (isset($isedit) ? $base_date : $date); ?>" id="date" />
                                    </div>
                                </div>
                            </div>


                        </div>


                        <br>
                        <div class="table-responsive center">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL</th>
                                        <th class="text-center " width="25%"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center">SKU</th>
                                        <th class="text-center"><?php echo display('unit') ?></th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                        <th class="text-center">Receive QTY</th>
                                        <th class="text-center">Production Cost</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>



                                <tbody>

                                <?php
                                $sl=1;
                                foreach ($product_list as $pro){


                                    if ($pro['rc_qty'] > 0) {

                                    ?>

                                <tr>
                                    <td><?= $sl?></td>
                                    <td><?= $pro['product_name']?></td>
                                    <td><?= $pro['sku']?></td>
                                    <td><?= $pro['unit']?></td>
                                    <td><?= $pro['stock']?></td>
                                    <td><?= $pro['rc_qty']?></td>
                                    <td>
                                        <input type="text" name="rcv_qty[]" required="" onkeyup="quantity_calculate_p(<?=$sl?>);" onchange="quantity_calculate_p(<?=$sl?>);" class="total_qntt form-control text-right" id="total_qntt_<?= $sl?>" placeholder="0.00" value="<?= $pro['rc_qty']?>" tabindex="8" /></td>
                                    <input type="hidden" name="product_quantity[]" required="" onkeyup="quantity_calculate_p(<?=$sl?>);" onchange="quantity_calculate_p(<?=$sl?>);" class="quantity form-control text-right" id="quantity_<?= $sl?>" placeholder="0.00" value="<?= $pro['rc_qty']?>" tabindex="8" /></td>
                                    <input type="hidden" name="product_id[]" required="" onkeyup="quantity_calculate_p(<?=$sl?>);" onchange="quantity_calculate_p(<?=$sl?>);" class="product_id form-control text-right" id="product_id_<?= $sl?>" placeholder="0.00" value="<?= $pro['product_id']?>" tabindex="8" /></td>

                                    <td>
                                        <input type="text" name="production_cost[]" required="" onkeyup="quantity_calculate_p(<?=$sl?>);" onchange="quantity_calculate_p(<?=$sl?>);" class="rate form-control text-right" id="rate_<?= $sl?>" placeholder="0.00" value="<?= $pro['production_cost']?>" tabindex="8" /></td>
                                    <td> <input type="text" name="qty_price[]" required="" onkeyup="quantity_calculate_p(<?=$sl?>);" onchange="quantity_calculate_p(<?=$sl?>);" class="qty_price form-control text-right" id="qty_price_<?= $sl?>" placeholder="0.00" value="<?= $pro['row_total']?>" tabindex="8" /></td>

                                    <td> <button class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-remove'></i></button></td>

<?php $sl++ ?>
                                </tr>
                               <?php } }?>

                                </tbody>
                                <tfoot>

                                <tfoot>

                                <tr>
                                    <td colspan="7" rowspan="3">
                                        <center><label  for="details" class="  col-form-label text-center">Remark...</label></center>
                                        <textarea name="inva_details" id="details" class="form-control" placeholder="Remark..." ></textarea>
                                    </td>
                                    <td colspan="1" class="text-right">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td>
                                        <input class="form-control text-right" type="text" name="total" id="grandTotal" value="{grand_total}" placeholder="0.00" readonly>
                                    </td>
                                </tr>





                                </tfoot>




                                </tfoot>
                            </table>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="insert_rqsn" class="btn btn-success" name="" value="<?php echo (isset($isedit) ? "Update" : display('submit')) ?>" tabindex="17" />
                            </div>
                        </div>


                        <?php echo form_close() ?>
                    </div>

                </div>
            </div>



        </div>
    </section>
</div>
<!-- Invoice Report End -->

<script type="text/javascript">




</script>




</script>