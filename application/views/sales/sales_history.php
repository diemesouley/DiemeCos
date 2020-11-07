<?php
foreach ($sales as $results) {

	$id = $results->sales_no;
	$name = $results->customer_name;
		$montantdette[$results->sales_no] = $results->balance; 
	 if($results->balance != 0.00){
		$dette = $results->balance;
			$td= "<span class='label label-warning'>En Attente</span>";
			
		}else{
			$td= "<span class='label label-primary'>Effectif</span>";
		} 
    @$custlistRow .= "<tr>


                <td>" . $results->sales_no . "
				<td>" . $results->customer_name . "
				<td>" . $td . "
				<td>" . $results->paid . "
				<td>" . $results->balance . "
                <td>" . date('d-M-Y',strtotime($results->sales_date)) . "
                <td>Fcfa . ". $results->sales_amount_total."</td>
<td>
<a href='show_sales_history/" . $results->sales_no . "' data-toggle='modal' class='btn btn-success'>
<i class='fa fa-pencil-square-o'></i>
                                  Détaille vente
                              </a> </td>
				"."
				<td>
				<a href='javascript:void(0)' data-toggle='modal' class='btn btn-success'  onclick='show(".$results->balance.",".$results->sales_no.",".$results->paid.",\"".$name."\");'>
				<i class='fa fa-check-circle'></i>
												  Payer
											  </a> </td>
								".
								"
				<td>
				<a href='annuler_commande/". $results->sales_no . "' data-toggle='modal' class='btn btn-success bg-red-active'>
				<i class='fa fa-window-close'></i>
												  Retour
											  </a> </td>
								";
}
?>
<!-- page start-->

<section class="panel">
    <header class="panel-heading">
    HISTOIRE DES VENTES
    </header>
    <div class="panel-body">
        <div class="adv-table editable-table table-responsive">
                <table id="example1" class="table table-striped table-hover table-bordered dataTable"
                       aria-describedby="editable-sample_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 184px;"
                            aria-label="Username">Code de vente
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 269px;" aria-label="Full Name: activate to sort column ascending">
                            Client
						</th>
						<th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
							colspan="1" style="width: 124px;"
							aria-label="Grand Total: activate to sort column ascending">Statut d'achat
                   		</th>
						<th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
							colspan="1" style="width: 124px;"
							aria-label="Grand Total: activate to sort column ascending">Somme Vercée
						</th>
						<th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
							colspan="1" style="width: 124px;"
							aria-label="Grand Total: activate to sort column ascending">Somme Restante
						</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            Date
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            total
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Afficher Vente
						</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Action
						</th>
						<th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Retour
                        </th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php if(!empty($custlistRow)){
                        echo $custlistRow;
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>

</section>

<div id="modale-dette" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Payement de dette </h3>
				</div>
				<?= form_open_multipart(base_url() . 'index.php/sales/new_payement_dette', array('method' => 'POST')) ?>

				<form id="contactForm" name="contact" role="form">
					<div class="modal-body">				
						<div class="form-group">
							<label for="name">Montant a verser</label>
							<input type="text" name="montant" id="montant" class="form-control">
							<input type="hidden" name="sales_no" id="sales_no" class="form-control">
							<input type="hidden" name="paid" id="paid" class="form-control">
							<input type="hidden" name="nom_client" id="nom_client" class="form-control">

						</div>
						<div clqss="form-group">
							
								<label for="name">Date </label>
								<input type="text" data-ad-format="" class="form-control datepicker" name="mydate" id="mydate">
						
						</div>
						<div class="form-group">
							<label for="name">Montant restant</label>
							<input type="text" name="balance" id="balance" class="form-control"readonly>
						</div>		
					</div>
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						<input type="submit" class="btn btn-success" id="submit">
					</div>
				</form>
			</div>
		</div>
	</div>			

<script type="text/javascript">

	function show(blc,sale_no,paid,name){
	
		if(blc <= 0){
			document.getElementById("submit").disabled= true;
			document.getElementById("montant").disabled= true;

		}
		else {
			document.getElementById("submit").disabled= false;
			document.getElementById("montant").disabled= false;
		}
		$('#modale-dette').modal('show');
		document.getElementById("balance").value=blc;
		document.getElementById("sales_no").value=sale_no;
		document.getElementById("paid").value=paid;
		document.getElementById("nom_client").value=name;

	}

	function change(){
		/*
		var mntverser = document.getElementById("montant");
		var blc = 	document.getElementById("balance");

		var rs = blc - mntverser;
		document.getElementById("balance").value = rs;*/
		
		document.getElementById("namemont").value = "bonjour"
	}

	$("#montant").bind('input',function(){
		//var rs = 0;
		/*var mntverser = document.getElementById("montant");
		var blc = document.getElementById("balance");*/
	
	});
</script>
