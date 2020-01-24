<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>diemesouley | Facture d'achat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
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
        A
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
        <b>Paiement du:</b> 2/22/2014<br>
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
            <th>Sous-Total</th>
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
              <th style="width:50%">Sous-Total:</th>
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
