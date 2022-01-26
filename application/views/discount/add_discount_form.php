

 <script src="<?php echo base_url() ?>my-assets/js/admin_js/discount.js.php" type="text/javascript"></script>
<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('discounts') ?></h1>

            <small><?php echo $title ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('discounts') ?></a></li>

                <li class="active"><?php echo html_escape($title) ?></li>

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



        <!-- New Employee Type -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4><?php echo html_escape($title) ?> </h4>

                        </div>

                    </div>



                    <div class="rqsn_panel" >



                    <?php echo form_open_multipart('Cdiscount/create_discount','id="myform"') ?>

                        <div class="table-responsive center">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                <tr>
                                    <th class="text-center " width="25%">Customer Name </th>

                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Discount(%) </th>

                                    <th class="text-center"><?php echo display('action') ?></th>
                                </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                <tr>
                                    <td class="product_field">
                                        <input autocomplete="off" type="text" required name="customer_name" onkeypress="invoice_customerList(1)" id="customer_name_1" class="form-control productSelection" placeholder="Customer Name"   tabindex="5">

                                        <input autocomplete="off" type="hidden" class="autocomplete_hidden_value customer_id_1" name="customer_id[]" id="SchoolHiddenId"/>


                                        <input type="hidden" class="baseUrl" value="<?php echo base_url(); ?>" />
                                    </td>

                                    <td>
                                        <input autocomplete="off" type="text" required name="product_name" onkeypress="invoice_categoryList(1)" id="category_name_1" class="form-control productSelection" placeholder="Category Name"   tabindex="5">

                                        <input autocomplete="off" type="hidden" class="autocomplete_hidden_category_value category_id_1" name="category_id[]" id="SchoolHiddenId"/>
                                    </td>
                                    <td>
                                        <input type="text" name="discount[]" required=""  class="total_qntt_1 form-control text-right" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8"  value="0" />
                                    </td>


                                    <td>


                                        <button  class='btn btn-danger text-right' type='button' value='Delete' onclick='deleteRow(this)'><i class='fa fa-close'></i></button>
                                        <a   id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addInputField('addinvoiceItem');"  tabindex="11"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="form-group ">


                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>

                        </div>
                        </div>




                        <?php echo form_close() ?>

                    </div>


  

           



                </div>

            </div>

        </div>

    </section>

</div>

<script type="text/javascript">

  
    // function add_col(){

    //         alert('Ok');
    //     }
  


 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

// $(".add_tr_a").click(function(){


//         console.log('Ok');


// });



  //       $(".add_tr").click(function(){
      

  // var base_url = $('.baseUrl').val();

  //   var url=base_url+"Cdiscount/retrieve_discount_data"
  //   var dropdown=$('#customer_1');
  //   $.get(url, function(data, status){

             
  //                           var obj = jQuery.parseJSON(data);
                         
  //                           var customer=$('#customer_1').html(obj.customer);
  //                           console.log(obj.customer);

  //                                 $("#sp_tr").append("<tr>\n" +
  //               "\n" +
  //               "                                    <td><select type='text' id='customer_1' name='customer[]' class='customer_1 form-control text-right customer' /><option></option></select> </td>\n" +
  //               "                                    <td> <input name=\"category\" class=\"form-control\" type=\"text\" placeholder=\"Category Name\" id=\"designation\"></td>\n" +
  //               "                                    <td> <input name=\"discount_percentage\" class=\"form-control\" type=\"text\" placeholder=\"Percentage\" id=\"subject\"></td>\n" +
  //               "                                    <td><button   class='btn btn-danger text-right remove_cheque' type='button'><i class='fa fa-minus-circle'></i></button></td>\n" +
  //               "\n" +
  //               "                                </tr>");
                            
                         



  
  //   });

               console.log('ok');

        //         $.ajax
        //            ({
        //                 type: "GET",
        //                 url: base_url+"Cdiscount/retrieve_discount_data",
        //                // data: {product_id:id,csrf_test_name:csrf_test_name},
        //               //  cache: false,
        //                 //success: function(data)
        //                 {
        //                     var obj = jQuery.parseJSON(data);
        //                     for (var i = 0; i < (obj.txnmber); i++) {
        //                     var txam = obj.taxdta[i];
        //                     var txclass = 'total_tax'+i+'_'+sl;
        //                    $('.'+txclass).val(obj.taxdta[i]);
        //                     }
        //                     $('.'+priceClass).val(obj.price);
        //                     $('.'+available_quantity).val(obj.total_product.toFixed(2,2));
        //                     $('.'+unit).val(obj.unit);
        //                     $('.'+warrenty_date).val(obj.warrenty_date);
        //                     $('.'+expiry_date).val(obj.expired_date);
        //                     $('#'+warehouse).html(obj.warehouse);
        //                     $('.'+tax).val(obj.tax);
        //                     $('#txfieldnum').val(obj.txnmber);
        //                     $('#'+serial_no).html(obj.serial);
        //                     $('#'+discount_type).val(obj.discount_type);
        //                            quantity_calculate(sl);
                            
        //                 } 
        //             });
        // });




 








</script>
