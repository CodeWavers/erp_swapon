$(document).ready(function () {
    "use strict";
    $("#service_quotation_div").click(function () {
        $("#quotation_service").toggle(1500, "easeOutQuint", function () {});
    });

    if (!$("#isAdd")) quantity_calculate(1);
});

("use strict");
function get_customer_info(t) {
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + "Cquotation/get_customer_info",
        type: "POST",
        data: { customer_id: t, csrf_test_name: csrf_test_name },
        success: function (r) {
            r = JSON.parse(r);
            $("#address").val(r.customer_address);
            $("#mobile").val(r.customer_mobile);
            $("#website").val(r.customer_email);
        },
    });
}

("use strict");
function customer_autocomplete(sl) {
    var customer_id = $("#customer_id").val();
    // Auto complete
    var options = {
        minLength: 0,
        source: function (request, response) {
            var customer_name = $("#customer_name").val();
            var csrf_test_name = $('[name="csrf_test_name"]').val();
            var base_url = $("#base_url").val();

            $.ajax({
                url: base_url + "Cinvoice/customer_autocomplete",
                method: "post",
                dataType: "json",
                data: {
                    term: request.term,
                    customer_id: customer_name,
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
            $(this)
                .parent()
                .parent()
                .find("#autocomplete_customer_id")
                .val(ui.item.value.id);
            $("#customer_mobile_two").val(ui.item.value.mobile);
            var customer_id = ui.item.value.id;
            customer_due(customer_id);

            $(this).unbind("change");
            return false;
        },
    };

    $("body").on("keypress.autocomplete", "#customer_name", function () {
        $(this).autocomplete(options);
    });
}

("use strict");
function customer_due(id) {
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + "Cinvoice/previous",
        type: "post",
        data: { customer_id: id, csrf_test_name: csrf_test_name },
        success: function (msg) {
            if ($("#previous")) $("#previous").val(msg);
        },
        error: function (xhr, desc, err) {
            alert("failed");
        },
    });
}

("use strict");
function bank_paymet(val, sl) {
    if (val == 2 || 3 || 4 || 5 || 6) {
        if (val == 2) {
            var style = "block";
            document.getElementById("bank_id_" + sl).setAttribute("required", true);
            document.getElementById("ammnt_" + sl).style.display = "none";
        } else {
            var style = "none";
            document.getElementById("bank_id_" + sl).removeAttribute("required");
            document.getElementById("ammnt_" + sl).style.display = "block";
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
            var style = "block";
            document.getElementById("card_id_" + sl).setAttribute("required", true);
        } else {
            var style = "none";
            document.getElementById("card_id_" + sl).removeAttribute("required");
        }

        document.getElementById("card_div_" + sl).style.display = style;
    }
}

("use strict");
function quantity_calculate(item) {
    var quantity = $("#total_qntt_" + item).val();
    var available_quantity = $(".available_quantity_" + item).val();
    var price_item = $("#price_item_" + item).val();
    var invoice_discount = $("#invoice_discount").val();
    var warrenty_date = $("#warrenty_date_" + item).val();
    var warehouse = $(".warehouse_" + item).val();
    var discount = $("#discount_" + item).val();
    var total_tax = $("#total_tax_" + item).val();
    var total_discount = $("#total_discount_" + item).val();
    var taxnumber = $("#txfieldnum").val();
    var dis_type = $("#discount_type_" + item).val();
    // if (parseInt(quantity) > parseInt(available_quantity)) {
    //   var message = "You can Sale maximum " + available_quantity + " Items";
    //   alert(message);
    //   $("#total_qntt_" + item).val("");
    //   var quantity = 0;
    //   $("#total_price_" + item).val(0);
    //   for (var i = 0; i < taxnumber; i++) {
    //     $("#all_tax" + i + "_" + item).val(0);
    //     quantity_calculate(item);
    //   }
    // }

    var just_tot = quantity * price_item;
    var row_tot = just_tot - just_tot * (discount / 100);

    $("#total_price_" + item).val(row_tot.toFixed(2, 2));

    calculateSum();
    invoice_paidamount();
}
//Calculate Sum
("use strict");
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
        s_cost = $("#shipping_cost").val() !== "" ? $("#shipping_cost").val() : 0;

    //Total Tax
    // for (var i = 0; i < taxnumber; i++) {
    //   var j = 0;
    //   $(".total_tax" + i).each(function () {
    //     isNaN(this.value) ||
    //       0 == this.value.length ||
    //       (j += parseFloat(this.value));
    //   });
    //   $("#total_tax_ammount" + i).val(j.toFixed(2, 2));
    // }
    //Total Discount
    $(".total_discount").each(function () {
        isNaN(this.value) ||
        0 == this.value.length ||
        (p += parseFloat(this.value));
    }),
        $("#total_discount_ammount").val(p.toFixed(2, 2)),
        $(".totalTax").each(function () {
            isNaN(this.value) ||
            0 == this.value.length ||
            (f += parseFloat(this.value));
        }),
        // $("#total_tax_amount").val(f.toFixed(2, 2)),
        //Total Price
        $(".total_price").each(function () {
            isNaN(this.value) ||
            0 == this.value.length ||
            (t += parseFloat(this.value));
        }),
        $(".dppr").each(function () {
            isNaN(this.value) ||
            0 == this.value.length ||
            (ad += parseFloat(this.value));
        }),
        (o = a.toFixed(2, 2)),
        (e = t.toFixed(2, 2)),
        (tx = f.toFixed(2, 2)),
        (ds = p.toFixed(2, 2));

    var test =
        parseFloat(tx) +
        parseFloat(s_cost ? s_cost : 0) +
        parseFloat(e) -
        parseFloat(ds) +
        parseFloat(ad);
    $("#grandTotal").val(test.toFixed(2, 2));

    var gt = $("#grandTotal").val();
    var invdis = $("#invoice_discount").val();
    var total_discount_ammount = $("#total_discount_ammount").val();
    var ttl_discount = +total_discount_ammount;
    $("#total_discount_ammount").val(ttl_discount.toFixed(2, 2));
    var grnt_totals = gt;
    invoice_paidamount();
    $("#grandTotal").val(grnt_totals ? grnt_totals : 0);
    calc_paid();
}

("use strict");
function calc_paid() {
    var pt = 0;
    $(".p_amount").each(function () {
        isNaN(this.value) ||
        0 == this.value.length ||
        (pt += parseFloat(this.value));
    });

    const due = parseFloat($("#grandTotal").val()) - (pt ? pt : 0);

    $("#paidAmount").val(pt ? parseFloat(pt).toFixed(2) : 0);
    $("#due_amount").val(parseFloat(due).toFixed(2));
    invoice_paidamount();
}

("use strict");
function invoice_paidamount() {
    var prb = parseFloat($("#previous").val(), 10);
    var pr = 0;
    var d = 0;
    var nt = 0;
    if (prb != 0) {
        pr = prb;
    } else {
        pr = 0;
    }
    var t = $("#grandTotal").val(),
        a = $("#paidAmount").val(),
        e = t - a,
        f = e + pr,
        nt = parseFloat(t, 10) + pr;
    d = a - nt;
    $("#n_total").val(nt.toFixed(2, 2));
    if (f > 0) {
        $("#dueAmmount").val(f.toFixed(2, 2));
        if (a <= f) {
            $("#change").val(0);
        }
    } else {
        if (a < f) {
            $("#change").val(0);
        }
        if (a > f) {
            $("#change").val(d.toFixed(2, 2));
        }
    }
}

("use strict");
function invoice_productList(sl) {
    var priceClass = "price_item" + sl;
    var available_quantity = "available_quantity_" + sl;
    var unit = "unit_" + sl;
    var tax = "total_tax_" + sl;
    var serial_no = "serial_no_" + sl;
    var discount_type = "discount_type_" + sl;
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    var base_url = $("#base_url").val();

    // Auto complete
    var options = {
        minLength: 0,
        source: function (request, response) {
            var product_name = $("#product_name_" + sl).val();
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
            $(this)
                .parent()
                .parent()
                .find(".autocomplete_hidden_value")
                .val(ui.item.value);
            $(this).val(ui.item.label);
            var id = ui.item.value;
            var dataString = "product_id=" + id;
            var base_url = $(".baseUrl").val();
            var outlet_id = $("#outlet_id").val();

            console.log(outlet_id);

            $.ajax({
                type: "POST",
                url: base_url + "Cinvoice/retrieve_product_data_inv",
                data: {
                    product_id: id,
                    csrf_test_name: csrf_test_name,
                    outlet_id: outlet_id,
                },
                cache: false,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    for (var i = 0; i < obj.txnmber; i++) {
                        var txam = obj.taxdta[i];
                        var txclass = "total_tax" + i + "_" + sl;
                        $("." + txclass).val(obj.taxdta[i]);
                    }
                    $("." + priceClass).val(obj.price);
                    obj.total_product
                        ? $("." + available_quantity).val(obj.total_product.toFixed(2, 2))
                        : $("." + available_quantity).val(0);
                    $("." + unit).val(obj.unit);
                    $("." + tax).val(obj.tax);
                    $("#txfieldnum").val(obj.txnmber);
                    $("#supplier_price_" + sl).val(obj.supplier_price);
                    $("#" + serial_no).html(obj.serial);
                    $("#" + discount_type).val(obj.discount_type);
                    quantity_calculate(sl);
                    //This Function Stay on others.js page
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
function delivery_type(val) {
    if (val == 2) {
        var style = "block";
        document.getElementById("courier_div").setAttribute("required", true);
    } else {
        var style = "none";
        document.getElementById("courier_div").removeAttribute("required");
    }

    document.getElementById("courier_div").style.display = style;
}

("use strict");
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
        '<div class="row margin-top10"  >' +
        '<div class="col-sm-4">' +
        '<label for="payment_type" class="col-sm-5 col-form-label">Payment Type <i class="text-danger">*</i></label>' +
        '<div class="col-sm-7">' +
        '<select name="paytype[]" class="form-control" required="" onchange="bank_paymet(this.value, ' +
        sl +
        ')" tabindex="3">' +
        '<option value="1">Cash Payment</option>' +
        '<option value="2">Cheque Payment</option>' +
        '<option value="4">Bank Payment</option>' +
        ' <option value="3">Bkash Payment</option>' +
        ' <option value="5">Nagad Payment</option>' +
        ' <option value="6">Card Payment</option>' +
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
        '<div class="col-sm-3"id="ammnt_' +
        sl +
        '" >' +
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
function delete_row(e) {
    e.closest(".row").remove();
}

function receiver_changed(e) {
    var id = e.value;
    // console.log(e);
    var num_div = $("#receiver_num_div");
    var num_inp = $("#del_rec_num");
    var base_url = $(".baseUrl").val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    // console.log(id);
    $.ajax({
        url: base_url + "Cinvoice/get_receiver_num",
        type: "post",
        data: {
            rec_id: id,
            csrf_test_name: csrf_test_name,
        },
        success: function (msg) {
            num_div.css("display", "block");
            num_inp.val(msg);
        },
        error: function (xhr, desc, err) {
            alert("failed");
        },
    });
}

("use strict");
function addService(t) {
    var row = $("#serviceInvoice tbody tr").length;
    var count = row + 1;
    var limits = 500;
    var taxnumber = $("#sertxfieldnum").val();
    var tbfild = "";
    for (var i = 0; i < taxnumber; i++) {
        var taxincrefield =
            '<input id="total_service_tax' +
            i +
            "_" +
            count +
            '" class="total_service_tax' +
            i +
            "_" +
            count +
            '" type="hidden"><input id="all_servicetax' +
            i +
            "_" +
            count +
            '" class="total_service_tax' +
            i +
            '" type="hidden" name="stax[]">';
        tbfild += taxincrefield;
    }
    if (count == limits)
        alert("You have reached the limit of adding " + count + " inputs");
    else {
        var a = "service_name" + count,
            tabindex = count * 5,
            e = document.createElement("tr");
        //e.setAttribute("id", count);
        tab1 = tabindex + 1;
        tab2 = tabindex + 2;
        tab3 = tabindex + 3;
        tab4 = tabindex + 4;
        tab5 = tabindex + 5;
        tab6 = tabindex + 6;
        (e.innerHTML =
            "<td><input type='text' name='service_name' onkeypress='invoice_serviceList(" +
            count +
            ");' class='form-control serviceSelection common_product' placeholder='Service Name' id='" +
            a +
            "'  tabindex='" +
            tab1 +
            "'><input type='hidden' class='common_product autocomplete_hidden_value  service_id_" +
            count +
            "' name='service_id[]' id='SchoolHiddenId'/></td><td> <input type='text' name='service_quantity[]'  onkeyup='serviceCAlculation(" +
            count +
            ");' onchange='serviceCAlculation(" +
            count +
            ");' id='total_service_qty_" +
            count +
            "' class='common_qnt total_service_qty_" +
            count +
            " form-control text-right'  placeholder='0.00' min='0' tabindex='" +
            tab2 +
            "'/></td><td><input type='text' name='service_rate[]' onkeyup='serviceCAlculation(" +
            count +
            ");' onchange='serviceCAlculation(" +
            count +
            ");' id='service_rate_" +
            count +
            "' class='common_rate service_rate" +
            count +
            " form-control text-right'  placeholder='0.00' min='0' tabindex='" +
            tab3 +
            "'/></td><td><input type='text' name='sdiscount[]' onkeyup='serviceCAlculation(" +
            count +
            ");' onchange='serviceCAlculation(" +
            count +
            ");' id='sdiscount_" +
            count +
            "' class='form-control text-right common_servicediscount' placeholder='0.00' min='0' tabindex='" +
            tab4 +
            "' /><input type='hidden' value='' name='discount_type' id='sdiscount_type_" +
            count +
            "'></td><td class='text-right'><input class='common_total_service_amount total_serviceprice form-control text-right' type='text' name='total_service_amount[]' id='total_service_amount_" +
            count +
            "' value='0.00' readonly='readonly'/></td><td>" +
            tbfild +
            "<input type='hidden'  id='totalServiceDicount_" +
            count +
            "' class='totalServiceDicount_" +
            count +
            "' /><input type='hidden' id='all_service_discount_" +
            count +
            "' class='totalServiceDicount' name='sdiscount_amount[]'/><button tabindex='" +
            tab5 +
            "'  class='btn btn-danger text-center' type='button' onclick='deleteServicraw(this)'><i class='fa fa-close'></i></button></td>"),
            document.getElementById(t).appendChild(e),
            document.getElementById(a).focus(),
            document
                .getElementById("add_service_item")
                .setAttribute("tabindex", tab6);
        count++;
    }
}
//Quantity calculat
("use strict");
function serviceCAlculation(item) {
    var quantity = $("#total_service_qty_" + item).val();
    var service_rate = $("#service_rate_" + item).val();
    var service_discount = $("#service_discount").val();
    var discount = $("#sdiscount_" + item).val();
    var taxnumber = $("#sertxfieldnum").val();
    var totalServiceDicount = $("#totalServiceDicount_" + item).val();
    var dis_type = $("#sdiscount_type_" + item).val();

    if (quantity > 0 || discount > 0) {
        if (dis_type == 1) {
            var price = quantity * service_rate;
            var dis = +((price * discount) / 100);

            $("#all_service_discount_" + item).val(dis);

            //Total price calculate per product
            var temp = price - dis;
            var ttletax = 0;
            $("#total_service_amount_" + item).val(price);
            for (var i = 0; i < taxnumber; i++) {
                var tax =
                    (temp - ttletax) * $("#total_service_tax" + i + "_" + item).val();
                ttletax += Number(tax);
                $("#all_servicetax" + i + "_" + item).val(tax);
            }
        } else if (dis_type == 2) {
            var price = quantity * service_rate;

            // Discount cal per product
            var dis = discount * quantity;

            $("#all_service_discount_" + item).val(dis);

            //Total price calculate per product
            var temp = price - dis;
            $("#total_service_amount_" + item).val(price);

            var ttletax = 0;
            for (var i = 0; i < taxnumber; i++) {
                var tax =
                    (temp - ttletax) * $("#total_service_tax" + i + "_" + item).val();
                ttletax += Number(tax);
                $("#all_servicetax" + i + "_" + item).val(tax);
            }
        } else if (dis_type == 3) {
            var total_service_amount = quantity * service_rate;

            // Discount cal per product
            $("#all_service_discount_" + item).val(discount);
            //Total price calculate per product
            var price = total_service_amount - discount;
            $("#total_service_amount_" + item).val(total_service_amount);

            var ttletax = 0;
            for (var i = 0; i < taxnumber; i++) {
                var tax =
                    (price - ttletax) * $("#total_service_tax" + i + "_" + item).val();
                ttletax += Number(tax);
                $("#all_servicetax" + i + "_" + item).val(tax);
            }
        }
    } else {
        var n = quantity * service_rate;
        var c = quantity * service_rate * total_service_tax;
        $("#total_service_amount_" + item).val(n),
            $("#all_servicetax_" + item).val(c);
    }
    ServiceCalculation();
}
//Calculate Sum
("use strict");
function ServiceCalculation() {
    var taxnumber = $("#sertxfieldnum").val();

    var t = 0,
        a = 0,
        e = 0,
        o = 0,
        p = 0,
        f = 0;

    //Total Tax
    for (var i = 0; i < taxnumber; i++) {
        var j = 0;
        $(".total_service_tax" + i).each(function () {
            isNaN(this.value) ||
            0 == this.value.length ||
            (j += parseFloat(this.value));
        });
        $("#total_service_tax_amount" + i).val(j.toFixed(2, 2));
    }

    //Discount part
    $(".totalServiceDicount").each(function () {
        isNaN(this.value) ||
        0 == this.value.length ||
        (p += parseFloat(this.value));
    }),
        $("#total_service_discount").val(p.toFixed(2, 2)),
        $(".totalServiceTax").each(function () {
            isNaN(this.value) ||
            0 == this.value.length ||
            (f += parseFloat(this.value));
        }),
        $("#total_service_tax").val(f.toFixed(2, 2)),
        //Total Price
        $(".total_serviceprice").each(function () {
            isNaN(this.value) ||
            0 == this.value.length ||
            (t += parseFloat(this.value));
        }),
        (o = f.toFixed(2, 2)),
        (e = t.toFixed(2, 2));
    f = p.toFixed(2, 2);

    var test = +o + +e + -f;
    $("#serviceGrandTotal").val(test.toFixed(2, 2));

    var gt = $("#serviceGrandTotal").val();
    var invdis = $("#service_discount").val();
    var total_service_discount = $("#total_service_discount").val();
    var ttl_discount = +total_service_discount + +invdis;
    $("#total_service_discount").val(ttl_discount.toFixed(2, 2));
    var grnt_totals = gt;
    $("#serviceGrandTotal").val(grnt_totals);
}

//Delete a row of table
("use strict");
function deleteServicraw(t) {
    var a = $("#serviceInvoice > tbody > tr").length;
    //    alert(a);
    if (1 == a) alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e), ServiceCalculation();
        var current = 1;
        $("#serviceInvoice > tbody > tr td input.productSelection").each(
            function () {
                current++;
                $(this).attr("id", "product_name" + current);
            }
        );
        var common_qnt = 1;
        $("#serviceInvoice > tbody > tr td input.common_qnt").each(function () {
            common_qnt++;
            $(this).attr("id", "total_service_qty_" + common_qnt);
            $(this).attr("onkeyup", "serviceCAlculation(" + common_qnt + ");");
            $(this).attr("onchange", "serviceCAlculation(" + common_qnt + ");");
        });
        var common_rate = 1;
        $("#serviceInvoice > tbody > tr td input.common_rate").each(function () {
            common_rate++;
            $(this).attr("id", "service_rate_" + common_rate);
            $(this).attr("onkeyup", "serviceCAlculation(" + common_qnt + ");");
            $(this).attr("onchange", "serviceCAlculation(" + common_qnt + ");");
        });
        var common_servicediscount = 1;
        $("#serviceInvoice > tbody > tr td input.common_servicediscount").each(
            function () {
                common_servicediscount++;
                $(this).attr("id", "sdiscount_" + common_servicediscount);
                $(this).attr("onkeyup", "serviceCAlculation(" + common_qnt + ");");
                $(this).attr("onchange", "serviceCAlculation(" + common_qnt + ");");
            }
        );
        var common_total_service_amount = 1;
        $("#serviceInvoice > tbody > tr td input.common_total_service_amount").each(
            function () {
                common_total_serviceprice++;
                $(this).attr("id", "total_serviceprice_" + common_total_price);
            }
        );
    }
}
var count = 2,
    limits = 500;

$(document).ready(function () {
    var is_quotation = $("#is_quotation").val();
    if (is_quotation !== "") {
        $("#quotation_service").css("display", "block");
    } else {
        $("#quotation_service").css("display", "none");
    }
});
