<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Outlet Received </h1>
            <small>Outlet Received</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Outlet Received </a></li>
                <li class="active">Outlet Received </li>
                <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">
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

                   
                                            <div class="col-sm-6">
                                            <button class="btn btn-success" onclick="myFunction()">Approve</button>
                                                <!-- <input type="submit"  class="btn btn-success" name="" value="<?php echo display('submit') ?>" tabindex="17"/> -->
                                            </div>
                                            
                    <div class="panel-body">

                        <div class="">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th class="table-checkbox"><input id="selectAll" type="checkbox" class="group-checkable"></th>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th><?php echo display('date') ?></th>
                                        <th>Product Details</th>
                                        <th style="width: 70px">Transferred Quantity</th>
                                        <th>Unit</th>
                                        <th>Details</th>

                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($t)) ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($t as $approve) { ?>
                                        <tr>
                                        <?php $id = $approve['rqsn_detail_id'] ?>
                                            <input type="hidden" name="rqsn_id" id="rqsn_id" value="<?php echo $id ?>">
                                            <td><input type="checkbox" class="data-check flat-green"></td>
                                            
                                            
                                            
                                            <td><?php echo $sl++; ?></td>


                                            <td> <?php if ($approve['to_id'] == 'HK7TGDT69VFMXB7') {
                                                        echo html_escape($approve['cw']);
                                                    } else echo html_escape($approve['from']); ?></td>
                                            <td><?php echo html_escape($approve['otlt_name']); ?></td>
                                            <td><?php echo html_escape($approve['date']); ?></td>
                                            <td><?php echo html_escape($approve['product_name']); ?></td>
                                            <td id="r_qty"><?php echo $approve['a_qty']; ?></td>
                                            <td><?php echo html_escape($approve['unit']); ?></td>
                                            <td><?php echo html_escape($approve['details']); ?></td>
                                            <td>

                                                <?php $id = $approve['rqsn_detail_id'] ?>
                                                <a id="approve" href="" onclick="this.href='<?php echo base_url("Crqsn/isreceive/$id/active/") ?>'" class="btn btn-info" data-toggle="tooltip" data-placement="right" title=""><i class="fa fa-hand-rock-o"></i></a>
                                                <!--                                --><?php //if($this->permission1->method('aprove_v','update')->access()){
                                                                                        ?>
                                                <!--                                <a href="" id="editData" class="btn btn-info btn-sm" title="Update"><i class="fa fa-edit"></i></a>-->
                                                <!--                            --><?php //}
                                                                                    ?>
                                                <?php if ($this->permission1->method('aprove_v', 'delete')->access()) { ?>
                                                    <a href="<?php echo base_url("Crqsn/outlet_rqsn_delete/$id/") ?>" class="btn btn-danger" onclick="return confirm('Are You Sure?')" title="delete"><i class="fa fa-trash"></i></a>
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
    $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

     });
     function myFunction(e)
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
        console.log(rqsn_ids);
        $.ajax({
            url: '<?= base_url() ?>' + 'Crqsn/isreceiveall',
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