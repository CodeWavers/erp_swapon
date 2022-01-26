<style type="text/css">
    .column1 {
  float: left;
  width: 50%;
}
</style>
<!-- Purchase Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Purchase Cheque Report</h1>
            <small>Purchase Cheque Report</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i>Purchase Warrenty Report</a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Purchase Cheque Report</li>
            </ol>
        </div>
    </section>

    <section>
                <div class="modal fade modal-success updateModal" id="updateProjectModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                        <h3 class="modal-title">Manage Cheque</h3>
                    </div>

                    <div class="modal-body">
                        <div id="customeMessage" class="alert hide"></div>
                        <form method="post" id="ProjectEditForm" action="<?php echo base_url()?>Admin_dashboard/get_purchase_cheque_date">
                        <div class="panel-body">
                            <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                            <div class="form-group row">
                                 <input type="hidden" id="purchase_id" value="{purchase_id}" name="purchase_id">
                                 <input type="hidden" id="supplier_id" value="{supplier_id}" name="supplier_id">
                                 <input type="hidden" id="paid_amount" value="{paid_amount}" name="paid_amount">
                                 <input type="hidden" id="chalan_no" value="{chalan_no}" name="chalan_no">
                                 <input type="hidden" id="bank_id" value="{bank_id}" name="bank_id">
                                 <!-- <input type="hidden" id="invoice" value="{invoice}" name="invoice"> -->
                                <div class="column1">
                                <label for="cheque_date" class="col-sm-3 col-form-label">Cheque Date</label>

                                    <input style="width: auto;" type="text" id="cheque_date" class="form-control datepicker" name="cheque_date" value="{cheque_date}"  />
                                </div>
                                <div class="column1">
                                <label for="cheque_no" class="col-md-3 col-form-label">Cheque No.</label>

                                    <input style="width: auto;" type="text" id="cheque_no" class="form-control" name="cheque_no" value="{cheque_no}"  />
                                </div>
                                 <div class="column1">
                                <label for="due_amount" class="col-md-3 col-form-label">Due Amount</label>

                                    <input style="width: auto;" type="text" id="due_amount" class="form-control" name="due_amount" value="{due_amount}"  readonly />
                                </div> 
                               
                                <div class="column1">
                                <label for="debit_amount" class="col-md-3 col-form-label">Debit Amount</label>

                                    <input style="width: auto;" type="text" id="debit_amount" class="form-control" name="debit_amount"   />
                                </div> 

                            </div>

                            <div class="form-group row">
                                <div class="column1">
                                <label for="email" class="col-md-3 col-form-label">Change Status:</label>
                                <div class="col-sm-6">
                                    <input style="" type="checkbox" name="status" class="status" checked />
                                    <input type="hidden" name="hidden_status" id="hidden_status" value="{status}" />
                                </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" id="ProjectUpdateConfirmBtn"  class="btn btn-success">Update</button>
                    </div>
<!--                    <div class="modal-footer">-->
<!---->
<!--                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>-->
<!---->
<!--                        <input type="submit" id="ProjectUpdateConfirmBtn" class="btn btn-success" value="Submit">-->
<!--                    </div>-->
                    <?php echo form_close() ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">


                <?php if($this->permission1->method('todays_sales_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
                <?php }?>
                <?php if($this->permission1->method('product_sales_reports_date_wise','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('sales_report_product_wise') ?> </a>
                <?php }?>
                <?php if($this->permission1->method('todays_sales_report','read')->access() && $this->permission1->method('todays_purchase_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('profit_report') ?> </a>
                <?php }?>


            </div>
        </div>

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Admin_dashboard/retrieve_cheque_dateWise_PurchaseReports', array('class' => 'form-inline', 'method' => 'get')) ?>
                        <?php date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
                        ?>
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo $today ?>" placeholder="<?php echo display('start_date') ?>" >
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date">Cheque End Date</label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <a  class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                        <a href="<?php echo base_url('accounts/debit_voucher') ?>" class="btn btn-info" style="margin-left: 150px"><i class="glyphicon glyphicon-share"> </i> <b>Debit Voucher</b> </a>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Purchase Cheque Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="purchase_div" class="table-responsive">
                            <table class="print-table" width="100%">

                                <tr>
                                    <td align="left" class="print-table-tr">
                                        <img src="<?php echo $software_info[0]['logo'];?>" alt="logo">
                                    </td>
                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo $company[0]['company_name'];?>

                                                        </span><br>
                                        <?php echo $company[0]['address'];?>
                                        <br>
                                        <?php echo $company[0]['email'];?>
                                        <br>
                                        <?php echo $company[0]['mobile'];?>

                                    </td>

                                    <td align="right" class="print-table-tr">
                                        <date>
                                            <?php echo display('date')?>: <?php
                                            echo date('d-M-Y');
                                            ?>
                                        </date>
                                    </td>
                                </tr>

                            </table>
                            <div class="table-responsive">
                                <table id="editable_table" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th>Purchase ID</th>
                                        <th>Vendor Name</th>
                                        <th>Bank Name</th>
                                        <th>Cheque NO</th>
                                        <th>Status</th>
                                        <th>Cheque Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                  
                                    </tbody>
<!--                                    <tfoot>-->
<!--                                    <tr>-->
<!--                                        <td colspan="5" align="right">&nbsp; <b>Total Amount</b></td>-->
<!--                                        <td class="text-right"><b>--><?php //echo (($position == 0) ? "$currency ".$purchase_amount : $purchase_amount ." $currency") ?><!--</b></td>-->
<!--                                    </tr>-->
<!--                                    </tfoot>-->
                                </table>
                            </div>
                        </div>
                        <div class="text-right"><?php echo $links ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){

     
     $('.status').bootstrapToggle({
            on: 'Due',
            off: 'Paid',
            onstyle: 'danger',
            offstyle: 'success'
        });

        $('.status').change(function(){
            if($(this).prop('checked'))
            {
                $('#hidden_status').val('2');
            }
            else
            {
                $('#hidden_status').val('1');
            }
      });

    var table= $('#editable_table').DataTable({
        "responsive" : true,
        "autoWidth"  : false,
        "processing" : true,
        "Paginate": true,
        "ajax": {
            url : "<?php echo base_url() ?>Admin_dashboard/get_purchase_cheque",
            type : 'GET'
        },
    "columns":[
        {"data":"id"},
        {"data":"purchase_id"},
        {"data":"supplier_name"},
        {"data":"bank_id"},
        {"data":"cheque_no"},
        {"data":"status"},
        {"data":"cheque_date"},
        {"data":"action","searchable":false,"orderable":false}
    ],
    });
    
//     $.noConflict();
//         var table = $('#editable_table').dataTable(
//     {
//         "responsive" : true,
//         "autoWidth"  : false,
//         "processing" : true,"serverSide": true,
//         "ajax":
//             {
//                 "url":"<?php //echo base_url() ?>Admin_dashboard/get_purchase_cheque",
//                 "dataType":"json",
//                 "type":"GET",
//             },
//         "columns":[
//         {"data":"invoice_id"},
//         {"data":"customer_name"},
//         {"data":"bank_id"},
//         {"data":"cheque_no"},
//         {"data":"status"},
//         {"data":"cheque_date"},
//         {"data":"action","searchable":false,"orderable":false}
//     ],
  
// });


    $('#editable_table').on('click', '.date-edit', function(){
    var purchase_id = $(this).attr('data');
    $('#updateProjectModal').modal('show');
    console.log(purchase_id);

    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>Admin_dashboard/get_purchase_cheque_date',
        data: {purchase_id: purchase_id},
        async: false,
        dataType: 'json',
        success: function(data){
            $('input[name=purchase_id]').val(data.purchase_id);
             $('input[name=cheque_date]').val(data.cheque_date);
             $('input[name=cheque_no]').val(data.cheque_no);
             $('input[name=bank_id]').val(data.bank_id);
             $('input[name=supplier_id]').val(data.supplier_id);
             $('input[name=paid_amount]').val(data.paid_amount);
                    var due=data.due_amount;
                    var paid=data.paid_amount;
            $('input[name=due_amount').val(due-paid)
             $('input[name=chalan_no]').val(data.chalan_no);
             $('input[name=paid_amount]').val(data.paid_amount);
            // $('input[name=invoice]').val(data.invoice);
            $('input[name=hidden_status]').val(data.status);
            console.log(data);
        
        },
        error: function(){
            alert('Could not displaying data');
        }           
      });
    });

    $("#ProjectEditForm").on('submit',function(event)
    {  
    event.preventDefault();
    // var form= $("#ProjectEditForm");

    var hidden_status = $('#hidden_status').val();
    var cheque_date = $('#cheque_date').val();
    var purchase_id= $('#purchase_id').val();
    var supplier_id= $('#supplier_id').val();
    var cheque_no= $('#cheque_no').val();
    var bank_id= $('#bank_id').val();
    var due_amount= $('#due_amount').val();
    var paid_amount= $('#paid_amount').val();
    var debit_amount=$('#debit_amount').val();
    var chalan_no= $('#chalan_no').val();
    // var invoice= $('#invoice').val();
    var csrf_test_name = $('[name="csrf_test_name"]').val();
    console.log(cheque_date);
    console.log(purchase_id);
     //$('#ProjectEditForm').modal('hide');
    $.ajax({
        method: 'POST',
        url: "<?php echo base_url()?>Admin_dashboard/purchase_cheque_date_update",
        dataType:'json',
        async:false,
        data:{purchase_id:purchase_id,csrf_test_name:csrf_test_name,cheque_date:cheque_date,bank_id:bank_id,hidden_status:hidden_status,cheque_no:cheque_no,supplier_id:supplier_id,due_amount:due_amount,paid_amount:paid_amount,debit_amount:debit_amount,chalan_no:chalan_no},
        success:function(data)
        {
            
            console.log(data);
            table.ajax.reload( null, false);
            $('[name="purchase_id"]').val("");
            $('[name="cheque_date"]').val("");
            $('[name="supplier_id"]').val("");
            $('[name="cheque_no"]').val("");
            $('[name="due_amount"]').val("");
            $('[name="paid_amount"]').val("");
            $('[name="debit_amount"]').val("");
            $('[name="chalan_no"]').val("");
            $('[name="bank_id"]').val("");
            $('[name="hidden_status"]').val("");
           
            // $('[name="price_edit"]').val("");
            $('.updateModal').modal('hide');
            // toastr[data.type](data.message);
            //table.ajax.reload();
        },


    });

});
});




</script>
<!-- Purchase Report End -->