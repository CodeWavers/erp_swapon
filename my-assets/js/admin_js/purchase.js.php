
<?php
$cache_file = "purchase.json";
header('Content-Type: text/javascript; charset=utf8');
?>
var count = 2;
var limits = 500;
"use strict";
function addPurchaseOrderField1(divName){

    if (count == limits)  {
        alert("You have reached the limit of adding " + count + " inputs");
    }
    else{
        var newdiv = document.createElement('tr');
        var tabin="product_name_"+count;
        tabindex = count * 4 ,
            newdiv = document.createElement("tr");
        tab1 = tabindex + 1;

        tab2 = tabindex + 2;
        tab3 = tabindex + 3;
        tab4 = tabindex + 4;
        tab5 = tabindex + 5;
        tab6 = tab5 + 1;
        tab7 = tab6 +1;



        newdiv.innerHTML ='<td class="span3 supplier"><input type="text" name="product_name" required="" class="form-control product_name productSelection" onkeypress="product_pur_or_list('+ count +');" placeholder="Pr. Name" id="product_name_'+ count +'" tabindex="'+tab1+'" > <input type="hidden" class="autocomplete_hidden_value product_id_'+ count +'" name="product_id[]" id="SchoolHiddenId"/>  <input type="hidden" class="sl" value="'+ count +'">  </td> <td class="wt"> <input type="text" id="available_quantity_'+ count +'" class="form-control text-right stock_ctn_'+ count +'" placeholder="0.00" readonly/> </td> <td class="wt"> <input name="unit[]"  type="text" id="unit_'+ count +'" class="form-control text-right unit_'+ count +'" placeholder="Unit" readonly/> </td> <td class="text-right"> <input type="date" style="width: 110px"  id="warrenty_date_'+count+'" class="form-control_'+count+'" name="warrenty_date[]"  id="date" /> </td><td class="text-right"> <input type="date" style="width: 110px"  id="expired_date_'+count+'" class="form-control_'+count+'" name="expired_date[]"  id="date"  /> </td><td class="text-right"><input type="text" name="product_quantity[]" tabindex="'+tab2+'" required  id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="calculate_store(' + count + ');" onchange="calculate_store(' + count + ');" placeholder="0.00" value="" min="0"/>  </td><td class="text-right"><input type="text" name="damaged_qty[]" id="damaged_1" required="" min="0" class="form-control text-right store_cal_1" placeholder="0.00" value="" tabindex="6" /></td><td class="test"><input type="text" name="product_rate[]" onkeyup="calculate_store('+ count +');" onchange="calculate_store('+ count +');" id="product_rate_'+ count +'" class="form-control product_rate_'+ count +' text-right" placeholder="0.00" value="" min="0" tabindex="'+tab3+'"/></td><td class="text-right"><input class="form-control total_price text-right total_price_'+ count +'" type="text" name="total_price[]" id="total_price_'+ count +'" value="0.00" readonly="readonly" /> </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button style="text-align: right;" class="btn btn-danger red" type="button"  onclick="deleteRow(this)" tabindex="10"><i class="fa fa-close"></i></button></td>';
        document.getElementById(divName).appendChild(newdiv);
        document.getElementById(tabin).focus();
        document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
        document.getElementById("add_purchase").setAttribute("tabindex", tab6);
        document.getElementById("add_purchase_another").setAttribute("tabindex", tab7);

        count++;

        $("select.form-control:not(.dont-select-me)").select2({
            placeholder: "Select option",
            allowClear: true
        });
    }
}

// Counts and limit for purchase order


//Calculate store product
"use strict";
function calculate_store(sl) {

    var gr_tot = 0;
    var dis = 0;
    var item_ctn_qty    = $("#cartoon_"+sl).val();
    var vendor_rate = $("#product_rate_"+sl).val();

    var total_price     = item_ctn_qty * vendor_rate;
    $("#total_price_"+sl).val(total_price.toFixed(2));


    //Total Price
    $(".total_price").each(function() {
        isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
    });
    $(".discount").each(function() {
        isNaN(this.value) || 0 == this.value.length || (dis += parseFloat(this.value))
    });

    $("#Total").val(gr_tot.toFixed(2,2));
    var grandtotal = gr_tot - dis;
    $("#grandTotal").val(grandtotal.toFixed(2,2));
    invoice_paidamount();
}


function invoice_paidamount() {
    var t = $("#grandTotal").val(),
        a = $("#paidAmount").val(),
        e = t - a;
    if(e > 0){
        $("#dueAmmount").val(e.toFixed(2,2))
    }else{
        $("#dueAmmount").val(0)
    }
}

"use strict";
function full_paid() {
    var grandTotal = $("#grandTotal").val();
    $("#paidAmount").val(grandTotal);
    invoice_paidamount();
    calculate_store();
}

//Delete row
"use strict";
function deleteRow(e) {
    var t = $("#purchaseTable > tbody > tr").length;
    if (1 == t) alert("There only one row you can't delete.");
    else {
        var a = e.parentNode.parentNode;
        a.parentNode.removeChild(a)
    }
    calculateSum();
}


"use strict";
function product_pur_or_list(sl) {

    var supplier_id = $('#supplier_id').val();
    var base_url = $('#base_url').val();
    var product_status = $('#product_status').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    if ( supplier_id == 0) {
        alert('Please select Supplier !');
        return false;
    }
    if ( product_status == 0) {
        alert('Please select Product Type !');
        return false;
    }

    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var product_name = $('#product_name_'+sl).val();
            $.ajax( {
                url: base_url + "Cpurchase/product_search_by_supplier",
                method: 'post',
                dataType: "json",
                data: {
                    term: request.term,
                    cat_id:$('#cat_id').val(),
                    product_name:product_name,
                    csrf_test_name: csrf_test_name,
                    product_status: product_status,
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
            var sl = $(this).parent().parent().find(".sl").val();

            var product_id          = ui.item.value;

            var  supplier_id=$('#supplier_id').val();


            var base_url    = $('.baseUrl').val();


            var available_quantity    = 'available_quantity_'+sl;
            var product_rate    = 'product_rate_'+sl;
            var unit    = 'unit_'+sl;




            $.ajax({
                type: "POST",
                url: base_url+"Cinvoice/retrieve_product_data",
                data: {product_id:product_id,supplier_id:supplier_id,csrf_test_name:csrf_test_name},
                cache: false,
                success: function(data)
                {
                    console.log(data);
                    obj = JSON.parse(data);
                    $('#'+available_quantity).val(obj.total_product);
                    $('#'+unit).val(obj.unit);


                }
            });

            $(this).unbind("change");
            return false;
        }
    }

    $('body').on('keypress.autocomplete', '.product_name', function() {
        $(this).autocomplete(options);
    });

}


("use strict");
function calc_paid() {
  var pt = 0;
  $(".p_amount").each(function () {
    isNaN(this.value) || 0 == this.value.length || (pt += parseFloat(this.value));
  });

  $("#paidAmount").val(pt);
  invoice_paidamount();
}

("use strict");
function add_pay_row(sl) {
    var count = $("#count");
    sl = count.val();
    var bkash_list = $("#bkash_list").val();
    var nagad_list = $("#nagad_list").val();
    var bank_list = $("#bank_list").val();
    var card_list = $("#card_list").val();
    var pay_div = $("#pay_div");
    pay_div.append(
        '<div class="row margin-top10"  >' +
        '<div class="col-sm-4">' +
        '<label for="payment_type" class="col-sm-5 col-form-label">Payment Type <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, ' + sl + ')" tabindex="3">' +
        '<option value="1">Cash Payment</option>' +
        '<option value="4">Bank Payment</option>' +
        '<option value="3">Bkash Payment</option>' +
        '<option value="5">Nagad Payment</option>' +
        '<option value="6">TT Payment</option>' +
        '<option value="7">LC Payment</option>' +
        "</select>" +
        "</div>" +
        "</div>" +
        '<div class="col-sm-4" id="bank_div_' +
        sl +
        '"  style="display:none;">' +
        ' <div class="form-group row">' +
        '<label for="bank" class="col-sm-3 col-form-label">Bank<i class="text-danger">*</i></label>' +
        ' <div class="col-sm-7">' +
        ' <input type="text" name="bank_id" class="form-control" id="bank_id_' +
        sl +
        '" placeholder="Bank">' +
        " </div>" +
        '<div class="col-sm-1">' +
        ' <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="ti-plus m-r-2"></i></a>' +
        "</div>" +
        " </div>" +
        "</div>" +
        '<div class="col-sm-4" id="bank_div_m_' +
        sl +
        '" style="display:none;">' +
        ' <div class="form-group row">' +
        '<label for="bank" class="col-sm-5 col-form-label"> Bank <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<select name="bank_id_m[]" class="form-control bankpayment" id="bank_id_m_' +
        sl +
        '">' +
        bank_list +
        "</select>" +
        "</div>" +
        " </div>" +
        "</div>" +
        '<div class="col-sm-4" style="display: none" id="bkash_div_' +
        sl +
        '">' +
        '<div class="form-group row">' +
        '<label for="bkash" class="col-sm-5 col-form-label">Bkash Number <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<select name="bkash_id[]" class="form-control bankpayment" id="bkash_id_' +
        sl +
        '">' +
        bkash_list +
        "</select>" +
        " </div>" +
        "</div>" +
        "</div>" +
        '<div class="col-sm-4" style="display: none" id="nagad_div_' +
        sl +
        '">' +
        '<div class="form-group row">' +
        '<label for="nagad" class="col-sm-5 col-form-label">Nagad Number <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<select name="nagad_id[]" class="form-control bankpayment" id="nagad_id_' +
        sl +
        '">' +
        nagad_list +
        " </select>" +
        "</div>" +
        "</div>" +
        " </div>" +
        '<div class="col-sm-4" style="display: none" id="card_div_' +
        sl +
        '">' +
        '<div class="form-group row">' +
        '<label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<select name="card_id" class="form-control bankpayment" id="card_id_' +
        sl +
        '">' +
        '<option value="">Select One</option>' +
        card_list +
        "</select>" +
        " </div>" +
        " </div>" +
        "</div>" +
        '<div class="col-sm-4" style="display: none" id="tt_div_' + sl + '">'
        + '<div class="form-group row">'
        + '<label for="tt" class="col-sm-5 col-form-label">Bank/Cash <i class="text-danger">*</i></label>'
        + '<div class="col-sm-7">'
        + '<select name="tt_id[]" class="form-control bankpayment" id="tt_id_1" onchange="change_tt(this.value, ' + sl + ')">'
        + '<option value="">Select One</option>'
        + '<option value="1">Bank</option>'
        + '<option value="2">Cash</option>'
        + '</select>'

        + '</div>'
        + '</div>'

        + '<div class="form-group row" id="tt_bank_div_'+sl+'" style="display: none">'
        + '<label for="tt_bank" class="col-sm-5 col-form-label">Bank</label>'
        + '<div class="col-sm-7">'
        + '<select name="tt_bank[]" class="form-control bankpayment" id="tt_bank_1">'
        + '<option value="">Select One</option>'
        + bank_list
        + '</select>'




        + '</div>'


        + '</div>'



        + '</div> <div class="col-sm-3">' +
        '<label for="p_amount" class="col-sm-5 col-form-label"> Amount <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<input class="form-control p_amount" type="text" name="p_amount[]" onchange="calc_paid()" onkeyup="calc_paid()">' +
        "</div>" +
        "</div>" +
        '<div class="col-sm-1">' +
        '<a id="delete_btn" onclick="delete_row(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
        "</div>" +
        "</div > "
    );

    count.val(sl + 1);
}

("use strict");
function bank_paymet(val, sl) {
    console.log(val);
    console.log(sl);
    if (val == 2 || 3 || 4 || 5 || 6 || 7) {
        if (val == 2) {
            var style = "block";
            document.getElementById("bank_id_" + sl).setAttribute("required", true);
        } else {
            var style = "none";
            document.getElementById("bank_id_" + sl).removeAttribute("required");
        }

        document.getElementById("bank_div_" + sl).style.display = style;

        if (val == 3) {
            var style = "block";
            document.getElementById("bkash_id_" + sl).setAttribute("required", true);
        } else {
            var style = "none";
            document.getElementById("bkash_id_" + sl).removeAttribute("required");
        }

        document.getElementById("bkash_div_" + sl).style.display = style;

        if (val == 4) {
            var style = "block";
            document.getElementById("bank_id_m_" + sl).setAttribute("required", true);
        } else {
            var style = "none";
            document.getElementById("bank_id_m_" + sl).removeAttribute("required");
        }

        document.getElementById("bank_div_m_" + sl).style.display = style;

        if (val == 5) {
            var style = "block";
            document.getElementById("nagad_id_" + sl).setAttribute("required", true);
        } else {
            var style = "none";
            document.getElementById("nagad_id_" + sl).removeAttribute("required");
        }

        document.getElementById("nagad_div_" + sl).style.display = style;

        if (val == 6) {

            document.getElementById("tt_div_" + sl).style.display = 'block';
        }else{
            document.getElementById("tt_div_" + sl).style.display = 'none';
        }

        if(val==7){
            var style = 'block';
            document.getElementById('lc_'+sl).setAttribute("required", true);
        }else{
            var style ='none';
            document.getElementById('lc_'+sl).removeAttribute("required");
        }

        document.getElementById('lc_div_'+sl).style.display = style;
    }
}

'use strict';
function change_tt(val, sl) {
    if (val == 1) {
        document.getElementById("tt_bank_div_" + sl).style.display = 'block';
    }
    else {
        document.getElementById("tt_bank_div_" + sl).style.display = 'none';

    }
}

'use strict';
function delete_row(e) {
    e.closest('.row').remove();
}

$( document ).ready(function() {
    var paytype = $("#editpayment_type").val();
    if(paytype == 2){
        $("#bank_div").css("display", "block");
    }else{
        $("#bank_div").css("display", "none");
    }

    $(".bankpayment").css("width", "100%");
});

function check_qty(sl) {
  var p_qty = $("#p_qty_" + sl);
  var o_qty = $("#cartoon_" + sl);

  if (o_qty.val() > p_qty.val()) {
    alert("Cannot order more than proposed quantity.");
    o_qty.val(p_qty.val());
  }
}
