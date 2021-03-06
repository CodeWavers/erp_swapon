<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('accounts') ?></h1>
            <small>Approved Vouchers</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active">Approved Vouchers</li>
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
                                Approved Vouchers
                            </h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th><?php echo display('voucher_no') ?></th>
                                        <th><?php echo display('date') ?></th>
                                        <th class="text-center">Heads of Accounts</th>
                                        <th><?php echo display('remark') ?></th>
                                        <th><?php echo display('debit') ?></th>
                                        <th><?php echo display('credit') ?></th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($aprrove)) ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($aprrove as $approve) {
                                        if ($approve->Vtype == 'CV') {
                                            $headAgainst = $this->accounts_model->get_the_head_aginst($approve->VNo, 'Debit');
                                        } elseif ($approve->Vtype == 'CV') {
                                            $headAgainst = $this->accounts_model->get_the_head_aginst($approve->VNo, 'Credit');
                                        } else {
                                            $headAgainst = $this->accounts_model->get_the_head_aginst($approve->VNo);
                                        }
                                        $all_head_ag = '';
                                        foreach ($headAgainst as $head) {
                                            $all_head_ag .= $head['HeadName'] . ', ';
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $sl++; ?></td>
                                            <td><?php echo html_escape($approve->VNo); ?></td>
                                            <td><?php echo html_escape($approve->VDate); ?></td>
                                            <td class="text-center"><?php echo html_escape(substr($all_head_ag, 0, -2)); ?></td>
                                            <td><?php echo html_escape($approve->Narration); ?></td>
                                            <td><?php
                                                echo ($approve->Vtype == 'CV' ? 0 : $approve->Debit); ?></td>
                                            <td><?php echo ($approve->Vtype == 'DV' ? 0 : $approve->Credit); ?></td>
                                            <td>

                                                <!-- <a href=" <?php echo base_url("accounts/isactive/$approve->VNo/active") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="Inactive">Approve</a> -->
                                                <?php if ($this->permission1->method('aprove_v', 'update')->access()) { ?>
                                                    <a href="<?php echo base_url("accounts/voucher_update/$approve->VNo") ?>" class="btn btn-info btn-sm" title="Update"><i class="fa fa-edit"></i></a>
                                                <?php } ?>
                                                <?php if ($this->permission1->method('aprove_v', 'delete')->access()) { ?>
                                                    <a href="<?php echo base_url("accounts/voucher_delete/$approve->VNo") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')" title="delete"><i class="fa fa-trash"></i></a>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>