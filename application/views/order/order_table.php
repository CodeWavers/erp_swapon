
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Order</h1>
            <small>Order Table</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Order</a></li>
                <li class="active">Order</li>
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

                <?php if ($this->permission1->method('create_product', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cproduct') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_product') ?> </a>
                <?php } ?>
                <?php if ($this->permission1->method('add_product_csv', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cproduct/add_product_csv') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_product_csv') ?> </a>
                <?php } ?>


            </div>
        </div>




        <!-- Manage Product report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Orders</h4>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?php echo form_open('Admin_dashboard/retrieve_warrenty_dateWise_PurchaseReports', array('class' => 'form-inline', 'method' => 'get')) ?>
                                    <?php date_default_timezone_set("Asia/Dhaka");
                                    $today = date('Y-m-d');
                                    ?>
                                    <div class="form-group">
                                        <label class="" for="from_date"><?php echo display('start_date') ?></label>
                                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo $today ?>" placeholder="<?php echo display('start_date') ?>" >
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="to_date">End Date</label>
                                        <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
                                    </div>

                                    <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>

                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php echo form_open('Corder/print_order', array('class' => 'form-vertical', 'id' => 'invoice_update')) ?>

                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="order_table">
                                <thead>
                                    <tr>
                                        <th>
                                            <input name="select_all" value="1" type="checkbox">
                                        </th>

                                        <th><?php echo display('sl') ?></th>
                                        <th>Order Code</th>
                                        <th>Order Date</th>
                                        <th>Num. of Pro</th>
                                        <th>Customer</th>
                                        <th>Number</th>
                                        <th>Amount</th>
                                        <th>Delivery Status</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Refund</th>
                                        <th><?php echo display('action') ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                                <hr>
                                <p><input name="submit" class="btn btn-info" type="submit" value="Print"></p>

                                <br>
                                <pre id="example-console">
</pre>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="api_url" name="api_url" value="<?php echo api_url() ?>">
                <input type="hidden" class="form-control" id="base_url" name="base_url" value="<?php echo base_url() ?>">

                <input type="hidden" id="total_product" value="<?php echo $total_product; ?>" name="">

            </div>
        </div>
    </section>
</div>
<style>

    table.dataTable.select tbody tr,
    table.dataTable thead th:first-child {
        cursor: pointer;
    }
</style>
<script type="text/javascript">


    
    function updateDataTableSelectAllCtrl(table){
        var $table             = table.table().node();
        var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
        var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
        var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

        // If none of the checkboxes are checked
        if($chkbox_checked.length === 0){
            chkbox_select_all.checked = false;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = false;
            }

            // If all of the checkboxes are checked
        } else if ($chkbox_checked.length === $chkbox_all.length){
            chkbox_select_all.checked = true;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = false;
            }

            // If some of the checkboxes are checked
        } else {
            chkbox_select_all.checked = true;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = true;
            }
        }
    }

    $(document).ready(function (){
        // Array holding selected row IDs
        var rows_selected = [];
        var table = $('#example').DataTable({
            'columnDefs': [{
                'targets': 0,
                'searchable':false,
                'orderable':false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox">';
                }
            }],
            'order': [1, 'asc'],
            'rowCallback': function(row, data, dataIndex){
                // Get row ID
                var rowId = data[0];

                // If row ID is in the list of selected row IDs
                if($.inArray(rowId, rows_selected) !== -1){
                    $(row).find('input[type="checkbox"]').prop('checked', true);
                    $(row).addClass('selected');
                }
            }
        });



        // Handle click on "Select all" control
        $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
            if(this.checked){
                $('tbody input[type="checkbox"]:not(:checked)', table.table().container()).trigger('click');
            } else {
                $('tbody input[type="checkbox"]:checked', table.table().container()).trigger('click');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        // Handle table draw event


        // Handle form submission event
        $('#frm-example').on('submit', function(e){
            var form = this;

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId)
                );
            });

            // FOR DEMONSTRATION ONLY

            // Output form data to a console
            $('#example-console').text($(form).serialize());
            console.log("Form submission", $(form).serialize());

            // Remove added elements
            $('input[name="id\[\]"]', form).remove();

            // Prevent actual form submission
            e.preventDefault();
        });
    });
</script>