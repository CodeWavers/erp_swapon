<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Barcode Print</h1>
            <small>Barcode Print</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Product</a></li>
                <li class="active">Barcode Print</li>
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
        <?php echo form_open('Cproduct/insert_barcode_print', array('class' => 'form-vertical', 'id' => 'submit_form', 'name' => '')) ?>
        <input type="hidden" id="base_url" value="<?= base_url() ?>">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                Barcode Print
                            </h4>
                        </div>

                    </div>


                    <div class="panel-body">


                        <div class="row">


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Date:
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php if ($access == 'view'){ ?>
                                            <input type="text" required tabindex="2" class="form-control datepicker" name="date" value="<?= ($access === "view") ? "{st_date}" : date('Y-m-d')?>" id="date" readonly/>
                                        <?php }else{ ?>
                                            <input type="text" required tabindex="2" class="form-control datepicker" name="date" value="<?= ($access === "edit") ? "{st_date}" : date('Y-m-d')?>" id="date"  />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="add_item" class="col-sm-4 col-form-label"><?php echo display('barcode') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="product_name" class="form-control bq" placeholder='Barcode' id="add_item_m_p" autocomplete='off' tabindex="1" value="">
                                        <input type="hidden" id="product_value" name="">

                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="margin-top10">


                                <table id="addinvoice" class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>SKU </th>
                                        <th>Product Name </th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th>Category Name </th>
                                        <th class="text-right ">Quantity</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>


                        </div>



                            <button type="submit" id="submit_btn" formtarget="_blank"  name="submit_form" class="btn btn-success btn-md submit_btn">Submit</button>


                    </div>
                </div>
            </div>
        </div>

        <?php echo form_close(); ?>
    </section>
</div>

<script type="text/javascript">



    $(document).ready(function () {
        var table = $('#st_table').DataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: [1, 2, 3],
                },
            ],
        });

        $('.submit_btn').click(function () {
            // table.clear();
            table.destroy();
        });



        $('#add_item_m_p').keydown(function(e) {
            if (e.keyCode == 13) {
                // e.preventDefault()
                var rowCount = document.getElementById('addinvoice').rows.length;

                // alert(rowCount)
                var product_id = $(this).val();
                var exist = $("#SchoolHiddenId_" + product_id).val();
                var qty = $("#total_qntt_" + product_id).val();
                // var add_qty = parseInt(qty) + 1;
                var csrf_test_name = $('[name="csrf_test_name"]').val();
                var base_url = $("#base_url").val();
                if (product_id == exist) {
                    toastr.error('Already inserted!!')
                    // $("#total_qntt_" + product_id).val(add_qty);
                    document.getElementById('add_item_m_p').value = '';
                    document.getElementById('add_item_m_p').focus();
                } else {
                    $.ajax({
                        type: "post",
                        async: false,
                        url: base_url + 'Cproduct/append_product',
                        data: {
                            product_id: product_id,
                            rowCount: rowCount,
                            csrf_test_name: csrf_test_name
                        },
                        success: function(data) {
                            if (data == false) {
                                toastr.error('This Product Not Found !');
                                document.getElementById('add_item_m_p').value = '';
                                document.getElementById('add_item_m_p').focus();

                            } else {
                                $("#hidden_tr").css("display", "none");
                                document.getElementById('add_item_m_p').value = '';
                                document.getElementById('add_item_m_p').focus();
                                $('#addinvoice tbody').append(data);

                            }
                        },
                        error: function() {
                            toastr.error('Request Failed, Please check your code and try again!');
                        }
                    });
                }
            }
        });
    });

    function deleteRow(t) {
        var a = $("#addinvoice > tbody > tr").length;
//    alert(a);
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e);
    }

    $('#submit_form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });




</script>