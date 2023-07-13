<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Approve Requisition</h1>
            <small>Requisition</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Approve Requisition</a></li>
                <li class="active">Approve Requisition</li>
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
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>

                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>Outlet Name</th>
                                        <th><?php echo display('date') ?></th>
                                        <th>Product Details</th>
                                        <th style="width: 70px">Available Quantity</th>
                                        <th style="width: 70px">Requested Quantity</th>
                                        <th style="width: 70px">Transfer Quantity</th>
                                        <th>Unit</th>
                                        <th>Details</th>

                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($approve)) ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($t as $approve) { ?>
                                        <tr>
                                            <td><?php echo $sl++; ?></td>
                                            <td><?php echo $approve['outlet_name'] ?> </td>
                                            <td><?php echo $approve['date'] ?> </td>
                                            <td><?php echo $approve['product_name'] . ' (' . $approve['sku'] . ')' ?> </td>
                                            <td class="s_qty"><?php echo $approve['stok_quantity'] ?> </td>
                                            <td class="r_qty"><?php echo $approve['quantity'] ?> </td>

                                            <td style="width: 50px">
                                                <input id="a_qty" style="width: 80px" type="number" class="form-control a_qty" data="" name="a_qty" value="<?php echo $this->input->get('a_qty', TRUE); ?>" />
                                                <!--                                    <input  class="sl" type="text" name="codice" value="--><?php //echo $sl;
                                                                                                                                                ?>
                                                <!--">-->

                                            </td>

                                            <td><?php echo $approve['unit'] ?> </td>
                                            <td><?php echo $approve['details'] ?> </td>

                                            <?php $id = $approve['rqsn_detail_id'] ?>


                                            <td>

                                                <a id="approve" href="" onclick="this.href='<?php echo base_url("Crqsn/isactive/$id/active/") ?>'+$(this).closest('tr').find('.a_qty').val();return confirm('<?php echo display("are_you_sure") ?>')  " class="btn btn-info btn-sm " data-toggle="tooltip" data-placement="right" title=""><i class="fa fa-check" aria-hidden="true"></i></a>

                                                <!--                                --><?php //if($this->permission1->method('aprove_v','update')->access()){
                                                                                        ?>
                                                <!--                                <a href="" id="editData" class="btn btn-info btn-sm" title="Update"><i class="fa fa-edit"></i></a>-->
                                                <!--                            --><?php //}
                                                                                    ?>
                                                <?php if ($this->permission1->method('aprove_v', 'delete')->access()) { ?>
                                                    <a href="<?php echo base_url("Crqsn/rqsn_delete/$id/") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')" title="delete"><i class="fa fa-trash"></i></a>
                                                <?php } ?>

                                            </td>
                                        </tr>
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
    // function myFunction(){
    //     var x = $('.a_qty').val();
    //     var y=$('#r_qty').html();
    //     var z=parseInt(y);
    //     if (x > z){
    //         var msg = "You can not transfer more than requested " + z + " Items";
    //         alert(msg);
    //     }
    // }


    $(document).ready(function() {


        $('.a_qty').on('keyup', function() {

        var qty = this.value;
        var y = $(this).closest('tr').find('.r_qty').html()
        var s = $(this).closest('tr').find('.s_qty').html()
        var z = parseInt(y);
        var s_qty = parseInt(s);
        //  console.log( qty);
        if (qty > z) {
            var msg = "You can not transfer more than requested " + z + " Items";
            alert(msg);
            $(".a_qty").val(z);
            
        }
        
        if (qty > s_qty) {
            var msg = "You can transfer maximum " + s_qty + " Items";
            alert(msg);
            $(".a_qty").val(z);
            
        }
       
        });
        $('.a_qty').on('change', function() {

            var qty = this.value;
            var y = $(this).closest('tr').find('.r_qty').html()
            var s = $(this).closest('tr').find('.s_qty').html()
            var z = parseInt(y);
            var s_qty = parseInt(s);
            //  console.log( qty);
            if (qty > z) {
                var msg = "You can not transfer more than requested " + z + " Items";
                alert(msg);
                $(".a_qty").val(z);
            }
            
            if (qty > s_qty) {
                var msg = "You can transfer maximum " + s_qty + " Items";
                alert(msg);
                $(".a_qty").val(z);
            }
            
        });
    });
</script>