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
                                    <label for="product_status" class="col-sm-2 col-form-label"> Product type <i class="text-danger">*</i></label>
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
                            <!-- <div class="col-sm-6" id="pr_code_div" style="display: <?php echo $finished_raw == 1 ? 'block' : 'none' ?>">
                                <div class="form-group row">
                                    <label for="product_code" class="col-sm-4 col-form-label">Product Code </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control" id="product_code" name="product_code" placeholder="Enter a unique product code" value="{product_code}" onfocusout="validate_pr_code()" />
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6" id="mat_code_div" style="display: <?php echo $finished_raw == 2 ? 'block' : 'none' ?>">
                                <div class="form-group row">
                                    <label for="material_code" class="col-sm-4 col-form-label">Material Code <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control " id="material_code" name="material_code" placeholder="Material code" value="{product_code}" required />
                                    </div>
                                </div>
                            </div> -->
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




                        <!-- <div class="row">
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
                                                    <option value="<?= $sz['id'] ?>" selected><?= $sz['name'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $sz['id'] ?>"><?= $sz['name'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div> -->

                        <!-- <div class="row">
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

                        </div> -->

                        <!-- <div class="row">
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
                        </div> -->

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-4 col-form-label">Base Unit</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="unit" name="unit" tabindex="-1" aria-hidden="true">
                                            <option value="{unit}">{unit}</option>
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

                            <!-- <div class="col-sm-6">
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
                            </div> -->

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="sell_price" class="col-sm-4 col-form-label">Sales Price<i class="text-danger">*</i> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-right" id="sell_price" name="sell_price" type="text" required="" placeholder="0.00" tabindex="5" min="0" value="{price}">
                                    </div>
                                </div>
                            </div>

<!--                            <div class="col-sm-6">-->
<!--                                <div class="col-sm-6">-->
<!--                                    <div class="form-group row" class="display: --><?php //echo $finished_raw == 1 ? 'block' : 'none' ?><!--">-->
<!--                                        <label for="category_id" class="col-sm-4 col-form-label">Brand Name</label>-->
<!--                                        <div class="col-sm-8">-->
<!--                                            <select class="form-control" id="brand_id" name="brand_id" tabindex="3">-->
<!--                                                <option value="{brand_id}">{brand_name}</option>-->
<!--                                                --><?php //if ($brand_list) { ?>
<!--                                                    {brand_list}-->
<!--                                                    <option value="{id}">{brand_name}</option>-->
<!--                                                    {/brand_list}-->
<!--                                                --><?php //} ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                        </div>


                        <div class="pr_code_div" style="display: <?php echo $finished_raw == 1 ? 'block' : 'none' ?>">


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="category_id" multiple name="category_id[]" tabindex="3">
                                                {selected_category_list}
                                                <option value="{id}" selected>{name}</option>

                                                {/selected_category_list}

                                                {allcats}
                                                <option value="{id}">{name}</option>

                                                {/allcats}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="sku" class="col-sm-4 col-form-label">SKU</label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="" class="form-control" id="sku" name="sku" value="{sku}" placeholder="SKU"  readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label">Minimum Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" tabindex="" class="form-control" id="min_qty" name="min_qty" placeholder="Minimum Quantity"  value="{min_qty}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="sku" class="col-sm-4 col-form-label">Tags</label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="" class="form-control" id="tags" name="tags" value="{tags}" placeholder="Tags" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-4 col-form-label">Color </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="color" multiple name="color[]" tabindex="3">
                                                {selected_color_list}
                                                <option value="{code}" selected>{name}</option>

                                                {/selected_color_list}
                                                <?php if ($color_list) {
                                                    foreach ($color_list as $color) { ?>
                                                        <option value="<?= $color['code'] ?>"> <?= $color['color_name'] ?></option>
                                                    <?php }
                                                } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--                            <div class="col-sm-6">-->
                                <!--                                <div class="form-group row">-->
                                <!--                                    <label for="product_size" class="col-sm-4 col-form-label">Size </label>-->
                                <!--                                    <div class="col-sm-8">-->
                                <!--                                        <select class="form-control" id="product_size" multiple name="product_size[]" tabindex="3">-->
                                <!--                                            <option value=""></option>-->
                                <!--                                            --><?php //if ($size_list) { 
                                                                                    ?>
                                <!--                                                {size_list}-->
                                <!--                                                <option value="{size_id}">{size_name}</option>-->
                                <!--                                                {/size_list}-->
                                <!--                                            --><?php //} 
                                                                                    ?>
                                <!--                                        </select>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-4 col-form-label">Attributes </label>
                                        <div class="col-sm-8">
                                            <select name="choice_attributes[]" id="choice_attributes" class="form-control demo-select2" multiple data-placeholder="Attributes">

                                                {selected_at_list}
                                                <option value="{id}" selected>{name}</option>

                                                {/selected_at_list}

                                                <?php if ($size_list) { ?>
                                                    {size_list}
                                                    <option value="{id}">{name}</option>
                                                    {/size_list}
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-4 col-form-label"> </label>
                                        <div class="col-sm-8">
                                            <div class="customer_choice_options" id="customer_choice_options">




                                                <?php foreach (json_decode($choice_options) as $key => $choice_option) { ?>

                                                    <?php

                                                    $api_url=api_url();
                                                    $url = $api_url."products/attributes/".$choice_option->attribute_id;


                                                    $curl = curl_init($url);
                                                    curl_setopt($curl, CURLOPT_URL, $url);
                                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
                                                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                                                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                                                    $choice_name =json_decode(curl_exec($curl));
                                                    curl_close($curl);

       // echo '<pre>';print_r( implode(',', $choice_option->values));exit();




                                                    ?>


                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <input type="hidden" name="choice_no[]" value=""<?php echo $choice_option->attribute_id ?>">
                                                        <input type="text" class="form-control" name="choice[]" value="<?php echo $choice_name->name ?>" placeholder="" disabled>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="choice_options_<?php echo $choice_option->attribute_id ?>[]" placeholder="" value="<?php echo implode(',', $choice_option->values) ?>" data-role="tagsinput" ">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <button onclick="delete_row(this)" class="btn btn-danger btn-icon"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                                    <br>
                                               <?php } ?>

                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-2 col-form-label">Product Description </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control"  name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>"  tabindex="2">{description}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>




                            <div class="row ">


                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Thumbnail Image </label>
                                        <div class="col-sm-10">
                                            <!--                                        <input type="file" name="meta_image" class="form-control" id="meta_image" tabindex="4">-->
                                            <div id="thumbnail_img">
<!--                                                --><?php //echo ecom_url().'/public/'.$thumbnail_img?>

                                              <?php if($thumbnail_img != null) {?>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <div class="img-upload-preview">
                                                        <img loading="lazy"  src="<?php echo ecom_url().'/public/'.$thumbnail_img?>" alt="" class="img-responsive">
                                                        <input type="hidden" name="previous_thumbnail_img" value="<?php echo $thumbnail_img?>">
                                                        <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <?php }?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">


                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Gallery Image </label>
                                        <div class="col-sm-10">
                                            <!--                                        <input type="file" name="meta_image" class="form-control" id="meta_image" tabindex="4">-->
                                            <div id="photos">
                                                <?php if(is_array(json_decode($photos))) { ?>
                                                 <?php foreach (json_decode($photos) as $key => $photo) {?>
                                                     <?php if ($photo) {?>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <div class="img-upload-preview">

                                                        <img loading="lazy"  src="<?php echo ecom_url().'/public/'.$photo?>" alt="" class="img-responsive">
                                                        <input type="hidden" name="previous_photos[]" value="<?php echo $photo?>">
                                                        <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                 <?php }?>
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label">Video Provider</label>
                                        <div class="col-sm-8">
                                            <select name="video_provider" id="video_provider" class="form-control"  >
                                                <option value="">{video_provider}</option>
                                                <option value="1">Vimeo</option>
                                                <option value="2">Youtube</option>
                                                <option value="3">Dailymotion</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_model" class="col-sm-4 col-form-label">Video Link</label>
                                        <div class="col-sm-8">

                                            <input type="text" tabindex="" class="form-control" id="video_link" name="video_link" placeholder="Video Link" value="{video_link}"/>

                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-2 col-form-label">Product Summery </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="summery" id="summery" rows="2" placeholder="Product Summery" tabindex="2">{product_summary}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-2 col-form-label">Additional Information </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="additional_information" id="additional_information" rows="2" placeholder="Product Summery" tabindex="2">{information}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-2 col-form-label">Additional Terms & Condition </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="additional_terms" id="additional_terms" rows="1" placeholder="Product Summery" tabindex="2">{tc}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="" class="form-control" id="meta_title" name="meta_title" value="{meta_title}" placeholder="Meta Title" />

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_model" class="col-sm-4 col-form-label">Meta Description</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="meta_description" id="meta_description" rows="4" placeholder="Meta Description" tabindex="2">{meta_description}</textarea>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row">


                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Meta Image </label>
                                        <div class="col-sm-10">
                                            <!-- <input type="file" name="meta_image" class="form-control" id="meta_image" tabindex="4"> -->
                                            <div id="meta_photo">
                                                <?php if($meta_img != null) {?>
                                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                                        <div class="img-upload-preview">
                                                            <img loading="lazy"  src="<?php echo ecom_url().'/public/'.$meta_img?>" alt="" class="img-responsive">
                                                            <input type="hidden" name="previous_meta_img" value="<?php echo $meta_img?>">
                                                            <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




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

    $('.remove-files').on('click', function(){
        $(this).parents(".col-md-3").remove();
    });
</script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<!--<script src="https://swaponsworld.com/public/js/spartan-multi-image-picker-min.js"></script>-->
<script type="text/javascript">
    CKEDITOR.replace('description');
    CKEDITOR.replace('summery');
    CKEDITOR.replace('additional_information');
    CKEDITOR.replace('additional_terms');

    $(document).ready(function() {

        $('.refund').bootstrapToggle({

            onstyle: 'success',
            offstyle: ''
        });


        $("#photos").spartanMultiImagePicker({
            fieldName: 'photos[]',
            maxCount: 10,
            rowHeight: '200px',
            groupClassName: 'col-md-3 col-sm-3 col-xs-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#thumbnail_img").spartanMultiImagePicker({
            fieldName: 'thumbnail_img',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-md-3 col-sm-3 col-xs-6 thumbnail_img',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#meta_photo").spartanMultiImagePicker({
            fieldName: 'meta_img',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-md-3 col-sm-3 col-xs-6 ',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });

        $( "#add-product" ).on("click", function(  ) {



            var product_status=$('#product_status').val();

            var product_name=$('#product_name').val();


               var product_id=$('#product_id').val() ,
                   sell_price=$('#sell_price').val(),
                category_id=$('#category_id').val(),
                brand_id=$('#brand_id').val(),
                sku=$('#sku').val(),
                min_qty=$('#min_qty').val(),
                tags=$('#tags').val(),

                color=$('#color').val(),



                description=CKEDITOR. instances['description']. getData(),
                video_provider=$('#video_provider').val(),
                video_link=$('#video_link').val(),
                summery=CKEDITOR. instances['summery']. getData(),
                additional_information=CKEDITOR. instances['additional_information']. getData(),
                additional_terms=CKEDITOR. instances['additional_terms']. getData(),
                refund=$('#refund').val(),
                unit=$('#unit').val(),
                meta_title=$('#meta_title').val(),
                meta_description=$('#meta_description').val(),
                previous_thumbnail_img=document.getElementsByName("previous_thumbnail_img")[0].value,
                previous_meta_img=document.getElementsByName("previous_meta_img")[0].value,
                //previous_photos=document.getElementsByName("previous_photos[]")[0].value,

                choice  = $("input[name='choice[]']")
                    .map(function(){return $(this).val();}).get(),

            previous_photos  = $("input[name='previous_photos[]']")
                    .map(function(){return $(this).val();}).get();

               // alert('ehhhj');
               // return;





            if (product_status == '1'){
                var form = new FormData();

                var choice_no  = $("input[name='choice_no[]']")
                    .map(function(){

                        var x=$(this).val();

                        var cho=$('.choice_options_'+x);
                        var  choice_options  = cho.map(function(){
                                var v=$(this).val();


                            var myarr = v.split(",");

                            // const valueWrappedInQuotes = myarr.map(myarr => `'${myarr}'`);
                            // const withCommasInBetween = valueWrappedInQuotes.join(',')
                            // return $(this).val();
                           //  console.log(withCommasInBetween)
                            myObj = {attribute_id: x, values: myarr};
                            return myJSON = JSON.stringify(myObj);

                        }).get();
                    //   console.log(choice_options)

                        if (choice_options != ''){
                            form.append("choice_options[]", choice_options);

                        }


                        return x;



                    }).get();





                document.getElementsByName("photos[]").forEach((el) => {

                        form.append('photos[]', $(el)[0].files[0]);

                });




                var thumbnail_img = document.getElementsByName("thumbnail_img");

                if ( thumbnail_img.length > 0) {
                    form.append("thumbnail_img", thumbnail_img[0].files[0]);
                }



                var meta_photo = document.getElementsByName("meta_photo");
                if (meta_photo.length > 0) {
                    form.append("meta_photo", meta_photo[0].files[0]);
                }

                form.append("name", product_name);
                form.append("barcode", product_id);
                form.append("id", product_id);
                form.append("unit_price", sell_price)
                form.append("cats", category_id);
                form.append("brand_id", brand_id);
                form.append("sku", sku);
                form.append("unit", unit);
                form.append("min_qty", min_qty);
                form.append("tags", tags);
                form.append("description", description);
                form.append("video_provider", video_provider);
                form.append("video_link", video_link);
                form.append("product_summary", summery);
                form.append("information", additional_information);
                form.append("tc", additional_terms);
                form.append("refundable", refund);
                form.append("meta_title", meta_title);
                form.append("meta_description", meta_description);
                form.append("colors", JSON.stringify(color));
                form.append("choice_no", JSON.stringify(choice_no));
                form.append("previous_thumbnail_img", previous_thumbnail_img);
                form.append("previous_meta_img", previous_meta_img);
                form.append("previous_photos[]", previous_photos);
                form.append("choice", choice);


                var settings = {
                    "url": '<?= api_url() ?>'+'products/update',
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                });
            }




        });

    });
    function delete_row(em){
        $(em).closest('.form-group').remove();

    }


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

    function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<br><div class="form-group"><div class="col-sm-4"><input class="choice_no" type="text" name="choice_no[]" value="'+i+'"><input type="text" class="form-control " name="choice[]" value="'+name+'" placeholder="Choice" readonly></div><div class="col-sm-8"><input type="text" class="form-control choice_options_'+i+' " name="choice_options_'+i+'[]" placeholder="Enter choice" data-role="tagsinput" ></div></div><br>');

        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    }

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function() {
            //console.log($(this).val());
            add_more_customer_choice_option($(this).val(), $(this).text());
        });
        // update_sku();
    });
</script>

<!-- Edit Product End -->