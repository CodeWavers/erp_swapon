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
        e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td>" +
        "<td><input type='text' id='stock_" + count + "' class='form-control' value='' readonly></td>"+
            " <td><input type='hidden' name='available_quantity[]' id='' class='form-control text-right common_avail_qnt available_quantity_" + count + "' value='0' readonly='readonly' /><input class='form-control text-right common_name unit_" + count + " valid' value='None' readonly='' aria-invalid='false' type='text'></td>" +
            "<td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/>" +
            "</td><td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  warrenty_date_" + count + "' name='warrenty_date[]' value=''/></td>" +
            "<td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  expiry_date_" + count + "' name='expiry_date[]' value=''/></td>" +
            "<td><input type='text' name='product_rate[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='price_item_" + count + "' class='common_rate price_item" + count + " form-control text-right' required placeholder='0.00' min='0'  tabindex='" + tab4 + "'/></td>" +
            "<td class='text-center'><input type='text' name='discount[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='discount_" + count + "'style='width:120px;display:inline-block' class='form-control text-right common_discount' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='text' style='width:120px;' name='comm[]' onkeyup='quantity_calculate(" + count + ");' onchange='quantity_calculate(" + count + ");' id='comm_" + count + "' class='form-control text-right comm_th d-none  p-5' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='hidden' value='' name='discount_type' id='discount_type_" + count + "'></td>" +
            "<td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" + count + "' value='0.00' readonly='readonly'/></td>" +
            "<td>" + tbfild + "<input type='hidden' id='all_discount_" + count + "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab5 + "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
        document.getElementById(t).appendChild(e),
        document.getElementById(a).focus(),
        document.getElementById("add_invoice_item").setAttribute("tabindex", tab6);
        document.getElementById("details").setAttribute("tabindex", tab7);
        document.getElementById("invoice_discount").setAttribute("tabindex", tab8);
        document.getElementById("shipping_cost").setAttribute("tabindex", tab9);
        document.getElementById("paidAmount").setAttribute("tabindex", tab10);
        // document.getElementById("full_paid_tab").setAttribute("tabindex", tab11);
        document.getElementById("add_invoice").setAttribute("tabindex", tab12);
        var commision_type=$('#commission_type').val()

        if (commision_type==1 ) {
            $('.comm_th').removeClass('d-none')
            $('.comm_th').addClass('d-inline')

        }

        if (commision_type==2 ) {
            $('.comm_th').removeClass('d-inline')
            $('.comm_th').addClass('d-none')
        }

        count++
    }
}
function addInputField_pre(t) {

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
        e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList_pre(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='product_id[]' id='SchoolHiddenId'/></td>" +
        "<td><input type='text' id='stock_" + count + "' class='form-control' value='' readonly></td>"+
            " <td><input type='hidden' name='available_quantity[]' id='' class='form-control text-right common_avail_qnt available_quantity_" + count + "' value='0' readonly='readonly' /><input class='form-control text-right common_name unit_" + count + " valid' value='None' readonly='' aria-invalid='false' type='text'></td>" +
            "<td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='quantity_calculate_pre(" + count + ");' onchange='quantity_calculate_pre(" + count + ");' id='total_qntt_" + count + "' class='common_qnt total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/>" +
            "</td><td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  warrenty_date_" + count + "' name='warrenty_date[]' value=''/></td>" +
            "<td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  expiry_date_" + count + "' name='expiry_date[]' value=''/></td>" +
            "<td><input type='text' name='product_rate[]' onkeyup='quantity_calculate_pre(" + count + ");' onchange='quantity_calculate_pre(" + count + ");' id='price_item_" + count + "' class='common_rate price_item" + count + " form-control text-right' required placeholder='0.00' min='0'  tabindex='" + tab4 + "'/></td>" +
            "<td class='text-center'><input type='text' name='discount[]' onkeyup='quantity_calculate_pre(" + count + ");' onchange='quantity_calculate_pre(" + count + ");' id='discount_" + count + "'style='width:120px;display:inline-block' class='form-control text-right common_discount' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='text' style='width:120px;' name='comm[]' onkeyup='quantity_calculate_pre(" + count + ");' onchange='quantity_calculate_pre(" + count + ");' id='comm_" + count + "' class='form-control text-right comm_th d-none  p-5' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='hidden' value='' name='discount_type' id='discount_type_" + count + "'></td>" +
            "<td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" + count + "' value='0.00' readonly='readonly'/></td>" +
            "<td>" + tbfild + "<input type='hidden' id='all_discount_" + count + "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab5 + "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
        document.getElementById(t).appendChild(e),
        document.getElementById(a).focus(),
        document.getElementById("add_invoice_item").setAttribute("tabindex", tab6);
        document.getElementById("details").setAttribute("tabindex", tab7);
        document.getElementById("invoice_discount").setAttribute("tabindex", tab8);
        document.getElementById("shipping_cost").setAttribute("tabindex", tab9);
        document.getElementById("paidAmount").setAttribute("tabindex", tab10);
        // document.getElementById("full_paid_tab").setAttribute("tabindex", tab11);
        document.getElementById("add_invoice").setAttribute("tabindex", tab12);
        var commision_type=$('#commission_type').val()

        if (commision_type==1 ) {
            $('.comm_th').removeClass('d-none')
            $('.comm_th').addClass('d-inline')

        }

        if (commision_type==2 ) {
            $('.comm_th').removeClass('d-inline')
            $('.comm_th').addClass('d-none')
        }

        count++
    }
}
//Quantity calculat
"use strict";
function quantity_calculate(item) {
    var quantity = $("#total_qntt_" + item).val();
    var available_quantity = $(".available_quantity_" + item).val();
    var price_item = $("#price_item_" + item).val();
    var invoice_discount = $("#invoice_discount").val();
    var warrenty_date=$("#warrenty_date_"+item).val();
    var warehouse=$(".warehouse_"+item).val();
    var discount = $("#discount_" + item).val();
    var total_tax = $("#total_tax_" + item).val();
    var total_discount = $("#total_discount_" + item).val();
    var comm_item = $("#comm_" + item).val();
    var taxnumber = $("#txfieldnum").val();
    var dis_type = $("#discount_type_" + item).val();
    if (parseInt(quantity) > parseInt(available_quantity)) {
        var message = "You can Sale maximum " + available_quantity + " Items";
        alert(message);
        $("#total_qntt_" + item).val('');
        var quantity = 0;
        $("#total_price_" + item).val(0);
        for(var i=0;i<taxnumber;i++){
            $("#all_tax"+i+"_" + item).val(0);
            quantity_calculate(item);
        }
    }

   // alert(comm_item)

    if (comm_item != ''){
        var comm_item=0;
    }

    var just_tot = quantity * price_item;
    var row_tot = ((just_tot) - ((just_tot) * (discount / 100))+((just_tot) * (comm_item / 100)));

    $("#total_price_" + item).val(row_tot.toFixed(2, 2));

    calculateSum();
    invoice_paidamount();
}
function quantity_calculate_pre(item) {
    var quantity = $("#total_qntt_" + item).val();
    var available_quantity = $(".available_quantity_" + item).val();
    var price_item = $("#price_item_" + item).val();
    var invoice_discount = $("#invoice_discount").val();
    var warrenty_date=$("#warrenty_date_"+item).val();
    var warehouse=$(".warehouse_"+item).val();
    var discount = $("#discount_" + item).val();
    var total_tax = $("#total_tax_" + item).val();
    var total_discount = $("#total_discount_" + item).val();
    var comm_item = $("#comm_" + item).val();
    var taxnumber = $("#txfieldnum").val();
    var dis_type = $("#discount_type_" + item).val();


   // alert(comm_item)

    if (comm_item != ''){
        var comm_item=0;
    }

    var just_tot = quantity * price_item;
    var row_tot = ((just_tot) - ((just_tot) * (discount / 100))+((just_tot) * (comm_item / 100)));

    $("#total_price_" + item).val(row_tot.toFixed(2, 2));

    calculateSum();
    invoice_paidamount();
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

        s_cost =  $("#shipping_cost").val(),
        c_cost =  $("#condition_cost").val(),
        commission =  $("#commission").val();

   // alert(s_cost);


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

    var test = +tx + +s_cost + +e + -ds + + ad + + c_cost  - commission;
    var test2 = +tx + +s_cost + +e + -ds + + ad ;

    if(c_cost == undefined || commission ==undefined){
        $("#grandTotal").val(test2.toFixed(2, 2));
    }else {
        $("#grandTotal").val(test.toFixed(2, 2));
    }

    var gt = $("#grandTotal").val();
    var invdis = $("#invoice_discount").val();
    var total_discount_ammount = $("#total_discount_ammount").val();
    var ttl_discount = +total_discount_ammount;
    //var ttl_cms = +commission;
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

"use strict"
function calc_paid(){
    var pt = 0;
    $(".p_amount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (pt += parseFloat(this.value))
    });

    $("#paidAmount").val(pt);
    invoice_paidamount();
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
function bank_paymet(val, sl){

    if (val==2 || 3 || 4 || 5 || 6){

        if(val==2){
            var style = 'block';
            document.getElementById('bank_id_'+sl).setAttribute("required", true);
            document.getElementById('ammnt_' + sl).style.display = 'none';
        }else{
            var style ='none';
            document.getElementById('bank_id_' + sl).removeAttribute("required");
            document.getElementById('ammnt_' + sl).style.display = 'block';
        }

        document.getElementById('bank_div_' + sl).style.display = style;

        if(val==3){
            var style = 'block';
            document.getElementById('bkash_id_' + sl).setAttribute("required", true);

        }else{
            var style ='none';
            document.getElementById('bkash_id_'+sl).removeAttribute("required");

        }

        document.getElementById('bkash_div_'+sl).style.display = style;


        if(val==4){
            var style = 'block';
            document.getElementById('bank_id_m_'+sl).setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('bank_id_m_'+sl).removeAttribute("required");
        }

        document.getElementById('bank_div_m_'+sl).style.display = style;

        if(val==5){
            var style = 'block';
            document.getElementById('nagad_id_'+sl).setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('nagad_id_'+sl).removeAttribute("required");
        }

        document.getElementById('nagad_div_'+sl).style.display = style;

        if(val==6){
            var style = 'block';
            document.getElementById('card_id_'+sl).setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('card_id_'+sl).removeAttribute("required");
        }

        document.getElementById('card_div_'+sl).style.display = style;


    }



}

"use strict";
function  delivery_type(val){


        if (val == 2) {
            var style = 'block';
            document.getElementById('courier_div').setAttribute("required", true);
        } else {
            var style = 'none';
            document.getElementById('courier_div').removeAttribute("required");
        }

        document.getElementById('courier_div').style.display = style;



}

"use strict";

function add_customer() {

    var name=$('#customer_name').val();

    if ($.isNumeric(name) == true){
        $('#mobile').val(name);
    }else{
        $('#m_customer_name').val(name);
    }



}

function commision_add(val) {

    if (val==1 ) {
        $('.comm_th').removeClass('d-none')
        $('.comm_th').addClass('d-inline')

    }

    if (val==2 ) {
        $('#commission_tr').removeClass('d-none')
        $('.comm_th').removeClass('d-inline')
        $('.comm_th').addClass('d-none')
    }
}
function  sale_type(val){

    if (val==1 || 2 || 3) {

        if (val==1){
            $('#commission_check').removeClass('d-none')
        }else{
            $('#commission_check').addClass('d-none')
        }

        if ( val == 2 || 3){

            $('.pay_type option[value="2"]').remove();
            $('.pay_type option[value="4"]').remove();
        }

        if (val == 1){
            $('.pay_type').append($('<option/>', {
                value: 2,
                text : 'Cheque Payment'
            }));
            $('.pay_type').append($('<option/>', {
                value: 4,
                text : 'Bank Payment'
            }));

        }

    if(val==1 || 2){
        var style = 'block';
        document.getElementById('whole_sale').setAttribute("required", true);
        //document.getElementById('commission_check').setAttribute("required", true);
    }else{
        var style ='none';
        document.getElementById('whole_sale').removeAttribute("required");
        //document.getElementById('commission_check').removeAttribute("required");
    }

    document.getElementById('whole_sale').style.display = style;
    //document.getElementById('commission_check').style.display = style;

        if(val==3){
            var style = 'block';
            document.getElementById('aggregator').setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('aggregator').removeAttribute("required");
        }

        document.getElementById('aggregator').style.display = style;

    }
}
function  condition_charge(val){



    if (val==1 ) {

        $('#condition_tr').removeClass('d-none')
        $('#payment_div').addClass('d-none')
    }

    if (val==2 ) {

        $('#condition_tr').removeClass('d-none')
        $('#payment_div').removeClass('d-none')
    }

    if (val==3 ) {

        $('#condition_tr').addClass('d-none')
        $('#payment_div').removeClass('d-none')
    }



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
            var sale_type = $('#sel_type').val();


            $.ajax( {
                url: base_url + "Cinvoice/customer_autocomplete",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    customer_id:customer_name,
                    sale_type:sale_type,
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
            $(this).parent().parent().find("#autocomplete_customer_id").val(ui.item.value.id);
            $("#customer_mobile_two").val(ui.item.value.mobile);
            var customer_id          = ui.item.value.id;
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

$(document).ready(function() {
    $(window).keydown(function(e){
        if ((e.keyCode == 10 || e.keyCode == 13) && e.ctrlKey) {
            // console.log("ok");
            $("#insert_sale").submit();
        }

      if(e.keyCode == 13) {
            e.preventDefault();
            return false;
        }


    });
});



$(document).ready(function() {
    "use strict";
    var frm = $("#insert_sale");
    var output = $("#output");

    frm.on('submit', function(e) {
        e.preventDefault();
        $(".page-loader-wrapper").css('display', 'block');

    //    var formData = new FormData(this);
        $.ajax({
            url : $(this).attr('action'),
            method : $(this).attr('method'),
            // dataType : 'json',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(d)
            {
                var data = JSON.parse(d);

                // console.log(data);
                $(".page-loader-wrapper").css('display', 'none');


                if (data.status == true) {
                    output.empty().html(data.message).addClass('alert-success').removeClass('alert-danger').removeClass('hide');

                    $("#inv_id").val(data.invoice_id);
                    $('#printconfirmodal').modal('show');
                    if(data.status == true && event.keyCode == 13) {
                    }
                } else {
                    output.empty().html(data.exception).addClass('alert-danger').removeClass('alert-success').removeClass('hide');
                }
            },
            error: function(xhr)
            {
                $(".page-loader-wrapper").css('display', 'none');

                alert('failed!');
            }
        });
    });
});

$("#printconfirmodal").on('keydown', function ( e ) {
    var key = e.which || e.keyCode;
    if (key == 13) {
        $('#yes').trigger('click');
    }
});


"use strict";
function invoice_productList(sl) {

    var outlet_id = $("#outlet_name").val();

    var priceClass = 'price_item'+sl;

    var available_quantity = 'available_quantity_'+sl;
    var unit = 'unit_'+sl;
    var tax = 'total_tax_'+sl;
    var serial_no = 'serial_no_'+sl;
    var warehouse = 'warehouse_'+sl;
    var warrenty_date='warrenty_date_'+sl;
    var expiry_date='expiry_date_'+sl;
    var discount_type = 'discount_type_'+sl;
    var discount = 'discount_'+sl;
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
            var  customer_id=$('#autocomplete_customer_id').val();
            console.log(id);
            $.ajax
            ({
                type: "POST",
                url: base_url+"Cinvoice/retrieve_product_data_inv",
                data: {product_id:id,customer_id:customer_id,outlet_id: outlet_id,csrf_test_name:csrf_test_name},
                cache: false,
                success: function(data)
                {
                    var obj = jQuery.parseJSON(data);
                    for (var i = 0; i < (obj.txnmber); i++) {
                        var txam = obj.taxdta[i];
                        var txclass = 'total_tax'+i+'_'+sl;
                        $('.'+txclass).val(obj.taxdta[i]);
                    }

                    console.log(obj)
                    $('.'+priceClass).val(obj.price ? obj.price : 0.00);
                    $('.'+available_quantity).val(obj.stock);
                    $('.'+unit).val(obj.unit);
                    $('.'+warrenty_date).val(obj.warrenty_date);
                    $('.'+expiry_date).val(obj.expired_date);
                    $('#'+warehouse).html(obj.warehouse);
                    $('.'+tax).val(obj.tax);
                    $('#txfieldnum').val(obj.txnmber);
                    // $('#'+serial_no).html(obj.serial);
                    // $('#'+discount_type).val(obj.discount_type);
                    $('#' + discount).val(obj.discount);
                    $("#stock_"+sl).val(obj.stock);
                    quantity_calculate(sl);

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
function invoice_productList_pre(sl) {

    var outlet_id = $("#outlet_name").val();

    var priceClass = 'price_item'+sl;

    var available_quantity = 'available_quantity_'+sl;
    var unit = 'unit_'+sl;
    var tax = 'total_tax_'+sl;
    var serial_no = 'serial_no_'+sl;
    var warehouse = 'warehouse_'+sl;
    var warrenty_date='warrenty_date_'+sl;
    var expiry_date='expiry_date_'+sl;
    var discount_type = 'discount_type_'+sl;
    var discount = 'discount_'+sl;
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
            var  customer_id=$('#autocomplete_customer_id').val();
            console.log(id);
            $.ajax
            ({
                type: "POST",
                url: base_url+"Cinvoice/retrieve_product_data_inv",
                data: {product_id:id,customer_id:customer_id,outlet_id: outlet_id,csrf_test_name:csrf_test_name},
                cache: false,
                success: function(data)
                {
                    var obj = jQuery.parseJSON(data);
                    for (var i = 0; i < (obj.txnmber); i++) {
                        var txam = obj.taxdta[i];
                        var txclass = 'total_tax'+i+'_'+sl;
                        $('.'+txclass).val(obj.taxdta[i]);
                    }

                    console.log(obj)
                    $('.'+priceClass).val(obj.price ? obj.price : 0.00);
                    $('.'+available_quantity).val(obj.stock ? obj.stock : 0.00);
                    $('.'+unit).val(obj.unit);
                    $('.'+warrenty_date).val(obj.warrenty_date);
                    $('.'+expiry_date).val(obj.expired_date);
                    $('#'+warehouse).html(obj.warehouse);
                    $('.'+tax).val(obj.tax);
                    $('#txfieldnum').val(obj.txnmber);
                    // $('#'+serial_no).html(obj.serial);
                    // $('#'+discount_type).val(obj.discount_type);
                    $('#' + discount).val(obj.discount);
                    $("#stock_"+sl).val(obj.stock);
                    quantity_calculate_pre(sl);

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

"use strict";
function add_pay_row(sl) {
    var count = $("#count");
    sl = count.val();
    sl += 1;
    var bkash_list = $("#bkash_list").val();
    var nagad_list = $("#nagad_list").val();
    var bank_list = $("#bank_list").val();
    var card_list = $("#card_list").val();
    var pay_div = $("#pay_div");
    pay_div.append(
        '<div class="row margin-top10"  >'
        + '<div class="col-sm-4">'
        + '<label for="payment_type" class="col-sm-5 col-form-label">Payment Type <i class="text-danger">*</i></label>'
        + '<div class="col-sm-7">'
        + '<select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, '+sl+')" tabindex="3">'
        + '<option value="1">Cash Payment</option>'
        + '<option value="2">Cheque Payment</option>'
        + '<option value="4">Bank Payment</option>'
        + ' <option value="3">Bkash Payment</option>'
        + ' <option value="5">Nagad Payment</option>'
        + ' <option value="6">Card Payment</option>'

        + '</select>'

        + '</div>'

        + '</div>'

        + '<div class="col-sm-4" id="bank_div_'+sl+'"  style="display:none;">'
        + ' <div class="form-group row">'
        + '<label for="bank" class="col-sm-3 col-form-label">Bank<i class="text-danger">*</i></label>'
        + ' <div class="col-sm-7">'

        + ' <input type="text" name="bank_id" class="form-control" id="bank_id_'+sl+'" placeholder="Bank">'

        + ' </div>'

        + '<div class="col-sm-1">'
        + ' <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="ti-plus m-r-2"></i></a>'
        + '</div>'
        + ' </div>'

        + '</div>'



        + '<div class="col-sm-4" id="bank_div_m_'+sl+'" style="display:none;">'
        + ' <div class="form-group row">'
        + '<label for="bank" class="col-sm-5 col-form-label"> Bank <i class="text-danger">*</i></label>'
        + '<div class="col-sm-7">'
        + '<select name="bank_id_m[]" class="form-control bankpayment" id="bank_id_m_'+sl+'">'
        + bank_list

            + '</select>'


            + '</div>'


            + ' </div>'
            + '</div>'


            + '<div class="col-sm-4" style="display: none" id="bkash_div_'+sl+'">'
            + '<div class="form-group row">'
            + '<label for="bkash" class="col-sm-5 col-form-label">Bkash Number <i class="text-danger">*</i></label>'
            + '<div class="col-sm-7">'
            + '<select name="bkash_id[]" class="form-control bankpayment" id="bkash_id_'+sl+'">'
            + bkash_list

            + '</select>'

            + ' </div>'

            + '</div>'
            + '</div>'

            + '<div class="col-sm-4" style="display: none" id="nagad_div_'+sl+'">'
            + '<div class="form-group row">'
            + '<label for="nagad" class="col-sm-5 col-form-label">Nagad Number <i class="text-danger">*</i></label>'
            + '<div class="col-sm-7">'
            + '<select name="nagad_id[]" class="form-control bankpayment" id="nagad_id_'+sl+'">'
            + nagad_list
            + ' </select>'

            + '</div>'


            + '</div>'
            + ' </div>'
            +'<div class="col-sm-4" style="display: none" id="card_div_'+sl+'">'
        +     '<div class="form-group row">'
        +        '<label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>'
        +        '<div class="col-sm-7">'
        +            '<select name="card_id" class="form-control bankpayment" id="card_id_'+sl+'">'
        +                '<option value="">Select One</option>'
        +   card_list
        +           '</select>'


        +       ' </div>'


        +    ' </div>'
        +   '</div>'

            + '<div class="col-sm-3"id="ammnt_'+sl+'" >'
            + '<label for="p_amount" class="col-sm-5 col-form-label"> Amount <i class="text-danger">*</i></label>'
            + '<div class="col-sm-7">'
            + '<input class="form-control p_amount" type="text" name="p_amount[]" onchange="calc_paid()" onkeyup="calc_paid()">'
            + '</div>'
            + '</div>'
            +'<div class="col-sm-1">'
            + '<a id="delete_btn" onclick="delete_row(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>'
        + '</div>'


            +'</div > '
    );
    count.val(sl + 1);
}

'use strict';
function delete_row(e) {
    e.closest('.row').remove();
}

$( document ).ready(function() {
    "use strict";
    var paytype = $("#editpayment_type").val();
    if(paytype == 2){
        $("#bank_div").css("display", "block");
    }else{
        $("#bank_div").css("display", "none");
    }

    if(paytype == 3){
        $("#bkash_div").css("display", "block");
    }else{
        $("#bkash_div").css("display", "none");
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

    "use strict";
    $("#add_receiver_form").submit(function(e){
        e.preventDefault();
        var customeMessage   = $("#customeMessage_rec");
        var receiver_dropdown = $("#deli_receiver");
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
                    receiver_dropdown.append(data.html);
                    $("#add_receiver_modal").modal('hide');
                    receiver_changed(receiver_dropdown[0]);
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

function receiver_changed(e) {
    var id = e.value;
    // console.log(e);
    var num_div = $("#receiver_num_div");
    var num_inp = $("#del_rec_num");
    var base_url = $('.baseUrl').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    // console.log(id);
    $.ajax({
        url: base_url + 'Cinvoice/get_receiver_num',
        type: 'post',
        data: {
            rec_id: id,
            csrf_test_name: csrf_test_name
        },
        success: function (msg){

            num_div.css('display', 'block');
            num_inp.val(msg);

        },
        error: function (xhr, desc, err){
            alert('failed');
        }
    });
}
