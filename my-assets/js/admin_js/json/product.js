var count = 2;
var limits = 500;

("use strict");
//Add purchase input field
function addpruduct(e) {
  var supplier = $("#supplier_list").val();
  var t =
    '<td><select name="supplier_id[]" class="form-control" required=""><option value=""> select Supplier</option>' +
    supplier +
    '</select> </td><td class=""><input type="text"  class="form-control text-right" name="supplier_price[]" placeholder="0.00"  required  min="0"/></td><td> <a  id="add_purchase_item" class="btn btn-info btn-sm" name="add-invoice-item" onClick="addpruduct(' +
    "proudt_item" +
    ')"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a class="btn btn-danger btn-sm"  value="" onclick="deleteRow(this)" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
  count == limits
    ? alert("You have reached the limit of adding " + count + " inputs")
    : $("tbody#proudt_item").append("<tr>" + t + "</tr>");
  $("select.form-control:not(.dont-select-me)").select2({
    placeholder: "Select option",
    allowClear: true,
  });
}
("use strict");
function deleteRow(e) {
  var t = $("#product_table > tbody > tr").length;
  if (1 == t) alert("There only one row you can't delete.");
  else {
    var a = e.parentNode.parentNode;
    a.parentNode.removeChild(a);
  }
}

function pr_status_changed(status) {
  var base_url = $("#base_url").val();

  var csrf_test_name = $('[name="csrf_test_name"]').val();
  // console.log("ok");

  $.ajax({
    url: base_url + "Cproduct/get_statuswise_category/" + status,
    type: "post",
    data: {
      csrf_test_name: csrf_test_name,
    },
    success: function (data) {
      // console.log(data);
      $("#category_id").html(data);
    },
  });

  $.ajax({
    url: base_url + "Cproduct/get_statuswise_ptype/" + status,
    type: "post",
    data: {
      csrf_test_name: csrf_test_name,
    },
    success: function (data) {
      // console.log(data);
      $("#ptype_id").html(data);
    },
  });

  if (status == 2 || status == 3) {
    $("#sell_price").removeAttr("required");
    $("#sale_price_div").hide();
    $("#product_code").removeAttr("required");
    $(".pr_code_div").hide();
  } else {
    $("#sell_price").attr("required", "required");
    $("#sale_price_div").show();
    $("#product_code").attr("required", "required");

  }

  if (status ==1){
    $(".pr_code_div").show();

  }


  if (status == 2) {
    $("#mat_code_div").show();
    $(".pr_code_div").hide();
  } else {
    $("#mat_code_div").hide();
  }
}

window.onload = function () {
  var text_input = document.getElementById("product_id");
  text_input.focus();
  text_input.select();
};
