<!-- Stock List Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('stock_report') ?></h1>
            <small><?= $heading_text ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('stock') ?></a></li>
                <li class="active"><?= $heading_text ?></li>
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



        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title text-right">

                        </div>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" name="" id="pr_status" value="<?= $pr_status ?>">

                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="cat_list" class="col-form-label">Product Type : </label>
                                <select name="product_status" id="product_status" class="form-control"  >
<!--                                    <option value="">Select One</option>-->
                                    <?php if ($this->permission1->method('finished_goods', 'create')->access() ) { ?>
                                    <option value="1">Finished Goods</option>
                                    <?php } ?>
                                    <?php if ($this->permission1->method('raw_materials', 'create')->access() ) { ?>

                                    <option value="2">Raw Materials</option>
                                    <?php } ?>
                                    <?php if ($this->permission1->method('tools', 'create')->access() ) { ?>

                                    <option value="3">Tools</option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="product_sku" class="col-form-label">SKU: </label>
                                <select name="product_sku" id="product_sku" class="form-control product_sku"   multiple>
                                    <option value="">Select SKU</option>
                                    {sku_list}
                                    <option value="{sku}">{sku}</option>
                                    {/sku_list}
                                </select>

                            </div>

                        </div>

                        <div>

                            <div class="table-responsive" id="printableArea">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="checkListStockList">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">SKU</th>
                                            <th class="text-center"><?php echo display('product_model') ?></th>
                                            <th class="text-center"><?php echo display('sell_price') ?></th>
                                            <th class="text-center"><?php echo display('purchase_price') ?></th>
                                            <th class="text-center"><?php echo display('in_qnty') ?></th>
                                            <th class="text-center">Damaged Quantity</th>
                                            <th class="text-center"><?php echo display('out_qnty') ?></th>

                                            <th class="text-center">Central Stock</th>

                                            <th class="text-center"><?php echo display('stock_sale') ?></th>
                                            <th class="text-center"><?php echo display('stock_purchase_price') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-right"><?php echo display('total') ?> :</th>
                                            <th id="stockqty"></th>
                                            <th></th>
                                            <th></th>
                                        </tr>

                                    </tfoot>

                                </table>
                            </div>
                        </div>
                        <input type="hidden" id="currency" value="{currency}" name="">
                        <input type="hidden" id="total_stock" value="<?php echo $totalnumber; ?>" name="">
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>