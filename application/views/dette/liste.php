<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <title>Gestion des dettes</title>
</head>
<body>
   
    <div class="container" style="padding-top: 10px">
        
                <hr>
                <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> <span class="caption-subject font-dark sbold uppercase">Liste dette | 
                        <a href="<?php echo base_url().'index.php/dette/creer' ?>" class="btn btn-primary">Ajouter  <i class="fa fa-plus"></i></a>
                               
                            </a></span></h3>
                </div>
                <div class="box-body">

                    <table class="table table-striped table-hover table-bordered dataTable" id="example1"
                           aria-describedby="editable-sample_info">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nom Client</th>
                        <th>Telephone</th>
                        <th>Description</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                      <?php if (!empty($dette)) { foreach($dette as $dettes) {?>
                            <tr>
                                <td><?php echo $dettes['id']?></td>
                                <td><?php echo $dettes['nomClient']?></td>
                                <td><?php echo $dettes['telephone']?></td>
                                <td><?php echo $dettes['description']?></td>
                                <td><?php echo $dettes['montant']?></td>
                                <td><?php echo $dettes['dateDette']?></td>
                                <td><a href="<?php echo base_url().'index.php/dette/edit/'.$dettes['id']?>" class="btn btn-primary">Editer</a></td>
                                <td><a href="<?php echo base_url().'index.php/dette/supprimer/'.$dettes['id']?>" class="btn btn-primary bg-danger">Supprimer</a></td>
                                </tr>
                                
                                <?php } } else{ ?>
                            <tr>
                                <td colspan="5">Liste Found</td>
                            </tr>
                        <?php }  ?> 
                </table>
            </div>

        </div>
        
    </div>
</body>
</html>
