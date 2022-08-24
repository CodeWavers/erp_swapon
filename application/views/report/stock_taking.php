<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Stock Taking</h1>
            <small>Stock Taking</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Stock</a></li>
                <li class="active">Stock Taking</li>
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
        <?php echo form_open('Creport/save_stock', array('class' => 'form-vertical', 'id' => 'submit_form', 'name' => '')) ?>
        <input type="hidden" id="base_url" value="<?= base_url() ?>">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                Stock Taking
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">STID:
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $stid = 'ST-'.date('ymdhs'); ?>
                                        <input type="text" required tabindex="2" class="form-control " name="stid" value="<?php echo $stid; ?>" id="stid" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Date:
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="date" value="<?php echo $date; ?>" id="date" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="notes" class="col-sm-4 col-form-label">Any Notes:

                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="notes" name="notes" placeholder="Any Notes..." rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="margin-top10">
                            <table id="st_table" class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>SKU </th>
                                        <th>Product Name </th>
                                        <th class="text-right ">Physical Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {product_list}
                                    <tr>
                                        <td>{sl}</td>
                                        <td>{sku}</td>
                                        <td>
                                            {product_name}
                                            <input type="hidden" name="product_id[]" value={product_id}>
                                        </td>
                                        <td align="right"><input class="form-control text-right" value="" placeholder="0.00" type="text" name="p_qty[]" id="p_qty_{sl}"></td>
                                    </tr>
                                    {/product_list}
                                </tbody>

                            </table>

                        </div>
                        <button type="submit" id="submit_btn" name="submit_form" class="btn btn-success btn-md">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <?php echo form_close(); ?>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#st_table').DataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: [1, 2, 3],
                },
            ],
        });

        $('button').click(function () {
            table.destroy();
        });
    });




</script>