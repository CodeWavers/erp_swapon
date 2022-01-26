<div class="content-wrapper">
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<h1><?php echo display('manage_purchase') ?></h1>
			<small><?php echo display('manage_your_purchase') ?></small>
			<ol class="breadcrumb">
				<li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
				<li><a href="#"><?php echo display('purchase') ?></a></li>
				<li class="active"><?php echo display('manage_purchase') ?></li>
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


		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-7">

						<?php echo form_open('', 'class="form-inline"') ?>

						<div class="form-group">
							<label class="" for="from_date"><?php echo display('from') ?></label>
							<input type="text" name="from_date" class="form-control datepicker" id="from_date" value="" placeholder="<?php echo display('start_date') ?>">
						</div>

						<div class="form-group">
							<label class="" for="to_date"><?php echo display('to') ?></label>
							<input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="">
						</div>

						<button type="button" id="btn-filter" class="btn btn-success"><?php echo display('find') ?></button>

						<?php echo form_close() ?>
					</div>

				</div>
			</div>


		</div>




		<!-- Manage Purchase report -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="panel-title">

						</div>

					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="PurList">
								<thead>
									<tr>
										<th><?php echo display('sl') ?></th>
										<!-- <th>Chalan NO:</th> -->
										<th><?php echo display('purchase_id') ?></th>
										<!-- <th>Outlet Name</th> -->
										<th><?php echo display('supplier_name') ?></th>
										<th><?php echo display('purchase_date') ?></th>
										<th><?php echo display('total_ammount') ?></th>
										<th><?php echo display('action') ?></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
									<th colspan="4" class="text-right"><?php echo display('total') ?>:</th>

									<th></th>
									<th></th>
								</tfoot>
							</table>
						</div>

					</div>
				</div>
			</div>
			<input type="hidden" id="total_purchase_no" value="<?php echo $total_purhcase; ?>" name="">
			<input type="hidden" id="currency" value="{currency}" name="">
		</div>
	</section>
</div>
<!-- Manage Purchase End -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/purchase.js.php" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		"use strict";
		var csrf_test_name = $('[name="csrf_test_name"]').val();
		var total_purchase_no = $("#total_purchase_no").val();
		var base_url = $("#base_url").val();
		var currency = $("#currency").val();
		var purchasedatatable = $('#PurList').DataTable({
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
				[10, 25, 50, 100, 250, 500, total_purchase_no],
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
				title: "<center> PurchaseLIst</center>",
				className: "btn-sm prints"
			}],


			'serverMethod': 'post',
			'ajax': {
				'url': base_url + 'Cpurchase/CheckPurchaseList',
				"data": function(data) {
					data.fromdate = $('#from_date').val();
					data.todate = $('#to_date').val();

					data.csrf_test_name = csrf_test_name;


				}
			},
			'columns': [{
					data: 'sl'
				},
				// { data: 'chalan_no'},
				{
					data: 'purchase_id'
				},
				// { data: 'outlet_name'},
				{
					data: 'supplier_name'
				},
				{
					data: 'purchase_date'
				},
				{
					data: 'total_amount',
					class: "total_sale text-right",
					render: $.fn.dataTable.render.number(',', '.', 2, currency)
				},
				{
					data: 'button'
				},
			],

			"footerCallback": function(row, data, start, end, display) {
				var api = this.api();
				api.columns('.total_sale', {
					page: 'current'
				}).every(function() {
					var sum = this
						.data()
						.reduce(function(a, b) {
							var x = parseFloat(a) || 0;
							var y = parseFloat(b) || 0;
							return x + y;
						}, 0);
					$(this.footer()).html(currency + ' ' + sum.toLocaleString(undefined, {
						minimumFractionDigits: 2,
						maximumFractionDigits: 2
					}));
				});
			}


		});


		$('#btn-filter').click(function() {
			purchasedatatable.ajax.reload();
		});

	});
</script>