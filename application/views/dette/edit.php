<?php


/*foreach ($results as $menulists) {


  @$menulistRow .= "<tr class='gradeA odd'>

								<td class='center'>" . $menulists->MENU_TEXT . "

								<td>" . $menulists->MENU_URL . "

								<td>" . $menulists->SORT_ORDER . "

								<td class=center>" . $menulists->PARENT_ID . "";


}*/
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
    <title>Enregistrement</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Gestion des dettes</a>

        </div>
    </div>

    <div class="container" style="padding-top: 10px">
        <h3>Modifier dette</h3>
        <hr>
        <div class="row"> 
        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped','method'=>'post');
                    echo form_open_multipart('dette/update', $attributes);?>
            <form name="creerDette" method="POST" class="container" action="<?php echo base_url().'index.php/dette/edit'; ?>">
            <input type="hidden" name="txt_hidden" value="<?php echo $dette->id; ?>">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom Client</label>
                        <input class="form-control" name="nomClient" type="text"
                                                                          value="<?php echo $dette->nomClient; ?>">
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input class="form-control" name="telephone" type="text"
                                                                          value="<?php echo $dette->telephone; ?>">
                       
                    </div>

                    <div class="form-group">
                        <label>Description produit</label>
                        <input class="form-control" name="description" type="text"
                                                                          value="<?php echo $dette->description; ?>">
                        
                    </div>

                    <div class="form-group">
                        <label>Montant</label>
                        <input class="form-control" name="montant" type="double"
                                                                          value="<?php echo $dette->montant; ?>">
                       
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" name="update" value="update" >Modifier</button>
                        <a href="<?php echo base_url().'index.php/dette/index'?>" class="btn-secondary btn bg-danger">Annuler</a>
                    </div>
                    
                    
                        
                </div>
            </form>
            <?php form_close();?>

</div>
</section>

</div>
</div>
<!-- page end-->
<!--Table starts-->


<!--Table ends-->

