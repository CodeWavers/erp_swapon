
<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/rqsn.js.php" type="text/javascript"></script>
<style type="text/css">
    .form-control{
        padding: 6px 5px;
    }
</style>
<!-- Customer type change by javascript end -->

<!-- Add New Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Order Details</h1>
            <small>Order Details</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Order Details</a></li>
                <li class="active">Order Details</li>
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
<!--        <div class="row">-->
<!--            <div class="col-sm-12">-->
<!---->
<!--                --><?php //if($this->permission1->method('manage_invoice','read')->access()){ ?>
<!--                    <a href="--><?php //echo base_url('Cinvoice/manage_invoice') ?><!--" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> --><?php //echo display('manage_invoice') ?><!-- </a>-->
<!--                --><?php //}?>
<!--                --><?php //if($this->permission1->method('pos_invoice','create')->access()){ ?>
<!--                    <a href="--><?php //echo base_url('Cinvoice/pos_invoice') ?><!--" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  --><?php //echo display('pos_invoice') ?><!-- </a>-->
<!--                --><?php //}?>
<!---->
<!---->
<!--            </div>-->
<!--        </div>-->


        <!--Add Invoice -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Order Details</h4>

                        </div>
                    </div>



                    <form action="#" method="post" id="update_order">

                        <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">


                        <div class="panel">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-offset-3 col-lg-3">
                                    <label for="update_payment_status&quot;&quot;">Payment Status</label>
                                    <select name="payment_status" class="form-control demo-select2 select2-hidden-accessible" data-minimum-results-for-search="Infinity" id="update_payment_status" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $order[0]->payment_status?>" selected ><?php echo $order[0]->payment_status?></option>
                                        <option value="paid" >Paid</option>
                                        <option value="partial">Partial</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
<!--                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 370.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-update_payment_status-container"><span class="select2-selection__rendered" id="select2-update_payment_status-container" title="Paid">Paid</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                                </div>
                                <div class="col-lg-3">
                                    <label for="update_delivery_status&quot;&quot;">Delivery Status</label>
                                    <select name="delivery_status" class="form-control demo-select2 select2-hidden-accessible" data-minimum-results-for-search="Infinity" id="update_delivery_status" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $order[0]->delivery_status?>" selected ><?php echo $order[0]->delivery_status?></option>

                                        <option value="Pending">Pending</option>
                                        <option value="Order Confirmed">Order Confirmed</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Delivered" >Delivered</option>
                                        <option value="Returned">Returned</option>
                                        <option value="Hold">Hold</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
<!--                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 370.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-update_delivery_status-container"><span class="select2-selection__rendered" id="select2-update_delivery_status-container" title="Delivered">Delivered</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                                </div>
                                <div class="col-lg-3 pt-3">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#paymentForm">Make Payment</a>
                                </div>
                            </div>
                            <hr>
                            <div class="invoice-bill row">
                                <div class="col-sm-6 text-xs-center">
                                    <address>

                                        <strong class="text-main"><?php echo $customer_name?></strong><br>
                                        <?php echo $email?><br>
                                        <?php echo $phone?><br>
                                        <?php echo $address.','.$thana.','.$division.','.$district.','.$country?><br>

                                    </address>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#new-address-modal"">Edit Address</a>
                                </div>
                                <div class="col-sm-6 text-xs-center">
                                    <table class="invoice-details">
                                        <tbody>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Order #
                                            </td>
                                            <td class="text-right text-info text-bold">
                                               <?php echo $order[0]->code?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Order Status
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-info"><?php echo $order[0]->delivery_status?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Order Date
                                            </td>
                                            <td class="text-right">
                                                <?php echo  date('m/d/Y H:i:s',$order[0]->date)?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Total amount
                                            </td>
                                            <td class="text-right">
                                                <?php echo $currency.' '.$order[0]->grand_total?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Payment method
                                            </td>
                                            <td class="text-right">
                                                <?php echo $order[0]->payment_type ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-main text-bold">
                                                Shipping method
                                            </td>
                                            <td class="text-right">

                                                <?php echo $order[0]->shipping_method?> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="new-section-sm bord-no">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered invoice-summary">
                                        <thead>
                                        <tr class="bg-trans-dark">
                                            <th class="min-col">#</th>
                                            <th width="10%">
                                                Photo
                                            </th>
                                            <th class="text-uppercase">
                                                Description
                                            </th>
                                            <th class="text-uppercase">
                                                Delivery Type
                                            </th>
                                            <th class="min-col text-center text-uppercase">
                                                Qty
                                            </th>
                                            <th class="min-col text-center text-uppercase">
                                                Price
                                            </th>
                                            <th class="min-col text-right text-uppercase">
                                                Total
                                            </th>
                                            <th class="min-col text-right text-uppercase">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <?php foreach ($order as $od) {?>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <a href="https://dev.swaponsworld.com/product/<?php echo $od->slug?>" target="_blank"><img height="50" src="https://dev.swaponsworld.com/public/<?php echo $od->thumbnail_img?>"></a>
                                            </td>
                                            <td>
                                                <strong><a href="https://dev.swaponsworld.com/product/<?php echo $od->slug?>" target="_blank"><?php echo $od->name?></a></strong>
                                                <small><?php echo $od->variation?></small>
                                            </td>
                                            <td>
                                            </td>
                                            <td class="text-center">
                                                <input type="number" value="<?php echo $od->quantity?>" onchange="qtyUpdate(<?php echo $od->id?>)" id="order<?php echo $od->id?>">

                                            </td>
                                            <td class="text-center">
                                                <?php echo $currency.' '.$od->price/$od->quantity?>
                                                <s style="font-size:11px"><?php echo $currency.' '.$od->unit_price?></s>
                                                <input type="hidden" value="<?php echo $od->price/$od->quantity?>"  id="price<?php echo $od->id?>">

                                            </td>
                                            <td class="text-center">
                                                <?php echo $currency.' '.$od->price?>
                                            </td>
                                            <td class="text-center">

                                                <?php if ($od->status ==1){?>
                                                <a class="btn btn-danger item_remove" onclick="item_remove(<?php echo $od->id?>)" data-id="<?php echo $od->id?>">Remove</a>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>

<!--                                    <center><button class="btn btn-primary add_item" data-toggle="modal" data-target="#add_product">Add Item+</button></center>-->


                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                        <input type="hidden" name="_token" value="Hk9jJQWcjdJHasykJ1FfsoFUksB5LLRY9YNhcGGU">                                <div class="form-group">
                                            <label for="sc">Shipping Cost</label>
                                            <input type="number" class="form-control" step="0.1" name="shipping_cost" placeholder="Add Shipping Charge" value="<?php echo $order_details[0]->shipping_cost?>">
                                            <input type="hidden" class="form-control" step="0.1" name="order_id" id="order_id"  value="<?php echo $order_details[0]->order_id?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="sc">Coupon</label>
                                            <input type="text" class="form-control" name="coupon" placeholder="Add Coupon Code" value="<?php echo $order[0]->admin_coupon?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="sc">Discount Amount</label>
                                            <input type="number" class="form-control" step="0.1" name="discount_charge" placeholder="Add Discount Amount" value="<?php echo $order[0]->flat_discount?>">
                                        </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <table class="table invoice-total">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Sub Total :</strong>
                                                </td>
                                                <td>

                                                    <?php echo array_sum(array_column($order,'price'))?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Cost</th>

<!--                                                --><?php //echo '<pre>';print_r($order_details);exit();?>
                                                <td class="currency"> <?php echo $currency.' '.$order_details[0]->shipping_cost?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Tax :</strong>
                                                </td>
                                                <td>
                                                    <?php echo $currency.' '.$order_details[0]->tax?>
                                                </td>
                                            </tr>




                                            <tr>
                                                <th>Coupon Discount</th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->coupon_discount?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Admin Coupon Discount </th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->admin_coupon_discount?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Flat Discount</th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->flat_discount?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Grand Total</th>
                                                <td class="currency">
                                                    <?php echo $currency.' '.$order[0]->grand_total?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <strong>Paid Total :</strong>
                                                </td>
                                                <td>

                                                        <?php if (substr($order[0]->payment_details,0,1=='{')) {

                                                            $data = json_decode($order[0]->payment_details);
                                                            if($data){
                                                                (int) $paidtotal= $data->amount;
                                                            }
                                                            else {
                                                                (int) $paidtotal= 0;
                                                            }

                                                        }else {


                                                            (int) $paidtotal= array_sum(array_column($offline_payment,'amount'));


                                                         }

                                                         echo $paidtotal;
                                                         ?>






                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>TOTAL DUE :</strong>
                                                </td>
                                                <td class="text-bold h4">
                                                    <?php echo $currency.' '.($order[0]->grand_total-$paidtotal)?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right no-print">
                                <a href="https://dev.swaponsworld.com/admin/invoice/admin/359" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></a>
                            </div>
                            <div class="col-12">
                                <h3>All Transactions</h3>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Payment From</th>
                                        <th>Amount</th>
                                        <th>Charge</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($offline_payment as $of) { ?>
                                        <tr>

                                        <td><?php echo $of->transId?></td>
                                        <td><?php echo $of->accFrom?></td>
                                        <td><?php echo $of->amount?></td>
                                        <td><?php echo $of->charge?></td>
                                        <td><?php echo $of->note?></td>
                                        <td>

                                            <a href="" class="label label-danger" onclick="paymentDelete(<?php echo $of->id?>)"><i class="fa fa-trash"></i> Delete</a>
                                        </td>

                                        </tr>
                                      <?php   } ?>

                                    </tbody>

                                </table>
                            </div>

                            <div class="col-12">
                                <h3>Change Logs</h3>

                                <table class="table table-bordered table-hover">
                                    <tbody><tr>

                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Date</th>

                                    </tr>

                                    <?php foreach ($change_log as $log) { ?>
                                        <tr>

                                            <td><?php echo $log->status?></td>
                                            <td><?php echo $log->notes?></td>
                                            <td><?php echo $log->created_at?></td>


                                        </tr>
                                    <?php   } ?>
                                    </tbody></table>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">

                                    <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('save') ?>" tabindex="10" />
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="modal fade in" id="paymentForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none; padding-right: 26px;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Offline Payments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="payment_form">
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>Oder ID:</label>

                                        <input type="text" value="<?php echo $order[0]->code?>" name="code" class="form-control" readonly="">

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>Payment Type</label>
                                        <select name="type" class="form-control">&gt;
                                            <option value="1">Cash</option>
                                            <option value="2">bKash</option>
                                            <option value="3">Rocket</option>
                                            <option value="4">Nagad</option>
                                            <option value="5">Cheque</option>
                                            <option value="6">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>From Account No.</label>
                                        <input type="text" name="accFrom" value="" class="form-control maxlength-options" placeholder="Enter Payment From">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>Transaction Id</label>
                                        <input type="text" name="transId" value="" class="form-control maxlength-options" placeholder="Enter Transaction Id">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>Paid Amount</label>
                                        <input type="text" name="amount" value="" required="" class="form-control maxlength-options" placeholder="Enter Amount">

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>Transaction Charge</label>
                                        <input type="text" name="charge" value="" class="form-control maxlength-options" placeholder="Enter Charge">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="content-group">
                                        <label>Payment Note</label>
                                        <input type="text" name="note" value="" class="form-control maxlength-options" placeholder="Enter Note">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block mb-2">Add Payment<i class="icon-arrow-right16 position-right"></i></button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new-address-modal" class="modal fade in" role="dialog" style="display: none; padding-right: 26px;">

                <div class="modal-dialog">
                    <form action="" method="post" id="address_update">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Add New Shipping Method</h4>
                            </div>
                            <div class="modal-body">


                                <div class=" form-group">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control mb-3" placeholder="Customer Name" name="name" value="<?php echo $customer_name?>" required="">
                                </div>
                                <div class=" form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control mb-3" placeholder="Customer Email" name="email" value="<?php echo $email?>" required="">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>

                                    <textarea class="form-control textarea-autogrow mb-3" placeholder="Your Address" rows="1" name="address" required=""><?php echo $address?></textarea>

                                </div>


                                <div class="form-group">
                                    <label>Country</label>

                                    <div class="">
                                        <select class="form-control" data-placeholder="Select your country" name="country" id="mmcountry" required="" >
                                            <option value="Bangladesh" selected="">Bangladesh</option>
                                        </select>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label>Division</label>

                                    <select class="form-control demo-select2 select2-hidden-accessible" data-placeholder="Division" name="divisionId" id="mmdivisionId" required="" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $division?>" selected=""><?php echo $customer_name?></option>
                                        <option value="Barisal">Barisal</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Dhaka" selected="">Dhaka</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Sylhet">Sylhet</option>
                                    </select>


                                <div class="form-group">
                                    <label>District</label>

                                    <select class="form-control mb-3 demo-select2 select2-hidden-accessible" data-placeholder="District" name="districtId" id="mmdistrictId" required="" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $district?>"><?php echo $customer_name?></option>
                                        <option value="Narsingdi">Narsingdi</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Faridpur">Faridpur</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Gopalganj">Gopalganj</option>
                                        <option value="Kishoreganj">Kishoreganj</option>
                                        <option value="Madaripur">Madaripur</option>
                                        <option value="Manikganj">Manikganj</option>
                                        <option value="Munshiganj">Munshiganj</option>
                                        <option value="Narayanganj">Narayanganj</option>
                                        <option value="Rajbari">Rajbari</option>
                                        <option value="Tangail">Tangail</option>
                                    </select>
                                </div>





                                <div class="form-group">
                                    <label>Thana</label>
                                    <select class="form-control mb-3 demo-select2 select2-hidden-accessible" data-placeholder="Thana" name="areaId" id="mmareaId" required="" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $thana?>"><?php echo $thana?></option>
                                        <option value="Mirpur-10">Mirpur-10</option><option value="300 Feet">300 Feet</option><option value="Abdullahpur">Abdullahpur</option><option value="Adabor">Adabor</option><option value="Aftab Nagar">Aftab Nagar</option><option value="Agargaon">Agargaon</option><option value="Arambag">Arambag</option><option value="Armanitola">Armanitola</option><option value="Asad Avenue">Asad Avenue</option><option value="Ashkona">Ashkona</option><option value="Azampur">Azampur</option><option value="Azimpur">Azimpur</option><option value="Babubazar">Babubazar</option><option value="Badam Toli">Badam Toli</option><option value="Badda">Badda</option><option value="Baily Road">Baily Road</option><option value="Bakshibazar">Bakshibazar</option><option value="Balughat">Balughat</option><option value="Banani">Banani</option><option value="Banani DOHS">Banani DOHS</option><option value="Banasree">Banasree</option><option value="Bangla Bazar">Bangla Bazar</option><option value="Banglamotor">Banglamotor</option><option value="Baridhara">Baridhara</option><option value="Baridhara DOHS">Baridhara DOHS</option><option value="Bashabo">Bashabo</option><option value="Bashtola">Bashtola</option><option value="Bashundhara R/A">Bashundhara R/A</option><option value="Bawnia">Bawnia</option><option value="House Building">House Building</option><option value="Benaroshi Polli">Benaroshi Polli</option><option value="Bijoy Shoroni">Bijoy Shoroni</option><option value="Bijoynagar">Bijoynagar</option><option value="Bongo Bazar">Bongo Bazar</option><option value="BongoBondhu Avenue">BongoBondhu Avenue</option><option value="Bongshal">Bongshal</option><option value="Bosila">Bosila</option><option value="BRTA">BRTA</option><option value="Buddhijibi Road">Buddhijibi Road</option><option value="Buddho Mondir">Buddho Mondir</option><option value="Cantonment">Cantonment</option><option value="Central Road">Central Road</option><option value="Chad Uddan">Chad Uddan</option><option value="Chamelibag">Chamelibag</option><option value="Chankarpul">Chankarpul</option><option value="Chawkbazar (Dhaka)">Chawkbazar (Dhaka)</option><option value="College Gate">College Gate</option><option value="Dainik Bangla Mor">Dainik Bangla Mor</option><option value="Dakkhinkhan">Dakkhinkhan</option><option value="Darussalam">Darussalam</option><option value="Dewanpara">Dewanpara</option><option value="Dhaka Cantonment">Dhaka Cantonment</option><option value="Dhaka Medical">Dhaka Medical</option><option value="Dhaka Tenari More">Dhaka Tenari More</option><option value="Dhaka Uddyan">Dhaka Uddyan</option><option value="Dhaka University">Dhaka University</option><option value="Dhakeshwari">Dhakeshwari</option><option value="Dhanmondi">Dhanmondi</option><option value="Dholaipar">Dholaipar</option><option value="Diabari">Diabari</option><option value="Dholaikhal">Dholaikhal</option><option value="Donia">Donia</option><option value="Duaripara">Duaripara</option><option value="Eastern Housing">Eastern Housing</option><option value="ECB Chattar">ECB Chattar</option><option value="Elephant Road">Elephant Road</option><option value="Eskaton">Eskaton</option><option value="Eskaton Garden Road">Eskaton Garden Road</option><option value="Fakirapul">Fakirapul</option><option value="Faridabad">Faridabad</option><option value="Farmgate">Farmgate</option><option value="Fayedabad">Fayedabad</option><option value="Gabtoli">Gabtoli</option><option value="Gawair">Gawair</option><option value="Golapbag (Dhaka)">Golapbag (Dhaka)</option><option value="Goltek">Goltek</option><option value="Gopibag">Gopibag</option><option value="Goran">Goran</option><option value="Green Road">Green Road</option><option value="Gudaraghat">Gudaraghat</option><option value="Gulshan 2">Gulshan 2</option><option value="Gulbagh">Gulbagh</option><option value="Gulistan">Gulistan</option><option value="Gulshan 1">Gulshan 1</option><option value="Hajipara">Hajipara</option><option value="Hatirjheel">Hatirjheel</option><option value="Hatirpool">Hatirpool</option><option value="Hazaribag">Hazaribag</option><option value="High Court">High Court</option><option value="Ibrahimpur">Ibrahimpur</option><option value="Indira Road">Indira Road</option><option value="Islampur(Dhaka)">Islampur(Dhaka)</option><option value="Jatrabari">Jatrabari</option><option value="Jhigatola">Jhigatola</option><option value="College Gate">College Gate</option><option value="Jurain">Jurain</option><option value="Kafrul">Kafrul</option><option value="Kakrail">Kakrail</option><option value="Kalabagan">Kalabagan</option><option value="Kalachandpur">Kalachandpur</option><option value="Kallyanpur">Kallyanpur</option><option value="Kalshi">Kalshi</option><option value="Kaltabazar">Kaltabazar</option><option value="Kaptan Bazar">Kaptan Bazar</option><option value="Katabon">Katabon</option><option value="Kathalbagan">Kathalbagan</option><option value="Katherpol">Katherpol</option><option value="Kawla">Kawla</option><option value="Kawran Bazar">Kawran Bazar</option><option value="Kazi Nazrul Islam Avenue">Kazi Nazrul Islam Avenue</option><option value="Kazipara">Kazipara</option><option value="Khilgaon">Khilgaon</option><option value="Khilkhet">Khilkhet</option><option value="Kochukhet">Kochukhet</option><option value="Kodomtoli">Kodomtoli</option><option value="Korail">Korail</option><option value="Kosaibari">Kosaibari</option><option value="Kotwali (Puran Dhaka)">Kotwali (Puran Dhaka)</option><option value="Kuratuli">Kuratuli</option><option value="Kuril">Kuril</option><option value="Kurmitola">Kurmitola</option><option value="Lalbagh">Lalbagh</option><option value="Lalmatia">Lalmatia</option><option value="Luxmi Bazar">Luxmi Bazar</option><option value="Madartek">Madartek</option><option value="Malibag">Malibag</option><option value="Malibagh Taltola">Malibagh Taltola</option><option value="Manda(Dhaka)">Manda(Dhaka)</option><option value="Manik Mia Avenue">Manik Mia Avenue</option><option value="Manik Nagar">Manik Nagar</option><option value="Manikdi">Manikdi</option><option value="Matikata">Matikata</option><option value="Matuail">Matuail</option><option value="Mazar Road">Mazar Road</option><option value="Meradia">Meradia</option><option value="Merul Badda">Merul Badda</option><option value="Middle Badda">Middle Badda</option><option value="Middle Bashabo">Middle Bashabo</option><option value="Minto Road">Minto Road</option><option value="Mirpur 1">Mirpur 1</option><option value="Mirpur 10">Mirpur 10</option><option value="Mirpur 13 /14 / 15">Mirpur 13 /14 / 15</option><option value="Mirpur Cantonment">Mirpur Cantonment</option><option value="Mirpur Diabari">Mirpur Diabari</option><option value="Mirpur DOHS">Mirpur DOHS</option><option value="Mirpur Taltola">Mirpur Taltola</option><option value="Mirpur">Mirpur</option><option value="Mitford">Mitford</option><option value="Moghbazar">Moghbazar</option><option value="Mohakhali">Mohakhali</option><option value="Mohakhali DOHS">Mohakhali DOHS</option><option value="Mohammadia Housing">Mohammadia Housing</option><option value="Mohammadpur (Dhaka)">Mohammadpur (Dhaka)</option><option value="Monipur">Monipur</option><option value="Monipuripara">Monipuripara</option><option value="Motijheel">Motijheel</option><option value="Mouchak">Mouchak</option><option value="Mughdapara">Mughdapara</option><option value="Nadda">Nadda</option><option value="Naddapara">Naddapara</option><option value="Nakhalpara">Nakhalpara</option><option value="Namapara-Khilkhet">Namapara-Khilkhet</option><option value="Nawabpur">Nawabpur</option><option value="Naya Bazar">Naya Bazar</option><option value="Naya Paltan">Naya Paltan</option><option value="Nazira Bazar">Nazira Bazar</option><option value="New Market">New Market</option><option value="Niketon">Niketon</option><option value="Nikunja">Nikunja</option><option value="Nilkhet">Nilkhet</option><option value="Nimtola">Nimtola</option><option value="Nobodoy">Nobodoy</option><option value="Notun Bazar">Notun Bazar</option><option value="Nurjahan Road">Nurjahan Road</option><option value="Old Elephant Road">Old Elephant Road</option><option value="Paikpara">Paikpara</option><option value="Pakuria-Uttara">Pakuria-Uttara</option><option value="Palashi">Palashi</option><option value="Palasnagor">Palasnagor</option><option value="Pallabi">Pallabi</option><option value="Panthopath">Panthopath</option><option value="Paribag">Paribag</option><option value="Patuatuly">Patuatuly</option><option value="Pilkhana">Pilkhana</option><option value="Pirerbag">Pirerbag</option><option value="Polashi">Polashi</option><option value="Poschim Badda">Poschim Badda</option><option value="Postogola">Postogola</option><option value="Prembagan">Prembagan</option><option value="Press Club">Press Club</option><option value="Puran Dhaka">Puran Dhaka</option><option value="Purana Paltan">Purana Paltan</option><option value="Purbo Badda">Purbo Badda</option><option value="Purbo Rampura">Purbo Rampura</option><option value="Purobi">Purobi</option><option value="Railway Colony">Railway Colony</option><option value="Rainkhola">Rainkhola</option><option value="Rajar Dewri">Rajar Dewri</option><option value="Rajarbag">Rajarbag</option><option value="Rajia Sultana Road">Rajia Sultana Road</option><option value="Ramna">Ramna</option><option value="Rampura">Rampura</option><option value="Rampura TV center">Rampura TV center</option><option value="Rayer Bazar">Rayer Bazar</option><option value="RayerBag">RayerBag</option><option value="Razabazar">Razabazar</option><option value="Ring Road">Ring Road</option><option value="Rupnagar Residential Area">Rupnagar Residential Area</option><option value="Sabujbag">Sabujbag</option><option value="Sadarghat (Dhaka)">Sadarghat (Dhaka)</option><option value="Satarkul">Satarkul</option><option value="Satmoshjid Road">Satmoshjid Road</option><option value="Satrasta">Satrasta</option><option value="Sayedabad">Sayedabad</option><option value="Science Lab">Science Lab</option><option value="Senpara">Senpara</option><option value="Shagufta">Shagufta</option><option value="Shah Ali Bag">Shah Ali Bag</option><option value="Shahbag">Shahbag</option><option value="Shaheenbagh">Shaheenbagh</option><option value="Shahjadpur">Shahjadpur</option><option value="Shahjahanpur (Dhaka)">Shahjahanpur (Dhaka)</option><option value="Shakhari Bazar">Shakhari Bazar</option><option value="Shankar">Shankar</option><option value="Shantibag">Shantibag</option><option value="Shantinagar">Shantinagar</option><option value="Shegunbagicha">Shegunbagicha</option><option value="Shekhertek">Shekhertek</option><option value="Sher-E-Bangla Nagar">Sher-E-Bangla Nagar</option><option value="Shewra">Shewra</option><option value="Shewrapara">Shewrapara</option><option value="Shiddheswari">Shiddheswari</option><option value="Shonir Akhra">Shonir Akhra</option><option value="Shukrabad">Shukrabad</option><option value="Shwamibag">Shwamibag</option><option value="Shyamoli">Shyamoli</option><option value="Siddique Bazar">Siddique Bazar</option><option value="Siddweswari">Siddweswari</option><option value="Sipahibag">Sipahibag</option><option value="Sobhanbag">Sobhanbag</option><option value="South Badda">South Badda</option><option value="South Baridhara">South Baridhara</option><option value="South Monipur">South Monipur</option><option value="Subastu">Subastu</option><option value="Sukrabad">Sukrabad</option><option value="Sutrapur">Sutrapur</option><option value="Tajmahal Road">Tajmahal Road</option><option value="Tallabag">Tallabag</option><option value="Taltola">Taltola</option><option value="Tantibazar">Tantibazar</option><option value="Targach">Targach</option><option value="Tatibazar">Tatibazar</option><option value="Technical">Technical</option><option value="Tejgaon">Tejgaon</option><option value="Tejkunipara">Tejkunipara</option><option value="Tikatuly">Tikatuly</option><option value="Tolarbag">Tolarbag</option><option value="Uttar Badda">Uttar Badda</option><option value="Uttara">Uttara</option><option value="Uttara Sector 11">Uttara Sector 11</option><option value="Uttara Sector 14">Uttara Sector 14</option><option value="Uttara Sector 3">Uttara Sector 3</option><option value="Uttara Sector 5">Uttara Sector 5</option><option value="Uttara Sector 7">Uttara Sector 7</option><option value="Uttara Sector 9">Uttara Sector 9</option><option value="Uttara Sector 4">Uttara Sector 4</option><option value="Uttarkhan">Uttarkhan</option><option value="Uttor Badda">Uttor Badda</option><option value="Vashantek">Vashantek</option><option value="Vatara">Vatara</option><option value="Wari">Wari</option><option value="West Dhanmondi">West Dhanmondi</option><option value="Wireless">Wireless</option><option value="Zia Colony">Zia Colony</option><option value="Zigatola">Zigatola</option></select>
                                </div>


                                <div class=" form-group">
                                    <label>Postal code</label>
                                    <input type="text" class="form-control mb-3" placeholder="Your Postal Code" name="postal_code" value="<?php echo $postal_code?>" required="">
                                </div>
                                <div class=" form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control mb-3" placeholder="+880" name="phone" value="<?php echo $phone?>" required="">
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
</div>
<!-- Invoice Report End -->

<script type="text/javascript">
    $(document).ready(function() {
        "use strict";
        var frm = $("#update_order");
        var output = $("#output");

        frm.on('submit', function(e) {
            e.preventDefault();


            $.ajax({
                url: '<?= api_url() ?>' + "order/update_order/"+'<?= $order_id ?>',
                method : $(this).attr('method'),
                // dataType : 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(d)
                {

                    toastr.success('Data Updated')
                    location.reload();


                },
                error: function(xhr)
                {


                    alert('failed!');
                }
            });
        });


        var payment_form = $("#payment_form");
        var address_update = $("#address_update");


        payment_form.on('submit', function(e) {
            e.preventDefault();




            //    var formData = new FormData(this);
            $.ajax({
                url: '<?= api_url() ?>' + "order/paymentSave/"+'<?= $order_id ?>',
                method : $(this).attr('method'),
                // dataType : 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(d)
                {
                    toastr.success('Payment Added')
                    location.reload();


                },
                error: function(xhr)
                {


                    alert('failed!');
                }
            });
        });
        address_update.on('submit', function(e) {
            e.preventDefault();




            //    var formData = new FormData(this);
            $.ajax({
                url: '<?= api_url() ?>' + "order/address_update/"+'<?= $order_id ?>',
                method : $(this).attr('method'),
                // dataType : 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(d)
                {
                    toastr.success('Address Updated')
                    location.reload();


                },
                error: function(xhr)
                {


                    alert('failed!');
                }
            });
        });
    });
    function qtyUpdate(id){



        var qty=$('#order'+id).val();
        var price=$('#price'+id).val();
        var order_id=$('#order_id').val();

        var csrf_test_name = $('[name="csrf_test_name"]').val();

        $.ajax({
            url: '<?= api_url() ?>' + "order/qty_update",
            method: 'post',

            data: {
                id: id,
                order_id: order_id,
                qty: qty,
                csrf_test_name: csrf_test_name
            },
            success: function(data) {
                toastr.success(
                    'Success!',
                    'QTY has been updated',
                    {
                        timeOut: 1000,
                        fadeOut: 1000,
                        onHidden: function () {
                            location.reload();
                        }
                    }
                );
            }

        });



    }
    function paymentDelete(id){
        var z = confirm("Are you sure to delete this payment?");

        if (z== true){

            $.ajax({
                url: '<?= api_url() ?>' + "order/paymentDelete/"+id,
                method: 'get',
                success: function(data) {
                    toastr.error(
                        'Payment has been deleted',
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                location.reload();
                            }
                        }
                    );
                }

            });
        }




    }

    function item_remove(id){

        // var item = $(this).attr("data-id");


        var order_id=$('#order_id').val();


        var z = confirm("Are you sure to remove this item?");

        if (z== true){

            $.ajax({
                url: '<?= api_url() ?>' + "order/OrderRemoveItem/"+id+'/'+order_id,
                method: 'get',
                success: function(data) {
                    toastr.success('Item has been removed!');
                    location.reload();
                }

            });
        }


    }


    $("body").on("click",".remove_cheque",function(e){
        $(this).parents('.cheque').remove();
        //the above method will remove the user_data div
    });
</script>




</script>




