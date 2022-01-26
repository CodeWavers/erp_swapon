<!-- Add new bank start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Card</h1>
            <small>Edit Card</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home'); ?></a></li>
                <li><a href="#">Card</a></li>
                <li class="active">Edit Card</li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) { ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message; ?>
            </div>
        <?php $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message; ?>
            </div>
        <?php $this->session->unset_userdata('error_message');
        }
        ?>

        <div class="row">
            <div class="col-sm-12">

                <?php if ($this->permission1->method('bank_list', 'read')->access()) { ?>
                    <a href="<?php echo base_url(
                                    'Csettings/card'
                                ); ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i> Add Card Type</a>
                <?php } ?>


            </div>
        </div>

        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Edit Card </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Csettings/update_bank_card', [
                        'class' => 'form-vertical',
                        'id' => 'validate',
                    ]); ?>
                    <div class="panel-body">
                        {info}
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Card Type <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <!-- <input type="text" class="form-control" name="ac_name" id="ac_name" required="" value={card_name} placeholder="Card Name" tabindex="1" /> -->
                                <select id="card_id" class="form-control" name="card_id">
                                    <?php foreach ($card_types as $card_type) {
                                        if ($card_type['card_id'] == $info[0]['card_id']) { ?>
                                            <option value="<?= $card_type['card_id'] ?>" selected><?= $card_type['card_name'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $card_type['card_id'] ?>"><?= $card_type['card_name'] ?></option>
                                    <?php }
                                    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Card Number <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="card_no" id="card_no" required="" value={card_no} placeholder="Card Name" tabindex="1" />
                                <input type="hidden" name="card_no_id" value={card_no_id}>
                            </div>
                        </div>
                        {/info}

                        <!-- <?php if (!$signed_outlet_id) { ?>
                            <div class="form-group row">
                                <label for="outlet" class="col-sm-3 col-form-label">Outlet <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <select name="outlet" class="form-control" id="outlet">
                                        <?php foreach ($outlet_list as $outlet) {
                                            if ($outlet['outlet_id'] == $card_info[0]['outlet_id']) { ?>
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
                            <label for="bank_id" class="col-sm-3 col-form-label">Bank<i class="text-danger">*</i></label>

                            <div class="col-sm-6">
                                <select class="form-control" name="bank_id" id="bank_id">
                                    <?php foreach ($bank_list as $bank) {
                                        if ($bank['bank_id'] == $info[0]['bank_id']) { ?>
                                            <option value="<?= $bank['bank_id'] ?>" selected><?= $bank['bank_name'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $bank['bank_id'] ?>"><?= $bank['bank_name'] ?></option>
                                    <?php }
                                    } ?>
                                    {bank_list}
                                    <option value={bank_id}>{bank_name}</option>
                                    {/bank_list}
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input style="width: 100%;" type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="Update" tabindex="6" />
                            </div>
                        </div>





                    </div>



                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
</div>
</section>
</div>
<!-- Add new bank end -->