<div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Liste des dettes</a>

        </div>
    </div>

    <div class="box-body">

                    <table class="table table-striped table-hover table-bordered dataTable" id="example1"
                           aria-describedby="editable-sample_info">
                        <thead>
                        <th>ID Commande</th>
                        <th>Nom Client</th>
                        <th>Telephone</th>
                        <th>email</th>
                        <th>Dette</th>
                        <th>Supprimer</th>
					</tr>
				
                      <?php if (!empty($data)) {foreach($data as $dat) {?>
                            <tr>
                                <td><?php echo $dat['sales_no']?></td>
                                <td><?php echo $dat['customer_name']?></td>
                                <td><?php echo $dat['phone_no']?></td>
                                <td><?php echo $dat['email']?></td>
                                <td><?php echo $dat['balance']?></td>
                                <td><a href="javascript:;" onclick="return isconfirm('<?php echo base_url().'index.php/Sales/payement_dette/'.$dat['sales_no']?>');" class="btn btn-primary bg-danger">Payer</a></td>
                            </tr>
                        <?php }  }else{ ?>
                            <tr>
                                <td colspan="5">Liste Found</td>
                            </tr>
                        <?php }  ?> 
                </table>
            </div>

        </div>
        
    </div>
	<script type="text/javascript">
  /* function ConfirmMessage() {
       if (confirm("Voulez-vous changer la couleur de fond de page ?")) {
           // Clic sur OK
           document.body.style.backgroundColor="#ccc";
       }
   }*/

   function isconfirm(url_val){
    
    if(confirm('Vous allez payer la dette de vente') == false)
    {
        return false;
    }
    else
    {
        location.href=url_val;
    }
}
</script>
