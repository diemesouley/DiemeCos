<?php

?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
    <title>Enregistrement</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Gestion des depense</a>

        </div>
    </div>

    <div class="container" style="padding-top: 10px">
        <h3>Enregistrement de depense</h3>
        <hr>
        <div class="row"> 
        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped','method'=>'post');
                    echo form_open_multipart('depense/creer', $attributes);?>
            <form name="creerDette" method="POST" class="container" action="<?php echo base_url().'index.php/depense/index'; ?>">
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="">Description dépense</label>
                        <input type="text" name="nomComplet" value="" id="nomComplet" class="form-control">
                        <?php echo form_error('nomComplet'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Montant</label>
                        <input type="double" name="montant" value="" id="montant" class="form-control">
                        <?php echo form_error('montant'); ?>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Enregister</button>
                        <a href="<?php echo base_url().'index.php/depense/index'?>" class="btn btn-danger">Annuler</a>
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

