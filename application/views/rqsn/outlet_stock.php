<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Outlet Stock </h1>
            <small>Outlet Stock</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Outlet Stock </a></li>
                <li class="active">Outlet Stock </li>
            </ol>
        </div>
    </section>

    <section class="content">
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
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>

                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">
                        <?php if ($outlet_list) { ?>


                            <div class="form-group">

                                <input type="hidden" name="outlet_id" class="form-control " id="outlet" value="<?php echo $outlet_list[0]['outlet_id']; ?>">
                            </div>

                        <?php } elseif ($cw) { ?>
                            <label class="" for="category">Outlet:</label>
                            <div class="form-group">

                                <select name="outlet_id" class="form-control" id="outlet">
                                    <?php
                                    foreach ($cw as $cw) {
                                    ?>
                                        <option value="<?php echo $cw['outlet_id']; ?>"><?php echo $cw['outlet_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } ?>


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
                        </div>
                        <div>

                            <div class="table-responsive" id="printableArea">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="checkListStockOutlet">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">SKU</th>
                                            <th class="text-center"><?php echo display('product_model') ?></th>

                                            <th class="text-center"><?php echo "Discounted Price" ?></th>

                                            <!-- <th class="text-center">Production Cost</th> -->

                                            <th class="text-center"><?php echo display('in_qnty') ?></th>
                                            <th class="text-center">Damaged Quantity</th>
                                            <th class="text-center">Return Given</th>
                                            <th class="text-center"><?php echo display('out_qnty') ?></th>

                                            <th class="text-center">Opening Stock </th>
                                            <th class="text-center">Closing Stock</th>
                                            <th class="text-center"><?php echo display('stock_sale') ?></th>
                                            <!-- <th class="text-center">Stock Purchase Price</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tfoot>
                                        <tr>

                                            <th colspan="8" class="text-right"><?php echo display('total') ?> :</th>
                                            <th id="stockqty"></th>
                                            <th></th>
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