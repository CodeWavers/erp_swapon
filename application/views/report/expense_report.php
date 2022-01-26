<!-- Sales Report Start -->

<?php
$currentURL = $this->uri->uri_string();
$params   = $_SERVER['QUERY_STRING'];
$fullURL = $currentURL . '?' . $params;
$_SESSION['redirect_uri'] = $fullURL;

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Report</h1>
            <small>Expense Report</small>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Report</a></li>
                <li class="active">Expense Report</li>
            </ol>
        </div>
    </section>

    <section class="content">


        <!-- Sales report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('Accounts/expense_report', array('class' => 'form-inline', 'method' => 'post')) ?>
                        <?php
                        $today = date('Y-m-d');
                        ?>

                        <?php if ($outlet_list) { ?>


                            <div class="form-group">

                                <input type="hidden" name="outlet_id" class="form-control " id="outlet_id" value="<?php echo $outlet_list[0]['outlet_id']; ?>">
                            </div>

                        <?php } else { ?>
                            <label class="" for="category">Outlet:</label>
                            <div class="form-group">

                                <select name="outlet_id" class="form-control" id="outlet">
                                    <option value="">--select one -- </option>
                                    <?php
                                    foreach ($cw as $cw) {
                                        if ($cw['outlet_id'] == $outlet_id) { ?>
                                            <option value="<?php echo $cw['outlet_id']; ?>" selected><?php echo $cw['outlet_name']; ?></option>
                                        <?php } else {
                                        ?>
                                            <option value="<?php echo $cw['outlet_id']; ?>"><?php echo $cw['outlet_name']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="<?php echo $from_date ?>">
                        </div>

                        <div class="form-group">
                            <label class="" for="to_date"><?php echo display('end_date') ?></label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $to_date ?>">
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <a class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
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
                            <h4>Expense Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="purchase_div" class="table-responsive">
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
                            <h3>
                                <center>
                                    Expense Report From <?= $from_date; ?> to <?= $to_date; ?>
                                </center>
                            </h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="expReportTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">Expenditure</th>
                                            <th class="text-center">Amount</th>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if ($exp_details) { ?>
                                            {exp_details}
                                            <tr>
                                                <td class="text-center">{sl}</td>
                                                <td class="text-center">
                                                    <?php echo form_open('Accounts/accounts_report_search', array('class' => 'form-inline', 'method' => 'post')) ?>
                                                    <input type="hidden" name="cmbGLCode" value="4">
                                                    <input type="hidden" name="cmbCode" value="{COAID}">
                                                    <input type="hidden" name="dtpFromDate" value="<?= $from_date ?>">
                                                    <input type="hidden" name="dtpToDate" value="<?= $to_date ?>">
                                                    <input type="hidden" name="outlet" value="<?= ($outlet_id ? $outlet_id : 1) ?>">

                                                    <a href="#" onclick="submit_this_form(this)">
                                                        {HeadName}
                                                    </a>

                                                    <?= form_close() ?>
                                                </td>
                                                <td class="text-right">{tot_dr}</td>
                                                {/exp_details}
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>

                                            <td colspan="" class="text-right"><b>Total Amount</b></td>
                                            <td class="text-right"><b>TK <?= number_format($total_dr, 2) ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="text-right"><?php echo $links ?></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Sales Report End -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#expReportTable').DataTable({
            dom: "Bfrltip",
            // select: true,
            responsive: true,
            processing: true,
            "order": [],
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            pageLength: 10,
            buttons: [
                // 'pageLength',
                {
                    extend: 'copyHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'csvHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    className: "btn-sm prints",
                },
                {
                    extend: 'print',
                    footer: true,
                    className: "btn-sm prints",
                }
            ]
        });
    });

    function submit_this_form(e) {
        e.closest('form').submit();
    }
</script>