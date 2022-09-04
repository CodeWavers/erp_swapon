<!-- Barcode list start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php
                if (empty($qr_image)) {
                    echo display('barcode');
                } else {
                    echo display('qr_code');
                }
                ?></h1>
            <small><?php
                    if (empty($qr_image)) {
                        echo display('barcode');
                    } else {
                        echo display('qr_code');
                    }
                    ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('product') ?></a></li>
                <li class="active"><?php
                                    if (empty($qr_image)) {
                                        echo display('barcode');
                                    } else {
                                        echo display('qr_code');
                                    }
                                    ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Product Barcode and QR code -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4> No Of <?php
                                        if (empty($qr_image)) {
                                            echo display('barcode');
                                        } else {
                                            echo display('qr_code');
                                        }
                                        ?>
                                <span class="productbarcode-margin"></span>
                                <?php
                                if (empty($qr_image)) {
                                    echo display('barcode');
                                } else {
                                    echo display('qr_code');
                                }
                                ?> Qty Each Row

                                <span class="productbarcode-mg"> </span>Category
                            </h4>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <form>

                                            <div class="col-sm-3">
                                                <input type="number" name="qty" class="form-control" value="<?php echo (isset($_GET["qty"]) ? $_GET["qty"] : "5");
                                                                                                            ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" name="cqty" class="form-control" value="<?php echo (isset($_GET["cqty"]) ? $_GET["cqty"] : "5");
                                                                                                                ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="category" class="form-control" value="<?php echo (isset($_GET["category"]) ? $_GET["category"] : "");
                                                ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="submit" name="submit" class="btn btn-success" value="Generate">
                                                <?php
                                                if (!empty($product_id) || !empty($qr_image)) {
                                                    ?>

                                                        <a class="btn btn-info" href="#" onclick="printDivBar('printableArea')"><?php echo display('print') ?></a>
                                                        <!--                                <a class="btn btn-danger" href="--><?php //echo base_url('Cproduct'); ?><!--">--><?php //echo display('cancel') ?><!--</a>-->

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cproduct/insert_product') ?>
                    <div class="panel-body">


                        <div class="table-responsive">
                            <?php
                            if (isset($product_id)) {
                                $qty = (isset($_GET["qty"]) ? $_GET["qty"] : "8");
                                $cqty = (isset($_GET["cqty"]) ? $_GET["cqty"] : "8");
                                $category = (isset($_GET["category"]) ? $_GET["category"] : "");
                            ?>
                                <div id="printableArea">
                                    <table id="" class="table-bordered">
                                        <?php
                                        $counter = 0;
                                        for ($i = 0; $i < $qty; $i++) {
                                        ?>
                                            <?php if ($counter == $cqty) { ?>
                                                <tr>
                                                    <?php $counter = 0; ?>
                                                <?php } ?>
                                                <td class="barcode-toptd">

                                                    <div class="barcode-inner barcode-innerdiv">
                                                        <div class="product-name barcode-productname">
                                                            <nobr>{company_name}</nobr>

                                                        </div>
                                                        <span class="model-name barcode-modelname">{product_model}</span>
                                                        <img src="<?php echo base_url('Cbarcode/barcode_generator/{product_id}') ?>" class="img-responsive center-block barcode-image" alt="">

                                                        <div class="product-name-details barcode-productdetails"><?= $category?></div>
                                                        <s class="price barcode-price"><?php echo (($position == 0) ? "$currency {price}" : "{price} $currency") ?>

                                                        </s>
                                                            <div class="price barcode-price"><?php echo (($position == 0) ? "$currency {purchase_price}" : "{purchase_price} $currency") ?> 

                                                        </div>
                                                    </div>

                                                </td>
                                                <?php if ($counter == 7) { ?>
                                                </tr>
<!--                                                --><?php //$counter = 3; ?>
                                            <?php } ?>
                                            <?php $counter++; ?>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div id="printableArea">
                                    <table class="table-bordered barcode-collaps">
                                        <?php
                                        $qty = (isset($_GET["qty"]) ? $_GET["qty"] : "8");
                                        $cqty = (isset($_GET["cqty"]) ? $_GET["cqty"] : "8");
                                        $category = (isset($_GET["category"]) ? $_GET["category"] : "");

                                        $counter = 0;
                                        for ($i = 0; $i = $qty; $i++) {
                                        ?>
                                            <?php if ($counter == $cqty) { ?>
                                                <tr>
                                                    <?php $counter = 0; ?>
                                                <?php } ?>
                                                <td class="barcode-toptd">
                                                    <div class="barcode-inner barcode-innerdiv">
                                                        <div class="product-name barcode-productname">
                                                            {company_name}
                                                        </div>
                                                        <span class="model-name barcode-modelname">{product_model}</span>
                                                        <img src="<?php echo base_url('my-assets/image/qr/{qr_image}') ?>" class="img-responsive center-block qrcode-image" alt="">
                                                        <div class="product-name-details qrcode-productdetails">{product_name}</div>
                                                        <s class="price barcode-price"><?php echo (($position == 0) ? "$currency {price}" : "{price} $currency") ?> .

                                                        </s>
                                                        <div class="price barcode-price"><?php echo (($position == 0) ? "$currency {purchase_price}" : "{purchase_price} $currency") ?> .

                                                        </div>
                                                    </div>
                                                </td>
                                                <?php if ($counter == 7) { ?>
                                                </tr>
                                                <?php $counter = 0; ?>
                                            <?php } ?>
                                            <?php $counter++; ?>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Barcode list End -->

<script type="text/javascript">
    ("use strict");

    function printDivBar(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        document.body.style.marginTop = "0px";
        setTimeout(function() {
            window.print();
            document.body.innerHTML = originalContents;
        }, 1000);

    }
</script>