<?php
$CI = &get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- <script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice_onloadprint.js" type="text/javascript"></script> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="border:0; margin:0">
    <style type="stylesheet" scoped>
        table {
  border-collapse: separate;
  border-spacing: 0;
  color: #4a4a4d;
  width: 100%;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
}
th,
td {
  padding: 10px 15px;
  vertical-align: middle;
}
thead {
  background: #e6e6e6;
  color: #000000;
}
th:first-child {
  text-align: left;
}
tbody tr:nth-child(even) {
  background: #f0f0f2;
}
td {
  border-bottom: 1px solid #cecfd5;
  border-right: 1px solid #cecfd5;
}
td:first-child {
  border-left: 1px solid #cecfd5;
}

tfoot {
  text-align: right;
}
tfoot tr:last-child {
  background: #f0f0f2;
}
</style>
    <!-- Main content -->
    <section class="">


        <h3><?= $customer_name ?></h3>
        <?= $customer_address ?><br />
        <?= $customer_mobile ?><br />
        <?= $customer_email ?><br /><br />
        Date: <?= $inv_date ?>
        <h4 style="margin:0">Invoice No: <?= $invoice_no ?><br /></h4>
        <table>
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Product</th>
                    <th scope="col">Qnty</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td> 1</td>
                    <td> Book-567 Red- 16``</td>
                    <td> 2</td>
                    <td> Tk 15000</td>
                </tr> -->
                <?php $s_total = 0;

                ?>
                <?php foreach ($invoice_all_data as $product) { ?>
                    <tr>
                        <?php $i = 1;

                        ?>
                        <td><?php echo $i ?></td>
                        <td> <?php echo $product['product_name'] . " - " . $product['product_model'] . " - " . $product['color_name'] . " - " . $product['size_name'] ?></td>
                        <td style="text-align:right"><?php echo $product['quantity'] ?></td>
                        <td style="text-align:right"><?php echo number_format($product['total_price'], 2, '.', ','); ?></td>
                        <?php
                        $s_total += $product['total_price'];
                        ?>
                        <?php $i++; ?>
                    </tr>
                <?php } ?>





            </tbody>
            <tfoot>

                <tr>

                    <td colspan="3">Total</td>
                    <td>Tk <?php echo number_format($s_total, 2, '.', ','); ?></td>
                </tr>
                <?php if ($invoice_discount > 0) { ?>
                    <tr>
                        <td colspan="3">Sale Discount</td>
                        <td>Tk <?php echo number_format($product['invoice_discount'], 2, '.', ','); ?></td>
                    </tr>
                <?php } ?>
                <?php if ($total_discount > 0) { ?>
                    <tr>
                        <td colspan="3">Total Discount</td>
                        <td>Tk <?php echo number_format($product['total_discount'], 2, '.', ','); ?></td>
                    </tr>
                <?php } ?>
                <tr>

                    <td colspan="3"><b>Grand Total</b></td>
                    <td>Tk <?php echo number_format($product['total_amount'], 2, '.', ','); ?></td>
                </tr>
                <tr>

                    <td colspan="3">Paid Amount</td>
                    <td>Tk <?php echo number_format($product['paid_amount'], 2, '.', ','); ?></td>
                </tr>
                <tr>

                    <td colspan="4" style="text-align:center">Amount in words : <?php echo $inwords ?></td>

                </tr>
            </tfoot>
        </table>
        <!-- <h1 >
            <span>Align me left</span>
            <a href="">align me right</a>
        </h1> -->
        <!-- <div style="display: flex;justify-content: space-between;">
            <div style="text-align: left;margin-top:20px;">
                <p>
                    <hr style=" width:20%;text-align:left;margin-left:0">
                <p style="margin-left:20px">Customer</p>
                </p>
            </div>
            <div style="text-align: right;margin-top:20px;">
                <p>
                    <hr style=" width:20%;margin-right:5px">
                <p style="margin-right:20px">For <b>Dell Art</b></p>
                </p>
            </div>


        </div> -->



    </section> <!-- /.content -->
</div>