
<!-- page start-->
<section class="panel">
 <header class="panel-heading">
	 Historique de payement des dettes client
	
 </header>
 <?php if ($this->session->flashdata('msg'))
	 echo $this->session->flashdata('msg');
 ?>
 <div class="panel-body">

	 <div class="adv-table editable-table table-responsive">
		 <div class="space15"></div>
		 <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
			 <table class="table table-striped table-hover table-bordered dataTable" id="example1"
					aria-describedby="editable-sample_info">
				 <thead>
				 <tr role="row">
					 <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Username">
						 Code de vente
					 </th>
					 <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
						 colspan="1" aria-label="Full Name: activate to sort column ascending">
						 Montant Verser
					 </th>
					 <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
						 colspan="1" aria-label="Full Name: activate to sort column ascending">
						Nom Client
					 </th>
					 <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
						 colspan="1" aria-label="Full Name: activate to sort column ascending">
						 Date
					 </th>
					 
				 </tr>
				 </thead>

				 <tbody role="alert" aria-live="polite" aria-relevant="all">
				 <?php foreach ($history_payement as $results) {

					// $id = $results->stock_no; ?>
					 <tr class='odd'>

						 <td class='center'><?php echo $results->sales_no; ?></td>
						 <td><?php echo $results->montant_verser; ?></td>
						 <td><?php echo $results->nom_client; ?></td>
						 <td><?php echo $results->date; ?></td>


					   
					 </tr>
				 <?php } ?>
				 </tbody>
			 </table>

		 </div>
	 </div>
 </div>
</section>
