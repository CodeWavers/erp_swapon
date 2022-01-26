<!--Edit customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Product Type</h1>
            <small>Product Type Edit</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Product Type</a></li>
                <li class="active">Product Type Edit</li>
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

        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Product Type Edit </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cptype/category_update', array('class' => 'form-vertical', 'id' => 'category_update')) ?>
                    <div class="panel-body">

                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Product Type<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="ptype_name" id="category_name" type="text" required="" value="{ptype_name}">
                            </div>
                        </div>

                        <input type="hidden" value="{ptype_id}" name="ptype_id">

                        <div class="form-group row">
                            <label for="product_status" class="col-sm-3 col-form-label">Product Status <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="product_status" id="product_status" class="form-control">
                                    <?php if ($product_status == 1) { ?>
                                        <option value="1" selected>Finished Product</option>
                                    <?php } else { ?>
                                        <option value="1">Finished Product</option>
                                    <?php } ?>

                                    <?php if ($product_status == 2) { ?>
                                        <option value="2" selected>Raw Materials</option>
                                    <?php } else { ?>
                                        <option value="2">Raw Materials</option>
                                    <?php } ?>

                                    <?php if ($product_status == 3) { ?>
                                        <option value="3" selected>Tools</option>
                                    <?php } else { ?>
                                        <option value="3">Tools</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-Customer" class="btn btn-success btn-large" name="add-Customer" value="<?php echo display('save_changes') ?>" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit customer end -->