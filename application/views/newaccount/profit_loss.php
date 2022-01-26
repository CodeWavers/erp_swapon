<!-- Purchase Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Profit Loss Report</h1>
            <small>Profit Loss Report</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i>Profit Loss Report</a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Profit Loss Report</li>
            </ol>
        </div>
    </section>

    <section class="content">



        <!-- Purchase report -->


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Profit Loss Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <?php if (!$first_outlet) { ?>
                            <?php echo form_open_multipart('accounts/profit_loss_report_search', array('id' => 'profit_loss_filter', 'name' => 'profit_loss_filter')) ?>
                            <div class="row">
                                <div class="col-sm-8">

                                    <div class="form-group row">
                                        <label for="outlet" class="col-form-label col-sm-4">Outlet</label>
                                        <div class="col-sm-6">
                                            <select id="outlet" class="form-control" name="outlet">
                                                <option value="">Select One</option>
                                                <option value="1">Consolidated</option>
                                                {cw}
                                                <option value={warehouse_id}>{central_warehouse}</option>
                                                {/cw}
                                                {outlet_list}
                                                <option value={outlet_id}>{outlet_name}</option>
                                                {/outlet_list}
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="btnSave" class="btn btn-success"><?php echo display('find') ?></button>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <?php echo form_close() ?>
                        <?php } ?>

                        <div id="purchase_div" class="table-responsive">
                            <h3 align="center">Profit Loss Report</h3>
                            <table class="print-table" width="100%">

                                <tr>
                                    <td align="left" class="print-table-tr">
                                        <img src="<?php echo $software_info[0]['logo']; ?>" alt="logo">
                                    </td>
                                    <td align="center" class="print-cominfo">
                                        <span class="company-txt">
                                            <?php echo $company[0]['company_name']; ?>

                                        </span><br>
                                        <?php echo $company[0]['address']; ?>
                                        <br>
                                        <?php echo $company[0]['email']; ?>
                                        <br>
                                        <?php echo $company[0]['mobile']; ?>

                                    </td>

                                    <td align="right" class="print-table-tr">
                                        <date>
                                            <?php echo display('date') ?>: <?php
                                                                            echo date('d-M-Y');
                                                                            ?>
                                        </date>
                                    </td>
                                </tr>

                            </table>
                            <div class=" col-xs-12 row">
                                <div class="col-xs-6">
                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Opening Inventory</b></td>
                                                <td></td>
                                                <td></td>

                                                <?php if ($opening_inventory) : ?>
                                                    <td><b><?php echo  number_format($opening_inventory, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>

                                            <tr>
                                                <td><b>Product Purchase</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($product_purchase) : ?>
                                                    <td><b><?php echo  number_format($product_purchase, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <td><b>Direct Expense</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($direct_expense) : ?>
                                                    <td><b><?php echo  number_format($direct_expense, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php foreach ($expense as $direct_expense) { ?>
                                                <?php if ($i['amount'] > 0) { ?>

                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $direct_expense['HeadName'] ?></td>
                                                        <td><?php echo $direct_expense['amount'] ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b><?php echo number_format($abc, 2) ?></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>(-)Closing Inventory</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($closing_inventory) : ?>
                                                    <td><b><?php echo  number_format($closing_inventory, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <td><b>Costs of Goods Sold</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($total_i) : ?>
                                                    <td><b><?php echo  number_format($total_i, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>

                                            <tr>
                                                <td><b>Gross Profit/Loss (c/o)</b></td>

                                                <td></td>
                                                <td></td>

                                                <td><b><?php echo  number_format($gross_profit, 2) ?></b></td>


                                            </tr>

                                        </tbody>
                                    </table>


                                </div>

                                <div class="col-xs-6">
                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Sales Account</b></td>
                                                <td></td>
                                                <td></td>

                                                <?php if ($total_sale) : ?>
                                                    <td><b><?php echo  number_format($total_sale, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>

                                            <tr>

                                                <td></td>
                                                <td>Sales</td>

                                                <?php if ($product_sale) : ?>
                                                    <td><?php echo  number_format($product_sale, 2) ?></td>
                                                <?php else : ?>
                                                    <td><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td></td>

                                                <td align="left">(-)Sales Return</td>

                                                <?php if ($sale_return) : ?>
                                                    <td><?php echo  number_format($sale_return, 2) ?></td>
                                                <?php else : ?>
                                                    <td><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>

                                                <td align="left">Service Income</td>

                                                <?php if ($service_income) : ?>
                                                    <td><?php echo  number_format($service_income, 2) ?></td>
                                                <?php else : ?>
                                                    <td><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                                <td></td>
                                            </tr>



                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class=" col-xs-12 row">
                                <div class="col-xs-6">

                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>


                                            <tr style="border: 2px solid black;">
                                                <td><b>Total</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>




                                                <?php if ($total_i) : ?>
                                                    <td><span style="border-bottom-style:double; border-bottom-width: 5px;"><b><?php echo  number_format($total_i + $gross_profit, 2) ?></b></span></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-xs-6">

                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>


                                            <tr style="border: 2px solid black">
                                                <td><b>Total</b></td>

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                                <?php if ($total_sale) : ?>
                                                    <td><b><span style="border-bottom-style:double; border-bottom-width: 5px;"><?php echo  number_format($total_sale, 2) ?></span></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class=" col-xs-12 row">
                                <div class="col-xs-6">

                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Indirect Expense</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($indirect_expense) : ?>
                                                    <td><b><?php echo  number_format($indirect_expense, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>

                                            <?php foreach ($indirect_expense_c as $i) { ?>
                                                <?php if ($i['amount'] > 0) { ?>

                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td><?php echo $i['amount'] ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>

                                            <tr>
                                                <td><b>Net Profit/Loss</b></td>

                                                <td></td>
                                                <td></td>

                                                <td><b><?php echo  number_format($net_profit, 2) ?></b></td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-xs-6">

                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Gross Profit/Loss(b/f)</b></td>

                                                <td></td>
                                                <td></td>

                                                <td><b><?php echo  number_format($gross_profit, 2) ?></b></td>


                                            </tr>
                                            <tr>
                                                <td><b>Indirect Income</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($indirect_income > 0) : ?>
                                                    <td><b><?php echo  number_format($indirect_income, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>

                                            <?php foreach ($indirect_income_c as $i) { ?>
                                                <?php if ($i['amount'] > 0) { ?>

                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td><?php echo $i['amount'] ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>





                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class=" col-xs-12 row">
                                <div class="col-xs-6">

                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>


                                            <tr style="border: 2px solid black">
                                                <td><b>Total</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>



                                                <?php if ($left_total) : ?>
                                                    <td><b><?php echo  number_format($left_total, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-xs-6">

                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>


                                            <tr style="border: 2px solid black">
                                                <td><b>Total</b></td>

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                                <?php if ($right_total) : ?>
                                                    <td><b><?php echo  number_format($right_total, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-left">

                            <button class="btn btn-info" onclick="printDiv('purchase_div')"><span class="fa fa-print"></span></button>

                        </div>
                        <div class="text-right"><?php echo $links ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->