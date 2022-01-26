<!-- Add new bank start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Add Nagad Number</h1>
            <small>Add Nagad Number</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Nagad</a></li>
                <li class="active">Add Nagad Number</li>
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

                <?php if ($this->permission1->method('bank_transaction', 'create')->access()) { ?>
                    <a href="<?php echo base_url('Csettings/nagad_transaction') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Nagad Transaction </a>
                <?php } ?>
                <?php if ($this->permission1->method('bank_list', 'read')->access()) { ?>
                    <a href="<?php echo base_url('Csettings/nagad_list') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Nagad</a>
                <?php } ?>


            </div>
        </div>

        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Add Nagad Number </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Csettings/add_new_nagad', array('class' => 'form-vertical', 'id' => 'validate')) ?>
                    <div class="panel-body">

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Account Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="Account Name" tabindex="1" />
                            </div>
                        </div>

                        <!--                        <div class="form-group row">-->
                        <!--                            <label for="ac_name" class="col-sm-3 col-form-label">--><?php //echo display('ac_name')
                                                                                                                ?>
                        <!-- <i class="text-danger">*</i></label>-->
                        <!--                            <div class="col-sm-6">-->
                        <!--                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="--><?php //echo display('ac_name')
                                                                                                                                                            ?>
                        <!--" tabindex="2"/>-->
                        <!--                            </div>-->
                        <!--                        </div>-->

                        <div class="form-group row">
                            <label for="ac_no" class="col-sm-3 col-form-label">Nagad Number<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nagad_no" id="nagad_no" required="" placeholder="Nagad Number" tabindex="3" />
                            </div>
                        </div>

                        <!--                        <div class="form-group row">-->
                        <!--                            <label for="branch" class="col-sm-3 col-form-label">--><?php //echo display('branch')
                                                                                                                ?>
                        <!-- <i class="text-danger">*</i></label>-->
                        <!--                            <div class="col-sm-6">-->
                        <!--                                <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="--><?php //echo display('branch')
                                                                                                                                                            ?>
                        <!--" tabindex="4"/>-->
                        <!--                            </div>-->
                        <!--                        </div>-->

                        <div class="form-group row">
                            <label for="bank" class="col-sm-3 col-form-label">Account Type <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="nagad_type" class="form-control bankpayment" id="bank_id">
                                    <option value="">Select type</option>

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
                                        <?php foreach ($outlet_list as $outlet) { ?>
                                            <option value="<?= $outlet['outlet_id'] ?>"><?= $outlet['outlet_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="outlet" value="<?= $signed_outlet_id ?>">
                        <?php } ?> -->

                        <!--                        <div class="form-group row">-->
                        <!--                            <label for="signature_pic" class="col-sm-3 col-form-label">--><?php //echo display('signature_pic')
                                                                                                                        ?>
                        <!--</label>-->
                        <!--                            <div class="col-sm-6">-->
                        <!--                                <input type="file" class="form-control" name="signature_pic" id="signature_pic" placeholder="--><?php //echo display('signature_pic')
                                                                                                                                                            ?>
                        <!--" tabindex="5"/>-->
                        <!--                            </div>-->
                        <!--                        </div>-->


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="reset" class="btn btn-danger" value="<?php echo display('reset') ?>" tabindex="5" />
                                <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" tabindex="6" />
                            </div>
                        </div>


                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Add new bank end -->