<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM box-->
        <div class="box light bordered">
            <div class="box-title">
                <h4><i class="icon-reorder"></i> Rapport Achat </h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
						</span>
            </div>
            <div class="box-body">
                <!-- BEGIN FORM-->
                <?php echo form_open('reports/purchaseReport',array('class'=>"form-horizontal form-bordered form-validate",'method'=>'post'))?>


                <div class="row">
                        <div class="col-lg-6">
                            <label class="control-label">Date d'Achat</label>
                            <input type="text" class="form-control datepicker" name="start_date">
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label">Date Fin</label>
                            <input type="text" class="form-control datepicker" name="end_date">
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="Action" value="Search">
                        <button type="submit" class="btn btn-success" >Affiche Rapport</button>
                        <button type="reset" class="btn">Annuler</button>
                    </div>
                </form>
                <!-- END FORM-->
                <?php if (isset($_REQUEST['Action']) == "Search"){ ?>

                    <div class="row ">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="post" action="http://localhost/easy_inventory/admin/report/pdf_purchase_report">
                                <div class="btn-group pull-right">
                                    <a onclick="print_invoice('printableArea')" class="btn btn-primary">Imprimer</a>

                                    <button type="submit" class="btn bg-navy">
                                        PDF
                                    </button>
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
                                    <img src="<?=base_url()?>assets/logo.png">
                                </div>
                                <div id="company">
                                    <h2 class="name">BEB 300</h2>
                                    <div>Company Phone</div>
                                    <div>ceo@beb300.com</div>
                                </div>

                            </header>
                            <hr>

                            <main class="invoice_report">

                                <h4>Rapport Achat du: <strong><?= $start; ?></strong> Au <strong><?= $end; ?></strong>
                                </h4>
                                <br>
                                <br>
                                <?php $total = '';
                                $quantity = '';
                                $i = 1;
                                foreach ($purchases as $rows): ?>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="no text-right"><strong>PUR-78053724</strong></th>
                                            <th class="no text-left">Employé: <strong>Entreprise 1</strong></th>
                                            <th class="desc">Facture du: 2017-04-05</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                        <tr style="background-color: #ECECEC">
                                            <th class="">#</th>
                                            <th class="desc">Code Produit</th>
                                            <th class="unit text-left">Prix d'Achat</th>
                                            <th class="qty text-left">Qté</th>
                                            <th class="total text-left ">TOTAL</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <tr>
                                            <td align=""><?= $i; ?></td>
                                            <td align=""><?= $rows->pur_no; ?></td>
                                            <td align=""><?= $rows->grand_total; ?></td>
                                            <td align=""><?= $rows->qty; ?></td>
                                            <td align=""><?= $rows->purchase_amount_total; ?></td>
                                            <?php $total += $rows->grand_total;
                                            $quantity += $rows->qty;
                                            ?>
                                        </tr>


                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td align="center" colspan="3"><b>Grand Total</b></td>
                                            <td align="right"><?php echo $quantity; ?></td>
                                            <td align="right"><?php echo $total; ?></td>
                                        </tr>
                                        </tfoot>


                                    </table>
                                    <?php $i++; endforeach; ?>

                            </main>
                            <hr>
                            <footer class="text-center">
                                <strong>BEB 300</strong>&nbsp;&nbsp;&nbsp;FF-0300, BEB300 Pvt Ltd, Deans Trade Centre,
                                Peshawar
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