<section>
    <div class="panel panel-primary">
        <!--<div class="panel-heading navyblue"> INVOICE</div>-->
        <div class="panel-body">
            <div class="row invoice-list">
                <div class="text-center corporate-id">
                    <img alt="" src="img/vector-lab.jpg">
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4>CLIENT</h4>
                    <p>
                        <?php echo $amount->customer_name; ?> <br>
                        <?php echo $amount->email; ?><br>
                        Tel: <?php echo $amount->phone_no; ?>
                    </p>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4>INFO FACTURE</h4>
                    <ul class="unstyled">
                        <li>Numéro de facture		: <strong> <?php echo $amount->sales_no ?></strong></li>
                        <li>Date de facturation		: <?php echo $amount->sales_date; ?></li>
                        <!--<li>Due Date			: 2013-03-20</li>
                        <li>Invoice Status		: Paid</li>-->
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Article</th>
                        <th class="hidden-phone">Description</th>
                        <th class="">Coût unitaire</th>
                        <th class="">Quantité</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i =1; foreach ($salesHist as $rows) { ?>
                        <tr>

                            <td><?php echo $i; ?></td>
                            <td><?=$rows->item_id?></td>
                            <td><?=$rows->item_name?></td>
                            <td><?=$rows->sales_rate;?></td>
                            <td><?=$rows->sales_qty;?></td>
                            <td><?=$rows->sales_amount;?></td>
                        </tr>
                    <?php } $i++;?>
                    </tbody>
                </table>
                &lt;</div>
            <div class="row">
                <div class="col-lg-4 invoice-block pull-right">
                    <ul class="unstyled amounts">
                        <li><strong>Sous - Montant total :</strong> Fcfa. <?php  echo $amount->grand_total; ?></li>
                        <li><strong>Remise :</strong>  <?php  echo $amount->sales_discount; ?>%</li>
                        <li><strong>Somme Finale :</strong> Fcfa. <?php  echo $amount->sales_amount_total; ?></li>
                    </ul>
                </div>
            </div>
            <div class="text-center invoice-btn">
                <a onclick="javascript:window.print();" class="btn btn-info btn-lg btn-xs"><i class="fa fa-print"></i> Imprimer </a>
            </div>
        </div>
    </div>
</section>