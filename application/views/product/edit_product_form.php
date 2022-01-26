<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product.js" type="text/javascript"></script>
<!-- Edit Product Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('product_edit') ?></h1>
            <small><?php echo display('edit_your_product') ?></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('product') ?></a></li>
                <li class="active"><?php echo display('product_edit') ?></li>
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
        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('product_edit') ?> </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cproduct/product_update', array('class' => 'form-vertical', 'id' => 'product_update', 'name' => 'product_update')) ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="barcode_or_qrcode" class="col-sm-2 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="product_id_two" type="text" value="{product_id}" id="product_id" placeholder="<?php echo display('barcode_or_qrcode') ?>" tabindex="1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="product_status" class="col-sm-2 col-form-label"> Product Status <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="product_status" id="product_status" class="form-control" required onchange="pr_status_changed(this.value)">
                                            <?php switch ($finished_raw) {
                                                case 1:
                                                    echo '<option value="1" selected>Finished Goods</option>
                                                    <option value="2">Raw Materials</option>
                                                    <option value="3">Tools</option>';
                                                    break;

                                                case 2:
                                                    echo '<option value="1">Finished Goods</option>
                                                        <option value="2" selected>Raw Materials</option>
                                                        <option value="3">Tools</option>';
                                                    break;

                                                case 3:
                                                    echo '<option value="1">Finished Goods</option>
                                                            <option value="2">Raw Materials</option>
                                                            <option value="3" selected>Tools</option>';
                                                    break;

                                                default:
                                                    echo '<option value="">Select One</option>
                                                            <option value="1">Finished Goods</option>
                                                            <option value="2">Raw Materials</option>
                                                            <option value="3">Tools</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" value="{product_name}">
                                        <input type="hidden" name="product_id" value="{product_id}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="pr_code_div" style="display: <?php echo $finished_raw == 1 ? 'block' : 'none' ?>">
                                <div class="form-group row">
                                    <label for="product_code" class="col-sm-4 col-form-label">Product Code </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control" id="product_code" name="product_code" placeholder="Enter a unique product code" value="{product_code}" onfocusout="validate_pr_code()" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="mat_code_div" style="display: <?php echo $finished_raw == 2 ? 'block' : 'none' ?>">
                                <div class="form-group row">
                                    <label for="material_code" class="col-sm-4 col-form-label">Material Code <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control " id="material_code" name="material_code" placeholder="Material code" value="{product_code}" required />
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label">Brand Name</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category_id" name="brand_id" tabindex="3">
                                            {brand_list}
                                            <option value="{brand_id}">{brand_name}</option>
                                            {/brand_list}
                                            <?php
                                            if ($brand_selected) {
                                            ?>
                                                {brand_selected}
                                                <option selected value="{brand_id}">{brand_name} </option>
                                                {/brand_selected}
                                                <?php
                                            } else {
                                                ?>
                                                <option selected value="0">Brand not selected</option>
                                                <?php
                                            }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div> </div> -->




                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="color" class="col-sm-4 col-form-label">Color </label>
                                    <div class="col-sm-8">
                                        <select name="color" class="form-control" tabindex="8">
                                            <option value="">Select One</option>
                                            <?php foreach ($color_list as $cl) {
                                                if ($cl['color_id'] == $color) { ?>
                                                    <option value="<?= $cl['color_id'] ?>" selected><?= $cl['color_name'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $cl['color_id'] ?>"><?= $cl['color_name'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_size" class="col-sm-4 col-form-label">Size </label>
                                    <div class="col-sm-8">
                                        <select name="product_size" class="form-control" tabindex="8">
                                            <option value="">Select One</option>

                                            <?php foreach ($size_list as $sz) {
                                                if ($sz['size_id'] == $size) { ?>
                                                    <option value="<?= $sz['size_id'] ?>" selected><?= $sz['size_name'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $sz['size_id'] ?>"><?= $sz['size_name'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category_id" name="category_id" tabindex="3">
                                            {category_list}
                                            <option value="{category_id}">{category_name} </option>
                                            {/category_list}
                                            <?php
                                            if ($category_selected) {
                                            ?>
                                                {category_selected}
                                                <option selected value="{category_id}">{category_name} </option>
                                                {/category_selected}
                                            <?php
                                            } else {
                                            ?>
                                                <option selected value="0"><?php echo display('category_not_selected') ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control" name="model" placeholder="<?php echo display('model') ?>" value="{product_model}" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label">Product Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category_id" name="ptype_id" tabindex="3">
                                            {ptype_list}
                                            <option value="{ptype_id}">{ptype_name}</option>
                                            {/ptype_list}
                                            <?php
                                            if ($ptype_selected) {
                                            ?>
                                                {ptype_selected}
                                                <option selected value="{ptype_id}">{ptype_name}</option>
                                                {/ptype_selected}
                                            <?php
                                            } else {
                                            ?>
                                                <option selected value="0">Product type not selected</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-4 col-form-label">Base Unit</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="unit" name="unit" tabindex="-1" aria-hidden="true">
                                            <option value="">Select One</option>
                                            <?php

                                            foreach ($unit_list as $single) {
                                                if ($single['unit_name'] == $unit) {
                                            ?>
                                                    <option selected value="<?php echo $single['unit_name']; ?>">
                                                        <?php echo $single['unit_name']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $single['unit_name']; ?>">
                                                        <?php echo $single['unit_name']; ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="transaction_unit" class="col-sm-4 col-form-label">Convertion Unit</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="transaction_unit" name="transaction_unit" tabindex="-1" aria-hidden="true">
                                            <option value="">Select One</option>
                                            <?php

                                            foreach ($unit_list as $single) {
                                                if ($single['unit_name'] == $trxn_unit) {
                                            ?>
                                                    <option selected value="<?php echo $single['unit_name']; ?>">
                                                        <?php echo $single['unit_name']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $single['unit_name']; ?>">
                                                        <?php echo $single['unit_name']; ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="number" name="mult" placeholder="Convertion Value" value='<?= $multiplier ?>'>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-sm-6" id="sale_price_div" style="display: <?php echo $finished_raw == 1 ? 'block' : 'none' ?>">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-right" name="sell_price" type="text" required="" placeholder="0.00" tabindex="5" min="0" value="{price}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" class="form-control" tabindex="4">

                                        <input type="hidden" value="{image}" name="old_image">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                    <img class="img img-responsive text-center" src="{image}" height="80" width="80">
                                </div>
                            </div>
                        </div>
                        <?php
                        $i = 0;
                        foreach ($taxfield as $txs) {
                            $tax = 'tax' . $i;
                        ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="tax" class="col-sm-4 col-form-label"><?php echo $txs['tax_name']; ?> <i class="text-danger"></i></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tax<?php echo $i; ?>" class="form-control" value="<?php echo  number_format($pr_details[0][$tax] * 100, 2, '.', ','); ?>">
                                        </div>
                                        <div class="col-sm-1"> <i class="text-success">%</i></div>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>

                        <div class="table-responsive product-supplier">
                            <table class="table table-bordered table-hover" id="product_table">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('supplier') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('supplier_price') ?> <i class="text-danger">*</i></th>


                                        <th class="text-center"><?php echo display('action') ?> <i class="text-danger"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="proudt_item">
                                    {supplier_product_data}
                                    <tr class="">

                                        <td width="300">
                                            <select name="supplier_id[]" class="form-control" required="" tabindex="8">

                                                <?php foreach ($supplier_list as $supplier) { ?>
                                                    <option value="<?php echo $supplier['supplier_id'] ?>"><?php echo $supplier['supplier_name'] ?> </option>
                                                <?php } ?>
                                                <?php
                                                if ($supplier_selected) {
                                                ?>
                                                    {supplier_selected}
                                                    <option selected value="{supplier_id}">{supplier_name} </option>
                                                    {/supplier_selected}
                                                <?php
                                                } else {
                                                ?>
                                                    <option selected value="0"><?php echo display('supplier_not_selected') ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="">
                                            <input type="text" tabindex="6" class="form-control text-right" name="supplier_price[]" placeholder="0.00" required min="0" value="{supplier_price}" />
                                        </td>

                                        <td width="100"> <a id="add_purchase_item" class="btn btn-info btn-sm" name="add-invoice-item" onClick="addpruduct('proudt_item');" tabindex="9" /><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a class="btn btn-danger btn-sm red" value="<?php echo display('delete') ?>" onclick="deleteRow(this)" tabindex="10"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    {/supplier_product_data}
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="<?php echo display('product_details') ?>" tabindex="2">{product_details}</textarea>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <div class="col-sm-6">

                                <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('save_changes') ?>" tabindex="10" />

                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
            <input type="hidden" id="supplier_list" value='<?php if ($supplier_list) { ?>{supplier_list}<option value="{supplier_id}">{supplier_name}</option>{/supplier_list}<?php } ?>' name="">
        </div>
    </section>
</div>

<script type="text/javascript">
    function validate_pr_code() {
        var pr_code = $("#product_code").val();
        var csrf_test_name = $('[name="csrf_test_name"]').val();

        $.ajax({
            url: '<?= base_url() ?>' + "Cproduct/validate_pr_code",
            method: 'post',
            dataType: "json",
            data: {
                pr_code: pr_code,
                csrf_test_name: csrf_test_name
            },
            success: function(data) {

                if (data.found == true) {
                    toastr.warning('Not a unique product code.');
                }
            }
        });

    }
</script>

<!-- Edit Product End -->