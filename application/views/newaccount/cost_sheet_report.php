<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo 'Accounts' ?></h1>
            <small><?php echo 'Cost Sheet' ?></small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo 'Accounts' ?></a></li>
                <li class="active"><?php echo 'Cost Sheet' ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="text-right" id="print">
                                <input type="button" class="btn btn-warning" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');" />
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" id="printArea">
                        <div class="paddin5ps">
                            <table class="print-table " width="100%">

                                <tr>
                                    <td align="left" class="print-table-tr">
                                        <img src="<?php echo $software_info[0]->logo; ?>" alt="logo">
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
                            <center>
                                <h3>Cost Sheet Till <?= date('Y-m-d') ?></h3>
                            </center>
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="sheet-abc underline">A. Raw Material Consumed</span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-sub">Opening Stock of Raw Material</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $raw_opening_inventory ?>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-sub">(+) Purchase of Raw Material</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $raw_mat_purchase ?>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="text-right" style="border-bottom: 2px solid black;">
                                            <strong><?= $total_raw_in ?></strong>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-sub">(-) Closing Stock of Raw Material</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $raw_closing_stock ?>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td class="sheet-heads">
                                            Total Raw Material Consumed
                                        </td>
                                        <td></td>
                                        <td class="text-right">
                                            <strong><?= $total_raw_consumed ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <span class="sheet-abc underline">B. Tools Consumed:</span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-sub">Opening Stock of Tools</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $tool_opening_inventory ?>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-sub">(+) Purchase of Tools</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $tools_purchase ?>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="text-right" style="border-bottom: 2px solid black;">
                                            <strong><?= $total_tools_in ?></strong>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-sub">(-) Closing Stock of Tools</span>
                                        </td>
                                        <td class="text-right">
                                            <?= $tools_closing_stock ?>
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td class="sheet-heads">
                                            Total Tools Consumed
                                        </td>
                                        <td></td>
                                        <td class="text-right">
                                            <strong><?= $total_raw_consumed ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-abc underline">C. Production Expenses:</span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <?php foreach ($production_exp as $pr_exp) { ?>
                                        <tr>
                                            <td>
                                                <span class="sheet-sub"><?= $pr_exp['HeadName'] ?></span>
                                            </td>
                                            <td class="text-right">
                                                <?= $pr_exp['tot_dr'] ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>
                                            <span class="sheet-heads">Total Production Expenses</span>
                                        </td>
                                        <td style="border-top: 2px solid black;"></td>
                                        <td class="text-right">
                                            <strong><?= $total_production_exp ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-heads">D. Prime Cost (A+B+C)</span>
                                        </td>
                                        <td></td>
                                        <td class="text-right" style="border-top: 2px solid black;">
                                            <strong><?= $prime_cost ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-abc underline">E. Factory Operating Expenses:</span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <?php foreach ($factory_exp as $fact) { ?>
                                        <tr>
                                            <td>
                                                <span class="sheet-sub"><?= $fact['HeadName'] ?></span>
                                            </td>
                                            <td class="text-right">
                                                <?= $fact['tot_dr'] ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>
                                            <span class="sheet-heads">Total Factory Overhead Cost</span>
                                        </td>
                                        <td style="border-top: 2px solid black;"></td>
                                        <td class="text-right">
                                            <strong><?= $total_factory_op_exp ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="sheet-heads">F. Cost of Goods Manufactured (D+E)</span>
                                        </td>
                                        <td></td>
                                        <td class="text-right" style="border-top: 2px solid black;">
                                            <strong><?= $cost_of_goods_mfd ?></strong>
                                        </td>
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