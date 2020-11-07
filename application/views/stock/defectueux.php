<?php


foreach ($defectueux as $results) {

   // $id = $results->stock_no;
    @$custlistRow .= "<tr class='odd'>

                <td class='center'>" . $results->item_id . "
                <td>" . $results->category_id . "
                <td>" . $results->prix . "
                <td class='center'>" . $results->qty . "
                <td class='center'>" . $results->date . "
                <td class='center'>" . $results->stock_rate . "



                <td>";


}
?>
<!-- page start-->
<section class="panel">
    <header class="panel-heading">
		LISTE DES PRODUITS DEFECTUEUX
		| <a href='#myModal-1' data-toggle='modal' class='btn green btn-info'>
                                Ajouter un nouveau <i class="fa fa-plus"></i>
                            </a>
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
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Categorie
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                           Quantite
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Prix
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" aria-label="Full Name: activate to sort column ascending">
                            Date
                        </th>
                        
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php foreach ($defectueux as $results) {

                       // $id = $results->stock_no; ?>
                        <tr class='odd'>

                            <td class='center'><?php echo $results->item_id; ?></td>
                            <td><?php echo $results->category_id; ?></td>
                            <td><?php echo $results->prix; ?></td>
                            <td><?php echo $results->qty; ?></td>
                            <td><?php echo $results->date; ?></td>


                          
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>



<!--Modal for ADD -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
     id="myModal-1"
     class="modal fade" style="display: none;">
    <div class="modal-dialog">
	<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Créer un produit</h4>
            </div>
            <?= form_open_multipart(base_url() . 'index.php/stock/insert_defectueux', array('method' => 'POST', 'class' => 'form-horizontal')) ?>

            <div class="modal-body">

			<div class='form-group'>
                        <label for='inputPassword1'
                               class='col-lg-3 col-sm-3 control-label'>Selectionner un produit</label>
                        <div class='col-lg-9'>
						<select class="selectpicker form-control product input-xlarge" name="products"
                            onchange="test();" data-live-search="true">
                        <option value="">Ajouter un produit</option>
                        <?php foreach ($products as $rows) :
                            ?>
                            <option value="<?= $rows->item_id; ?>"><?= $rows->item_name; ?> / <?= $rows->color ?>
                                    / <?= $rows->size ?></option>
                        <?php endforeach; ?>
                    	</select>

                        </div>

					</div>

                
                <div class='form-group'>
                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>Quantité</label>

                    <div class='col-lg-9'>
                        <input type='text' name="qty" class='form-control'
                               value="" id=''
                               placeholder='numérique' required>
                    </div>
                </div>

                <div class='form-group'>
                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>Date</label>

					<div class="col-lg-9">

						
						<input type="text" value="" size="16" required name="date"
							class="form-control form-control-inline input-medium datepicker">
					</div>
                </div>

           
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
				<?php echo $My_Controller->savePermission;?>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
</div>
<!--Modal for ADD ends-->


<!-- page end-->
<script>
	function test()
	{

	}
</script>
