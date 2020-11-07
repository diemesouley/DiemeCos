<?php
foreach ($purchase as $results) {

    $id = $results->purchase_no;
    @$custlistRow .= "<tr>


                <td>" . $results->purchase_no . "
                <td>" . $results->vendor_name . "
                <td>" . date('d-m-Y', strtotime($results->purchase_date)) . "
<td>
<a href='show_purchase_history/" . $results->purchase_no . "' data-toggle='modal' class='btn btn-success'>
<i class='fa fa-pencil-square-o'></i>
                                  View Purchase History
                              </a>
                  </td>
                ";

}
?>
<!-- page start-->
<style>
    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .box-header-background {
        background-color: #6c7a89;
        color: #fff;
    }
</style>

<section class="panel">
    <header class="panel-heading box-header-background">
        HISTORIQUE D'ACHAT 
    </header>
    <div class="panel-body">
        <div class="adv-table editable-table table-responsive">
                <table id="example1" class="table table-striped table-hover table-bordered dataTable"
                       aria-describedby="editable-sample_info">
                    <thead>
                <tr role="row">
                    <th class="active sorting_asc" tabindex="0" aria-controls="dataTables-example"
                        rowspan="1" colspan="1" style="width: 32px;" aria-sort="ascending"
                        aria-label="Sl: activate to sort column ascending">Sl
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 154px;"
                        aria-label="Purchase No.: activate to sort column ascending">N ° d'achat

                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 211px;"
                        aria-label="Supplier Name: activate to sort column ascending">Nom du fournisseur
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 150px;"
                        aria-label="Purchase Date: activate to sort column ascending">date d'achat
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
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
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 124px;"
                        aria-label="Grand Total: activate to sort column ascending">Grand Total
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 178px;"
                        aria-label="Purchase By: activate to sort column ascending">Acheter par
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 72px;"
                        aria-label="Action: activate to sort column ascending">Action
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 72px;"
                        aria-label="Action: activate to sort column ascending">Payement
                    </th>
                </tr>
                </thead><!-- / Table head -->
                <tbody><!-- / Table body -->

                <?php $i = 1; foreach ($purchase as $results) {
                    $id = $results->purchase_no; $dette = 0; ?>
                    <!--get all sub category if not this empty-->
                    <tr class="custom-tr odd">
                        <td class="vertical-td sorting_1">
                            <?php echo $i;?>
                        </td>
                        <td class="vertical-td "><?php echo $results->purchase_no; ?></td>
                        <td class="vertical-td "><?php echo $results->vendor_name; ?></td>
                        <td class="vertical-td "><?php echo $results->purchase_date; ?></td>
                        <td class="vertical-td "><?php if($results->due_amount != 0.00){
                            $dette = $results->due_amount;
                                echo "<span class='label label-warning'>En Attente</span>";
                            }else{
                                echo "<span class='label label-primary'>Effectif</span>";
                            } ?></td>
                         <td class="vertical-td "><?php echo ($results->grand_total - $dette); ?></td>
                         <td class="vertical-td "><?php echo $dette; ?></td>
                        <td class="vertical-td "><?php echo $results->grand_total; ?></td>
                        <td class="vertical-td "><?= $results->USER_NAME;?></td>

                        <td>
                            <a href='show_purchase_history/<?= $results->purchase_no ?>' data-toggle='modal'
                               class='btn btn-success'>
                                <i class='fa fa-pencil-square-o'></i>
                                Afficher les achats
                            </a>
                        </td>

                        <td>
                            
                            <a href='javascript:void(0)' onclick="isconfirm(<?= $results->purchase_no ?>,<?=$results->due_amount?>,'<?=$results->vendor_name?>');" data-toggle='modal'
                               class='btn btn-success bg-blue' >
                                <i class='fa fa-pencil-square-o'></i>
                                Payer
                            </a>
                        </td>
                    </tr>
                <?php  $i++; } ?>
                </tbody><!-- / Table body -->
            </table>

            <!--<div class="row-fluid">
                <div class="span6">
                    <!<div class="dataTables_info" id="hidden-table-info_info">Showing 1 to 10 of 57 entries</div>-->
            <!--</div>
            <div class="span6">
                <div class="dataTables_paginate paging_bootstrap pagination">
                    <ul>
                        <!<li class="prev disabled"><a href="#">← Previous</a></li>-->
            <!--<li class="active"><a href="#"><?php //echo $this->pagination->create_links(); ?>
                                </a></li>

                        </ul>
                    </div>
                </div>
            </div>-->
        </div>
	</div>
</section>

<div id="modale-dette-achat" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Payement de dette </h3>
				</div>
				<?= form_open_multipart(base_url() . 'index.php/purchase/payement_dette', array('method' => 'POST')) ?>

				<form id="contactForm" name="contact" role="form">
					<div class="modal-body">				
						<div class="form-group">
							<label for="name">Montant a verser</label>
							<input type="text" name="montant" id="montant" class="form-control">
							<input type="hidden" name="purchase_no" id="purchase_no" class="form-control">
							<!--input type="hidden" name="paid" id="paid" class="form-control"-->
							<input type="hidden" name="vendor_name" id="vendor_name" class="form-control">

						</div>
						<div clqss="form-group">
							
								<label for="name">Date </label>
								<input type="text" data-ad-format="" class="form-control datepicker" name="mydate" id="mydate">
						
						</div>
						<div class="form-group">
							<label for="name">Montant restant</label>
							<input type="text" name="due_amount" id="due_amount" class="form-control"readonly>
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

   function isconfirm(purchase_no,due_amount,nom_vendeur){
       if (due_amount<=0) {
        document.getElementById("due_amount").disabled=true;
        document.getElementById("submit").disabled=true;
       }else{
        document.getElementById("due_amount").disabled=false;
        document.getElementById("submit").disabled=false;
       }
	$('#modale-dette-achat').modal('show');
		document.getElementById("purchase_no").value=purchase_no;
		document.getElementById("due_amount").value=due_amount;
		document.getElementById("vendor_name").value=nom_vendeur;

}
</script>
