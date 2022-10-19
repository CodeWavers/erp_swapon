<!-- Purchase Report Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Balance Sheet Report</h1>
            <small>Balance Sheet Report</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i>Accounts</a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active">Balance Sheet Report</li>
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

                    <h4>Balace Sheet Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php if (!$outlet) { ?>
                            <?php echo form_open_multipart('accounts/balance_sheet_report_search_new', array('id' => 'balance_sheet_filter', 'name' => 'balance_sheet_filter')) ?>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-group row">
                                        <label for="outlet" class="col-form-label col-sm-1">Outlet</label>
                                        <div class="col-sm-2">
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
                                        <label for="outlet" class="col-form-label col-sm-1">Start Date</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="dtpFromDate" value="<?php echo (!empty($dtpFromDate) ? html_escape($dtpFromDate) : '') ?>" placeholder="<?php echo display('from_date') ?>" class="datepicker form-control" autocomplete="off">

                                        </div>
                                        <label for="outlet" class="col-form-label col-sm-1">End Date</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="dtpToDate" value="<?php echo (!empty($dtpToDate) ? html_escape($dtpToDate) : '') ?>" placeholder="<?php echo display('to_date') ?>" class="datepicker form-control" autocomplete="off">

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
                            <h3  align="center"><b>Balance Sheet Report of <br /><?php echo $dtpFromDate ?> <?php echo display('to')?> <?php echo $dtpToDate;?> </b></h3>

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
                                            <th></th>
                                            <th><h4><b>Liabilities</b></h4></th>
                                            <th></th>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td colspan="4"><b>Current Liabilities:</b></td>


                                            </tr>

                                            <tr>
                                                <td>Account Payable</td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($acc_pay) : ?>
                                                    <td align="right"><?php echo  number_format($acc_pay, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>



                                            <?php foreach ($acc_pay_c as $i) { ?>
                                                <?php if ($i['amount'] > 0) { ?>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>

                                            <tr>
                                                <td>Employee Ledger</td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($emp_led) : ?>
                                                    <td><?php echo  number_format($emp_led, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>



                                            <?php foreach ($emp_led_c as $i) { ?>
                                                <?php if ($i['amount'] > 0) { ?>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            <tr>
                                                <td><b>Total Current Liabilities</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($current_liabilities) : ?>
                                                    <td align="right"><b><?php echo  number_format($current_liabilities, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><b>Non Current Liabilities:</b></td>

                                            </tr>


                                            <?php foreach ($non_current_liabilities_c as $i) { ?>
                                                <?php if ($i['amount'] > 0) { ?>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>

                                            <tr>
                                                <td><b>Total Non Current Liabilities</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($non_current_liabilities) : ?>
                                                    <td align="right"><b><?php echo  number_format($non_current_liabilities, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                            </tr>

                                            <tr>
                                                <td colspan="4"><b>Equity:</b></td>
                                            </tr>
                                            <tr>
                                                <td>Capital Account</td>
                                                <td></td>
                                                <td></td>
                                                <?php if ($capital) : ?>
                                                    <td align="right"><?php echo  number_format($capital, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>

                                            </tr>

                                            <tr>
                                                <td>Net Profit-Loss</td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($net_profit) : ?>
                                                    <td align="right"><?php echo  number_format($net_profit, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>

                                            <tr>
                                                <td><b>Total Equity</b></td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($capital) : ?>
                                                    <td align="right"><b><?php echo  number_format($capital, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
                                                <?php endif; ?>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-xs-6">
                                    <table class="table table-striped">
                                        <thead>
                                            <th></th>
                                            <th><h4><b>Assets</b></h4></th>
                                            <th></th>
                                        </thead>
                                        <tbody>


                                        <tr>
                                            <td colspan="4"><b>Fixed Assets:</b></td>

                                        </tr>


                                        <?php foreach ($fixed_assets_c as $i) { ?>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $i['HeadName'] ?></td>
                                                <td align="right"><?php echo $i['amount'] ?></td>

                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <td><b>Total Fixed Assets</b></td>
                                            <td></td>
                                            <td></td>

                                            <?php if ($fixed_assets) : ?>
                                                <td align="right"><b><?php echo  number_format($fixed_assets, 2) ?></b></td>
                                            <?php else : ?>
                                                <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
                                            <?php endif; ?>
                                        </tr>

                                            <tr>
                                                <td colspan="4"><b>Current Assets:</b></td>

                                            </tr>

                                            <tr>
                                                <td>Account Receivable</td>

                                                <td></td>
                                                <td></td>
                                                <?php if ($acc_rcv) : ?>
                                                    <td align="right"><?php echo  number_format($acc_rcv, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>


                                            <?php foreach ($acc_rcv_c as $i) { ?>

                                                <?php if ($i['amount'] > 0) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>

                                            <tr>
                                                <td>Cash & Cash Equivalent</td>
                                                <td></td>
                                                <td></td>
                                                <?php if ($cash_eq) : ?>
                                                    <td align="right"><?php echo  number_format($cash_eq, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <td>Cash In Hand</td>
                                                <td></td>
                                                <td></td>
                                                <?php if ($cash_hand) : ?>
                                                    <td align="right"><?php echo  number_format($cash_hand, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>
                                            <!--                                        {cash_hand_c}-->
                                            <!--                                        <tr>-->
                                            <!--                                            <td></td>-->
                                            <!--                                            <td>{HeadName}</td>-->
                                            <!--                                            <td>{total_debit}</td>-->
                                            <!--                                            <td></td>-->
                                            <!--                                        </tr>-->
                                            <!--                                        {/cash_hand_c}-->

                                            <tr>
                                                <td>Cash At Bank</td>
                                                <td></td>
                                                <td></td>
                                                <?php if ($cash_bank) : ?>
                                                    <td align="right"><?php echo  number_format($cash_bank, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>

                                            <?php foreach ($cash_bank_c as $i) { ?>

                                                <?php if ($i['amount'] > 0) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            <tr>
                                                <td>Cash At Bkash</td>
                                                <td></td>
                                                <td></td>
                                                <?php if ($cash_bkash) : ?>
                                                    <td align="right"><?php echo  number_format($cash_bkash, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>


                                            <?php foreach ($cash_bkash_c as $i) { ?>

                                                <?php if ($i['amount'] > 0) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            <tr>
                                                <td>Cash At Nagad</td>
                                                <td></td>
                                                <td></td>
                                                <?php if ($cash_nagad) : ?>
                                                    <td align="right"><?php echo  number_format($cash_nagad, 2) ?></td>
                                                <?php else : ?>
                                                    <td align="right"><?php echo number_format('0', 2) ?></td>
                                                <?php endif; ?>
                                            </tr>


                                            <?php foreach ($cash_nagad_c as $i) { ?>

                                                <?php if ($i['amount'] > 0) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $i['HeadName'] ?></td>
                                                        <td align="right"><?php echo $i['amount'] ?></td>

                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>



                                        <tr>
                                            <td colspan="3">Closing Inventory (Finished Goods)</td>

                                            <?php if ($closing_finished) : ?>
                                                <td align="right"><?php echo  number_format($closing_finished, 2) ?></td>
                                            <?php else : ?>
                                                <td align="right"><?php echo number_format('0', 2) ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Closing Inventory (Raw Materials)</td>

                                            <?php if ($closing_raw) : ?>
                                                <td align="right"><?php echo  number_format($closing_raw, 2) ?></td>
                                            <?php else : ?>
                                                <td align="right"><?php echo number_format('0', 2) ?></td>
                                            <?php endif; ?>
                                        </tr>

                                        <tr>
                                            <td>Closing Inventory (Tools)</td>

                                            <td></td>
                                            <td></td>
                                            <?php if ($closing_tools) : ?>
                                                <td align="right"><?php echo  number_format($closing_tools, 2) ?></td>
                                            <?php else : ?>
                                                <td align="right"><?php echo number_format('0', 2) ?></td>
                                            <?php endif; ?>
                                        </tr>

                                        <tr>
                                            <td><b>Total Current Assets</b></td>

                                            <td></td>
                                            <td></td>
                                            <?php if ($current_assets) : ?>
                                                <td align="right"><b><?php echo  number_format($current_assets, 2) ?></b></td>
                                            <?php else : ?>
                                                <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
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


                                            <tr style="border: 2px solid black">
                                                <td><b>Total Liabilities & Equity</b></td>
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


                                                <?php if ($left_total) : ?>
                                                    <td align="right"><b><?php echo  number_format($left_total, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
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
                                                <td><b>Total Assets</b></td>

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
                                                    <td align="right"><b><?php echo  number_format($right_total, 2) ?></b></td>
                                                <?php else : ?>
                                                    <td align="right"><b><?php echo number_format('0', 2) ?></b></td>
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