<!-- Product Purchase js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product_purchase.js.php"></script>
<!-- Supplier Js -->
<!-- <script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php"></script> -->

<script src="<?php echo base_url() ?>my-assets/js/admin_js/purchase.js.php" type="text/javascript"></script>
<style type="text/css">
    .form-control {
        padding: 6px 5px;
    }
</style>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_purchase') ?></h1>
            <small><?php echo display('add_new_purchase') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('purchase') ?></a></li>
                <li class="active"><?php echo display('add_purchase') ?></li>
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
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('add_purchase') ?></h4>
                        </div>
                    </div>

                    <div class="panel-body">
                        <?php echo form_open_multipart('Crqsn/admin_approve_rqsn_cw/' . $info[0]["rqsn_id"], array('class' => 'form-vertical', 'id' => 'insert_rqsn_approve', 'name' => 'insert_rqsn_approve')) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="po_No" class="col-sm-4 col-form-label">Purchase Order No.
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" value=<?= $info[0]['purchase_order_no'] ?> name="po_No" id="po_No" readonly />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="cw" class="col-sm-4 col-form-label">Central Warehouse
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="cw" id="cw" value="<?= $info[0]['central_warehouse'] ?>" readonly />
                                        <!-- <input type="hidden" name="from_id" value="<?= $cw['warehouse_id'] ?>"> -->
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <!-- <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('supplier') ?>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value=<?= $info[0]['supplier_name'] ?> readonly />
                                        <input type="hidden" name="supplier_id" value=<?= $info[0]['supplier_id'] ?> />
                                    </div>

                                </div>
                            </div> -->


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">PO Date

                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required tabindex="2" class="form-control" name="purchase_date" value="<?php echo $info[0]['date']; ?>" id="date" readonly />
                                    </div>
                                </div>
                            </div>

                        </div>




                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th class="text-center" width="9%"><?php echo display('item_information') ?></th>
                                        <!-- <th class="text-center">Stock</th> -->
                                        <!-- <th class="text-center" width="8%">Warehouse</th> -->

                                        <!-- <th class="text-center">Warrenty Date </th> -->

                                        <!-- <th class="text-center">Expiry Date </th> -->
                                        <th class="text-center">Proposed Quantity </th>

                                        <th class="text-center">Approve Quantity</th>

                                        <!-- <th class="text-center"><?php echo display('total') ?></th> -->
                                    </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    {info}
                                    <tr>
                                        <td>{sl}</td>
                                        <td>{product_name} ({product_model}) ({color_name}) ({size_name})
                                            <input type="hidden" name="product_id[]" value={product_id}>
                                            <input type="hidden" name="rqsn_detail_id[]" value={rqsn_detail_id}>
                                        </td>
                                        <!-- <td>{stock}</td>
                                        <td>{warrenty_date}
                                            <input type="hidden" name="warrenty_date[]" value={warrenty_date}>
                                        </td>
                                        <td>{expiry_date}
                                            <input type="hidden" name="expired_date[]" value={expiry_date}>
                                        </td> -->
                                        <td><input class="form-control text-right" type="text" name="proposed_quantity[]" value="{quantity}" id="p_qty_{sl}" readonly></td>
                                        <td><input class="form-control text-right" type="text" onkeyup="check_qty({sl});" onchange="check_qty({sl});" name="product_quantity[]" id="cartoon_{sl}" value="{quantity}"></td>
                                    </tr>
                                    {/info}
                                </tbody>

                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-success btn-large" name="add-purchase" value="Approve" />
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->