
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Courier Status</h1>
            <small>Courier Status</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Courier</a></li>
                <li class="active">Courier Status</li>
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




        <!-- Manage Product report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Courier Status</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered " cellspacing="0" width="100%" id="add_rqsn_table">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th>Invoice No</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Courier Name</th>
                                        <th>Condition</th>
                                        <th>Delivery Charge</th>
                                        <th>Condition Charge</th>
                                        <th>Status</th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($pur_list as $row) {


//                                    $courier_condition= $row['courier_condtion'] == 1 ? 'Condition' : $row['courier_condtion'] == 2 ? 'Partial':'Unconditional';


                                    $courier_condition = ($row['courier_condtion'] == 1) ? "Conditional" : ($row['courier_condtion'] == 2  ? "Partial" : "Unconditional");
                                    $courier_status = ($row['courier_status'] == 1) ? "In Courier" : ($row['courier_status'] == 2  ? "On the way" : "Delivered");



//

                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['sl']?> </td>



                                        <td>
                                            <?php echo $row['invoice']?>
                                        </td>

                                        <td><?php echo $row['customer_name']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $row['courier_name']?></td>
                                        <td><?php echo $courier_condition?></td>
                                        <td><?php echo $row['shipping_cost']?></td>
                                        <td><?php echo $row['condition_cost']?></td>
                                        <td class="col-sm-2">

                                            <div class=" custom-select">


                                                <select name="courier_status" class="" id="courier_status<?=$row['sl']?>"" >
                                                    <option value="<?php echo $row['courier_status']?>"><?php echo $courier_status ?></option>
                                                    <option value="1">In Courier</option>
                                                    <option value="2">On the way</option>
                                                    <option value="3">Delivered</option>

                                                </select>
                                            </div>

                                        </td>
                                        <td class="col-sm-2">

                                            <button type="button" id="add_btn<?=$row['sl']?>" name="add_cart" title="Add"
                                                    class="btn btn-success add_cart"
                                                    style="border:none; outline:none"
                                                    data-sl="<?php echo $row['sl']?>"
                                                    data-invoice="<?php echo $row['invoice']?>"
                                                    data-shipping_cost="<?php echo $row['shipping_cost']?>"
                                                    data-condition_cost="<?php echo $row['condition_cost']?>"
                                                    data-invoice_id="<?php echo $invoice_id=$row['invoice_id']?>"
                                                    data-courier_id="<?php echo $row['courier_id']?>"
                                                    onclick="add_and_delete(this)"
                                            >
                                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                            </button>


                                            <a href="<?php echo base_url("Cretrun_m/invoice_return_form_c/$invoice_id") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Return"><i class="fa fa-retweet"></i></a>




                                        </td>


                                    </tr>
                                    <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">




function add_and_delete(e) {
    var a = e.parentNode.parentNode;


    var product_id = $(e).data("productid");



            var sl = $(e).data("sl");

            var invoice_no = $(e).data('invoice');
            var invoice_id = $(e).data('invoice_id');
            var courier_id = $(e).data('courier_id');
            var condition_cost = $(e).data('condition_cost');
            var shipping_cost = $(e).data('shipping_cost');

            var btn = $("#add_btn" + sl);
            var status = $("#courier_status" + sl).val();

            // alert(status)
            // return

            var csrf_test_name = $('[name="csrf_test_name"]').val();

            $.ajax({
                    url:"<?php echo base_url(); ?>Ccourier/update_courier_status",
                    method:"POST",
                    data:{
                        csrf_test_name:csrf_test_name,
                        invoice_id:invoice_id,
                        invoice_no:invoice_no,
                        courier_status:status,
                        courier_id:courier_id,
                        shipping_cost:shipping_cost,
                        condition_cost:condition_cost,


                    },
                    success:function(data)
                    {


                        toastr.success("Updated");


                        // $('.add_cart').attr()
                        btn.html('<i class="fa fa-check"></i>');
                        btn.removeClass("btn-success");
                        btn.addClass("btn-warning");
                        btn.attr("disabled", true);
                        status.attr("disabled", true);


                         // a.parentNode.removeChild(a);
                        // setTimeout(function(){
                        //     btn.html('<i class="fa fa-plus"></i>')
                        //     btn.removeClass("btn-warning");
                        //     btn.addClass("btn-success");
                        // },
                        // 4000
                        // );

                    }
                    // error:function (e) {
                    //
                    //     console.log(e)
                    //
                    // }
                });
}



    $(document).ready(function(){

        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /* For each element, create a new DIV that will act as the selected item: */
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /* For each element, create a new DIV that will contain the option list: */
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /* For each option in the original select element,
                create a new DIV that will act as an option item: */
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /* When an item is clicked, update the original select box,
                    and the selected item: */
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /* When the select box is clicked, close any other select boxes,
                and open/close the current select box: */
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /* A function that will close all select boxes in the document,
            except the current select box: */
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);




        $("#add_rqsn_table").dataTable({
            "columnDefs": [
                { "width": "5%", "targets": 9 }
            ]
        });





    });
</script>
