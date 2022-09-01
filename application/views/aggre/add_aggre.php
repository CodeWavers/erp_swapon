<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Aggregators</h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li class="active">Aggregators</li>
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
                            <h4>Aggregators </h4>
                        </div>
                    </div>
                   
                    <div class="panel-body aggre">
<ul class="nav nav-tabs">
 <li class="active"><a data-toggle="tab" href="#aggreList"><i class="ti-align-justify"> </i> Manage Aggregators</a></li>
  <li><a data-toggle="tab" href="#add_aggre"><i class="fa fa-plus"> </i> Add Aggregators</a></li>
<!--  <li><a data-toggle="tab" href="#csvupload"><i class="fa fa-file"> </i> aggre CSV Upload</a></li>-->
</ul>

<div class="tab-content">

  <div id="aggreList" class="tab-pane fade in active">
    <div class="row cat-tabcontent">
         <div class="table-responsive">
                            <table id="dataTableExample3" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                      
                                        <th class="text-center">Aggregators Name</th>
                                        <th class="text-center"><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($aggre_list) {
                                        ?>
                                        {aggre_list}
                                        <tr>
                                           
                                            <td class="text-center">{aggre_name}</td>
                                            <td>
                                    <center>
                                        <?php echo form_open() ?>
                                        <?php if($this->permission1->method('add_aggregator','update')->access()){ ?>
                                        <a href="<?php echo base_url() . 'Caggre/aggre_update_form/{aggre_id}'; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php }?>
                                      <?php if($this->permission1->method('add_aggregator','delete')->access()){ ?>
                                        <a href="<?php echo base_url() . 'Caggre/aggre_delete/{aggre_id}'; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Want To Delete ?')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php }?>
                                            <?php echo form_close() ?>
                                    </center>
                                    </td>
                                    </tr>
                                    {/aggre_list}
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
  </div>
    <div id="add_aggre" class="tab-pane fade">
         <div class="row cat-tabcontent">
      <?php echo form_open_multipart('Caggre/insert_aggre', array('class' => 'form-vertical', 'id' => 'insert_aggre')) ?>

                        <div class="form-group row">
                            <label for="aggre_name" class="col-sm-3 col-form-label">Aggregators Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="aggre_name" id="aggre_name" type="text" placeholder="Aggregators Name"  required="">
                            </div>
                              <div class="col-sm-3">
                                <input type="submit" id="add_aggre" class="btn btn-success btn-large" name="add-aggre" value="<?php echo display('add') ?>" />
<!--                                <input type="button" id="add_aggre" class="btn btn-success btn-large" name="add-aggre" value="--><?php //echo display('add') ?><!--" />-->
                            </div>
                        </div>

             <div class="form-group row">
                 <label for="aggre_name" class="col-sm-3 col-form-label">Logo</label>
                 <div class="col-sm-6">
                     <input type="file" name="image" class="form-control" id="image" tabindex="4">
                 </div>

             </div>





             <?php echo form_close() ?>
                     </div>
  </div>
  <div id="csvupload" class="tab-pane fade">
      <div class="row cat-tabcontent">
     <div class="panel">
                    <div class="panel-heading">
                        <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">
                           
                       
                    </div>
                    
                    <div class="panel-body">
                         <div><a href="<?php echo base_url('assets/data/csv/aggre_csv_sample.csv') ?>" class="btn btn-primary pull-right"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a> </div>
                       
                      <?php echo form_open_multipart('Caggre/uploadCsv_aggre',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_aggre'))?>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="upload_csv_file" class="col-sm-3 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                <input  type="submit" id="" class="btn btn-success"  value="<?php echo display('import') ?>" />
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

<script type="text/javascript">

        $( "#add_aggre" ).on("click", function(  ) {

            var name=$('#aggre_name').val();
            var meta_title=$('#meta_title').val();
            var meta_description=$('#description').val();
         //   var logo=$('#image').val();

            var CSRF_TOKEN = $('[name="csrf_test_name"]').val();

                // jQuery.ajax({
                //     type : "POST",
                //     dataType: 'json',
                //     url : 'https://swaponsworld.com/api/v1/aggre/store',
                //     data : {name:name,meta_title:meta_title,meta_description:meta_description,logo:logo,csrf_test_name: CSRF_TOKEN},
                //     cache: false,
                //
                //     success: function(response) {
                //         alert('Ok');
                //
                //         console.log(response)
                //     },
                //     error: function(XMLHttpRequest, textStatus, errorThrown) {
                //         alert(errorThrown);
                //     }
                // });



            var form = new FormData();

            var fileInput = document.getElementById("image");
            if (fileInput.files.length > 0) {
                form.append("logo", fileInput.files[0]);
            }
            form.append("name", name);
            form.append("meta_title", meta_title);
            form.append("meta_description", meta_description);
            form.append("slug", "xyz");
            // form.append("logo", fileInput.files[0], logo);

            var settings = {
                "url": "https://swaponsworld.com/api/v1/aggre/store",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
            });

        });



</script>




