
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('sms') ?></h1>
            <small>Send SMS</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('sms') ?></a></li>
                <li class="active">Send SMS</li>
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

        <?php
        if($this->permission1->method('soft_setting','read')->access() || $this->permission1->method('soft_setting','update')->access()){ ?>
            <!-- New customer -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Send SMS </h4>
                            </div>
                        </div>
                        <?php echo form_open_multipart('Csms/send_sms', array('class' => 'form-vertical','id' => 'sms_configuration'))?>
                        <div class="panel-body">

                            <div class="form-group row">
                                <label for="api_key" class="col-sm-3 col-form-label"><?php echo display('api_key') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name ="api_key" value="<?php echo $configdata[0]['api_key'];?>" id="api_key" type="text" tabindex="1" readonly>
                                    <input type="hidden" value="<?php echo $configdata[0]['id'];?>" name="id" readonly>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="from" class="col-sm-3 col-form-label"><?php echo display('from') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name ="from" value="<?php echo $configdata[0]['from'];?>" id="from" type="text" tabindex="3" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="from" class="col-sm-3 col-form-label">To <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <input class="form-control" name ="to" placeholder="Send to" value="" id="to" type="text" tabindex="3">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="from" class="col-sm-3 col-form-label">Message<i class="text-danger">*</i></label>
                                <div class="col-sm-6">


                                    <textarea rows="6" cols="60" name="message" class="form-control" placeholder="Your Message" id="message"></textarea>
                                </div>
                            </div>





                            <?php
                            if($this->permission1->method('configure','update')->access()){ ?>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <input type="submit" id="sms" class="btn btn-primary btn-large" name="save_changes" value="Send SMS" tabindex="13"/>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        <?php }
        else{
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo display('You do not have permission to access. Please contact with administrator.');?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }?>


    </section>
</div>




