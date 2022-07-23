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

//Quantity calculat
("use strict");
function quantity_calculate(item) {
  var a = 0,
    o = 0,
    d = 0,
    p = 0;
  var sold_qty = $("#sold_qty_" + item).val();
  var quantity = $("#total_qntt_" + item).val();
  var price_item = $("#price_item_" + item).val();
  var discount = $("#discount_" + item).val();
  var add_cost = $("#total_tax_ammount").val() ? $("#total_tax_ammount").val() : 0;
  if (parseInt(sold_qty) < parseInt(quantity)) {
    alert("Sold quantity less than quantity!");
    $("#total_qntt_" + item).val("");
  }
  var price = quantity * price_item;
  var dis = price * (discount / 100);
  $("#all_discount_" + item).val(dis);
  var ttldis = $("#all_discount_" + item).val();

  //Total price calculate per product
  var temp = price - ttldis;
  $("#total_price_" + item).val(temp); //

  $(".total_price").each(function () {
    isNaN(this.value) || o == this.value.length || (a += parseFloat(this.value));
  });

  $("#base_total").val(a);

  var gr_tot = parseFloat(a);
  if ($("#cash_return").is(":checked") || $("#rep_toggle").is(":checked")) {
    var gr_total = parseFloat(a) + parseFloat(add_cost);
    if ($("#pay_person").is(":checked")) {
      $("#grandTotal").val(gr_total.toFixed(2, 2));
    }else{
      $("#grandTotal").val(parseFloat(gr_tot).toFixed(2, 2));
    }
  } else {
      $("#grandTotal").val(parseFloat(gr_tot).toFixed(2, 2));
  }

  // if ($("#rep_toggle").is(":checked")) {
  //   $("#grandTotal").val(gr_tot.toFixed(2, 2));
  // } else {
  //   $("#grandTotal").val(parseFloat(add_cost).toFixed(2, 2));
  // }

  $(".total_discount").each(function () {
    isNaN(this.value) || p == this.value.length || (d += parseFloat(this.value));
  }),
    $("#total_discount_ammount").val(d.toFixed(2, 2));
}

("use strict");
function invoice_productList(sl) {
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
          // for (var i = 0; i < obj.txnmber; i++) {
          //   var txam = obj.taxdta[i];
          //   var txclass = "total_tax" + i + "_" + sl;
          //   $("." + txclass).val(obj.taxdta[i]);
          // }
          $("#replace_price_" + sl).val(obj.price);
          // $("." + available_quantity).val(obj.total_product.toFixed(2, 2));
          // $("." + unit).val(obj.unit);
          // $("." + warrenty_date).val(obj.warrenty_date);
          // $("." + expiry_date).val(obj.expired_date);
          // $("#" + warehouse).html(obj.warehouse);
          // $("." + tax).val(obj.tax);
          // $("#txfieldnum").val(obj.txnmber);
          // $('#'+serial_no).html(obj.serial);
          // $('#'+discount_type).val(obj.discount_type);
          $("#" + discount).val(obj.discount);
          $("#stock_" + sl).val(obj.stock);
          // quantity_calculate(sl);
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

("use strict");
function delete_replace_row(e) {
  e.closest("tr").remove();
}

("use strict");
function replace_calculate(sl) {
  var qty = $("#replace_qty_" + sl).val();
  var price = $("#replace_price_" + sl).val();
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

  var x = ret_tot - a - add_cost;

  $("#rep_grand").val(x.toFixed(2, 2));

  var grand = ret_tot - a;

  $("#rep_total_cost").val(grand.toFixed(2, 2));

  if (parseFloat($("#rep_grand").val()) < 0) {
    toastr.error("Customer will pay " + Math.abs(parseFloat($("#rep_grand").val())));
  } else {
    toastr.warning("Customer will get " + Math.abs(parseFloat($("#rep_grand").val())));
  }
}

$(document).ready(function () {
  $("#rep_toggle").click(function () {
    $("#replace_table").toggle("fade", { direction: "right" }, 400);
    // if ($("#rep_toggle").html() == 'Replace <i class="fa fa-arrow-circle-down"></i>') {
    //   $("#rep_toggle").html('Replace <i class="fa fa-arrow-circle-up"></i>');
    // } else {
    //   $("#rep_toggle").html('Replace <i class="fa fa-arrow-circle-down"></i>');
    // }

    if ($("#cash_return").is(":checked")) {
      $("#cash_return").prop("checked", false);
    }

    if ($("#is_replace").val() == 0) {
      $("#is_replace").val(1);
    } else {
      $("#is_replace").val(0);
    }

    quantity_calculate(1);
  });

  $("#cash_return").click(function () {
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
