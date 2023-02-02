<!-- Stock List Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('stock_report') ?></h1>
            <small><?= $heading_text ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('stock') ?></a></li>
                <li class="active"><?= $heading_text ?></li>
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



        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title text-right">

                        </div>
                    </div>
                    <div class="panel-body">
                        
                        <div>
                            <div class="table-responsive" id="printableArea">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="rqsn_approve">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center">Outlet Name</th>
                                            <th class="text-center"><?php echo display('date') ?></th>
                                            <th class="text-center">Product Details</th>
                                            <th class="text-center">Available Quantity</th>
                                            <th class="text-center">Requested Quantity</th>
                                            <th class="text-center">Transfer Quantity</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Details</th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                </table>
                            </div>
                        </div>
                        <input type="hidden" id="currency" value="{currency}" name="">
                       
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("sss")
        $('.a_qty').on('keyup', function() {
            alert("tt");
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