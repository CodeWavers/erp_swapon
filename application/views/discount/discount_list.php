<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Discount</h1>
            <small>Manage Discount</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Discount</a></li>
                <li class="active">Manage Discount</li>
            </ol>
        </div>
    </section>

    <section class="content">
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
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>

                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="">
                            <table class="datatable table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo display('sl_no') ?></th>
                                    <th>Organization ID</th>
                                    <th>Organization Name</th>
                                    <th>Category Name</th>
                                    <th>Discount</th>

                                    <th><?php echo display('action') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($approve)) ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($t as $approve) { ?>
                                    <tr>
                                        <td><?php echo $sl++; ?></td>
                                        <td> <?php echo $approve['customer_id_two']?> </td>
                                        <td> <?php echo $approve['customer_name']?> </td>
                                        <td> <?php echo $approve['category_name']?> </td>
                                        <td><?php echo $approve['discount']?> </td>


                                        <?php $id=$approve['discount_id'] ?>


                                        <td>


                                            <a href="<?php echo base_url("Cdiscount/discount_edit/$id/") ?>" class="btn btn-info btn-sm"  title="Edit"><i class="fa fa-edit"></i></a>

                                            <a href="<?php echo base_url("Cdiscount/discount_delete/$id/") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')" title="delete"><i class="fa fa-trash"></i></a>


                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <!--                    <audio id="myAudio">-->
                            <!--                        <input type="hidden" class="baseUrl" value="--><?php //echo base_url(); ?><!--" />-->
                            <!--                        <source src="horse.ogg" type="audio/ogg">-->
                            <!--                        <source src="https://2u039f-a.akamaihd.net/downloads/ringtones/files/mp3/iphone-6-plus-original-ringtone-256k-50456.mp3" type="audio/mpeg">-->
                            <!--                        Your browser does not support the audio element.-->
                            <!--                    </audio>-->
                            <!--                    <button onclick="playAudio()" type="button">Play Audio</button>-->
                            <!--                    <button onclick="pauseAudio()" type="button">Pause Audio</button>-->
                            <!--                    <input type="submit" onclick="checkUpdate()">-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    // var x = document.getElementById("myAudio");
    //
    // function playAudio() {
    //     x.play();
    // }
    //
    // function pauseAudio() {
    //     x.pause();
    // }

    // function myFunction(){
    //     var x = $('.a_qty').val();
    //     var y=$('#r_qty').html();
    //     var z=parseInt(y);
    //     if (x > z){
    //         var msg = "You can not transfer more than requested " + z + " Items";
    //         alert(msg);
    //     }
    // }


    $(document).ready(function(){


        // console.log(data_id);
        $('.a_qty').on('change', function() {

            var qty=this.value;
            var y= $(this).closest('tr').find('.r_qty').html()
            var s= $(this).closest('tr').find('.s_qty').html()
            var z=parseInt(y);
            var s_qty=parseInt(s);
            //  console.log( qty);
            if (qty > z){
                var msg = "You can not transfer more than requested " + z + " Items";
                alert(msg);
            }
            if (qty > s_qty){
                var msg = "You can transfer maximum " + s_qty + " Items";
                alert(msg);
            }
        });
    });



    function quantityCalculator(sl){
        var row = $("#rqsn_table tbody tr").length;
        var cook = 'cook_'+sl;
        var grill = 'grill_'+sl;
        var hall = 'hall_'+sl;
        var pantry = 'pantry_'+sl;
        var nan = 'nan_'+sl;
        var total = 'total_quantity_'+sl;
        // var ck=  $('.cook').val();

        var cook_qty=  parseFloat( $('.'+cook).val());
        var grill_qty=  parseFloat( $('.'+grill).val());
        var hall_qty=  parseFloat( $('.'+hall).val());
        var pantry_qty=  parseFloat( $('.'+pantry).val());
        var nan_qty=  parseFloat( $('.'+nan).val());

        //    var dd=  $('#product_td').attr("data-id");
        //   alert(cook);
        //  alert(row)

        var total_quantity=cook_qty+grill_qty+hall_qty+pantry_qty+nan_qty;

        // $('#product_td').closest('tr').find('.total_quantity').val(total_quantity)
        $('.'+total).val(total_quantity);
        console.log(total_quantity);

        // var values = {};
        // $('td input').each(function() {
        //     values[$(this).attr('cook')] = $(this).val();
        // });
        // alert(JSON.stringify(values));


    }

    // $(document).ready(function(){
    //     var base_url = $("#base_url").val();
    //     var url=  base_url + "Crqsn/rqsn_noti";
    //     $("#datacount").load(url);
    //     setInterval(function(){
    //         $("#datacount").load(url)
    //     }, 1000);
    // });
    //
    // setTimeout("checkUpdate()",1000); //poll every second
    //
    //
    // function checkUpdate()
    // {
    //     var base_url = $("#base_url").val();
    //
    //   var url=  base_url + "Crqsn/rqsn_noti";
    //   console.log(url);
    //
    //     $.get(base_url + "Crqsn/rqsn_noti", function(data, status)
    //     {
    //
    //         var length=data;
    //         var old_length=length-1;
    //         console.log(old_length);
    //         console.log(length);
    //
    //        // console.log(data.length);
    //         if (length>old_length)
    //         {
    //             playSound();
    //         }
    //     });
    // }
    //
    //
    //     function playSound()
    //     {
    //         var base_url = $("#base_url").val();
    //
    //         var audio = new Audio(base_url+"assets/audio/bell.wav");
    //         audio.play();
    //     }


</script>
 