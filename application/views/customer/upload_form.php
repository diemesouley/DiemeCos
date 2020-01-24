<div class="row">
<div class="col-lg-6">
<h3>Votre fichier a été téléchargé avec succès!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Téléchargez un autre fichier!'); ?></p>
</div>
</div>