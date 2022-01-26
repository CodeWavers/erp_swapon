<!-- Manage Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Return</h1>
            <small>Return to cw</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Return</a></li>
                <li class="active">Return to CW</li>
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
        <?php echo form_open('Cretrun_m/confirm_return_cw', array('class' => 'form-vertical', 'id' => 'return_cw_form')) ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">

                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th>Item Information</th>
                                    <th>Transferred Quantity</th>
                                    <th>Return Quantity</th>
                                    <th>Check Return</th>
                                </thead>

                                <tbody>
                                    {rqsn_details}
                                    <tr>
                                        <td>{pr_details}</td>
                                        <td>{a_qty}</td>
                                        <td>
                                            <input type="text" class="form-control" name="return_qty[]">
                                        </td>
                                        <td>
                                            <input type="checkbox" name='rtn[]' class="chk">
                                            <input type="hidden" name='rtn[]' value="0">
                                            <input type="hidden" name="details_id[]" value="{rqsn_detail_id}">
                                        </td>
                                    </tr>
                                    {/rqsn_details}
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm right">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <?= form_close() ?>
    </section>
</div>