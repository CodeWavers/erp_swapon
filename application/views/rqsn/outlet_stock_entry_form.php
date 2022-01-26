<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Stock</h1>
            <small>Outlet Stock Entry</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Stock</a></li>
                <li class="active">Outlet Stock Entry</li>
            </ol>
        </div>
    </section>

    <section class="content">
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
        <?php echo form_open('Crqsn/save_outlet_stock', array('class' => 'form-vertical', 'id' => 'save_out_stock', 'name' => 'save_out_stock')) ?>
        <input type="hidden" id="base_url" value="<?= base_url() ?>">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                Outlet Stock Entry
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="row">
                            <label class="col-form-label col-sm-4">Outlet Name</label>
                            <div class="col-sm-6">
                                <select name="outlet_id" id="outlet_id" class="form-control">
                                    <option value="">Select One</option>
                                    {outlet_lis}
                                    <option value="{outlet_id}">{outlet_name}</option>
                                    {/outlet_lis}
                                </select>
                            </div>
                        </div>

                        <div class="margin-top10">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>Product Name (Model) (Color) (Size) (Type)</th>
                                        <th class="text-right ">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {product_list}
                                    <tr>
                                        <td>{sl}</td>
                                        <td>
                                            {product_name} ({product_model}) ({color_name}) ({size_name}) ({ptype_name})
                                            <input type="hidden" name="product_id[]" value={product_id}>
                                        </td>
                                        <td><input class="form-control text-right" value="{pr_qty}" type="text" name="qty[]" id="qty_{sl}"></td>
                                    </tr>
                                    {/product_list}
                                </tbody>

                            </table>

                        </div>
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <?php echo form_close(); ?>
    </section>
</div>

<script type="text/javascript">
    function calculate(sl) {
        var qty = $("#qty_" + sl).val();
        var price = $("#price_" + sl).val();

        $("#row_total_" + sl).val(parseFloat(qty * price).toFixed(2));

        var grand = 0;

        $(".row_total").each(function() {
            isNaN(this.value) || 0 == this.value.length || (grand += parseFloat(this.value))
        });

        $("#grand_total").val(grand.toFixed(2));
    }

    "use strict";

    function load_dbtvouchercode(id, sl) {
        $('#txtCode_' + sl).val(id);
    }

    "use strict";

    function calculationContravoucher(sl) {
        var gr_tot1 = 0;
        var gr_tot = 0;
        // $(".total_price").each(function() {
        //     isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        // });

        $(".total_price1").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot1 += parseFloat(this.value))
        });
        $("#grandTotal0").val(gr_tot.toFixed(2, 2));
        $("#grandTotal1").val(gr_tot1.toFixed(2, 2));
    }
    "use strict";

    function addaccountContravoucher(divName) {
        var optionval = $("#headoption").val();
        var row = $("#debtAccVoucher tbody tr").length;
        var count = row + 1;
        var limits = 500;
        var tabin = 0;
        if (count == limits) alert("You have reached the limit of adding " + count + " inputs");
        else {
            var newdiv = document.createElement('tr');
            var tabin = "cmbCode_" + count;
            var tabindex = count * 2;
            newdiv = document.createElement("tr");

            newdiv.innerHTML = "<td> <select name='cmbCode[]' id='cmbCode_" + count + "' class='form-control' onchange='load_dbtvouchercode(this.value," + count + ")' required></select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_" + count + "' ></td><td><input type='number' name='txtAmountcr[]' class='form-control total_price1 text-right' id='txtAmount1_" + count + "' value='0' onkeyup='calculationContravoucher(" + count + ")'></td><td><button  class='btn btn-danger red' type='button'  onclick='deleteRowContravoucher(this)'><i class='fa fa-trash-o'></i></button></td>";
            document.getElementById(divName).appendChild(newdiv);
            document.getElementById(tabin).focus();
            $("#cmbCode_" + count).html(optionval);
            count++;

            $("select.form-control:not(.dont-select-me)").select2({
                placeholder: "Select option",
                allowClear: true
            });
        }
    }
    "use strict";

    function deleteRowContravoucher(e) {
        var t = $("#debtAccVoucher > tbody > tr").length;
        if (1 == t) alert("There only one row you can't delete.");
        else {
            var a = e.parentNode.parentNode;
            a.parentNode.removeChild(a)
        }
        calculationContravoucher()
    }
</script>