<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Manage Stock Taking</h1>
            <small>Manage Stock Taking</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Stock</a></li>
                <li class="active">Manage Stock Taking</li>
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
        <input type="hidden" id="base_url" value="<?= base_url() ?>">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                               Manage Stock Taking
                            </h4>
                        </div>
                    </div>


                    <div class="panel-body">

                        <div class="margin-top10">
                            <table id="mst_table" class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th>STID </th>
                                        <th>Date </th>
                                        <th>Total Product</th>
                                        <th>Notes</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($response_list  as $res) {?>
                                    <tr>
                                        <td><?= $res['sl']?></td>
                                        <td><?= $res['stid_no']?></td>
                                        <td><?= $res['date']?></td>
                                        <td><?= $res['total_product']?></td>
                                        <td><?= $res['notes']?></td>
                                        <td><?= $res['sl']?></td>

                                    </tr>
                               <?php }?>
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
    $(document).ready(function () {
        var table = $('#mst_table').DataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: [1, 2, 3],
                },
            ],
        });

    });

</script>