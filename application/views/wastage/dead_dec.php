<!-- Invoice js -->
<!--<script src="--><?php //echo base_url() ?><!--my-assets/js/admin_js/rqsn.js.php" type="text/javascript"></script>-->
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
            <h1>Dead Declaration</h1>
            <small>Dead Declaration</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Stock</a></li>
                <li class="active">Dead Declaration</li>
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
        <!--        <div class="row">-->
        <!--            <div class="col-sm-12">-->
        <!---->
        <!--                --><?php //if($this->permission1->method('manage_invoice','read')->access()){
                                ?>
        <!--                    <a href="--><?php //echo base_url('Cinvoice/manage_invoice')
                                            ?>
        <!--" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> --><?php //echo display('manage_invoice')
                                                                                    ?>
        <!-- </a>-->
        <!--                --><?php //}
                                ?>
        <!--                --><?php //if($this->permission1->method('pos_invoice','create')->access()){
                                ?>
        <!--                    <a href="--><?php //echo base_url('Cinvoice/pos_invoice')
                                            ?>
        <!--" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  --><?php //echo display('pos_invoice')
                                                                                        ?>
        <!-- </a>-->
        <!--                --><?php //}
                                ?>
        <!---->
        <!---->
        <!--            </div>-->
        <!--        </div>-->


        <!--Add Invoice -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Dead Declaration</h4>

                        </div>
                    </div>

                    <div class="rqsn_panel" >
                        <?php echo form_open_multipart('Creport/dead_entry',array('class' => 'form-vertical', 'id' => 'insert_rqsn'))?>

                        <br>
                        <div class="table-responsive center">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                <tr>
                                    <th class="text-center " width="25%"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>

                                    <th class="text-center">Current Stock</th>
                                    <th class="text-center">Barcode</th>
                                    <th class="text-center">SKU</th>
                                    <th class="text-center">Origin</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center"><?php echo display('quantity') ?> <i class="text-danger">*</i></th>
                                    <th class="text-center" width="5%"><?php echo display('action') ?></th>
                                </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                <tr>
                                    <td class="product_field">
                                        <input type="text" required name="product_name" onkeypress="invoice_productList(1)" id="product_name_1" class="form-control productSelection" placeholder="<?php echo display('product_name') ?>"   tabindex="5">

                                        <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/>

                                        <input type="hidden" class="baseUrl" value="<?php echo base_url(); ?>" />
                                    </td>

                                    <td>
                                        <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_1" value="0" readonly="" />
                                    </td>

                                    <td>
                                        <input name="barcode[]" id="" class="form-control text-right barcode_1 valid" value="None" readonly="" aria-invalid="false" type="text">
                                    </td>
                                    <td>
                                        <input name="sku[]" id="" class="form-control text-right sku_1 valid" value="None" readonly="" aria-invalid="false" type="text">
                                    </td>  <td>
                                        <input name="origin[]" id="" class="form-control text-right origin_1 valid" value="None" readonly="" aria-invalid="false" type="text">
                                    </td>
                                    <td>
                                        <input name="unit[]" id="" class="form-control text-right unit_1 valid" value="None" readonly="" aria-invalid="false" type="text">
                                    </td>
                                    <td>
                                        <input type="text" name="product_quantity[]" required=""  onchange="quantity_calculate(1);" class="total_qntt_1 form-control text-right" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8"  value="1" />
                                    </td>


                                    <td>

<!---->
<!--                                        <button  class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button>-->
                                        <button  class='btn btn-info text-right'  id="add_invoice_item" name="add-invoice-item" type='button' value='Add' onclick="addInputField('addinvoiceItem');"><i class='fa fa-plus'></i></button>
<!--                                        <a style="margin-top: 30%"  id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');"  tabindex="11"><i class="fa fa-plus"></i></a>-->
                                    </td>
                                </tr>
                                </tbody>
<!--                                <tfoot>-->
<!--                                <tr>-->
<!--                                    <td colspan="3" rowspan="1">-->
<!--                                        <center><label  for="details" class="  col-form-label text-center">Requisition Reason/Des</label></center>-->
<!--                                        <textarea name="inva_details" id="details" class="form-control" placeholder="Requisition Reason/Des" ></textarea>-->
<!--                                    </td>-->
<!--                                    <td></td>-->
<!---->
<!--                                </tr>-->
<!---->
<!---->
<!--                                <tr>-->
<!---->
<!--                                </tfoot>-->
                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="insert_rqsn" class="btn btn-success" name="" value="<?php echo display('submit') ?>" tabindex="17"/>
                                <!-- <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-purchase-another" class="btn btn-large btn-success" id="add_purchase_another" > -->
                            </div>
                        </div>



                        <?php echo form_close()?>
                    </div>

                </div>
            </div>







        </div>
    </section>
</div>
<!-- Invoice Report End -->

<script type="text/javascript">
    function addInputField(t) {
        var row = $("#normalinvoice tbody tr").length;
        var count = row + 1;
        var  tab1 = 0;
        var  tab2 = 0;
        var  tab3 = 0;
        var  tab4 = 0;
        var  tab5 = 0;
        var  tab6 = 0;
        var  tab7 = 0;
        var  tab8 = 0;
        var  tab9 = 0;
        var  tab10 = 0;
        var  tab11 = 0;
        var  tab12 = 0;
        var limits = 500;
        var taxnumber = $("#txfieldnum").val();
        var tbfild ='';
        for(var i=0;i<taxnumber;i++){
            var taxincrefield = '<input id="total_tax'+i+'_'+count+'" class="total_tax'+i+'_'+count+'" type="hidden"><input id="all_tax'+i+'_'+count+'" class="total_tax'+i+'" type="hidden" name="tax[]">';
            tbfild +=taxincrefield;
        }
        if (count == limits)
            alert("You have reached the limit of adding " + count + " inputs");
        else {
            var a = "product_name_" + count,
                tabindex = count * 6,
                e = document.createElement("tr");
            tab1 = tabindex + 1;
            tab2 = tabindex + 2;
            tab3 = tabindex + 3;
            tab4 = tabindex + 4;
            tab5 = tabindex + 5;
            tab6 = tabindex + 6;
            tab7 = tabindex + 7;
            tab8 = tabindex + 8;
            tab9 = tabindex + 9;
            tab10 = tabindex + 10;
            tab11 = tabindex + 11;
            tab12 = tabindex + 12;
            //  e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td><td><input type='text' name='desc[]'' class='form-control text-right ' tabindex='" + tab2 + "'/></td><td><select class='form-control' id='serial_no_" + count + "' name='serial_no[]' tabindex='" + tab3 + "'><option></option></select></td> <td><select type='text' name='warehouse[]' class='form-control text-right warehouse_"+ count +"' /><option></option></select> </td> <td><input type='text' name='available_quantity[]' id='' class='form-control text-right common_avail_qnt available_quantity_" + count + "' value='0' readonly='readonly' /></td><td><input class='form-control text-right common_name unit_" + count + " valid' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  warrenty_date_" + count + "' name='warrenty_date[]' value=''/></td><td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  expiry_date_" + count + "' name='expiry_date[]' value=''/></td><td><input type='text' name='product_rate[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='price_item_" + count + "' class='common_rate price_item" + count + " form-control text-right' required placeholder='0.00' min='0' tabindex='" + tab4 + "'/></td><td><input type='text' name='discount[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='discount_" + count + "' class='form-control text-right common_discount' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='hidden' value='' name='discount_type' id='discount_type_" + count + "'></td><td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" + count + "' value='0.00' readonly='readonly'/></td><td>"+tbfild+"<input type='hidden' id='all_discount_" + count + "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab5 + "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
            e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td><td><input class='form-control text-right common_name available_quantity_" + count + " valid' name='available_quantity_[]' value='None' readonly='' aria-invalid='false' type='text'></td><td><input class='form-control text-right common_name barcode_" + count + " valid' name='barcode[]' value='None' readonly='' aria-invalid='false' type='text'></td><td><input class='form-control text-right common_name sku_" + count + " valid' name='sku[]' value='None' readonly='' aria-invalid='false' type='text'></td><td><input class='form-control text-right common_name origin_" + count + " valid' name='origin[]' value='None' readonly='' aria-invalid='false' type='text'></td> <td><input class='form-control text-right common_name unit_" + count + " valid' name='unit[]' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' value='1' required='required'  onchange='quantity_calculate(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td><button tabindex='" + tab5 + "' style='text-align: center;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
                document.getElementById(t).appendChild(e),
                document.getElementById(a).focus(),
                document.getElementById("add_invoice_item").setAttribute("tabindex", tab6);
            document.getElementById("details").setAttribute("tabindex", tab7);
            document.getElementById("invoice_discount").setAttribute("tabindex", tab8);
            document.getElementById("shipping_cost").setAttribute("tabindex", tab9);
            document.getElementById("paidAmount").setAttribute("tabindex", tab10);
            document.getElementById("full_paid_tab").setAttribute("tabindex", tab11);
            document.getElementById("add_invoice").setAttribute("tabindex", tab12);
            count++
        }
    }

    "use strict";
    function invoice_productList(sl) {

        var unit = 'unit_'+sl;
        var barcode = 'barcode_'+sl;
        var sku = 'sku_'+sl;
        var origin = 'origin_'+sl;
        var stock = 'available_quantity_'+sl;


        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var base_url = $("#base_url").val();

        // Auto complete
        var options = {
            minLength: 0,
            source: function( request, response ) {
                var product_name = $('#product_name_'+sl).val();
                $.ajax( {
                    url: base_url + "Cinvoice/autocompleteproductsearch",
                    method: 'post',
                    dataType: "json",
                    data: {
                        term: request.term,
                        product_name:product_name,
                        csrf_test_name:csrf_test_name,
                    },
                    success: function( data ) {
                        response( data );

                    }
                });
            },
            focus: function( event, ui ) {
                $(this).val(ui.item.label);
                return false;
            },
            select: function( event, ui ) {
                $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value);
                $(this).val(ui.item.label);
                var id=ui.item.value;
                var dataString = 'pro duct_id='+ id;
                var base_url = $('.baseUrl').val();

                $.ajax
                ({
                    type: "POST",
                    url: base_url+"Cinvoice/retrieve_product_data_inv",
                    data: {product_id:id,csrf_test_name:csrf_test_name},
                    cache: false,
                    success: function(data)
                    {
                        var obj = jQuery.parseJSON(data);
                        for (var i = 0; i < (obj.txnmber); i++) {
                            var txam = obj.taxdta[i];
                            var txclass = 'total_tax'+i+'_'+sl;
                            $('.'+txclass).val(obj.taxdta[i]);
                        }

                        $('.'+unit).val(obj.unit);
                        $('.'+barcode).val(obj.product_id);
                        $('.'+sku).val(obj.sku);
                        $('.'+origin).val(obj.country);
                        $('.'+stock).val(obj.total_product);




                    }
                });

                $(this).unbind("change");
                return false;
            }
        }

        $('body').on('keypress.autocomplete', '.productSelection', function() {
            $(this).autocomplete(options);
        });

    }

    //Delete a row of table
    "use strict";
    function deleteRow(t) {
        var a = $("#normalinvoice > tbody > tr").length;
        if (1 == a)
            alert("There only one row you can't delete.");
        else {
            var e = t.parentNode.parentNode;
            e.parentNode.removeChild(e),
                calculateSum();
            invoice_paidamount();
            var current = 1;
            $("#normalinvoice > tbody > tr td input.productSelection").each(function () {
                current++;
                $(this).attr('id', 'product_name' + current);
            });
            var common_qnt = 1;
            $("#normalinvoice > tbody > tr td input.common_qnt").each(function () {
                common_qnt++;
                $(this).attr('id', 'total_qntt_' + common_qnt);
                $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
                $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
            });
            var common_rate = 1;
            $("#normalinvoice > tbody > tr td input.common_rate").each(function () {
                common_rate++;
                $(this).attr('id', 'price_item_' + common_rate);
                $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
                $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
            });
            var common_discount = 1;
            $("#normalinvoice > tbody > tr td input.common_discount").each(function () {
                common_discount++;
                $(this).attr('id', 'discount_' + common_discount);
                $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
                $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
            });
            var common_total_price = 1;
            $("#normalinvoice > tbody > tr td input.common_total_price").each(function () {
                common_total_price++;
                $(this).attr('id', 'total_price_' + common_total_price);
            });




        }
    }

    function quantity_calculate(t) {


        var current_stock=parseFloat($('.available_quantity_'+t).val());

        var qty=$('.total_qntt_'+t).val();

        if (qty > current_stock){

            toastr.error("You cannot declared greater than current stock")
            $('.total_qntt_'+t).val('');
        }

    }


</script>