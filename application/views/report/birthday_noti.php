<!-- Stock List Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Today's Birthday</h1>
            <small>Today's Birthday</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Birthday</a></li>
                <li class="active">Today's Birthday</li>
            </ol>
        </div>
    </section>

    <section class="content">

        <!--		<div class="row">-->
        <!--            <div class="col-sm-12">-->
        <!--              -->
        <!--                  --><?php //if($this->permission1->method('stock_report','read')->access()){ ?>
        <!--                    <a href="--><?php //echo base_url('Creport') ?><!--" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> --><?php //echo display('stock_report') ?><!-- </a>-->
        <!--                --><?php //}?>
        <!--              -->
        <!--               -->
        <!--            </div>-->
        <!--        </div>-->


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Today's Birthday</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"><?php echo display('sl') ?></th>
                                    <th class="text-center">Employee Name</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Date of Birth </th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($birthday) {
                                    ?>
                                    <?php $sl=1;?>
                                    <?php foreach ($birthday as $birthday) {

                                        ?>
                                        <tr>
                                            <td><?php echo $sl;?></td>
                                            <td class="text-center">

                                                <?php echo $birthday['first_name'];?>

                                            </td>
                                            <td class="text-center"><?php echo $birthday['designation'];?></td>
                                            <td class="text-center"><?php echo $birthday['dob'];?></td>

                                        </tr>
                                        <?php 	$sl++;
                                        ?>
                                        <?php
                                    } ?>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            <?php if (isset($link)) { echo $link ;} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Stock List End -->