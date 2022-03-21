
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Item Finalize</h1>
            <small>Item Finalize</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Item Finalize</a></li>
                <li class="active">Item Finalize</li>
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
                            <h4>Item Finalize</h4>
                        </div>
                    </div>
                    <div class="rqsn_panel">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered " cellspacing="0" width="100%" id="add_rqsn_table">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th><?php echo display('image') ?></th>
                                        <th class="col-md-2"><?php echo display('product_name') ?></th>
<!--                                        <th>Variation</th>-->
                                        <th>Quantity</th>

                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>

<!--                                --><?php //echo '<pre>';print_r($pur_list); exit();?>

                                <?php foreach ($pur_list as $row) {




                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['sl']?> </td>
                                        <td class="text-center"><img src="<?php echo $row['image']?>" class="img-zoom" alt="Product Photo"></td>


                                        <td width="60%">
                                            <?php echo $row['product_name']?>
                                        </td>
<!--                                        <td>-->
<!--                                            --><?php //echo $row['variation']?>
<!--                                        </td>-->
                                        <td>
                                            <input  size="10" type="text" class="form-control " value="<?php echo $row['quantity'] > 0 ? $row['quantity'] : 0;?>" style="width:100%;" name="quantity" id="quantity_<?php echo $row['product_id']?>" >
                                        </td>
                                        <td>

                                            <button type="button" id="add_btn<?=$row['sl']?>" name="add_cart" title="Add"
                                                    class="btn btn-danger add_cart"
                                                    style="border:none; outline:none"
                                                    data-sl="<?php echo $row['sl']?>"
                                                    data-productname="<?php echo $row['product_name']?>"
                                                    data-productid="<?php echo $row['product_id']?>"
                                                    data-pr_rqsndetail="<?php echo $row['pr_rqsn_detail_id']?>"
                                                    data-pr_rqsn_id="<?php echo $row['pr_rqsn_id']?>"

                                                    onclick="add_and_delete(this)"
                                            >
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>






                                        </td>
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

            var sl = $(e).data("sl");
            var rqsn_details = $(e).data('pr_rqsndetail');
            var rqsn_id = $(e).data('pr_rqsn_id');
            // var variation = $(e).data('variation');

            var btn = $("#add_btn" + sl);

            var csrf_test_name = $('[name="csrf_test_name"]').val();

            $.ajax({
                    url:"<?php echo base_url(); ?>Crqsn/update_item_finalize",
                    method:"POST",
                    data:{
                        csrf_test_name:csrf_test_name,
                        product_id:product_id,
                        product_name:product_name,
                        // variation:variation,
                        quantity:quantity,
                        rq_d_id:rqsn_details,
                        rqsn_id:rqsn_id

                    },
                    success:function(data)
                    {

                        console.log(data);
                        toastr.success("Finalized");
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


        $("#add_rqsn_table").dataTable({
            "columnDefs": [
                { "width": "5%", "targets": 9 }
            ]
        });






    });
</script>
