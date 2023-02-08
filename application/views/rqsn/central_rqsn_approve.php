<!-- Stock List Start -->
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
                                            <button class="btn btn-success" onclick="rqsn_approve()">Approve</button>
                                            <button class="btn btn-danger" onclick="rqsn_delete()">Delete</button>
                        <div class="panel-title text-right">

                        </div>
                    </div>
                    <div class="panel-body">
                        
                        <div>
                            
                            <div class="table-responsive" id="printableArea">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="rqsn_approve">
                                    <thead>
                                        <tr>
                                        <th class="table-checkbox"><input id="selectAll" type="checkbox" class="group-checkable"></th>
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
<!-- <script type="text/javascript">
    $(document).ready(function() {
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
    
</script> -->
<script type="text/javascript">
    $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

     });
     function rqsn_approve(e)
     {
        var rqsn_ids = [];
        var stocks = [];
        var approve_qntys = [];
        $(".data-check:checked").each(function () {
        var rqsn_id = $(this).parents('tr').find('input[name=rqsn_id]').val();
        var stock = $(this).parents('tr').find('input[name=stocks]').val();
        var approve_qnty = $(this).parents('tr').find('input[name=a_qty]').val();
        rqsn_ids.push(rqsn_id);
        stocks.push(stock);
        approve_qntys.push(approve_qnty);
        });
        if(rqsn_ids.length >0)
        {
            console.log(rqsn_ids);
            var csrf_test_name = $('[name="csrf_test_name"]').val();
        console.log(rqsn_ids);
        console.log(stocks);
        console.log(approve_qntys);
        alert("Test");
        $.ajax({
            url: '<?= base_url() ?>' + 'Crqsn/isactiveall',
            type: 'POST',
            data: {
                rqsn_ids: rqsn_ids,
                stocks: stocks,
                approve_qntys: approve_qntys,
                 csrf_test_name: csrf_test_name,
            },
            success: function(data) {
                if(data)
                {
                    location.reload();
                }
                
            }
        });
        }
        else{
            alert("At least select One !");
        }
        
     }
     function rqsn_delete(e)
     {
        var rqsn_ids = [];
        $(".data-check:checked").each(function () {
        var rqsn_id = $(this).parents('tr').find('input[name=rqsn_id]').val();
        rqsn_ids.push(rqsn_id);
        });
        if(rqsn_ids.length >0)
        {
            console.log(rqsn_ids);
            var csrf_test_name = $('[name="csrf_test_name"]').val();
        $.ajax({
            url: '<?= base_url() ?>' + 'Crqsn/rqsn_delete_all',
            type: 'POST',
            data: {
                rqsn_ids: rqsn_ids,
                 csrf_test_name: csrf_test_name,
            },
            success: function(data) {
                if(data)
                {
                    location.reload();
                }
                
            }
        });
        }
        else{
            alert("At least select One !");
        }
        
     }

    $(document).ready(function() {
        var x = $('#a_qty').val();
        var y = $('#r_qty').html();
        var z = parseInt(y);


        $('.a_qty').on('change', function() {
            var qty = this.value;
            if (qty > z) {
                var msg = "You can not transfer more than " + y + " Items";
                alert(msg);
            }
        });
    });
</script>