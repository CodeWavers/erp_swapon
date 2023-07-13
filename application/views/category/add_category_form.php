<!-- Add new customer start -->

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('product') ?></h1>
            <small><?php echo display('category') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('product') ?></a></li>
                <li class="active"><?php echo display('category') ?></li>
            </ol>
        </div>
        <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>" />
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
                            <h4><?php echo display('category') ?> </h4>

                        </div>
                    </div>


                    <div class="panel-body category">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#categoryList"><i class="ti-align-justify"> </i> Categories</a></li>
                            <li><a data-toggle="tab" href="#add_category"><i class="fa fa-plus"> </i> <?php echo display('add_category') ?></a></li>
                            <li  class="" style="float: right !important;"> <a href="<?php echo base_url('Ccategory/insert_cats_ecom') ?>"  style="background-color: #E5343D;color: white !important;" class=" m-b-5 m-r-2 "><i class="fa fa-refresh"> </i>  Sync Categories</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div id="categoryList" class="tab-pane fade in active">
                                <div class="row cat-tabcontent">
                                    <div class="col-md-8" id="treeview_json">
                                    </div>
                                </div>
                            </div>
                            <div id="add_category" class="tab-pane fade">
                                <div class="row cat-tabcontent">
                                    <?php echo form_open_multipart('Ccategory/insert_category', array('class' => 'form-vertical', 'id' => 'insert_category')) ?>
                                        <div class="form-group " >
                                            <label class="col-sm-2 col-form-label" for="name">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="Name" id="name" name="name" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-sm-2 col-form-label" for="name">Status</label>
                                            <div class="col-sm-10">
                                                <label><input type="radio" id="status" name="status" value="1" checked=""> Active</label>&nbsp;&nbsp;&nbsp;
                                                <label><input type="radio" id="status" name="status" value="0"> Inactive</label>
                                            </div>
                                        </div>
                                        <div class="form-group " >
                                            <label class="col-sm-2 col-form-label" for="name">Parent Category</label>
                                            <div class="col-sm-10">
                                                <select name="parent_id" id="parent_id" class="form-control">
                                                    <option value="0">Select Parent Category</option>
                                                    <?php
                                                    if ($category_list) {
                                                    ?>
                                                    {category_list}

                                                    <option value="{id}">{name}</option>

                                                        {/category_list}
                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <label class="col-sm-2 col-form-label" for="name">Type</label>
                                            <div class="col-sm-10">
                                                <select name="digital" id="digital" required="" class="form-control " tabindex="-1" aria-hidden="true">
                                                    <option value="0">Physical</option>
                                                    <option value="1">Digital</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="banner">Banner <small>(200x300)</small></label>
                                            <div class="col-sm-10">
                                                <input type="file" id="banner" name="banner" class="form-control">
                                            </div>
                                        </div>
                                        <di class="form-group">
                                            <label class="col-sm-2 col-form-label" for="icon">Icon <small>(32x32)</small></label>
                                            <div class="col-sm-10">
                                                <input type="file" id="icon" name="icon" class="form-control">
                                            </div>
                                        </di>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="details" id="details" rows="8" class="form-control"></textarea>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label">Meta Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label">Meta Description</label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description" id="meta_description" rows="8" class="form-control"></textarea>
                                            </div>
                                        </div>


                                    <div class="form-group" >
                                        <label class="col-sm-2 col-form-label" for="name">Products Status</label>
                                        <div class="col-sm-10">
                                            <select name="product_status" id="product_status" class="form-control " tabindex="-1" aria-hidden="true">
                                                <option value="0">Raw Materials</option>
                                                <option value="1">Tools</option>
                                                <option value="2">Finished Products</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label class="col-sm-2 col-form-label" for="name"></label>

                                        <div class="col-sm-10">

                                        <input type="submit" id="add-category" class="btn btn-success btn-large" name="add-category" value="<?php echo display('add') ?>" />
                                    </div>

                                    </div>




                                    <?php echo form_close() ?>
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
        $(document).ready(function(){
            var base_url = $(".baseUrl").val();
            var treeData;

            $.ajax({
                type: "GET",
                url: base_url+"Ccategory/getItem",
                dataType: "json",
                success: function(response)
                {
                    initTree(response);
                }
            });

            function initTree(treeData) {
                $('#treeview_json').treeview({data: treeData});
            }

        });



            $( "#add-category" ).on("click", function(  ) {

                var name=$('#name').val();
                var meta_title=$('#meta_title').val();
                var status=$('#status').val();
                var parent_id=$('#parent_id').val();
                var details=$('#details').val();
                var digital=$('#digital').val();
                var product_status=$('#product_status').val();


                if (product_status == '3'){
                    var form = new FormData();

                    var fileInput = document.getElementById("banner");
                    if (fileInput.files.length > 0) {
                        form.append("banner", fileInput.files[0]);
                    }
                    var fileInput_icon = document.getElementById("icon");
                    if (fileInput_icon.files.length > 0) {
                        form.append("icon", fileInput_icon.files[0]);
                    }
                    form.append("name", name);
                    form.append("parent_id", parent_id);
                    form.append("details", details)
                    form.append("meta_title", meta_title);
                    form.append("meta_description", meta_description);
                    form.append("digital", digital);
                    form.append("status", status);


                    // form.append("logo", fileInput.files[0], logo);

                    var settings = {
                        "url": '<?= api_url() ?>' + "categories/store",

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
                }




            });




</script>

</script>