<?php
$GLOBALS['TotalIncome']= 0;
$GLOBALS['TotalAssertF']   = 0;
$GLOBALS['TotalLiabilityF']= 0;

$GLOBALS['TotalExpence']= 0;
function AssertCoa($HeadName,$HeadCode,$GL,$oResultIncome,$Visited,$value,$dtpFromDate,$dtpToDate,$check){

    $CI =& get_instance();

    if($value==1)
    {
        ?>
        <tr>
            <td colspan="2" class="profilossphead"><?php echo $HeadName;?></td>
        </tr>
        <?php
    }
    elseif($value>1)
    {
        $COAID=$HeadCode;
        if($check)
        {
            $sqlF=$CI->accounts_model->profitloss_firstquery($dtpFromDate,$dtpToDate,$COAID);

        }
        else
        {
            $sqlF= $CI->accounts_model->profitloss_secondquery($dtpFromDate,$dtpToDate,$COAID);
        }
        $q1 = $CI->db->query($sqlF);
        $oResultAmountPreF = $q1->row();

        // echo '<pre>';print_r($sqlF);exit();

        if($value==2)
        {
            if($check==1)
            {
                $GLOBALS['TotalLiabilityF']=$GLOBALS['TotalLiabilityF']+$oResultAmountPreF->Amount;
                $GLOBALS['TotalIncome']=$GLOBALS['TotalIncome']+$oResultAmountPreF->Amount;
                $GLOBALS['TotalExpence']=$GLOBALS['TotalExpence']+$oResultAmountPreF->Amount;
            }
            else
            {
                $GLOBALS['TotalAssertF']=$GLOBALS['TotalAssertF']+$oResultAmountPreF->Amount;
            }
        }

        if($oResultAmountPreF->Amount!=0)
        {
            ?>
            <tr>
                <td align="left" class="profitlossbranchead <?php echo  ($value<=3?" font-bold ":" ");?>"  font-size="<?php echo (int)(20-$value*1.5).'px'; ?>"><font size="+1"><?php echo ($value>=3?"&nbsp;&nbsp;":""). $HeadName; ?></font></td>
                <td align="right" class="profitlossbrancheadamount"><?php echo number_format($oResultAmountPreF->Amount,2);?></td>
            </tr>
            <?php
        }
    }
    for($i=0;$i<count($oResultIncome);$i++)
    {
        if (!$Visited[$i]&&$GL==0)
        {
            if ($HeadName==$oResultIncome[$i]->PHeadName)
            {
                $Visited[$i]=true;
                AssertCoa($oResultIncome[$i]->HeadName,$oResultIncome[$i]->HeadCode,$oResultIncome[$i]->IsGL,$oResultIncome,$Visited,$value+1,$dtpFromDate,$dtpToDate,$check);
            }
        }
    }
//


}




?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('accounts') ?></h1>
            <small>Balance Sheet</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active">Balance Sheet</li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4></h4>
                        </div>
                    </div>
                    <div id="printArea">
                        <div class="panel-body">
                            <table class="table" width="100%" class="table_boxnew" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td colspan="2" align="center"><h3><b>Balance Sheet of<br/> <?php echo $dtpFromDate ?> <?php echo display('to')?> <?php echo $dtpToDate;?></b></h3></td>
                                </tr>
                                <tr>
                                    <td width="85%" bgcolor="#E7E0EE" align="center"><h4><b><?php echo display('particulars')?></b></h4></td>
                                    <td width="15%" bgcolor="#E7E0EE" align="center"><h4><b><?php echo display('amount')?></b></h4></td>
                                </tr>

                                <?php
                                for($i=0;$i<count($oResultAsset);$i++)
                                {
                                    $Visited[$i] = false;
                                }

                                AssertCoa("COA","0",0,$oResultAsset,$Visited,0,$dtpFromDate,$dtpToDate,0);

                                $TotalAssetF=$GLOBALS['TotalAssertF'];
                                ?>

                                <tr bgcolor="#E7E0EE">
                                    <td align="right"><strong>Total Assets</strong></td>
                                    <td align="right" class="totalliability"><strong ><?php echo number_format($TotalAssetF,2); ?></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"></td>
                                </tr>


                                <!--    --><?php
                                //    for($i=0;$i<count($oResultIncome);$i++)
                                //    {
                                //        $Visited[$i] = false;
                                //    }
                                //    $GLOBALS['TotalIncome']=0;
                                //    AssertCoa("COA","0",0,$oResultIncome,$Visited,0,$dtpFromDate,$dtpToDate,1);
                                //    $TotalIncome=abs($GLOBALS['TotalIncome']);
                                //
                                //    //echo '<pre>';print_r($TotalIncome);exit();
                                //    ?>



                                <!--    <tr bgcolor="#E7E0EE">-->
                                <!--        <td align="right"><strong>--><?php //echo display('total_income')?><!--</strong></td>-->
                                <!--        <td align="right" class=""><strong >--><?php //echo number_format($TotalIncome,2); ?><!--</strong></td>-->
                                <!--    </tr>-->

                                <!--    --><?php
                                //    for($i=0;$i<count($oResultExpence);$i++)
                                //    {
                                //        $Visited[$i] = false;
                                //    }
                                //    $GLOBALS['TotalExpence']=0;
                                //    AssertCoa("COA","0",0,$oResultExpence,$Visited,0,$dtpFromDate,$dtpToDate,1);
                                //    $TotalExpence=$GLOBALS['TotalExpence'];
                                //
                                //    // echo '<pre>';print_r($oResultIncome);exit();
                                //    ?>
                                <!--    <tr  bgcolor="#E7E0EE">-->
                                <!--        <td align="right"><strong>--><?php //echo display('total_expenses')?><!--</strong></td>-->
                                <!--        <td align="right" class="totalliability"><strong>--><?php //echo number_format($TotalExpence,2); ?><!--</strong></td>-->
                                <!--    </tr>-->




                                <!--                      --><?php //$Profit_loss=$TotalIncome-$TotalExpence?>


                                <?php
                                for($i=0;$i<count($oResultLiability);$i++)
                                {
                                    $Visited[$i] = false;
                                }
                                $GLOBALS['TotalLiability']=0;
                                AssertCoa("COA","0",0,$oResultLiability,$Visited,0,$dtpFromDate,$dtpToDate,1);
                                $TotalLibilityF=$GLOBALS['TotalLiabilityF'];

                                // echo '<pre>';print_r($oResultLiability);exit();
                                ?>


                                <tr  bgcolor="#E7E0EE" style="display:none;">
                                    <td align="right"><strong>Total Liabilties</strong></td>
                                    <td id="liablity" class="price" data-value="$TotalLibilityF" align="right" class="totalliability" class="totalliability"><?php echo $TotalLibilityF ?></td>
                                </tr>
                                <tr bgcolor="#f5f5f5">
                                    <td  class=""><h4>Profit-Loss <?php echo $TotalIncome>$TotalExpence?"(Profit)":"(Loss)";?></h4></td>
                                    <!--                          <td align="right"><b>--><?php //echo number_format($Profit_loss,2); ?><!--</b></td>-->
                                    <td id="profit" class="price" align="right"></td>
                                </tr>
                                <tr  bgcolor="#E7E0EE">
                                    <td align="right"><strong>Total Liabilties</strong></td>
                                    <td id="total" align="right" class="totalliability" class="totalliability"><strong><b><?php echo $TotalLibilityF ?></b></strong></td>
                                </tr>


                                <!--                    <tr class="profitloss-result">-->
                                <!--                        <td align="right" class="footersignature"><h4>Profit-Loss --><?php //echo $TotalAssetF>$TotalLibilityF?"(Profit)":"(Loss)";?><!--</h4></td>-->
                                <!--                        <td align="right"><b>--><?php //echo number_format($TotalAssetF-$TotalLibilityF,2); ?><!--</b></td>-->
                                <!--                    </tr>-->

                            </table>


                            <table width="100%" cellpadding="1" cellspacing="20">
                                <tr>
                                    <td width="20%" class="footersignature" align="center"><?php echo display('prepared_by')?></td>
                                    <td width="20%" class="footersignature" align="center"><?php echo display('accounts')?></td>
                                    <td width="20%" class="footersignature" align="center"><?php echo display('authorized_signature')?></td>
                                    <td  width="20%" class="footersignature" align='center'><?php echo display('chairman')?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="text-center" id="print">
                        <input type="button" class="btn btn-warning" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>

<script type="text/javascript">
    var x = localStorage.getItem("storageName");
    document.getElementById("profit").innerHTML = x;

    // var liabilty =  $('#liablity').text();
    //var profit =  $('#profit').text();
    //var total=parseInt(profit+liabilty);
    //document.getElementById("total").innerHTML = total;

    var z = (parseFloat($("#liablity").text())+ parseFloat($("#profit").text())).toFixed(2);
    document.getElementById("total").innerHTML = z;
    console.log(z)


</script>
