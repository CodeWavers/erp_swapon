
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Courier Status</h1>
            <small>Courier Status</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Courier</a></li>
                <li class="active">Courier Status</li>
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




        <!-- Manage Product report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Courier Status</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered " cellspacing="0" width="100%" id="add_rqsn_table">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th>Invoice No</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Courier Name</th>
                                        <th>Condition</th>
                                        <th>Delivery Charge</th>
                                        <th>Condition Charge</th>
                                        <th>Status</th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($pur_list as $row) {



                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['sl']?> </td>



                                        <td>
                                            <?php echo $row['invoice']?>
                                        </td>

                                        <td><?php echo $row['customer_name']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $row['courier_name']?></td>
                                        <td><?php echo $row['courier_condtion']?></td>
                                        <td><?php echo $row['shipping_cost']?></td>
                                        <td><?php echo $row['condition_cost']?></td>
                                        <td><?php echo $row['courier_status']?></td>
                                        <td class="col-sm-2">

                                            <div class="dropdown">
                                                <span class="selLabel">Select Country</span>
                                                <input type="hidden" name="cd-dropdown">
                                                <ul class="dropdown-list">
                                                    <li data-value="1">
                                                        <span>Pakistan</span>
                                                    </li>
                                                    <li data-value="2">
                                                        <span>Saudia</span>
                                                    </li>
                                                    <li data-value="3">
                                                        <span>Turkey</span>
                                                    </li>
                                                    <li data-value="4">
                                                        <span>Bangladesh</span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>



<!--                                        <td>-->
<!--                                            <button type="button" id="add_btn--><?//=$row['sl']?><!--" name="add_cart" title="Add"-->
<!--                                                class="btn btn-success add_cart"-->
<!--                                                style="border:none; outline:none"-->
<!--                                                data-sl="--><?php //echo $row['sl']?><!--"-->
<!--                                                data-productname="--><?php //echo $row['product_name']?><!--"-->
<!--                                                data-productid="--><?php //echo $row['product_id']?><!--"-->
<!--                                                data-pr_rqsndetail="--><?php //echo $row['pr_rqsn_detail_id']?><!--"-->
<!--                                                data-pr_rqsn_id="--><?php //echo $row['pr_rqsn_id']?><!--"-->
<!---->
<!--                                                onclick="add_and_delete(this)"-->
<!--                                                >-->
<!--                                            <i class="fa fa-plus" aria-hidden="true"></i>-->
<!--                                            </button>-->
<!--                                        </td>-->
                                    </tr>
                                    <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

function add_and_delete(e) {
    var a = e.parentNode.parentNode;


    var product_id = $(e).data("productid");
            var product_name = $(e).data("productname");

            var quantity = $('#quantity_' + product_id).val();
            var cutting = $('#cutting_' + product_id).val();
            var printing = $('#printing_' + product_id).val();
            var sewing = $('#sewing_' + product_id).val();
            var finishing = $('#finishing_' + product_id).val();
            var sl = $(e).data("sl");
            var rqsn_details = $(e).data('pr_rqsndetail');
            var rqsn_id = $(e).data('pr_rqsn_id');

            var btn = $("#add_btn" + sl);

            var csrf_test_name = $('[name="csrf_test_name"]').val();

            $.ajax({
                    url:"<?php echo base_url(); ?>Crqsn/update_pr_rqsn",
                    method:"POST",
                    data:{
                        csrf_test_name:csrf_test_name,
                        product_id:product_id,
                        product_name:product_name,
                        quantity:quantity,
                        cutting:cutting,
                        printing:printing,
                        sewing:sewing,
                        finishing:finishing,
                        rq_d_id:rqsn_details,
                        rqsn_id:rqsn_id

                    },
                    success:function(data)
                    {

                        console.log(data);
                        toastr.success("Updated");
                        $('#cart_details').html(data);
                         $('#' + product_id).val('');
                        // $('.add_cart').attr()
                        btn.html('<i class="fa fa-check"></i>');
                        btn.removeClass("btn-success");
                        btn.addClass("btn-warning");
                        btn.attr("disabled", true);
                         // a.parentNode.removeChild(a);
                        // setTimeout(function(){
                        //     btn.html('<i class="fa fa-plus"></i>')
                        //     btn.removeClass("btn-warning");
                        //     btn.addClass("btn-success");
                        // },
                        // 4000
                        // );

                    }
                    // error:function (e) {
                    //
                    //     console.log(e)
                    //
                    // }
                });
}



    $(document).ready(function(){



            $(".selLabel").click(function () {
                $('.dropdown').toggleClass('active');
            });

            $(".dropdown-list li").click(function() {
                $('.selLabel').text($(this).text());
                $('.dropdown').removeClass('active');
                $('.selected-item p span').text($('.selLabel').text());
            });




        $("#add_rqsn_table").dataTable({
            "columnDefs": [
                { "width": "5%", "targets": 9 }
            ]
        });




        // $('.add_cart').click(function(){
        //     var product_id = $(this).data("productid");
        //     var product_name = $(this).data("productname");
        //     var category_name = $(this).data("category");
        //     var subcat = $(this).data("subcat");
        //     var parts = $(this).data("parts");
        //     var sku = $(this).data("sku");
        //     var brand = $(this).data("brand");
        //     var model = $(this).data("model");
        //     var quantity = $('#' + product_id).val();
        //     var sl = $(this).data("sl");
        //     var rqsn_details = $(this).data('rqsndetail');
        //     var btn = $("#add_btn" + sl);
        //     // console.log(product_id)
        //     // console.log(product_name)
        //     // console.log(category_name)
        //     // console.log(quantity)
        //     var csrf_test_name = $('[name="csrf_test_name"]').val();

        //     $.ajax({
        //             url:"<?php echo base_url(); ?>Cpurchase/add_to_draft",
        //             method:"POST",
        //             data:{
        //                 csrf_test_name:csrf_test_name,
        //                 product_id:product_id,
        //                 product_name:product_name,
        //                 category_name:category_name,
        //                 subcat:subcat,
        //                 parts:parts,
        //                 sku:sku,
        //                 brand:brand,
        //                 model:model,
        //                 quantity:quantity
        //             },
        //             success:function(data)
        //             {

        //                 console.log(data);
        //                 toastr.success("Added to purchase order");
        //                 $('#cart_details').html(data);
        //                 $('#' + product_id).val('');
        //                 // $('.add_cart').attr()
        //                 btn.html('<i class="fa fa-check"></i>');
        //                 btn.removeClass("btn-success");
        //                 btn.addClass("btn-warning");
        //                 // setTimeout(function(){
        //                 //     btn.html('<i class="fa fa-plus"></i>')
        //                 //     btn.removeClass("btn-warning");
        //                 //     btn.addClass("btn-success");
        //                 // },
        //                 // 4000
        //                 // );

        //             }
        //             // error:function (e) {
        //             //
        //             //     console.log(e)
        //             //
        //             // }
        //         });
        // });



    });
</script>
