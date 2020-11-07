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
        <h3>Enregistrement de dette</h3>
        <hr>
        <div class="row"> 
        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped','method'=>'post');
                    echo form_open_multipart('dette/creer', $attributes);?>
            <form name="creerDette" method="POST" class="container" action="<?php echo base_url().'index.php/dette/index'; ?>">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nom Client</label>
                        <input type="text" name="nomClient" value="<?php echo set_value('') ?>" id="nomClient" class="form-control">
                        <?php echo form_error('nomClient'); ?> 
                    </div>

                    <div class="form-group">
                        <label for="">Téléphone</label>
                        <input type="text" name="telephone" value="" id="telephone" class="form-control">
                        <?php echo form_error('telephone'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Description produit</label>
                        <input type="text" name="description" value="" id="description" class="form-control">
                        <?php echo form_error('description'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Montant</label>
                        <input type="double" name="montant" value="" id="montant" class="form-control">
                        <?php echo form_error('montant'); ?>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Enregister</button>
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

