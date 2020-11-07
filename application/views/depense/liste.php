<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <title>Gestion des Dépense</title>
</head>
<body>
<div class="container" style="padding-top: 10px">
        
        <hr>
        <div class="row">
<div class="col-xs-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="caption-subject font-dark sbold uppercase">Liste Dépense | 
                <a href="<?php echo base_url().'index.php/depense/creer' ?>" class="btn btn-primary">Ajouter  <i class="fa fa-plus"></i></a>
                       
                    </a></span></h3>
        </div>
            <div class="col-md-12">
                <?php 
                    $success = $this->session->flashdata('success');   
                    if ($success!="") {
                ?>  
                <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php } ?>
                
                    <?php 
                    $failure = $this->session->flashdata('failure');   
                    if ($failure!="") {
                ?>  
                <div class="alert alert-success"><?php echo $failure; ?></div>
                    <?php } ?>
                    </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table class="display table table-bordered table-striped dataTable" id="example1">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Description Dépense</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Supprimer</th>
                    </tr>
                      <?php if (!empty($depense)) { foreach($depense as $dep) {?>
                            <tr>
                                <td><?php echo $dep['id']?></td>
                                <td><?php echo $dep['nomComplet']?></td>
                                <td><?php echo $dep['montant']?></td>
                                <td><?php echo $dep['dateDepense']?></td>
                                <td><a href="<?php echo base_url().'index.php/depense/supprimer/'.$dep['id']?>" class="btn btn-danger bg-danger">Supprimer</a></td>
                            </tr>
                        <?php } } else{ ?>
                            
                        <?php }  ?> 
                </table>
            </div>

        </div>
        
    </div>
</body>
</html>
