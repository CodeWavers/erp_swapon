<!-- Sales Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Customer's Order</h1>
            <small>Sales Delivery Section</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Customer's Order</li>
            </ol>
        </div>
    </section>

    <section class="content">



        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Sales Delivery Section </h4>
                        </div>
                        <div class="panel panel-default">
                            <form>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">View Undelivered
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Partial Delivered
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Fully Delivered
                                </label>
                            </form>
                            <div class="panel-body ">
                                <?php echo form_open('Cinvoice/customer_order', array('class' => 'form-inline', 'method' => 'post')) ?>
                                <?php
                                date_default_timezone_set("Asia/Dhaka");
                                $today = date('Y-m-d');
                                ?>



                                <div class="form-group">
                                    <label class="" for="from_date">From</label>
                                    <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label class="" for="to_date">To</label>
                                    <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="" autocomplete="off">
                                </div>

                                <button type="button" class="btn btn-success">View Order</button>
<!--                                <a class="btn btn-warning" href="#" onclick="printDiv('purchase_div')">--><?php //echo display('print') ?><!--</a>-->
                                <?php echo form_close() ?>
                            </div>
                            <table class="table table-responsive table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>User</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>      <tr>
                                    <td>Md.Sharif Hossain(BP9696180114)(HTL-0000337578)</td>
                                    <td><a href="">KM SO-2223-000632(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Raisul Islam</td>
                                </tr>
                                <tr>
                                    <td>Shampa(HTL-0000337623)</td>
                                    <td><a href="">KM SO-2223-000635(Processing)</a></td>
                                    <td>Aug 16 2022 1:29PM</td>
                                    <td>Reanul</td>
                                </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!-- Sales Report End -->