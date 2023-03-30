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
                        <?php echo form_open_multipart('Creport/exportintocsv', array('class' => 'form-vertical', 'id' => 'insert_category')) ?>
                        <!-- <form method="post" action="<?php  echo base_url(); ?>Creport/exportintocsv"> -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label class="" for="from_date"><?php echo display('start_date') ?></label>
                                <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label class="" for="to_date"><?php echo display('end_date') ?></label>
                                <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="" autocomplete="off">
                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="product_sku" class="col-form-label">Outlet: </label>
                                <select name="outlet_id" class="form-control" id="outlet_id"  tabindex="3">
                                <option selected value="">Select</option>
                                    <?php foreach($cw_list as $cw){?>
                                        <option value="<?php echo html_escape($cw['warehouse_id'])?>"><?php echo html_escape($cw['central_warehouse']) ;?></option>
                                    <?php }?>
                                    <?php foreach($outlet_list as $outlet){?>
                                        <option value="<?php echo html_escape($outlet['outlet_id'])?>"><?php echo html_escape($outlet['outlet_name']) ;?></option>
                                    <?php }?>

                                    <option value="All">Consolidated</option>


                                </select>

                            </div>

                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="cat_list" class="col-form-label">Product Type : </label>
                                <select name="product_status" id="product_status" class="form-control">
                                        <option value="">Select One</option>
                                    <?php if ($this->permission1->method('finished_goods', 'create')->access()) { ?>
                                        <option value="1">Finished Goods</option>
                                    <?php } ?>
                                    <?php if ($this->permission1->method('raw_materials', 'create')->access()) { ?>

                                        <option value="2">Raw Materials</option>
                                    <?php } ?>
                                    <?php if ($this->permission1->method('tools', 'create')->access()) { ?>

                                        <option value="3">Tools</option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="product_sku" class="col-form-label">SKU: </label>
                                <select name="product_sku" id="product_sku" class="form-control product_sku" multiple>
                                    <option value="">Select SKU</option>
                                    {sku_list}
                                    <option value="{sku}">{sku}</option>
                                    {/sku_list}
                                </select>

                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="value" class="col-form-label">Quantity </label>
                                <select name="value" id="value" class="form-control value">
                                    <option value="2">Select Value</option>

                                    <option value="0">Zero</option>
                                    <option value="2">All</option>

                                    <option value="1">Positive</option>
                                    <option value="3">All Transaction Items</option>
                                    <option value="4">Positive Transaction Items</option>
                                    <option value="5">Zero Transaction Items</option>
                                </select>

                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <label for="cat_list" class="col-form-label">Category : </label>
                                <div class="form-group">
                                    <select id="cat_list" class="form-control" name="cat_list">
                                        <option value="">Select One</option>
                                        {cat_list}
                                        <option value="{id}">{name}</option>
                                        {/cat_list}
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                              <div class="col-md-2" style="margin-bottom: 10px;">
                                
                                <button class="btn btn-info" id="submit-buttons" type="submit"​​​​​>Export</button>
                               
                               </div>
                               <!-- <div class="col-md-3" style="margin-bottom: 10px;"> 
                                  <input name="range" type="number" id="typeNumber" class="form-control" />
                               </div> -->
                            </div>
                            <?php echo form_close() ?>
                            
                            

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
                                            <th class="text-center">Production Cost</th>
                                            <th class="text-center"><?php echo display('in_qnty') ?></th>
                                            <th class="text-center">Damaged Quantity</th>
                                            <th class="text-center">Return Given</th>
                                            <th class="text-center"><?php echo display('out_qnty') ?></th>
                                            <th class="text-center">Opening Stock</th>
                                            <th class="text-center">Closing Stock</th>


                                            <th class="text-center"><?php echo display('stock_sale') ?></th>
                                            <th class="text-center">Stock Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="12" class="text-right"><?php echo display('total') ?> :</th>
                                            <th id="stockqty"></th>
                                            <th></th>
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