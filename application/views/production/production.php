<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo "Manage Production" ?></h1>
            <small><?php echo "Manage your Production" ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Production" ?></a></li>
                <li class="active"><?php echo  "Manage Production" ?></li>
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

        <!--         <div class="row">
            <div class="col-sm-12">

         <?php if ($this->permission1->method('create_product', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cproduct') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_product') ?> </a>
<?php } ?>
<?php if ($this->permission1->method('add_product_csv', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Cproduct/add_product_csv') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-plus"> </i>  <?php echo display('add_product_csv') ?> </a>
                    <?php } ?>


            </div>
        </div>
 -->



        <!-- Manage Product report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo  "Manage Production" ?></h4>


                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th><?php echo "Base Number" ?></th>
                                        <th><?php echo "Product Details" ?></th>
                                        <th><?php echo display('quantity') ?></th>
                                        <th><?php echo display('grand_total') ?></th>
                                        <th><?php echo display('action') ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;
                                    foreach ($production_list as $pro) {
                                        $sl++; ?>
                                        <tr>
                                            <td><?= $sl; ?></td>
                                            <td><?= $pro['base_number']; ?></td>
                                            <td><?= $pro['pr_details']; ?></td>
                                            <td><?= $pro['quantity']; ?></td>
                                            <td><?= $pro['price']; ?></td>
                                            <td>
                                                <a href="<?= base_url() . 'Cproduction/production_update_form/' . $pro['pro_id']; ?>">
                                                    <button type="button" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <input type="hidden" id="total_production" value="<?php echo $total_production; ?>" name="">
            </div>
        </div>
    </section>
</div>