<!-- Edit new bank start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Rocket Edit</h1>
            <small>Rocket Edit</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Rocket</a></li>
                <li class="active">Rocket Edit></li>
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


        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Rocket Edit</h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Csettings/update_rocket/' . $rocket_list[0]['rocket_id'], array('class' => 'form-vertical', 'id' => 'validate')) ?>
                    <div class="panel-body">

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Account Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="Account Name" value="<?php echo $rocket_list[0]['ac_name'] ?>" tabindex="1" />
                                <input type="hidden" name="oldname" value="<?php echo $rocket_list[0]['rocket_no'] ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ac_no" class="col-sm-3 col-form-label">Rocket Number <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="rocket_no" id="rocket_no" required="" placeholder="Rocket Number" value="<?php echo $rocket_list[0]['rocket_no'] ?>" tabindex="3" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank" class="col-sm-3 col-form-label">Account Type <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="rocket_type" class="form-control bankpayment" id="bank_id">
                                    <option value=""></option>

                                    <option value="<?php echo $rocket_list[0]['rocket_type'] ?>" selected><?php echo $rocket_list[0]['rocket_type'] ?></option>
                                    <option value="Merchant">Merchant</option>
                                    <option value="Agent">Agent</option>
                                    <option value="Personal">Personal</option>

                                </select>

                            </div>

                        </div>

                        <!-- <?php if (!$signed_outlet_id) { ?>
                            <div class="form-group row">
                                <label for="outlet" class="col-sm-3 col-form-label">Outlet <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <select name="outlet" class="form-control" id="outlet">
                                        <?php foreach ($outlet_list as $outlet) {
                                            if ($outlet['outlet_id'] == $rocket_list[0]['outlet_id']) { ?>
                                                <option value="<?= $outlet['outlet_id'] ?>" selected>
                                                    <?= $outlet['outlet_name'] ?>
                                                </option>
                                            <?php } else { ?>
                                                <option value="<?= $outlet['outlet_id'] ?>">
                                                    <?= $outlet['outlet_name'] ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>

                                </div>

                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="outlet" value="<?= $signed_outlet_id ?>">
                        <?php } ?> -->




                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save_changes') ?>" tabindex="6" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit new bank end -->