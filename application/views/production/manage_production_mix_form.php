<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo "Manage Production" ?></h1>
            <small><?php echo "Manage Production Mix" ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Production" ?></a></li>
                <li class="active">Manage Production Mix</li>
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

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Manage Producion Mix</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                                <thead>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Product Details</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;
                                    foreach ($mix_list as $mix) {
                                        $sl++;
                                    ?>
                                        <tr>
                                            <td><?= $sl ?></td>
                                            <td><?= $mix['date'] ?></td>
                                            <td><?= $mix['pr_details'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('Cproduction/edit_production_mix/' . $mix['production_id']) ?>">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>