"use strict";
function checkboxcheck(sl) {
  var check_id = "check_id_" + sl;
  var total_qntt = "total_qntt_" + sl;
  var product_id = "product_id_" + sl;
  var total_price = "total_price_" + sl;
  var discount = "discount_" + sl;
  if ($("#" + check_id).prop("checked") == true) {
    document.getElementById(total_qntt).setAttribute("required", "required");
    document.getElementById(product_id).setAttribute("name", "product_id[]");
    document.getElementById(total_qntt).setAttribute("name", "product_quantity[]");
    document.getElementById(total_price).setAttribute("name", "total_price[]");
    document.getElementById(discount).setAttribute("name", "discount[]");
  } else if ($("#" + check_id).prop("checked") == false) {
    document.getElementById(total_qntt).removeAttribute("required");
    document.getElementById(product_id).removeAttribute("name", "");
    document.getElementById(total_qntt).removeAttribute("name", "");
    document.getElementById(total_price).setAttribute("name", "total_price[]");
    document.getElementById(discount).setAttribute("name", "");
  }
}
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
    e.innerHTML = "<td><input type='text' name='product_name' onkeypress='invoice_productList(" + count + ");' class='form-control productSelection common_product' placeholder='Product Name' id='" + a + "' required tabindex='" + tab1 + "'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count + "' name='re_product_id[]' id='SchoolHiddenId'/></td>" +
        "<td><input type='text'  class='form-control text-right  re_available_quantity_" + count + "' value='' readonly></td>"+
        " <td><input type='hidden' name='re_available_quantity[]' id='' class='form-control text-right common_avail_qnt re_available_quantity_" + count + "' value='0' readonly='readonly' /><input class='form-control text-right common_name unit_" + count + " valid' value='None' readonly='' aria-invalid='false' type='text'></td>" +
        "<td> <input type='text' name='re_product_quantity[]' value='1' required='required' onkeyup='quantity_calculate_re(" + count + ");' onchange='quantity_calculate_re(" + count + ");' id='re_total_qntt_" + count + "' class='common_qnt re_total_qntt_" + count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/>" +
        "</td><td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  re_warrenty_date_" + count + "' name='re_warrenty_date[]' value=''/></td>" +
        "<td> <?php $date = date('Y-m-d') ?><input type='date' id='' style='width: 110px' class='form-control  re_expiry_date_" + count + "' name='re_expiry_date[]' value=''/></td>" +
        "<td  class='text-center'><input type='text' style='width:120px;display:inline-block' name='re_product_rate[]' onkeyup='quantity_calculate_re(" + count + ");' onchange='quantity_calculate_re(" + count + ");' id='re_price_item_" + count + "' class='re_common_rate re_price_item" + count + " form-control text-right' required placeholder='0.00' min='0'  tabindex='" + tab4 + "'/>     <s id='re_purchase_price_" + count + "' class=' re_purchase_price" + count + "text-right' style='width:120px;display:inline-block'>৳0.00</s></td>" +
        "<td class='text-center'><input type='text' name='re_discount[]' onkeyup='quantity_calculate_re(" + count + ");' onchange='quantity_calculate_re(" + count + ");' id='re_discount_" + count + "' style='width:120px;display:inline-block' class='form-control text-right re_common_discount' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='text' style='width:120px;' name='re_comm[]' onkeyup='quantity_calculate_re(" + count + ");' onchange='quantity_calculate_re(" + count + ");' id='re_comm_" + count + "' class='form-control text-right comm_th d-none  p-5' placeholder='0.00' min='0' tabindex='" + tab5 + "' /><input type='hidden' value='' name='discount_type' id='discount_type_" + count + "'></td>" +
        "<td class='text-right'><input class='re_common_total_price re_total_price form-control text-right' type='text' name='re_total_price[]' id='re_total_price_" + count + "' value='0.00' readonly='readonly'/><input class=' re_total_price_wd form-control text-right' type='hidden' name='re_total_price_wd[]' id='re_total_price_wd_" + count + "' value='0.00' readonly='readonly'/></td>" +
        "<td class='text-right' hidden><input class=' re_total_discount form-control text-right' type='text' name='re_total_discount[]' id='re_total_discount_" + count + "' name='re_discount_amt[]' value='0.00' readonly='readonly'/></td>" +
        "<td class='text-right' hidden><input class=' re_total_comm form-control text-right' type='text' name='re_total_comm[]' id='re_total_comm_" + count + "' name='re_total_comm[]' value='0.00' readonly='readonly'/></td>" +

        "<td>" + tbfild + "<input type='hidden' id='re_all_discount_" + count + "' class='re_total_discount dppr' name='re_discount_amount[]'/><button tabindex='" + tab5 + "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button></td>",
        document.getElementById(t).appendChild(e),
        document.getElementById(a).focus(),
        document.getElementById("add_invoice_item").setAttribute("tabindex", tab6);
    document.getElementById("re_details").setAttribute("tabindex", tab7);
    document.getElementById("re_invoice_discount").setAttribute("tabindex", tab8);
    document.getElementById("re_shipping_cost").setAttribute("tabindex", tab9);
    document.getElementById("re_paidAmount").setAttribute("tabindex", tab10);
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
"use strict";
function quantity_calculate_re(item) {
  var quantity = $("#re_total_qntt_" + item).val();
  var available_quantity = $(".re_available_quantity_" + item).val();
  var price_item = parseInt($("#re_price_item_" + item).val());
  var invoice_discount = $("#re_invoice_discount").val();
  var discount = $("#re_discount_" + item).val();
  var total_tax = $("#re_total_tax_" + item).val();
  var total_discount = $("#re_total_discount_" + item).val();

  var  comm_item =  ($("#re_comm_" + item).val() ? $("#re_comm_" + item).val() : 0);

  //var comm_item = $("#comm_" + item).val();
  var taxnumber = $("#txfieldnum").val();
  var dis_type = $("#discount_type_" + item).val();
  if (parseInt(quantity) > parseInt(available_quantity)) {
    var message = "You can Sale maximum " + available_quantity + " Items";
    alert(message);
    $("#re_total_qntt_" + item).val('');
    var quantity = 0;
    $("#re_total_price_" + item).val(0);
    for(var i=0;i<taxnumber;i++){
      $("#re_all_tax"+i+"_" + item).val(0);
      quantity_calculate_re(item);
    }


  }

  // alert(comm_item)

  //if (comm_item != ''){
  //    var comm_item=0;
  //}

  var just_tot = quantity * price_item;
  var row_tot = ((just_tot) - ((just_tot) * (discount / 100))+((just_tot) * (comm_item / 100)));

  $("#re_total_price_wd_" + item).val(just_tot);
  $("#re_total_discount_" + item).val((just_tot) * (discount / 100));
  $("#re_total_comm_" + item).val((just_tot) * (comm_item / 100));
  //$("#total_discount_ammount").val((just_tot) * (discount / 100));
  $("#re_total_price_" + item).val(row_tot.toFixed(2,2));
  //$("#total_price_wd_" + item).val(just_tot.toFixed(2, 2));

   calculateSum();
   invoice_paidamount();
}

"use strict";
function calculateSum() {
  var taxnumber = $("#txfieldnum").val();
  var t = 0,
      a = 0,
      e = 0,
      o = 0,
      p = 0,
      f = 0,
      x = 0,
      ad = 0,
      tx = 0,
      ds = 0,
      cc = 0,

      s_cost =  ($("#re_shipping_cost").val() ? $("#re_shipping_cost").val() : 0),
      c_cost =  ($("#re_condition_cost").val() ? $("#re_condition_cost").val() : 0),
      commission =  ($("#re_commission").val() ? $("#re_commission").val() : 0),
      perc_discount =  ($("#re_perc_discount").val() ? $("#re_perc_discount").val() : 0);


  $(".re_total_discount").each(function () {
    isNaN(this.value) || 0 == this.value.length || (p += parseFloat(this.value))
  }),
      $("#re_total_discount_ammount").val(p.toFixed(2, 2)),

      $(".re_totalTax").each(function () {
        isNaN(this.value) || 0 == this.value.length || (f += parseFloat(this.value))
      }),
      $("#re_dc").val(f.toFixed(2, 2)),

      //Total Price
      $(".re_total_price").each(function () {
        isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value))
      }),
      $(".re_total_price_wd").each(function () {
        isNaN(this.value) || 0 == this.value.length || (x += parseFloat(this.value))
      }),

      $(".dppr").each(function () {
        isNaN(this.value) || 0 == this.value.length || (ad += parseFloat(this.value))
      }),

      $(".re_total_comm").each(function () {
        isNaN(this.value) || 0 == this.value.length || (cc += parseFloat(this.value))
      }),

      o = a.toFixed(2, 2),
      e = t.toFixed(2, 2),
      tx = f.toFixed(2, 2),
      //ds = p.toFixed(2, 2);
      ds =  $("#invoice_discount").val();
  var pds =+(t) * (perc_discount / 100);


  var total_discount_ammount = $("#re_total_discount_ammount").val();
  var ttl_discount = parseFloat(total_discount_ammount)+pds;
  //var ttl_cms = +commission;
  $("#re_total_discount_ammount").val(ttl_discount.toFixed(2,2));
  $("#re_total_commission").val(cc.toFixed(2,2));
  //ds =+(t) * (perc_discount / 100);

  //console.log(discount_perc);

  var test = +tx + +s_cost + +x + -ttl_discount  + + ad  - commission;
  var test2 = +tx + +s_cost + +x + -ttl_discount + + ad ;

  if(c_cost == undefined || commission ==undefined){
    $("#re_grandTotal").val(test2.toFixed(2, 2));
  }else {
    $("#re_grandTotal").val(test.toFixed(2, 2));
  }

  var gt = parseFloat($("#re_grandTotal").val());
  //var invdis = $("#invoice_discount").val();
 var x = parseFloat($("#total_refund").val());

  var grnt_totals = gt;
  var grnt_totals_ref = gt+x;
  invoice_paidamount();
  $("#grandTotal").val(grnt_totals.toFixed(2,2));

  $("#re_grandTotal").val(grnt_totals_ref.toFixed(2,2));




}
//Quantity calculat
"use strict";
function quantity_calculate(item) {
  var a = 0,
      o = 0,
      d = 0,
      x = 0,
      y = 0,
      z = 0,
      r = 0,
      g = 0,
      p = 0;
  var pa_total_price = $("#pa_total_price_" + item).val();
  var sold_qty = $("#sold_qty_" + item).val();
  var quantity = $("#total_qntt_" + item).val();
  var price_item = $("#price_item_" + item).val();
  var discount = $("#discount_" + item).val();
  var disc = $("#dis_" + item).val();
  var add_cost = $("#total_tax_ammount").val() ? $("#total_tax_ammount").val() : 0;
  if (parseInt(sold_qty) < parseInt(quantity)) {
    alert("Sold quantity less than quantity!");
    $("#total_qntt_" + item).val("");
  }
  var price = quantity * price_item;
  var dis = price * (discount / 100);
  var diss = price * (disc / 100);
  $("#all_discount_" + item).val(diss);
  $("#return_val_" + item).val(price);
  var ttldis = $("#all_discount_" + item).val();
  var total_d = $("#total_discount_ammount").val();

  $(".return_val").each(function () {
    isNaN(this.value) || r == this.value.length || (r += parseFloat(this.value));
  });

  $(".total_p").each(function () {
    isNaN(this.value) || g == this.value.length || (g += parseFloat(this.value));
  });
  $(".total_price").each(function () {
    isNaN(this.value) || a == this.value.length || (a += parseFloat(this.value));
  });

  $(".payable").each(function () {
    isNaN(this.value) || x == this.value.length || (x += parseFloat(this.value));
  });
  $(".paya_total").each(function () {
    isNaN(this.value) || y == this.value.length || (y += parseFloat(this.value));
  });

  $(".total_discount").each(function () {
    isNaN(this.value) || d == this.value.length || (d += parseFloat(this.value));
  })
//per sku discount calculation
  var invoice_discount = parseFloat($("#invoice_discount").val());
  var perc_dis = parseFloat($("#perc_discount").val());
  var pds =y * (perc_dis / 100);

  var dis_by_sku = price_item * (disc / 100);
  $("#dis_amount_" + item).val(dis_by_sku);

  $(".dis_amount").each(function () {
    isNaN(this.value) || z == this.value.length || (z += parseFloat(this.value));
  })
  var total=parseFloat($('#total_amount').val());
  var total_discount=parseFloat($('#total_discount_ammount').val());
  var invoice_value=total+total_discount;




  var sale_discount=invoice_discount/invoice_value*r;
  var sale_discount_perc=pds/g*a;
  var sku_wise_t_dis=sale_discount+sale_discount_perc+d;
  $('#total_return').val(r);
  $('#sub_total').val(a.toFixed(2,2));
  $('#sale_discount_perc').val(sale_discount_perc  .toFixed(2,2));
  $('#sku_discount').val(sku_wise_t_dis.toFixed(2,2));


  //Total price calculate per product
  var temp = price - diss;
  var paya = pa_total_price-temp;
  $("#total_price_" + item).val(temp); //
  $("#payable_" + item).val(paya.toFixed(2,2)); //





  var sales_return=r-sku_wise_t_dis;
  $("#sale_discount").val(sale_discount.toFixed(2,2));
  $("#sales_return").val(sales_return.toFixed(2,2));


  var net_pay=sku_wise_t_dis-r;
  $("#net_pay").val(net_pay.toFixed(2,2));
  var paid_amount=parseFloat($("#paid_amount").val());

  var total_refund=total-sales_return-paid_amount;
  $("#customer_ac").val(total_refund.toFixed(2,2));
  // console.log(paid_amount)
  // console.log(total_refund)

  var rounding=Math.round(total_refund)-total_refund;
  $("#rounding").val(rounding.toFixed(2,2));
  $("#total_refund").val(Math.round(total_refund).toFixed(2,2));
  $("#dueAmmount").val(Math.round(total_refund).toFixed(2,2));
  $("#refunded_amt").val(Math.round(total_refund).toFixed(2,2));
  $("#re_dueAmmount").val(Math.round(total_refund).toFixed(2,2));
  if (total_refund < 0){
    $('.hide_tr').removeClass('d-none')
    $('.due_tr').addClass('d-none')
  }else{
    $('.hide_tr').addClass('d-none')
    $('.due_tr').removeClass('d-none')
  }




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


"use strict"
function calc_paid(){
  var pt = 0;

  // var paid_amount = (parseFloat($("#paid_amount").val()) ? parseFloat($("#paid_amount").val()) : 0);

  $(".p_amount").each(function () {
    isNaN(this.value) || 0 == this.value.length || (pt += parseFloat(this.value))
  });

  $("#re_paidAmount").val((pt).toFixed(2,2));
  $("#paidAmmount").val((pt).toFixed(2,2));
  invoice_paidamount();
}
"use strict";
function invoice_productList(sl) {

  var outlet_id = $("#outlet_name").val();

  var priceClass = 're_price_item'+sl;
  var purchase_price = 're_purchase_price_'+sl;

  var available_quantity = 're_available_quantity_'+sl;
  var unit = 're_unit_'+sl;
  var tax = 're_total_tax_'+sl;
  var serial_no = 're_serial_no_'+sl;
  var warehouse = 're_warehouse_'+sl;
  var warrenty_date='re_warrenty_date_'+sl;
  var expiry_date='re_expiry_date_'+sl;
  var discount_type = 're_discount_type_'+sl;
  var discount = 're_discount_'+sl;
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
          $('.'+priceClass).val(obj.purchase_price ? obj.purchase_price : 0.00);
          $('#'+purchase_price).html('৳'+obj.price);
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
          quantity_calculate_re(sl);

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
  var t = $("#re_grandTotal").val(),
      a = $("#re_paidAmount").val(),
      x = $("#paidAmmount").val(),
      tf = parseFloat($("#total_refund").val()),
      e = t - a,
      y = tf - x,
      f = e + pr,
      nt = parseFloat(t, 10) + pr,
      re_r =Math.round(nt)-nt,
  d = a - nt;
  $("#re_n_total").val(nt.toFixed(2, 2));
  $('#re_rounding').val(re_r.toFixed(2,2));
  $("#dueAmmount").val(Math.round(y).toFixed(2,2));
  if (nt < 0){
    $('.re_hide_tr').removeClass('d-none')
  }else{
    $('.re_hide_tr').addClass('d-none')
  }
  if(f > 0){
    $("#re_dueAmmount").val(Math.round(f).toFixed(2,2));

    if(a <= f){
      $("#re_change").val(0);
    }
  }else{
    if(a < f){
      $("#re_change").val(0);
    }
    if(a > f){
      $("#re_change").val(d.toFixed(2,2))
    }
    $("#re_dueAmmount").val(0)
    // $("#dueAmmount").val(0)

  }
}
function validation(){

  if ($(".chk").is(":checked") && ($("#is_replace").val() == 0 || $("#cash_return").val() == 0 ))  {
    $("#add_invoice").prop("disabled", false);
  } else {
    if ($(".chk").filter(":checked").length < 1) {
      $("#add_invoice").attr("disabled", true);
    }
  }

  // if ($("#is_replace").val() == 0 || $("#cash_return").val() == 0){
  //
  //   $("#add_invoice").prop("disabled", true);
  //
  // }else{
  //   $("#add_invoice").prop("disabled", false);
  // }
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
      $(this).attr('onkeyup', 'quantity_calculate_re('+common_qnt+');');
      $(this).attr('onchange', 'quantity_calculate_re('+common_qnt+');');
    });
    var common_rate = 1;
    $("#normalinvoice > tbody > tr td input.common_rate").each(function () {
      common_rate++;
      $(this).attr('id', 'price_item_' + common_rate);
      $(this).attr('onkeyup', 'quantity_calculate_re('+common_qnt+');');
      $(this).attr('onchange', 'quantity_calculate_re('+common_qnt+');');
    });
    var common_discount = 1;
    $("#normalinvoice > tbody > tr td input.common_discount").each(function () {
      common_discount++;
      $(this).attr('id', 'discount_' + common_discount);
      $(this).attr('onkeyup', 'quantity_calculate_re('+common_qnt+');');
      $(this).attr('onchange', 'quantity_calculate_re('+common_qnt+');');
    });
    var common_total_price = 1;
    $("#normalinvoice > tbody > tr td input.common_total_price").each(function () {
      common_total_price++;
      $(this).attr('id', 'total_price_' + common_total_price);
    });




  }
}
("use strict");
function invoice_productList_old(sl) {
  var outlet_id = $("#outlet_name").val();

  var priceClass = "price_item" + sl;

  var available_quantity = "available_quantity_" + sl;
  var unit = "unit_" + sl;
  var tax = "total_tax_" + sl;
  var serial_no = "serial_no_" + sl;
  var warehouse = "warehouse_" + sl;
  var warrenty_date = "warrenty_date_" + sl;
  var expiry_date = "expiry_date_" + sl;
  var discount_type = "discount_type_" + sl;
  var discount = "discount_" + sl;
  var csrf_test_name = $('[name="csrf_test_name"]').val();
  var base_url = $("#base_url").val();

  // Auto complete
  var options = {
    minLength: 0,
    source: function (request, response) {
      var product_name = $("#pr_name_" + sl).val();
      $.ajax({
        url: base_url + "Cinvoice/autocompleteproductsearch",
        method: "post",
        dataType: "json",
        data: {
          term: request.term,
          product_name: product_name,
          csrf_test_name: csrf_test_name,
        },
        success: function (data) {
          response(data);
        },
      });
    },
    focus: function (event, ui) {
      $(this).val(ui.item.label);
      return false;
    },
    select: function (event, ui) {
      $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value);
      $(this).val(ui.item.label);
      var id = ui.item.value;
      var dataString = "pro duct_id=" + id;
      var base_url = $(".baseUrl").val();
      var customer_id = $("#autocomplete_customer_id").val();
      console.log(id);
      $.ajax({
        type: "POST",
        url: base_url + "Cinvoice/retrieve_product_data_inv",
        data: {
          product_id: id,
          customer_id: customer_id,
          outlet_id: outlet_id,
          csrf_test_name: csrf_test_name,
        },
        cache: false,
        success: function (data) {
          var obj = jQuery.parseJSON(data);
          console.log(obj);

          if (parseFloat(obj.stock) == 0){

            toastr.error('This product is out of stock!!')
            return
          }else {
            $("#replace_price_" + sl).val(obj.purchase_price);
            $("#" + discount).val(obj.discount);
            $("#stock_" + sl).val(obj.stock);

          }


        },
      });

      $(this).unbind("change");
      return false;
    },
  };

  $("body").on("keypress.autocomplete", ".productSelection", function () {
    $(this).autocomplete(options);
  });
}

("use strict");
function add_replace_row() {
  var sl = $("#inc_id").val();
  var html = "";
  html +=
      "<tr>" +
      '<td class="product_field">' +
      '<input type="text" name="product_name" onclick="invoice_productList(' +
      sl +
      ');" value="" class="form-control productSelection" required placeholder="Product Name" id="pr_name_' +
      sl +
      '" tabindex="3">' +
      '<input type="hidden" class="product_id_' +
      sl +
      ' autocomplete_hidden_value" value="" id="product_id_' +
      sl +
      '" />' +
      "</td>" +
      "<td>" +
      '<input type="text" name="sold_qty[]" id="stock_' +
      sl +
      '" class="form-control text-right available_quantity_' +
      sl +
      '" readonly="" />' +
      "</td>" +
      "<td>" +
      '<input type="text" onkeyup="replace_calculate(' +
      sl +
      ');" onchange="replace_calculate(' +
      sl +
      ');" class="total_qntt_' +
      sl +
      ' form-control text-right" id="replace_qty_' +
      sl +
      '" min="0" placeholder="0.00" tabindex="4" />' +
      "</td>" +
      ' <td><input type="text" name="replace_rate[]" onkeyup="quantity_calculate(' +
      sl +
      ');" onchange="quantity_calculate(' +
      sl +
      ');" value="" id="replace_price_' +
      sl +
      '" class="form-control text-right" min="0" tabindex="5" required="" placeholder="0.00" readonly="" /></td>' +
      "<td>" +
      '<input class="rep_total form-control text-right" type="text" id="replace_total_' +
      sl +
      '" value="" readonly="readonly" />' +
      '<input type="hidden" name="invoice_details_id[]" id="" value="" />' +
      "</td>" +
      "<td>" +
      '<button type="button" class="btn btn-sm btn-danger" onclick="delete_replace_row(this)"><i class="fa fa-minus"></i></button>' +
      "</td>" +
      "</tr>";

  $("#replaceT > tbody").append(html);
  console.log(html);
  sl++;
  $("#inc_id").val(sl);
}
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
function commision_add(val) {

  if (val==1 ) {
    $('#t_comm_tr').removeClass('d-none')
    $('.comm_th').removeClass('d-none')
    $('.comm_th').addClass('d-inline')

  }else{
    $('#t_comm_tr').addClass('d-none')
    $('.comm_th').addClass('d-none')
    $('.comm_th').removeClass('d-inline')
  }

  if (val==2 ) {
    $('#commission_tr').removeClass('d-none')
    $('.comm_th').removeClass('d-inline')
    $('.comm_th').addClass('d-none')
  }else{
    $('#commission_tr').addClass('d-none')
    $('.comm_th').addClass('d-inline')
    $('.comm_th').removeClass('d-none')
  }
}
"use strict";
function get_branch(courier_id) {

  var base_url = "<?= base_url() ?>";
  var csrf_test_name = $('[name="csrf_test_name"]').val();



  $.ajax( {
    url: base_url + "Ccourier/branch_by_courier",
    method: 'post',
    data: {
      courier_id:courier_id,
      csrf_test_name:csrf_test_name
    },
    cache: false,
    success: function( data ) {
      var obj = jQuery.parseJSON(data);
      $('.branch_id').html(obj.branch);


      $(".branch_div").css("display", "block");
      // if(courier_id == obj.courier_id ){
      //     $("#subCat_div").css("display", "block");
      // }else{
      //     $("#subCat_div").css("display", "none");
      // }
    }
  })

}

function  delivery_type(val){

  //   alert(val)
  if (val == 2) {
    var style = 'block';
    // $('.hidden_tr').removeClass('d-none');

  } else {
    var style = 'none';
    // $('.hidden_tr').addClass('d-none');

  }



  document.getElementById('courier_div').style.display = style;



}


("use strict");
function delete_replace_row(e) {
  e.closest("tr").remove();
}

("use strict");
function replace_calculate(sl) {
  var qty = $("#replace_qty_" + sl).val();
  var price = $("#replace_price_" + sl).val();
  var dis = $("#replace_dis_" + sl).val();
  var a = 0;

  var price = qty * price;

  $("#replace_total_" + sl).val(price.toFixed(2, 2));

  $(".rep_total").each(function () {
    isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
  });

  $("#rep_total").val(a.toFixed(2, 2));

  var ret_tot = $("#grandTotal").val();

  var add_cost = $("#total_tax_ammount").val();
  $("#rep_deduction").val(add_cost);

  var x = a-ret_tot ;

  $("#rep_grand").val(x.toFixed(2, 2));
  var grand =a-ret_tot;
  var paid_amount =parseFloat($("#paid_amount").val());
  var due_amount =grand-paid_amount;
  $('#due_amount').val(due_amount.toFixed(2,2))
  // if ($("#pay_person").is(":checked")) {
  //   var grand = x+add_cost;
  // }else{
  //   var grand = ret_tot;
  //
  // }


  $("#rep_total_cost").val(grand.toFixed(2,2));


  // if (parseFloat($("#rep_grand").val()) < 0) {
  //   toastr.error("Customer will pay " + Math.abs(parseFloat($("#rep_grand").val())));
  // } else {
  //   toastr.warning("Customer will get " + Math.abs(parseFloat($("#rep_grand").val())));
  // }
}

$(document).ready(function () {

  $("#rep_toggle").click(function () {
    $("#replace_table").toggle("fade", { direction: "right" }, 400);



    if ($("#cash_return").is(":checked")) {
      $("#cash_return").prop("checked", false);
    }

    if ($("#is_replace").val() == 0) {
      $('.due_tr').addClass('d-none')
      $('.hide_tr').removeClass('d-none')
      $("#is_replace").val(1);
    } else {
      $('.due_tr').removeClass('d-none')
      $('.hide_tr').addClass('d-none')
      $("#is_replace").val(0);
    }

    quantity_calculate(1);
  });

  $("#cash_return").click(function () {
  //  $('.due_tr').removeClass('d-none')
    if ($("#rep_toggle").is(":checked")) {
      $("#rep_toggle").trigger("click");
      $("#cash_return").prop("checked", true);
    }
  });

  ("use strict");
  $("input[type=checkbox]").each(function () {
    if (this.nextSibling.nodeName != "label") {
      $(this).after('<label for="' + this.id + '"></label>');
    }
  });

  $("#add_invoice").prop("disabled", true);
  $(".chk").click(function () {
    if ($("#is_replace").val() == 0 || $("#cash_return").val() == 0){

      $("#add_invoice").prop("disabled", true);
      return
    }

    $("chk").prop(":checked",false)
    if ($(this).is(":checked")) {
      $("#add_invoice").prop("disabled", false);
    } else {
      if ($(".chk").filter(":checked").length < 1) {
        $("#add_invoice").attr("disabled", true);
      }
    }
  });


});



("use strict");
function checkboxcheckSreturn(sl) {
  var check_id = "check_id_" + sl;
  var total_qntt = "total_qntt_" + sl;
  var product_id = "product_id_" + sl;
  var total_price = "total_price_" + sl;
  var discount = "discount_" + sl;
  if ($("#" + check_id).prop("checked") == true) {
    document.getElementById(total_qntt).setAttribute("required", "required");
    document.getElementById(product_id).setAttribute("name", "product_id[]");
    document.getElementById(total_qntt).setAttribute("name", "product_quantity[]");
    document.getElementById(total_price).setAttribute("name", "total_price[]");
    document.getElementById(discount).setAttribute("name", "discount[]");
  } else if ($("#" + check_id).prop("checked") == false) {
    document.getElementById(total_qntt).removeAttribute("required");
    document.getElementById(product_id).removeAttribute("name", "");
    document.getElementById(total_qntt).removeAttribute("name", "");
    document.getElementById(total_price).setAttribute("name", "total_price[]");
    document.getElementById(discount).setAttribute("name", "");
  }
}

("use strict");
function quantity_calculateSreturn(item) {
  var a = 0,
      o = 0,
      d = 0,
      p = 0;
  var sold_qty = $("#sold_qty_" + item).val();
  var quantity = $("#total_qntt_" + item).val();
  var price_item = $("#price_item_" + item).val();
  var discount = $("#discount_" + item).val();
  if (parseInt(sold_qty) < parseInt(quantity)) {
    alert("Purchase quantity less than quantity!");
    $("#total_qntt_" + item).val("");
  }
  if (parseInt(quantity) > 0) {
    var price = quantity * price_item;
    var dis = price * (discount / 100);
    $("#all_discount_" + item).val(dis);

    //Total price calculate per product
    var temp = price - dis;
    $("#total_price_" + item).val(temp);

    $(".total_price").each(function () {
      isNaN(this.value) || o == this.value.length || (a += parseFloat(this.value));
    }),
        $("#grandTotal").val(a.toFixed(2, 2));
    $(".total_discount").each(function () {
      isNaN(this.value) || p == this.value.length || (d += parseFloat(this.value));
    }),
        $("#total_discount_ammount").val(d.toFixed(2, 2));
  }
}
