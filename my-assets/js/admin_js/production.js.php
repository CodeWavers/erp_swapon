//Add Input Field Of Row
"use strict";
<?php
$cache_file = "invoice.json";
header('Content-Type: text/javascript; charset=utf8');
?>
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
        e.innerHTML = "<td><input type='text' autocomplete='off' name='item_name' onkeypress='invoice_itemList(" + count + ");' class='form-control itemSelection common_product' placeholder='Item Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_item_value  item_id_" + count + "' name='item_id[]' id='SchoolHiddenId'/></td> <td><input class='form-control text-right common_name stock_" + count + " valid' name='stock[]' value='0.00' readonly='' aria-invalid='false' type='text'></td> <td><input class='form-control text-right common_name unit_" + count + " valid' name='unit[]' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' value='0' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><input type='hidden' name='multiplier[]' value='0' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='multiplier_" + count + "' class='common_multiplier multiplier_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab4 + "'/><input type='hidden' name='price[]' value='' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='price_" + count + "' class='common_price price_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab6 + "'/> <td> <input type='text' name='qty_price[]' value='0' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='qty_price_" + count + "' class='qty_price form-control text-right'  placeholder='0.00' min='0' readonly tabindex='" + tab7 + "'/></td> <td><button tabindex='" + tab5 + "' style='text-align: center;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-minus-circle'></i></button></td>",
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

function addToolsInputField(t) {
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
        e.innerHTML = "<td><input type='text' autocomplete='off' name='tools_name' onkeypress='invoice_toolsList(" + count + ");' class='form-control itemSelection common_product' placeholder='Item Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_tools_value  tools_id_" + count + "' name='tools_id[]' id='SchoolHiddenId'/></td> <td><input class='form-control text-right common_name tools_stock_" + count + " valid' name='tools_stock[]' value='0.00' readonly='' aria-invalid='false' type='text'></td> <td><input class='form-control text-right common_name tools_unit_" + count + " valid' name='tools_unit[]' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='tools_product_quantity[]' value='0' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='tools_total_qntt_" + count + "' class='common_qnt tools_total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><input type='hidden' name='tools_multiplier[]' value='1' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='tools_multiplier_" + count + "' class='common_multiplier tools_multiplier_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab4 + "'/><input type='hidden' name='tools_price[]' value='0' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='tools_price_" + count + "' class='common_price tools_price_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab6 + "'/> <td> <input type='text' name='tools_qty_price[]' value='0' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='tools_qty_price_" + count + "' class='tools_qty_price form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab7 + "' readonly/></td> <td><button tabindex='" + tab5 + "' style='text-align: center;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-minus-circle'></i></button></td>",
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

function addProductField(t) {
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
        e.innerHTML = "<td><input type='text' autocomplete='off' name='product_name' onkeypress='invoice_PrList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td> <td><input class='form-control text-right common_name stock_" + count + " valid' name='stock[]' value='0.00' readonly='' aria-invalid='false' type='text'></td> <td><input class='form-control text-right common_name unit_" + count + " valid' name='unit[]' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right qty'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td> <input type='text' name='qty_price[]' value='0.00' required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='qty_price_" + count + "' class='qty_price form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/><input type='hidden' name='rate[]'  required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='rate_" + count + "' class='rate_" + count + " form-control text-right'  placeholder='0.00' min='0' value='0.00' tabindex='" + tab3 + "'/></td><td><button tabindex='" + tab5 + "' style='text-align: center;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-minus-circle'></i></button></td>",
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
function addProductField_transfer(t) {
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
        e.innerHTML = "<td><input type='text' autocomplete='off' name='product_name' onkeypress='invoice_productList_transfer(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td> <td><input class='form-control text-right common_name stock_" + count + " valid' name='stock[]' value='0.00' readonly='' aria-invalid='false' type='text'></td> <td><input class='form-control text-right common_name unit_" + count + " valid' name='unit[]' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right qty'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td><button tabindex='" + tab5 + "' style='text-align: center;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-minus-circle'></i></button></td>",
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
function addProductField_rcv(t) {
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
        e.innerHTML = "<td><input type='text' autocomplete='off' name='product_name' onkeypress='invoice_productList_rcv(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td> <td><input class='form-control text-right common_name stock_" + count + " valid' name='stock[]' value='0.00' readonly='' aria-invalid='false' type='text'></td> <td><input class='form-control text-right common_name unit_" + count + " valid' name='unit[]' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right qty'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td> <input type='text' name='rcv_qty[]' value='0.00' required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='rcv_qty" + count + "' class='rcv_qty form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/><input type='hidden' name='rate[]'  required='required' onkeyup='quantity_calculate_p(" + count + ");' onchange='quantity_calculate_p(" + count + ");' id='rate_" + count + "' class='rate_" + count + " form-control text-right'  placeholder='0.00' min='0' value='0.00' tabindex='" + tab3 + "'/></td><td><button tabindex='" + tab5 + "' style='text-align: center;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-minus-circle'></i></button></td>",
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
//Quantity calculat
"use strict";
function quantity_calculate(item) {
    var gr_tot = 0;
    //var additional_charge = 0;
    //var labour_charge = 0;

    var quantity = $("#total_qntt_" + item).val();
    var available_quantity = $(".available_quantity_" + item).val();
    var multiplier = $(".multiplier_" + item).val();

    var price =  $(".price_" + item).val();
    var price_item = $("#price_item_" + item).val();
    var invoice_discount = $("#invoice_discount").val();
    var warrenty_date=$("#warrenty_date_"+item).val();
    var warehouse=$(".warehouse_"+item).val();
    var discount = $("#discount_" + item).val();
    var total_tax = $("#total_tax_" + item).val();
    var total_discount = $("#total_discount_" + item).val();
    var taxnumber = $("#txfieldnum").val();
    var dis_type = $("#discount_type_" + item).val();


    var total_rate = price / multiplier;
    $("#total_rate_"+item).val(total_rate.toFixed(2,2));
    var qty_price = total_rate * quantity;
    $("#qty_price_"+item).val(qty_price.toFixed(2,2));

    var tools_price = $(".tools_price_" + item).val();
    var tools_qty = $(".tools_total_qntt_" + item).val();
    var tools_mul = $(".tools_multiplier_" + item).val();
    var tools_all_total = 0;

    var tools_total_rate = (tools_price / tools_mul) * tools_qty;

    $("#tools_qty_price_" + item).val(tools_total_rate.toFixed(2, 2));

    $(".tools_qty_price").each(function () {
        isNaN(this.value) || 0 == this.value.length || (tools_all_total += parseFloat(this.value))
    });

    $("#tools_Total").val(tools_all_total.toFixed(2,2))

    $(".qty_price").each(function() {
        isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
    });
   // console.log(gr_tot)

    $("#Total").val(gr_tot.toFixed(2,2));

   var additional_charge= parseFloat($("#ad_charge").val());
   var labour_charge= parseFloat($("#labour_charge").val());



    var grandtotal = gr_tot+additional_charge+labour_charge+tools_all_total;
    $("#grandTotal").val(grandtotal.toFixed(2,2));
    //console.log(gr_tot)
    //console.log(additional_charge)
    //console.log(labour_charge)
    //
    //console.log(grandtotal)
 //   console.log(grandtotal)


  //  calculateSum();
   // invoice_paidamount();
}


function quantity_calculate_p(item) {
    var gr_tot = 0;
    var quantity = parseFloat($("#total_qntt_" + item).val());
    var qty = parseFloat($("#quantity_" + item).val());
  //  debugger
    //alert(quantity)
   // var available_quantity = $(".available_quantity_" + item).val();

    if (quantity > qty){
        toastr.error("You can't receive more than "+qty+" quantity !")
        $("#total_qntt_" + item).val(qty);
        return
    }


    var price =  $("#rate_" + item).val();

    var qty_price = price * quantity;

    $("#qty_price_"+item).val(qty_price.toFixed(2));

    $(".qty_price").each(function() {
        isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value) )
    });

    $("#grandTotal").val(gr_tot.toFixed(2,2));

  //  calculateSum();
   // invoice_paidamount();
}
//Calculate Sum
"use strict";
function calculateSum() {
    var taxnumber = $("#txfieldnum").val();
    var t = 0,
        a = 0,
        e = 0,
        o = 0,
        p = 0,
        f = 0,
        ad = 0,
        tx = 0,
        ds = 0,
        s_cost =  $("#shipping_cost").val();

    //Total Tax
    for(var i=0;i<taxnumber;i++){

        var j = 0;
        $(".total_tax"+i).each(function () {
            isNaN(this.value) || 0 == this.value.length || (j += parseFloat(this.value))
        });
        $("#total_tax_ammount"+i).val(j.toFixed(2, 2));

    }
    //Total Discount
    $(".total_discount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (p += parseFloat(this.value))
    }),
        $("#total_discount_ammount").val(p.toFixed(2, 2)),

        $(".totalTax").each(function () {
            isNaN(this.value) || 0 == this.value.length || (f += parseFloat(this.value))
        }),
        $("#total_tax_amount").val(f.toFixed(2, 2)),

        //Total Price
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value))
        }),

        $(".dppr").each(function () {
            isNaN(this.value) || 0 == this.value.length || (ad += parseFloat(this.value))
        }),

        o = a.toFixed(2, 2),
        e = t.toFixed(2, 2),
        tx = f.toFixed(2, 2),
        ds = p.toFixed(2, 2);

    var test = +tx + +s_cost + +e + -ds + + ad;
    $("#grandTotal").val(test.toFixed(2, 2));


    var gt = $("#grandTotal").val();
    var invdis = $("#invoice_discount").val();
    var total_discount_ammount = $("#total_discount_ammount").val();
    var ttl_discount = +total_discount_ammount;
    $("#total_discount_ammount").val(ttl_discount.toFixed(2, 2));
    var grnt_totals = gt;
    invoice_paidamount();
    $("#grandTotal").val(grnt_totals);


}

//Invoice Paid Amount
"use strict";
function invoice_paidamount() {
    var  prb = parseFloat($("#previous").val(), 10);
    var pr = 0;
    var d = 0;
    var nt = 0;
    if(prb != 0){
        pr =  prb;
    }else{
        pr = 0;
    }
    var t = $("#grandTotal").val(),
        a = $("#paidAmount").val(),
        e = t - a,
        f = e + pr,
        nt = parseFloat(t, 10) + pr;
    d = a - nt;
    $("#n_total").val(nt.toFixed(2, 2));
    if(f > 0){
        $("#dueAmmount").val(f.toFixed(2,2));
        if(a <= f){
            $("#change").val(0);
        }
    }else{
        if(a < f){
            $("#change").val(0);
        }
        if(a > f){
            $("#change").val(d.toFixed(2,2))
        }
        $("#dueAmmount").val(0)

    }
}

//Stock Limit
"use strict";
function stockLimit(t) {
    var a = $("#total_qntt_" + t).val(),
        e = $(".product_id_" + t).val(),
        o = $(".baseUrl").val();

    $.ajax({
        type: "POST",
        url: o + "Cinvoice/product_stock_check",
        data: {
            product_id: e
        },
        cache: !1,
        success: function (e) {
            alert(e);
            if (a > Number(e)) {
                var o = "You can Sale maximum " + e + " Items";
                alert(o), $("#qty_item_" + t).val("0"), $("#total_qntt_" + t).val("0"), $("#total_price_" + t).val("0")
            }
        }
    })
}


"use strict";
function stockLimitAjax(t) {
    var a = $("#total_qntt_" + t).val(),
        e = $(".product_id_" + t).val(),
        o = $(".baseUrl").val();

    $.ajax({
        type: "POST",
        url: o + "Cinvoice/product_stock_check",
        data: {
            product_id: e
        },
        cache: !1,
        success: function (e) {
            alert(e);
            if (a > Number(e)) {
                var o = "You can Sale maximum " + e + " Items";
                alert(o), $("#qty_item_" + t).val("0"), $("#total_qntt_" + t).val("0"), $("#total_price_" + t).val("0.00"), calculateSum()
            }
        }
    })
}

//Invoice full paid
"use strict";
function full_paid() {
    var grandTotal = $("#n_total").val();
    $("#paidAmount").val(grandTotal);
    invoice_paidamount();
    calculateSum();
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
            quantity_calculate_p(1)
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


        quantity_calculate_p(1)

    }
}
var count = 2,
    limits = 500;



"use strict";
function bank_info_show(payment_type)
{
    if (payment_type.value == "1") {
        document.getElementById("bank_info_hide").style.display = "none";
    } else {
        document.getElementById("bank_info_hide").style.display = "block";
    }
}

"use strict";
function active_customer(status)
{
    if (status == "payment_from_2") {
        document.getElementById("payment_from_2").style.display = "none";
        document.getElementById("payment_from_1").style.display = "block";
        document.getElementById("myRadioButton_2").checked = false;
        document.getElementById("myRadioButton_1").checked = true;
    } else {
        document.getElementById("payment_from_1").style.display = "none";
        document.getElementById("payment_from_2").style.display = "block";
        document.getElementById("myRadioButton_2").checked = false;
        document.getElementById("myRadioButton_1").checked = true;
    }
}


window.onload = function () {
    $('body').addClass("sidebar-mini sidebar-collapse");
}

"use strict";
function bank_paymet(val){

    if (val==2 || 3){

        if(val==2){
            var style = 'block';
            document.getElementById('bank_id').setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('bank_id').removeAttribute("required");
        }

        document.getElementById('bank_div').style.display = style;

        if(val==3){
            var style = 'block';
            document.getElementById('bkash_id').setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('bkash_id').removeAttribute("required");
        }

        document.getElementById('bkash_div').style.display = style;



    }



}

"use strict";
function  delivery_type(val){


    if(val==2){
        var style = 'block';
        document.getElementById('courier_div').setAttribute("required", true);
    }else{
        var style ='none';
        document.getElementById('courier_div').removeAttribute("required");
    }

    document.getElementById('courier_div').style.display = style;


}

$(document ).ready(function() {
    $('#normalinvoice .toggle').on('click', function() {
        $('#normalinvoice .hideableRow').toggleClass('hiddenRow');
    })
});

"use strict";
function customer_due(id){
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + 'Cinvoice/previous',
        type: 'post',
        data: {customer_id:id,csrf_test_name:csrf_test_name},
        success: function (msg){

            $("#previous").val(msg);

            console.log(msg);
        },
        error: function (xhr, desc, err){
            alert('failed');
        }
    });
}

$('.ac').click(function () {
    $('.customer_hidden_value').val('');
});
$('#myRadioButton_1').click(function () {
    $('#customer_name').val('');
});

$('#myRadioButton_2').click(function () {
    $('#customer_name_others').val('');
});
$('#myRadioButton_2').click(function () {
    $('#customer_name_others_address').val('');
});


"use strict";
function customer_autocomplete(sl) {

    var customer_id = $('#customer_id').val();
    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var customer_name = $('#customer_name').val();
            var csrf_test_name = $('[name="csrf_test_name"]').val();
            var base_url = $("#base_url").val();

            $.ajax( {
                url: base_url + "Cinvoice/customer_autocomplete",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    customer_id:customer_name,
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
            $(this).parent().parent().find("#autocomplete_customer_id").val(ui.item.value);
            var customer_id          = ui.item.value;
            customer_due(customer_id);

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '#customer_name', function() {
        $(this).autocomplete(options);
    });

}

"use strict";
function cancelprint(){
    window.location.href = "Cinvoice/manage_invoice";
}

$(document).ready(function(){

    $('#full_paid_tab').keydown(function(event) {
        if(event.keyCode == 13) {
            $('#add_invoice').trigger('click');
        }
    });
});



//  $(document).ready(function() {
// "use strict";
//var frm = $("#insert_sale");
// var output = $("#output");
// frm.on('submit', function(e) {
//      e.preventDefault();
//            $.ajax({
//         url : $(this).attr('action'),
//         method : $(this).attr('method'),
//         dataType : 'json',
//         data : frm.serialize(),
//         success: function(data)
//         {
//
//             if (data.status == true) {
//                 output.empty().html(data.message).addClass('alert-success').removeClass('alert-danger').removeClass('hide');
//
//                 $("#inv_id").val(data.invoice_id);
//               $('#printconfirmodal').modal('show');
//                if(data.status == true && event.keyCode == 13) {
//     }
//             } else {
//                 output.empty().html(data.exception).addClass('alert-danger').removeClass('alert-success').removeClass('hide');
//             }
//         },
//         error: function(xhr)
//         {
//             alert('aa!');
//         }
//     });
// });
//  });
$("#printconfirmodal").on('keydown', function ( e ) {
    var key = e.which || e.keyCode;
    if (key == 13) {
        $('#yes').trigger('click');
    }
});


"use strict";
function invoice_productList(sl) {

    var priceClass = 'price_item'+sl;
    var available_quantity = 'stock_'+sl;
    var unit = 'unit_'+sl;


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
                    pr_status: 1,
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


            //$.ajax
            //   ({
            //        type: "POST",
            //        url: base_url+"Cproduction/retrieve_product_data_inv",
            //        data: {product_id:id,csrf_test_name:csrf_test_name},
            //        cache: false,
            //        success: function(data)
            //        {
            //            var obj = jQuery.parseJSON(data);
            //            for (var i = 0; i < (obj.txnmber); i++) {
            //            var txam = obj.taxdta[i];
            //            var txclass = 'total_tax'+i+'_'+sl;
            //           $('.'+txclass).val(obj.taxdta[i]);
            //            }
            //            $('.'+priceClass).val(obj.price);
            //            $('.'+available_quantity).val(obj.total_product.toFixed(2,2));
            //            $('.'+unit).val(obj.unit);
            //            $('.'+warrenty_date).val(obj.warrenty_date);
            //            $('.'+expiry_date).val(obj.expired_date);
            //            $('#'+warehouse).html(obj.warehouse);
            //            $('.'+tax).val(obj.tax);
            //            $('#txfieldnum').val(obj.txnmber);
            //            $('#'+serial_no).html(obj.serial);
            //            $('#'+discount_type).val(obj.discount_type);
            //                   quantity_calculate(sl);
            //
            //        }
            //    });

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '.productSelection', function() {
        $(this).autocomplete(options);
    });

}



function invoice_PrList(sl) {

    var priceClass = 'price_item'+sl;
    var available_quantity = 'stock_'+sl;
    var unit = 'unit_'+sl;
    var multiplier = 'multiplier_'+sl;
    var price = 'rate_'+sl;
    var qty_price = 'qty_price_'+sl;
    var tax = 'total_tax_'+sl;
    var serial_no = 'serial_no_'+sl;
    var warehouse = 'warehouse_'+sl;
    var warrenty_date='warrenty_date_'+sl;
    var expiry_date='expiry_date_'+sl;
    var discount_type = 'discount_type_'+sl;
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
                    pr_status: 1,
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
            var mat_div = $("#material_div");
            var tool_div = $("#tools_div");

            var all_pr_id = $("input[name='product_id[]']").map(function() {
                return $(this).val();
            }).get();


            $.ajax
            ({
                type: "POST",
                url: base_url+"Cproduction/retrieve_product_data_production",
                data: {
                    all_pr_id: JSON.stringify(all_pr_id),
                    product_id: id,
                    csrf_test_name: csrf_test_name
                },
                cache: false,
                success: function(data)
                {
                    var obj = jQuery.parseJSON(data);

                    // console.log(obj.product_info.price);
                    $('#'+priceClass).val(obj.product_info.price);
                    $('.'+available_quantity).val(obj.product_info.total_product.toFixed(2,2));
                    $('.'+multiplier).val(obj.product_info.total_product.toFixed(2,2));
                    $('#'+price).val(obj.product_info.price);
                    $('#'+qty_price).val(obj.product_info.price);
                    $('.'+unit).val(obj.product_info.unit);
                    $('.'+tax).val(obj.product_info.tax);

                    mat_div.html(obj.raw_html);
                    tool_div.html(obj.tool_html);

                    quantity_calculate_p(sl);

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
function invoice_productList_transfer(sl) {

    var priceClass = 'price_item'+sl;
    var available_quantity = 'stock_'+sl;
    var unit = 'unit_'+sl;
    var multiplier = 'multiplier_'+sl;
    var price = 'rate_'+sl;
    var qty_price = 'qty_price_t_'+sl;
    var tax = 'total_tax_'+sl;
    var serial_no = 'serial_no_'+sl;
    var warehouse = 'warehouse_'+sl;
    var warrenty_date='warrenty_date_'+sl;
    var expiry_date='expiry_date_'+sl;
    var discount_type = 'discount_type_'+sl;
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();

    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var product_name = $('#product_name_'+sl).val();
            $.ajax( {
                url: base_url + "Cproduction/autocompleteproductsearchtransfer",
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
            var mat_div = $("#material_div");
            var tool_div = $("#tools_div");

            var all_pr_id = $("input[name='product_id[]']").map(function() {
                return $(this).val();
            }).get();


            $.ajax
            ({
                type: "POST",
                url: base_url+"Cproduction/retrieve_product_data_production_transfer",
                data: {

                    product_id: id,
                    csrf_test_name: csrf_test_name
                },
                cache: false,
                success: function(data)
                {
                    var obj = jQuery.parseJSON(data);

                     console.log(obj);


                    $('.'+available_quantity).val(obj.stock);
                    //$('#'+qty_price).val(obj.price);
                    $('.'+unit).val(obj.unit);


                    quantity_calculate_p(sl);

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
function invoice_productList_rcv(sl) {

    var priceClass = 'price_item'+sl;
    var available_quantity = 'stock_'+sl;
    var qty = 'qty_'+sl;
    var unit = 'unit_'+sl;
    var multiplier = 'multiplier_'+sl;
    var price = 'rate_'+sl;
    var qty_price = 'qty_price_'+sl;
    var tax = 'total_tax_'+sl;
    var serial_no = 'serial_no_'+sl;
    var warehouse = 'warehouse_'+sl;
    var warrenty_date='warrenty_date_'+sl;
    var expiry_date='expiry_date_'+sl;
    var discount_type = 'discount_type_'+sl;
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();

    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var product_name = $('#product_name_'+sl).val();
            $.ajax( {
                url: base_url + "Cproduction/autocompleteproductsearch",
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
            var mat_div = $("#material_div");
            var tool_div = $("#tools_div");

            var all_pr_id = $("input[name='product_id[]']").map(function() {
                return $(this).val();
            }).get();


            $.ajax
            ({
                type: "POST",
                url: base_url+"Cproduction/retrieve_product_data_production_transfer",
                data: {

                    product_id: id,
                    csrf_test_name: csrf_test_name
                },
                cache: false,
                success: function(data)
                {
                    var obj = jQuery.parseJSON(data);

                  //   console.log(obj);


                    $('.'+available_quantity).val(obj.stock);
                 //   $('#'+qty_price).val(obj.price);
                    $('.'+unit).val(obj.unit);
                    $('.'+qty).val(obj.quantity);


                    quantity_calculate_p(sl);

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

function invoice_itemList(sl) {

    var priceClass = 'price_item'+sl;
    var available_quantity = 'stock_'+sl;
    var unit = 'unit_'+sl;
    var multiplier = 'multiplier_'+sl;
    var price = 'price_'+sl;
    var tax = 'total_tax_'+sl;
    var serial_no = 'serial_no_'+sl;
    var warehouse = 'warehouse_'+sl;
    var warrenty_date='warrenty_date_'+sl;
    var expiry_date='expiry_date_'+sl;
    var discount_type = 'discount_type_'+sl;
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();

    // Auto complete for production mix
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var product_name = $('#item_name_'+sl).val();
            $.ajax( {
                url: base_url + "Cinvoice/autocompleteproductsearch",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    product_name: product_name,
                    pr_status: 2,
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
            $(this).parent().parent().find(".autocomplete_item_value").val(ui.item.value);
            $(this).val(ui.item.label);
            var id=ui.item.value;
            var dataString = 'item_id='+ id;
            var base_url = $('.baseUrl').val();


            $.ajax
            ({
                type: "POST",
                url: base_url+"Cproduction/retrieve_product_data_inv",
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
                    $('.'+priceClass).val(obj.price);
                    $('.'+available_quantity).val(obj.total_product.toFixed(2,2));
                    $('.'+unit).val(obj.trans_unit);
                    $('.'+multiplier).val(obj.multiplier);
                    $('.'+price).val(obj.price);
                    $('.'+warrenty_date).val(obj.warrenty_date);
                    $('.'+expiry_date).val(obj.expired_date);
                    $('#'+warehouse).html(obj.warehouse);
                    $('.'+tax).val(obj.tax);
                    $('#txfieldnum').val(obj.txnmber);
                    $('#'+serial_no).html(obj.serial);
                    $('#'+discount_type).val(obj.discount_type);
                    quantity_calculate(sl);

                }
            });

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '.itemSelection', function() {
        $(this).autocomplete(options);
    });

}

function invoice_toolsList(sl) {

    var priceClass = 'price_tools'+sl;
    var available_quantity = 'tools_stock_'+sl;
    var unit = 'tools_unit_'+sl;
    var multiplier = 'tools_multiplier_'+sl;
    var price = 'tools_price_'+sl;
    // var tax = 'total_tax_'+sl;
    // var serial_no = 'serial_no_'+sl;
    // var warehouse = 'warehouse_'+sl;
    // var warrenty_date='warrenty_date_'+sl;
    // var expiry_date='expiry_date_'+sl;
    // var discount_type = 'discount_type_'+sl;
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();

    // Auto complete for production mix
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var product_name = $('#tools_name_'+sl).val();
            $.ajax( {
                url: base_url + "Cinvoice/autocompleteproductsearch",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    product_name: product_name,
                    pr_status: 3,
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
            $(this).parent().parent().find(".autocomplete_tools_value").val(ui.item.value);
            $(this).val(ui.item.label);
            var id=ui.item.value;
            var dataString = 'item_id='+ id;
            var base_url = $('.baseUrl').val();


            $.ajax
            ({
                type: "POST",
                url: base_url+"Cproduction/retrieve_product_data_inv",
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
                    $('.'+priceClass).val(obj.price);
                    $('.'+available_quantity).val(obj.total_product.toFixed(2,2));
                    $('.'+unit).val(obj.trans_unit);
                    $('.'+multiplier).val(obj.multiplier);
                    $('.'+price).val(obj.price);
                    // $('.'+warrenty_date).val(obj.warrenty_date);
                    // $('.'+expiry_date).val(obj.expired_date);
                    // $('#'+warehouse).html(obj.warehouse);
                    // $('.'+tax).val(obj.tax);
                    // $('#txfieldnum').val(obj.txnmber);
                    // $('#'+serial_no).html(obj.serial);
                    // $('#'+discount_type).val(obj.discount_type);
                    quantity_calculate(sl);

                }
            });

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '.itemSelection', function() {
        $(this).autocomplete(options);
    });

}

$( document ).ready(function() {
    "use strict";
    var paytype = $("#editpayment_type").val();
    if(paytype == 2){
        $("#bank_div").css("display", "block");
    }else{
        $("#bank_div").css("display", "none");
    }

    $(".bankpayment").css("width", "100%");
});


$(document).ready(function() {
    "use strict";
    $("#newcustomer").submit(function(e){
        e.preventDefault();
        var customeMessage   = $("#customeMessage");
        var customer_id      = $("#autocomplete_customer_id");
        var customer_name    = $("#customer_name");
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function()
            {
                customeMessage.removeClass('hide');

            },
            success: function(data)
            {
                if (data.status == true) {
                    customeMessage.addClass('alert-success').removeClass('alert-danger').html(data.message);
                    customer_id.val(data.customer_id);
                    customer_name.val(data.customer_name);
                    $("#cust_info").modal('hide');
                } else {
                    customeMessage.addClass('alert-danger').removeClass('alert-success').html(data.error_message);
                }
            },
            error: function(xhr)
            {
                alert('failed!');
            }

        });

    });
});

function add_exp_row(e) {
    var sl = $("#exp_sl").val();
    var exp_list = $("#exp_list").val();
    var banks = $("#bank_select").val();

    var html = "";

    html += '<tr>' +
        ' <td>1</td>' +
        ' <td>' +
        '    <select class="form-control" name="expense_head[]" id="expense_head_' + sl + '">' +
        exp_list +

        '   </select>' +
        ' </td>' +
        ' <td><input type="text" class="form-control expense" name="exp_amount[]" onkeyup="exp_amount_calc(this)" onchange="exp_amount_calc()" autocomplete="off"></td>' +
        '  <td>' +
        '     <select name="exp_payment[]" onchange="exp_pay_changed(this, ' + sl + ')" class="form-control">' +
        '         <option value="1">Cash</option>' +
        '         <option value="2">Bank</option>' +
        '         <option value="3">TT (Cash)</option>' +
        '         <option value="4">TT (Bank)</option>' +
        '     </select>' +
        '<div id="exp_bank_div_' + sl + '" class="margin-top10" style="display: none;">' +
        ' <label for="exp_banks_' + sl + '" class="col-form-label">Bank: </label>' +
        ' <select id="exp_banks_' + sl + '" class="form-control" name="exp_bank_id[]">' +
        banks +
        ' </select>' +

        ' </div> ' +
        '  </td>' +
        '  <td>' +
        '     <button type="button" class="btn btn-sm btn-danger" id="delete_btn_' + sl + '" onclick="delete_exp_row(this)">' +
        '         <i class="fa fa-trash"></i>' +
        '     </button>' +
        '  </td>' +
        '</tr>';

    $("#exp_table > tbody").append(html);

    $("select.form-control:not(.dont-select-me)").select2({
        placeholder: "Select option",
        allowClear: true
    })

    sl++;

    $("#exp_sl").val(sl);

}

function delete_exp_row(e) {
    e.closest('tr').remove();
}

function exp_pay_changed(e, sl) {
    // console.log(sl);
    var val = e.value;

    if (val == 2 || val == 4) {
        $("#exp_bank_div_" + sl).css('display', 'block');
    } else {
        $("#exp_bank_div_" + sl).css('display', 'none');
    }
}
function exp_amount_calc() {

    var pr_tot = parseFloat($("#Total").val());

    var tot = 0;
    var total_qty = 0;

    $('.qty').each(function() {
        isNaN(this.value) || 0 == this.value.length || (total_qty += parseFloat(this.value))
    })

    $('.expense').each(function() {
        isNaN(this.value) || 0 == this.value.length || (tot += parseFloat(this.value))
    });

    $("#total_expense").val(tot.toFixed(2, 2));

    var per_item_add = (tot + pr_tot) / total_qty;

    $("#per_item_extra_cost").val(per_item_add.toFixed(2, 2))
}
