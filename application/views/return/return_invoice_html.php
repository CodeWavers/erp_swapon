<?php
    $CI =& get_instance();
    $CI->load->model('Web_settings');
    $Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <?php if ($invoice_all_data[0]['usablity'] == 2) { ?>
            <h1>Replacement Details</h1>
            <small>Replacement Details</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Replacement</a></li>
                <li class="active">Replacement Details</li>
            </ol>
            <?php }else{ ?>
                <h1><?php echo display('return_details') ?></h1>
                <small><?php echo display('return_details') ?></small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                    <li><a href="#"><?php echo display('return') ?></a></li>
                    <li class="active"><?php echo display('return_details') ?></li>
                </ol>
            <?php } ?>
        </div>
    </section>

    <!-- Main content -->
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
                <div class="panel panel-bd">
	                <div id="printableArea">
	                    <div class="panel-body">
	                        <div class="row">
	                        	{company_info}
	                            <div class="col-sm-8 company-content">
	                                 <img src="<?php if (isset($Web_settings[0]['invoice_logo'])) {echo $Web_settings[0]['invoice_logo']; }?>" class="" alt="">
	                                <br>
	                                <span class="label label-success-outline m-r-15 p-10" ><?php echo display('billing_from') ?></span>
	                                <address class="margin-top10">
	                                    <strong>{company_name}</strong><br>
	                                    {address}<br>
	                                    <abbr><b><?php echo display('mobile') ?>:</b></abbr> {mobile}<br>
	                                    <abbr><b><?php echo display('email') ?>:</b></abbr> 
	                                    {email}<br>
	                                    <abbr><b><?php echo display('website') ?>:</b></abbr> 
	                                    {website}
	                                </address>
	                            </div>
	                            {/company_info}
	                            <div class="col-sm-4 text-left invoice-details-billing">

                                    <?php if ($invoice_all_data[0]['usablity'] == 2) { ?>
	                                <h2 class="m-t-0">Replacement</h2>
                                        <div>Replacement ID: {return_id}</div>
                                        <div>Old Invoice ID: {invoice_id}</div>
                                        <div>New Invoice ID: {invoice_id_new}</div>
                                        <div class="m-b-15"><?php echo display('billing_date') ?>: {final_date}</div>
                                    <?php }else{ ?>
                                        <h2 class="m-t-0"><?php echo display('return') ?></h2>
                                        <div>Return: {return_id}</div>
                                        <div><?php echo display('invoice_id') ?>: {invoice_id}</div>
                                        <div class="m-b-15"><?php echo display('billing_date') ?>: {final_date}</div>

                                    <?php } ?>


	                                <span class="label label-success-outline m-r-15"><?php echo display('billing_to') ?></span>

	                                  <address class="details-address">  
	                                    <strong>{customer_name} </strong><br>
	                                    <?php if ($customer_address) { ?>
		                                {customer_address}
		                                <?php } ?>
	                                    <br>
	                                    <abbr><b><?php echo display('mobile') ?>:</b></abbr>
	                                    <?php if ($customer_mobile) { ?>
	                                    {customer_mobile}
	                                    <?php }if ($customer_email) {
	                                    ?>
	                                    <br>
	                                    <abbr><b><?php echo display('email') ?>:</b></abbr> 
	                                    {customer_email}
	                                   	<?php } ?>
	                                </address>
	                            </div>
	                        </div> <hr>

	                        <div class="table-responsive m-b-20">
	                            <table class="table table-bordered">
	                                <thead>
	                                    <tr >
	                                        <th class="text-center"><?php echo display('sl') ?></th>
	                                        <th class="text-center"><?php echo display('product_name') ?></th>
	                                        <th class="text-center"><?php echo display('quantity') ?></th>
	                                        <th class="text-center">Deducution(%)</th>


	                                        <th class="text-center"><?php echo display('rate') ?></th>
	                                        <th class="text-center"><?php echo display('ammount') ?></th>
	                                    </tr>
	                                </thead>
	                                <tbody>
										{invoice_all_data}
										<tr class="bg-danger">
	                                    	<td class="text-center">{sl}</td>
	                                        <td class="text-center"><div><strong>{product_name} - ({product_model})</strong></div></td>
	                                        <td align="center">{ret_qty}</td>

	                                        <?php if ($discount_type == 1) { ?>
	                                        <td align="center">{deduction}</td>
	                                        <?php }else{ ?>
	                                        <td align="center"><?php echo (($position==0)?"$currency {deduction}":"{deduction} $currency") ?></td>
	                                        <?php } ?>
	                                        
	                                        <td align="center"><?php echo (($position==0)?"$currency {product_rate}":"{product_rate} $currency") ?></td>
	                                        <td align="center"><?php echo (($position==0)?"$currency {total_ret_amount}":"{total_ret_amount} $currency") ?></td>
	                                    </tr>
	                                    {/invoice_all_data}
	                                </tbody>
	                                <tfoot>
	                                	<td align="center" colspan="1"><b><?php echo display('grand_total')?>:</b></td>
	                                	<td></td>
	                                	<td align="center" ><b>{subTotal_quantity}</b></td>
	                                	<td></td>
	                                	<td></td>
	                                	
	                                	<td align="center" ><b><?php echo (($position==0)?"$currency {subTotal_ammount}":"{subTotal_ammount} $currency") ?></b></td>
	                                </tfoot>
	                            </table>
	                        </div>
	                        <div class="row">
		                        
		                        	<div class="col-xs-8 invoicefooter-content">
		                                <p><strong><?php echo display('note') ?> : </strong>{note}</p>
		                                
		                                <div  class="">
											
										</div>
		                            </div>
		                            <div class="col-xs-4 inline-block">

				                        <table class="table ">
				                            <?php
			                                	if ($invoice_all_data[0]['total_deduct'] != 0) {
			                                ?>
				                            	<tr>
				                            		<th class="border-bottom-top"><?php echo display('deduction') ?> : </th>
				                            		<td class="border-bottom-top"><?php echo (($position==0)?"$currency {total_deduct}":"{total_deduct} $currency") ?> </td>
				                            	</tr>
				                            <?php } 
				                              	if ($invoice_all_data[0]['total_tax'] != 0) {
			                                ?>
				                            	<tr>
				                            		<th class="border-bottom-top"><?php echo display('tax') ?> : </th>
				                            		<td class="border-bottom-top"><?php echo (($position==0)?"$currency {total_tax}":"{total_tax} $currency") ?> </td>
				                            	</tr>
				                            <?php } ?>
<!--                                            <tr>-->
<!--                                                <th class="grand_total">Delivery Charge:</th>-->
<!--                                                <td class="grand_total">--><?php //echo (($position==0)?"$currency {delivery_charge}":"{delivery_charge} $currency") ?><!--</td>-->
<!--                                            </tr>-->
				                            	<tr>
				                            		<th class="grand_total"><?php echo display('grand_total') ?> :</th>
				                            		<td class="grand_total"><?php echo (($position==0)?"$currency {totalnamount}":"{totalnamount} $currency") ?></td>
				                            	</tr>
				                            	
			                            </table>
		                   

		                            
		                        </div>
	                        </div>

                            <?php if ($invoice_all_data[0]['usablity'] == 2) { ?>

                            <div class="table-responsive m-b-20">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('sl') ?></th>
                                        <th class="text-center"><?php echo display('product_name') ?></th>
                                        <th class="text-center"><?php echo display('quantity') ?></th>

                                        <th class="text-center"><?php echo display('rate') ?></th>
                                        <th class="text-center"><?php echo display('ammount') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {replace_all_data}
                                    <tr class="bg-success">
                                        <td class="text-center">{sl}</td>
                                        <td class="text-center"><div><strong>{product_name} - ({product_model})</strong></div></td>
                                        <td align="center">{quantity}</td>


                                        <td align="center"><?php echo (($position==0)?"$currency {rate}":"{rate} $currency") ?></td>
                                        <td align="center"><?php echo (($position==0)?"$currency {total_price}":"{total_price} $currency") ?></td>
                                    </tr>
                                    {/replace_all_data}
                                    </tbody>
                                    <tfoot>
                                    <td align="center" colspan="1"><b><?php echo display('grand_total')?>:</b></td>
                                    <td></td>
                                    <td align="center" ><b>{subTotal_quantity_replace}</b></td>
                                    <td></td>

                                    <td align="center" ><b><?php echo (($position==0)?"$currency {subTotal_ammount_replace}":"{subTotal_ammount_replace} $currency") ?></b></td>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">

                                <div class="col-xs-8 invoicefooter-content">
<!--                                    <p><strong>--><?php //echo display('note') ?><!-- : </strong>{note}</p>-->

                                    <div  class="">

                                    </div>
                                </div>
                                <div class="col-xs-4 inline-block">

                                    <table class="table">

                                        <tr>
                                            <th class="grand_total"><?php echo display('grand_total') ?> :</th>
                                            <td class="grand_total"><?php echo (($position==0)?"$currency {totalnamount_replace}":"{totalnamount_replace} $currency") ?></td>
                                        </tr>

                                    </table>

                                    <div class="sig_div">
                                        <?php echo display('authorised_by') ?>
                                    </div>

                                </div>
                            </div>

                            <?php } ?>
	                    </div>
	                </div>

                     <div class="panel-footer text-left">
                     	<a  class="btn btn-danger" href="<?php echo base_url('Cretrun_m');?>"><?php echo display('cancel') ?></a>
						<button  class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>
						
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->



