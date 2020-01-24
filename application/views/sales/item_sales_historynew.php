<script type="text/javascript">
    function PrintDivold() {
        var divToPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    function PrintDivold(printableArea) {


        //$('#dataTables-example').attr('id','none');
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //$('table').attr('id','dataTables-example');
        location.reload(document.body.innerHTML = originalContents);
        //document.body.innerHTML = originalContents;
    }


    function PrintDiv() {
        var divToPrint = document.getElementById('printableArea');

        var popupWin = window.open('', '_blank', 'width=750,height=600');
        popupWin.document.open();
        popupWin.document.write('<html><head>');
        popupWin.document.write('<html><style type="text/css" media="print">@page { size:4.5in 11in; margin: 2cm; width: 25mm;height: 97mm;  #invoice h1 {font-size: 6.0em; color: red;} }</style><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        popupWin.document.close();
    }
</script>


    <section class="invoice">


                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Souleymane, SYM.
                            <small class="pull-right">Date: 15/01/2020</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        De
                        <address>
                            <strong><?=$amount->company_name;?></strong><br>
                            <?=$amount->address;?><br>
                            Tél: <?=$amount->phone_no;?><br>
                            Email: <?=$amount->email;?>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                    À
                        <address>
                            <strong><?=$amount->customer_name;?></strong><br>
                            <?=$amount->address;?><br>
                            Tél: <?=$amount->phone_no;?><br>
                            Email: <?=$amount->email;?>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Facture d'achat #<?=$amount->invoice_no;?></b><br>
                        <br>
                        <!--b>Numéro de commande:</b> 4F3S8J<br>
                        <b>Paiement dûe:</b> 15/01/2020<br>
                        <b>Compte:</b> 968-34567</b-->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>En série #</th>
                                <th>Produit</th>
                                <th>Qté</th>
                                <th>Prix</th>
                                <th>Sous-total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach ($salesHist as $item) : ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$item->item_name;?></td>
                                    <td><?=$item->sales_qty;?></td>
                                    <td><?=$item->sales_rate;?></td>
                                    <td><?=$item->sales_amount;?></td>
                                </tr>
                                <?php $i++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Sous-total:</th>
                                    <td><?=$amount->sales_amount_total?></td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td><?=$amount->grand_total;?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="<?=base_url('index.php/sales/invoice_print')?>/<?=$this->uri->segment(3);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimer</a>

                    </div>
                </div>


    </section>




