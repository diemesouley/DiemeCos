<div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box-body">

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
                                    <img src="<?= base_url() ?>assets/logo.png">
                                </div>
                                <div id="company">
                                    <h2 class="name">Dkr 300</h2>
                                    <div>Entreprise Tel</div>
                                    <div>diemesouley@gmail.com</div>
                                </div>

                            </header>
                            <hr>

                            <main class="invoice_report">

                                <h4>Rapport d'achat de: <strong><?= $start; ?></strong> Au
                                    <strong><?= $end; ?></strong>
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
                                            <th class="no text-right"><strong>Dkr-771208795</strong></th>
                                            <th class="no text-left">Fournisseur: <strong>Entreprise 1</strong></th>
                                            <th class="desc">''</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <thead>
                                        <tr style="background-color: #ECECEC">
                                            <th class="">#</th>
                                            <th class="desc">Code produit</th>
                                            <th class="unit text-left">Prix ​​d'Achat</th>
                                            <th class="qty text-left">Qté</th>
                                            <th class="total text-left ">TOTAL</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <tr>
                                            <td align=""><?= $i; ?></td>
                                            <td align=""><?= $rows->pur_no; ?></td>
                                            <td align=""><?= $rows->grand_total ?></td>
                                            <td align=""><?= $rows->qty; ?></td>
                                            <td align=""><?= $rows->grand_total; ?></td>
                                            <?php $total += $rows->grand_total;
                                            $quantity += $rows->qty;
                                            ?>
                                        </tr>


                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td align="center" colspan="3"><b>Somme Final</b></td>
                                            <td align="right"><?php echo $quantity; ?></td>
                                            <td align="right"><?php echo $total; ?></td>
                                        </tr>
                                        </tfoot>


                                    </table>
                                    <?php $i++; endforeach; ?>

                            </main>
                            <hr>
                            <footer class="text-center">
                                <strong>BEB 300</strong>&nbsp;&nbsp;&nbsp;Dkr-0300, Dkr300 Pvt Ltd, Dans Vente Produit,
                                Cosmetique
                            </footer>


                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>