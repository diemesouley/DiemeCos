<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM box-->
        <div class="box">
            <div class="box-title">
                <h4><i class="icon-reorder"></i> Rapport des Achats
 </h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
						</span>
            </div>
            <div class="box-body">
                <!-- BEGIN FORM-->

                    <?php echo form_open('reports/purchaseReport',array('class'=>"form-horizontal form-bordered form-validate",'method'=>'post'))?>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="control-label">DATE DÉBUT</label>
                            <input type="text" data-ad-format="" class="form-control datepicker" required="required" name="start_date">
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label">DATE FIN</label>
                            <input type="text" data-ad-format="" class="form-control datepicker" required="required" name="end_date">
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="Action" value="Search">
                        <button type="submit" class="btn btn-success" >Afficher Rapport</button>
                        <button type="reset" class="btn">Fermer</button>
                    </div>
                </form>
                <!-- END FORM-->
                <?php if (isset($_REQUEST['Action']) == "Search"){ ?>

                    <div class="row ">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="post" action="#">
                                <div class="btn-group pull-right">
                                    <a onclick="print_invoice('printableArea')" class="btn btn-primary">Imprimer</a>
                                    <input name="start_date" value="2017-04-05" type="hidden">
                                    <input name="end_date" value="2017-04-05" type="hidden">

                                </div>
                            </form>

                        </div>
                    </div>

                    <br>
                    <br>
                <div id="printableArea">
                    <link href="<?= base_url(); ?>assets/sales_report.css" rel="stylesheet" type="text/css">


                    <div class="row ">
                        <div class="col-md-8 col-md-offset-2">

                            <header class="clearfix">
                                <div id="logo">
                                   
                                </div>
                                <div id="company">
                                    <h2 class="name"><?=$company->name;?></h2>
                                    <div><?=$company->contact;?></div>
                                    <div><?=$company->email;?></div>
                                </div>

                            </header>
                            <hr>

                            <main class="invoice_report">

                                <h4>Rapport d'achat de: <strong><?php echo $start ?></strong> Au
                                    <strong><?php echo $end ?></strong></h4>
                                <br/>
                                <br/>

                                <?php
                                $key = 0;
                                $total_cost = 0;
                                $total_sell = 0;
                                $total_profit = 0;
                                ?>
                                <?php if (!empty($invoice_details)): foreach ($invoice_details as $invoice_no => $order_details) : ?>
                                    <?php $total_buying_price = 0; $sales_qty =0; ?>
        
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="no text-right">FACTURE D'ACHAT <?php //echo $invoice_no ?></th>
                                            <th class="desc">Facture d'Achat
                                                Date: <?php echo date('Y-m-d', strtotime($order[$key]->purchase_date)) ?></th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                        <tr style="background-color: #ECECEC">
                                            <th class="no text-right">#</th>
                                            <th class="desc">La description</th>
                                            <th class="unit text-left">Prix ​​d'Achat Unit</th>
                                            <th class="unit text-left">Prix ​​de Vente</th>
                                            <th class="qty text-left">Qté Achat</th>
                                            <th class="qty text-left">Qté Restant</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $k = 1 ;
                                         ?>
                                        <?php
                                            $key = 0;
                                            $total_cost = 0;
                                            $total_sell = 0;
                                            $total_profit = 0;
                                            $qtéVendue = 0 ;
                                            ?>
                                        <?php if (!empty($order_details)): foreach ($order_details as $v_order) : ?>
                                            <tr>
                                                <td class="no"><?php echo $k ?></td>
                                                <td class="desc"><h3><?php echo $v_order->item_name ?></h3>
                                                </td>
                                                <td class="unit"><?php echo ($v_order->purchase_rate); ?></td>
                                                <?php
                                               $sales_qty = $v_order->purchase_qty;
                                               $total_buying_price += $v_order->purchase_rate;
                                               $t = $sales_qty * $total_buying_price;
                                               $qtéVendue +=  $v_order->stock_qty - $v_order->purchase_qty;
                                               $totBen = $v_order->purchase_qty * $v_order->stock_rate;
                                               $prof = ($v_order->stock_rate * $qtéVendue) - ($v_order->purchase_rate * $qtéVendue);
                                               $totalVente = $v_order->stock_rate * $qtéVendue;
                                               $totalAchat = $v_order->purchase_rate * $qtéVendue;
                                                ?>
                                                
                                                <td class="qty"><?php echo number_format($v_order->stock_rate); ?></td>
                                                <td class="qty"><?php echo $v_order->purchase_qty ?></td>												
                                                <td class="total"><?php echo $v_order->stock_qty  ?></td>
                                            </tr>
                                            <?php $k++ ?>
                                            <?php $total_cost += $v_order->purchase_rate * $sales_qty; ?>

                                            <?php
                                        endforeach;
                                        endif;
                                        ?>


                                        </tbody>
                                        <tfoot>

                                        <?php if ($order[$key]->purchase_discount != 0): ?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td colspan="2">Montant de la remise</td>
                                                <td><?php echo $order[$key]->purchase_discount  ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr>
                                            <td colspan="1"></td>
                                            <td colspan="1">Total</td>
                                            <td><?php echo  $totBen; ?></td>
                                        </tr>
                                        <!--tr>
                                            <td colspan="1"></td>
                                            <td colspan="1">Profit</td>
                                            <td><!?php echo $prof; ?></td>
                                        </tr-->
                                        </tfoot>
                                        <?php
                                        $total_sell += $order[$key]->grand_total;
                                        $total_profit += $totalVente - $totalAchat;
                                        ?>

                                    </table>
                                    <?php $key++; ?>
                                <?php endforeach; endif; ?>

                            </main>
                            <hr>
                            <footer class="text-center">
                                <strong><?=$company->name;?></strong>&nbsp;&nbsp;&nbsp;<?=$company->address;?>
                            </footer>


                        </div>
                    </div>

                </div>
<?php }?>

            </div>
        </div>
        <!-- END SAMPLE FORM box-->
    </div>
</div>

<script type="text/javascript">
    function print_invoice(printableArea) {

        var table = $('#dataTables-example').DataTable();
        table.destroy();

        //$('#dataTables-example').attr('id','none');
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //$('table').attr('id','dataTables-example');
        location.reload(document.body.innerHTML = originalContents);
        //document.body.innerHTML = originalContents;
    }
</script>