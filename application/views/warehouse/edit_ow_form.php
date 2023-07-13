<!--Edit customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Outlet Edit</h1>
            <small>Outlet Edit</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Outlet</a></li>
                <li class="active">Outlet Edit</li>
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

        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Outlet Name</h4>
                        </div>
                    </div>
                  <?php echo form_open_multipart('Ccwarehouse/branch_update',array('class' => 'form-vertical', 'id' => 'category_update'))?>
                    <div class="panel-body">
                        <div class="form-group row">

                            <label for="category_name" class="col-sm-3 col-form-label">User <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="user_id" tabindex="3">
                                    <option value="<?php echo $user_id?>"><?php echo $first_name.$last_name?></option>


                                 <?php  foreach ($user_list as $user_list ){ ?>
                                     <option value="<?php echo $user_list['user_id']?>"><?php echo $user_list['first_name']?> <?php echo $user_list['last_name']?></option>

                                 <?php  } ?>





                                </select>
                            </div>
                        </div>
                    	<div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Outlet Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="category_name" id="category_name" type="text" placeholder="Outlet Name"  required="" value="{outlet_name}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Outlet Address</label>
                            <div class="col-sm-6">

                                <textarea name="address" class="form-control"  placeholder="Address">{address}</textarea>

                            </div>

                            <div class="col-sm-3">
                                <input type="submit" id="add-category" class="btn btn-success btn-large" name="add-category" value="<?php echo display('add') ?>" />
                            </div>
                        </div>

                        <input type="hidden" value="{outlet_id}" name="courier_id">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-Customer" class="btn btn-success btn-large" name="add-Customer" value="<?php echo display('save_changes') ?>" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit customer end -->
