<?php

?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
    <title>""</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">""</a>

        </div>
    </div>

    <div class="container" style="padding-top: 10px">
        <h3>Modifier depense</h3>
        <hr>
        <div class="row"> 
        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped','method'=>'post');
                    echo form_open_multipart('depense/update', $attributes);?>
            <form name="creerDepense" method="POST" class="container" action="<?php echo base_url().'index.php/depense/edit'; ?>">
            <input type="hidden" name="txt_hidden" value="<?php echo $depense->id; ?>">
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Nom Complet</label>
                        <input class="form-control" name="nomComplet" type="text"
                                                                          value="<?php echo $depense->nomComplet; ?>">
                        
                    </div>

                    <div class="form-group">
                        <label>Telephone</label>
                        <input class="form-control" name="telephone" type="text"
                                                                          value="<?php echo $depense->telephone; ?>">
                        
                    </div>

                    <div class="form-group">
                        <label>Montant</label>
                        <input class="form-control" name="montant" type="double"
                                                                          value="<?php echo $depense->montant; ?>">
                       
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" name="update" value="update" >Modifier</button>
                        <a href="<?php echo base_url().'index.php/depense/index'?>" class="btn-secondary btn bg-danger">Annuler</a>
                    </div>
                    
                    
                        
                </div>
            </form>
            <?php form_close();?>

</div>
</section>

</div>
</div>