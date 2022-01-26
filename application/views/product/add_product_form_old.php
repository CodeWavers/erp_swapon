<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product.js" type="text/javascript"></script>
<!-- Add Product Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('new_product') ?></h1>
            <small><?php echo display('add_new_product') ?></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('product') ?></a></li>
                <li class="active"><?php echo display('new_product') ?></li>
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

                <?php if ($this->permission1->method('add_product_csv', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cproduct/add_product_csv') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_product_csv') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('manage_product', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Cproduct/manage_product') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_product') ?> </a>
                <?php } ?>


            </div>
        </div>

        <!-- Add Product -->


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('new_product') ?></h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cproduct/insert_product', array('class' => 'form-vertical', 'id' => 'insert_product', 'name' => 'insert_product')) ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="barcode_or_qrcode" class="col-sm-2 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="product_id" type="text" id="product_id" placeholder="<?php echo display('barcode_or_qrcode') ?>" tabindex="1">
                                        <input type="hidden" name="product_id_two" value="{product_id_two}">
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
                                                <option value="">Select One</option>
                                                <option value="1">Finished Goods</option>
                                                <option value="2">Raw Materials</option>
                                                <option value="3">Tools</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="pr_code_div" style="display: none;">
                                    <div class="form-group row">
                                        <label for="product_code" class="col-sm-4 col-form-label">Product Code <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="" class="form-control " id="product_code" name="product_code" placeholder="Enter unique product code" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="mat_code_div" style="display: none;">
                                    <div class="form-group row">
                                        <label for="material_code" class="col-sm-4 col-form-label">Material Code <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="" class="form-control " id="material_code" name="material_code" placeholder="Material code" required />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-4 col-form-label">Color </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="color" name="color" tabindex="3">
                                                <option value=""></option>
                                                <?php if ($color_list) {
                                                    foreach ($color_list as $color) { ?>
                                                        <option value="<?= $color['color_id'] ?>"> <?= $color['color_name'] ?></option>
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
                                            <select class="form-control" id="product_size" name="product_size" tabindex="3">
                                                <option value=""></option>
                                                <?php if ($size_list) { ?>
                                                    {size_list}
                                                    <option value="{size_id}">{size_name}</option>
                                                    {/size_list}
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

f                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="category_id" name="category_id" tabindex="3">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger"></i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="" class="form-control" id="product_model" name="model" placeholder="<?php echo display('model') ?>" />
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="ptype_id" class="col-sm-4 col-form-label">Product Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="ptype_id" name="ptype_id" tabindex="3">
                                                <option value=""></option>
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
                                            <select class="form-control" id="unit" name="unit" aria-hidden="true">
                                                <option value="">Select One</option>
                                                <?php if ($unit_list) { ?>
                                                    {unit_list}
                                                    <option value="{unit_name}">{unit_name}</option>
                                                    {/unit_list}
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="transaction_unit" class="col-sm-4 col-form-label">Convertion Unit</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="transaction_unit" name="transaction_unit" aria-hidden="true">
                                                <option value="">Select One</option>
                                                <?php if ($unit_list) { ?>
                                                    {unit_list}
                                                    <option value="{unit_name}">{unit_name}</option>
                                                    {/unit_list}
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="mult" placeholder="Convertion Value">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-sm-6" id="sale_price_div">
                                    <div class="form-group row">
                                        <label for="sell_price" class="col-sm-4 col-form-label">Sales Price<i class="text-danger">*</i> </label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-right" id="sell_price" name="price" type="text" required="" placeholder="0.00" tabindex="5" min="0">
                                        </div>
                                    </div>
                                </div>

                                <?php $i = 0;
                                foreach ($taxfield as $taxss) { ?>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="tax" class="col-sm-4 col-form-label"><?php echo $taxss['tax_name']; ?> <i class="text-danger"></i></label>
                                            <div class="col-sm-7">
                                                <input type="text" name="tax<?php echo $i; ?>" class="form-control" value="<?php echo number_format($taxss['default_value'], 2, '.', ','); ?>">
                                            </div>
                                            <div class="col-sm-1"> <i class="text-success">%</i></div>
                                        </div>
                                    </div>

                                    <?php $i++;
                                } ?>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image" class="form-control" id="image" tabindex="4">
                                        </div>
                                    </div>
                                </div>
                            </div>






                        <div class="form-group row">
                            <div class="col-sm-6">

                                <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('save') ?>" tabindex="10" />
                                <input type="submit" value="<?php echo display('save_and_add_another') ?>" name="add-product-another" class="btn btn-large btn-success" id="add-product-another" tabindex="9">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <input type="hidden" id="base_url" value="<?= base_url(); ?>">
                <input type="hidden" id="supplier_list" value='<?php if ($supplier) { ?>{supplier}<option value="{supplier_id}">{supplier_name}</option>{/supplier}<?php } ?>' name="">
            </div>
        </div>
    </section>
</div>


<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'ckeditor' );

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


<!-- Add Product End -->