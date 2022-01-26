<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Report</h1>
            <small>Transfer Report</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Report</a></li>
                <li class="active">Transfer Report</li>
            </ol>
        </div>
    </section>
    <section class="content">
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
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                Transfer Report
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="transfer_report_table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Requsition ID</th>
                                        <th>Transferred From</th>
                                        <th>Transferred To</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="" id="length" value="<?= $length ?>">
                        <input type="hidden" name="" id="base_url" value="<?= base_url() ?>">
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    $(document).ready(function() {
        "use strict";
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var transfer_count = $("#length").val();
        var base_url = $("#base_url").val();
        var purchasedatatable = $('#transfer_report_table').DataTable({
            responsive: true,

            "aaSorting": [
                [3, "desc"]
            ],
            "columnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 1, 2, 3]
                },

            ],
            'processing': true,
            'serverSide': true,
            'lengthMenu': [
                [10, 25, 50, 100, 250, 500, transfer_count],
                [10, 25, 50, 100, 250, 500, "All"]
            ],

            dom: "'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip",
            buttons: [{
                extend: "copy",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want
                },
                className: "btn-sm prints"
            }, {
                extend: "csv",
                title: "PurchaseLIst",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                className: "btn-sm prints"
            }, {
                extend: "excel",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                title: "PurchaseLIst",
                className: "btn-sm prints"
            }, {
                extend: "pdf",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                title: "PurchaseLIst",
                className: "btn-sm prints"
            }, {
                extend: "print",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                title: "<center>Transfer List</center>",
                className: "btn-sm prints"
            }],


            'serverMethod': 'post',
            'ajax': {
                'url': base_url + 'Creport/transferAlldata',
                'data': function(data) {
                    data.csrf_test_name = csrf_test_name;
                }
            },
            'drawCallback': function(settings) {
                var len = settings.json.aaData.length;
                console.log(settings.json.aaData.length);
                makePopup(len);
            },
            'columns': [{
                    data: 'sl'
                },
                {
                    data: 'date'
                },
                {
                    data: 'rqsn_id'
                },
                {
                    data: 'from_outlet'
                },
                {
                    data: 'to_outlet'
                },
                {
                    data: 'button'
                },
            ],
            // "deferLoading": transfer_count,
            deferRender: true,


        });

    });

    function makePopup(len) {
        for (let sl = 1; sl <= len; sl++) {
            const button = document.querySelector('.info_button_' + sl);
            const tooltip = document.querySelector('.tooltip' + sl);
            popOverInit(button, tooltip); //you can find this function in custom.js
        }
    }
</script>