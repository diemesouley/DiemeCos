<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM box-->
        <div class="box">
            <div class="box-title">
                <h4><i class="icon-reorder"></i> Rapport des Ventes </h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
						</span>
            </div>
            <div class="box-body">
                <!-- BEGIN FORM-->

                    <?php echo form_open('reports/salesReport',array('class'=>"form-horizontal form-bordered form-validate",'method'=>'post'))?>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="control-label">Date Début</label>
                            <input type="text" data-ad-format="" class="form-control datepicker" name="start_date">
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label">Date Fin</label>
                            <input type="text" class="form-control datepicker"  name="end_date">
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="Action" value="Search">
                        <button type="submit" class="btn btn-success" >Afficher Rapport</button>
                        <button type="reset" class="btn">Annuler</button>
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

                                <h4>Rapprot vente du: <strong><?php echo $start ?></strong> Au
                                    <strong><?php echo $end ?></strong></h4>
                                <br/>
                                <br/>
                               
                                <?php
                                $key = 0;
                                $total_cost = 0;
                                $total_sell = 0;
                                $total_profit = 0;
                                $prixAchUnitTotal = 0;
								$To = 0;
                                $total_dette=0;
                                $sommeCaisse=0; // a modifier
                                $payer=0;

								$query =$this->Main_model->somme_dette();
								foreach($query as $mm){$total_dette=$mm['balance'];}
								
                                ?>
                                <?php if (!empty($invoice_details)): foreach ($invoice_details as $invoice_no => $order_details) : ?>
                                    <?php $total_buying_price = 0; $sales_qty =0; $prixAchUnitTotal = 0;?>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="no text-right">Facture <?php //echo $invoice_no ?></th>
                                            <th class="desc">Facture
                                                Date: <?php echo date('Y-m-d', strtotime($order[$key]->sales_date)) ?></th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                        <tr style="background-color: #ECECEC">
                                            <th class="no text-right">#</th>
                                            <th class="desc">Description</th>
                                            <th class="unit text-left">Prix D'achat</th>
                                            <th class="unit text-left">Prix de Vente</th>
                                            <th class="qty text-left">Qté</th>
                                            <th class="total text-left ">TOTAL</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $k = 1; 
                                            $grandTotal=0;
                                            $total_Achat=0;
                                        ?>
                                        <?php if (!empty($order_details)): foreach ($order_details as $v_order) : ?>
                                            <tr>
                                                <td class="no"><?php echo $k ?></td>
                                                <td class="desc"><h3><?php echo $v_order->item_name ?></h3>
                                                </td>
                                                <td class="unit"><?php echo number_format($v_order->purchase_rate, 2) ?></td>
                                                <?php
                                                
                                               $sales_qty = $v_order->sales_qty;
                                               $total_buying_price += $v_order->purchase_rate;
                                               $t = $sales_qty * $total_buying_price;
                                               //$prof += (($v_order->sales_qty * $v_order->stock_rate) - ($v_order->purchase_rate * $v_order->stock_rate));
                                               $prixAchUnitTotal += $v_order->purchase_rate * $v_order->sales_qty;
                                                ?>
                                                <td class="unit"><?php echo number_format($v_order->sales_rate, 2) ?></td>
                                                <td class="qty"><?php echo $v_order->sales_qty ?></td>
                                                <td class="total"><?php echo number_format($v_order->sales_amount); ?></td>
                                            </tr>
                                            <?php $grandTotal += $v_order->sales_amount;
                                                  $total_Achat += $v_order->purchase_rate * $sales_qty;
                                            ?>
                                            <?php $k++ ?>
                                            <?php $total_cost += $v_order->purchase_rate * $sales_qty; ?>

                                            <?php
                                        endforeach;
                                        endif;
                                        ?>


                                        </tbody>
                                        <tfoot>

                                        <?php if ($order[$key]->sales_discount != 0): ?>
                                            <?php $To = 0; ?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td colspan="2">Discount Amount</td>
                                                <td><?php echo number_format($order[$key]->sales_discount, 2) ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2">Grand Total</td>
                                            
                                            <td><?php echo  number_format($grandTotal, 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2">Dette Vente</td>
                                            <td><?php echo  number_format($order[$key]->balance, 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2">Profit</td>
                                            
                                            <?php $To = ($grandTotal - $total_Achat) ?>
                                            
                                            <td><?php echo number_format($To, 2) ?></td>
                                        </tr>
                                        </tfoot>
                                        <?php
                                        $total_sell += $order[$key]->grand_total;
                                        $total_profit += $To;
                                        $payer += $order[$key]->paid;//somme en caisse
                                        ?>

                                    </table>
                                    <?php $key++; ?>
                                <?php endforeach; endif; ?>

                                <?php if (!empty($invoice_details)) : ?>
                                    <?php  $sommeCaisse = $total_sell - $total_dette;?>
                                    <table>
                                        <thead>
                                        <tr style="background-color: #ccc">
                                            <th class="no text-left">Total Achat</th>
                                            <th class="no text-left">Total Vente</th>
                                            <th class="no text-left">Total Profit</th>
                                            <th class="no text-left">Somme en caisse</th>
											<th class="no text-left">Total Dette</th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #c5c5c5">
                                        <td class="total"><?php echo number_format($total_cost, 2) ?></td>
                                        <td class="total"><?php echo number_format($total_sell, 2) ?></td>
                                        <td class="total"><?php echo number_format($total_profit, 2) ?></td>
                                        <td class="total"><?php echo number_format($payer, 2) ?></td>
									    <td class="total"><?php echo number_format($total_dette, 2) ?></td>
                                        
                                        </tbody>
                                    </table>
                                    
                                <?php else: ?>
                                    <strong>Liste vide</strong>
                                <?php endif ?>
                                
                                
                                


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


        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //$('table').attr('id','dataTables-example');
        location.reload(document.body.innerHTML = originalContents);
        //document.body.innerHTML = originalContents;
    }
</script>