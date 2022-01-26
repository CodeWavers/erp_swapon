<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Courier</h1>
            <small>Name</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Courier</a></li>
                <li class="active">Name</li>
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
                            <h4>Courier Name</h4>
                        </div>
                    </div>
                   
                    <div class="panel-body category">
<ul class="nav nav-tabs">
 <li class="active"><a data-toggle="tab" href="#categoryList"><i class="ti-align-justify"> </i> Manage Courier</a></li>
  <li><a data-toggle="tab" href="#add_category"><i class="fa fa-plus"> </i>Add Courier Name</a></li>
  <li><a data-toggle="tab" href="#csvupload"><i class="fa fa-file"> </i> Courier CSV Upload</a></li>
</ul>

<div class="tab-content">

  <div id="categoryList" class="tab-pane fade in active">
    <div class="row cat-tabcontent">
         <div class="table-responsive">
                            <table id="dataTableExample3" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                      
                                        <th class="text-center">Courier Name</th>
                                        <th class="text-center"><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($category_list) {
                                        ?>
                                        {category_list}
                                        <tr>
                                           
                                            <td class="text-center">{courier_name}</td>
                                            <td>
                                    <center>
                                        <?php echo form_open() ?>
                                        <?php if($this->permission1->method('manage_category','update')->access()){ ?>
                                        <a href="<?php echo base_url() . 'Ccourier/category_update_form/{courier_id}'; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php }?>
                                      <?php if($this->permission1->method('manage_category','delete')->access()){ ?>
                                        <a href="<?php echo base_url() . 'Ccourier/category_delete/{courier_id}'; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Want To Delete ?')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php }?>
                                            <?php echo form_close() ?>
                                    </center>
                                    </td>
                                    </tr>
                                    {/category_list}
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
  </div>
    <div id="add_category" class="tab-pane fade">
         <div class="row cat-tabcontent">
      <?php echo form_open('Ccourier/insert_category', array('class' => 'form-vertical', 'id' => 'insert_category')) ?>

                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Courier Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="category_name" id="category_name" type="text" placeholder="Courier Name"  required="">
                            </div>
                              <div class="col-sm-3">
                                <input type="submit" id="add-category" class="btn btn-success btn-large" name="add-category" value="<?php echo display('add') ?>" />
                            </div>
                        </div>

                       
                         <?php echo form_close() ?>
                     </div>
  </div>
  <div id="csvupload" class="tab-pane fade">
      <div class="row cat-tabcontent">
     <div class="panel">
                    <div class="panel-heading">
                        
                           
                       
                    </div>
                    
                    <div class="panel-body">
                         <div><a href="<?php echo base_url('assets/data/csv/category_csv_sample.csv') ?>" class="btn btn-primary pull-right"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a> </div>
                       
                      <?php echo form_open_multipart('Ccourier/uploadCsv_category',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_category'))?>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="upload_csv_file" class="col-sm-3 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                <input type="submit" id="add-product" class="btn btn-success"  value="<?php echo display('import') ?>" />
                            </div>
                                </div>
                            </div>
                        
                     
                          <?php echo form_close()?>
                    </div>
                    </div>
  </div>
</div>
  </div>

                    </div>
                   
                </div>
            </div>
  
        </div>
    </section>
</div>
<!-- Add new customer end -->




